<?php

namespace ZfProfiler\EventManager\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfProfiler\EventManager\ProfilableEventManager;

class ProfilableEventManagerFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $eventManager = new ProfilableEventManager();
        $serviceLocator->get('eventManagerProfiler')->addEventManager($eventManager );

        return $eventManager;
    }

}