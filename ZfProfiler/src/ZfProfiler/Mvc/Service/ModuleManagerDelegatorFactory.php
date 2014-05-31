<?php

namespace ZfProfiler\Mvc\Service;

use Zend\ServiceManager\DelegatorFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModuleManagerDelegatorFactory implements DelegatorFactoryInterface
{

    public function createDelegatorWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName, $callback)
    {
        $moduleManager = $callback();
        $serviceListener  = $serviceLocator->get('ServiceListener');

        $serviceListener->addServiceManager(
            'ProfilerManager',
            'zf_profiler',
            'ZfProfiler\ModuleManager\Feature\ProfilerProviderInterface',
            'getProfilerConfig'
        );

        return $moduleManager;
    }

}