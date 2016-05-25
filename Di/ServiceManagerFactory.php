<?php

namespace Di;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Abstract factory responsible of trying to build services from the PHP DI container
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 * @author Martin Fris
 */
final class DIContainerFactory implements FactoryInterface
{

    protected $serviceManger;

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceManger = new ServiceManager();
        return $this->serviceManger;
    }
}