<?php

return array(
    'invokables' => array(
        'EventManagerProfilerListener' => 'ZfProfiler\EventManager\Listener\EventManagerProfilerListener'
    ),
);


// Used to create an own service manager. May contain one or more child arrays.
//    'service_listener_options' => array(
//         array(
//             'service_manager' => 'ProfilerManager',
//             'config_key'      => 'zf_profiler',
//             'interface'       => 'ZfProfiler\ModuleManager\Feature\ProfilerProviderInterface',
//             'method'          => 'getProfilerConfig',
//         ),
//     ),

// Initial configuration with which to seed the ServiceManager.
// Should be compatible with Zend\ServiceManager\Config.
//'service_manager' => array(
//    'factories' => array(
//        'ProfilerManager' => 'ZfProfiler\Mvc\Service\ProfilerManagerFactory',
//        'EventManager' => 'ZfProfiler\EventManager\Service\ProfilableEventManagerFactory'
//    ),
//    'invokables' => array(
//        'framework.module-manager.delegator-factory' => 'ZfProfiler\Mvc\Service\ModuleManagerDelegatorFactory',
//        'eventManagerProfiler' => 'ZfProfiler\EventManager\eventManagerProfiler'
//    ),
//    'delegators' => array(
//        'modulemanager' => array(
//            'framework.module-manager.delegator-factory'
//        )
//    )
//),