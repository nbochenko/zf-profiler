<?php

namespace ZfProfiler\Mvc\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfProfiler\Profiler\ProfilerManager;

class ProfilerManagerFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $profilerManager = new ProfilerManager();
        $profilerManager->setServiceLocator($serviceLocator);

        return $profilerManager;
    }
}
