<?php

namespace ZfProfiler\Profiler;

use Zend\Stdlib\PriorityQueue;

abstract class AbstractProfiler implements ProfilerInterface
{

    /**
     * @var \Zend\Stdlib\PriorityQueue
     */
    protected $profiledData;

    public function __construct()
    {
        $this->profiledData = new PriorityQueue();
    }

    public function getProfiledData()
    {
        return $this->profiledData;
    }

    protected function addProfiledData($data)
    {
        $this->profiledData->insert($data);
    }

}