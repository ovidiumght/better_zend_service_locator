<?php

namespace Di\Tests;
use Di\ServiceManager;

/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 5/25/16
 * Time: 4:45 PM
 */
class ServiceMangerTest extends \PHPUnit_Framework_TestCase
{

    public function testItCanBeCreated()
    {
        $serviceManger = new ServiceManager();

        $this->assertInstanceOf(ServiceManager::class, $serviceManger);
    }
}
