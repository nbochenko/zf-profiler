<?php

namespace ZfProfiler\Profiler;

use Zend\ServiceManager\AbstractPluginManager;

class ProfilerManager extends AbstractPluginManager
{
    /**
     * Default profilers
     *
     * @var array
     */
    protected $invokableClasses = array(
    );

    /**
     * @var bool
     */
    protected $shareByDefault = true;

    /**
     * Validate the plugin
     *
     * @param mixed $plugin
     */
    public function validatePlugin($plugin)
    {
        return;
    }
}
