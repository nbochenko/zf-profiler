<?php

namespace ZfProfiler\ModuleManager\Feature;

interface ProfilerProviderInterface
{
    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getProfilerConfig();
}
