<?php

namespace ZfProfiler\EventManager;

use ZfProfiler\Profiler\ProfilerInterface;

class EventManagerProfiler implements ProfilerInterface
{

    protected $eventManagers = [];

    public function getProfiledData()
    {

    }

    public function addEventManager(ProfilableEventManager $eventManager)
    {
        $this->eventManagers[] = $eventManager;

        return $this;
    }
}