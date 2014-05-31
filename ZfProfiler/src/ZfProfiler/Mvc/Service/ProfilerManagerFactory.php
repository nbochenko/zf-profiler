<?php

namespace ZfProfiler\Mvc\Service;

use Zend\Mvc\Service\AbstractPluginManagerFactory;

class ProfilerManagerFactory extends AbstractPluginManagerFactory
{

    const PLUGIN_MANAGER_CLASS = 'ZfProfiler\Profiler\ProfilerManager';

}
