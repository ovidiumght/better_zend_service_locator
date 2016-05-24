<?php

/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 24.05.2016
 * Time: 21:20
 */
class ServiceManager
{

    protected $services = [
        'db_service' =>
            [
                'class' => 'Application\Controller\DB',
                'arguments' => ['pdo']
            ],
        'index_controller' =>
            [
                'class' => 'Application\Controller\IndexController',
                'arguments' => ['db_service']
            ]
    ];


    protected $cache = [];


    public function get($name) {

        if(isset($this->cache[$name])) {
            return $this->cache[$name];
        }

        if(isset($this->services[$name])) {

            $arguments = [];
            foreach($this->services[$name]['arguments'] as $argument) {
                $arguments[] = $this->get($argument);
            }

            $this->cache[$name] = new $this->services['name'];
        }
    }
}