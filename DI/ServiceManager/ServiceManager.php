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
        'a' =>
            [
                'class' => 'A',
                'arguments' => []
            ],
        'b' =>
            [
                'class' => 'B',
                'arguments' => ['a']
            ]
    ];


    protected $cache = [];


    public function get($name) {

        if(isset($this->cache[$name])) {
            return $this->cache[$name];
        }

        if(isset($this->services[$name])) {

            $arguments = [];
            if(count($this->services[$name]['arguments'])){
                foreach($this->services[$name]['arguments'] as $argument) {
                    $arguments[] = $this->get($argument);
                }
            } else {
                $serviceClass = $this->services[$name]['class'];
                $this->cache[$name] = new $serviceClass();
                return $this->cache[$name];
            }
            $r = new ReflectionClass($this->services[$name]['class']);
            $this->cache[$name] = $r->newInstanceArgs($arguments);
        }

        return $this->cache[$name];
    }
}

class A {
}

class B {
    protected $a;
    public function __construct(A $a)
    {
        $this->a = $a;
    }
}

$serviceManager = new ServiceManager();

var_dump($serviceManager->get('b'));