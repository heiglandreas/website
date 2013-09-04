<?php

namespace Application;

use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\EventManager\EventInterface;
use Zend\Mvc\ModuleRouteListener;

class Module implements BootstrapListenerInterface
{
    public function onBootstrap(EventInterface $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $translator = $e->getApplication()->getServiceManager()->get('translator');
        $translator
            ->setLocale(\Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']))
            ->setFallbackLocale('en_US');
    }

    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }
}
