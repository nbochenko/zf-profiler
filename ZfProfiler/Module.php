<?php

namespace ZfProfiler;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\RouteProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use ZfProfiler\ModuleManager\Feature\ProfilerProviderInterface;

class Module implements
    ServiceProviderInterface,
    ControllerProviderInterface,
    RouteProviderInterface,
    AutoloaderProviderInterface,
    ProfilerProviderInterface
{

    /**
     * @inheritdoc
     */
    public function getServiceConfig()
    {
        return include __DIR__ . '/config/services.config.php';
    }

    /**
     * @inheritdoc
     */
    public function getControllerConfig()
    {
        return include __DIR__ . '/config/controllers.config.php';
    }

    /**
     * @inheritdoc
     */
    public function getRouteConfig()
    {
        return include __DIR__ . '/config/routes.config.php';
    }

    /**
     * @inheritdoc
     */
    public function getAutoloaderConfig()
    {
        return include __DIR__ . '/config/autoloader.config.php';
    }

    /**
     * @inheritdoc
     */
    public function getProfilerConfig()
    {
        return include __DIR__ . '/config/profiler.config.php';
    }

}