<?php

namespace ZfProfiler\EventManager;

use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManager;
use Zend\EventManager\Exception;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\Stdlib\CallbackHandler;
use Zend\Stdlib\PriorityQueue;
use ZfProfiler\Profiler\ProfilerInterface;

class ProfilableEventManager extends EventManager implements ProfilerInterface
{

    protected $attachments = [];

    protected $triggers = [];

    public function getProfiledData()
    {

    }

    public function attach($event, $callback = null, $priority = 1)
    {
        // Proxy ListenerAggregateInterface arguments to attachAggregate()
        if ($event instanceof ListenerAggregateInterface) {
            return $this->attachAggregate($event, $callback);
        }

        // Null callback is invalid
        if (null === $callback) {
            throw new Exception\InvalidArgumentException(sprintf(
                '%s: expects a callback; none provided',
                __METHOD__
            ));
        }

        // Array of events should be registered individually, and return an array of all listeners
        if (is_array($event)) {
            $listeners = array();
            foreach ($event as $name) {
                $listeners[] = $this->attach($name, $callback, $priority);
            }
            return $listeners;
        }

        // If we don't have a priority queue for the event yet, create one
        if (empty($this->events[$event])) {
            $this->events[$event] = new PriorityQueue();
        }

        // Create a callback handler, setting the event and priority in its metadata
        $listener = new CallbackHandler($callback, array('event' => $event, 'priority' => $priority));

        // Inject the callback handler into the queue
        $this->events[$event]->insert($listener, $priority);
        return $listener;
    }

    protected function triggerListeners($event, EventInterface $e, $callback = null)
    {
        return parent::triggerListeners($event, $e, $callback);
    }

    public function attachAggregate(ListenerAggregateInterface $aggregate, $priority = 1)
    {
        $beforeAttachEM = clone $this;
        $response = parent::attachAggregate($aggregate, $priority);
        $this->attachments[get_class($aggregate)] = $this->getListenerAggregateAttachments($beforeAttachEM);

        return $response;
    }

    protected function getListenerAggregateAttachments($beforeAttachEM)
    {
        foreach ($this->getEvents() as $event) {
            $beforeListeners = $beforeAttachEM->getListeners($event)->toArray();
            $afterListeners = $this->getListeners($event)->toArray();
        }

        $attachedListeners = [];
        foreach ($afterListeners as $afterListener) {
            if (in_array($afterListener, $beforeListeners) === false) {
                $attachedListeners[] = $afterListener;
            }
        }

        return $attachedListeners;
    }
}