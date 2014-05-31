<?php

namespace ZfProfiler\EventManager\Listener;

use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\Mvc\MvcEvent;
use ZfProfiler\Profiler\AbstractProfiler;

class EventManagerProfilerListener extends AbstractProfiler implements ListenerAggregateInterface
{

    use ListenerAggregateTrait;

    public function profile(MvcEvent $e)
    {
        $target = $e->getTarget();
        $class = __CLASS__;
        $method = __FUNCTION__;
        $event = $e->getName();
        \Zend\Debug\Debug::dump($class);
        exit();
    }

    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->getSharedManager()->attach('*', '*', array($this, 'profile'));
    }
}