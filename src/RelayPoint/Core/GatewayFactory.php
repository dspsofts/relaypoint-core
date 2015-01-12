<?php

namespace RelayPoint\Core;

class GatewayFactory
{
    private $gateways = array();

    public function all()
    {
        return $this->gateways;
    }

    public function register($className)
    {
        if (!in_array($className, $this->gateways)) {
            $this->gateways[] = $className;
        }
    }

    public function getSupportedGateways()
    {
        $package = json_decode(file_get_contents(__DIR__.'/../../../composer.json'), true);

        return $package['extra']['gateways'];
    }

    public function find()
    {
        foreach ($this->getSupportedGateways() as $gateway) {
            $class = Helper::getGatewayClassName($gateway);
            if (class_exists($class)) {
                $this->register($gateway);
            }
        }

        ksort($this->gateways);

        return $this->all();
    }

    public function create($class)
    {
        $class = Helper::getGatewayClassName($class);

        if (!class_exists($class)) {
            throw new \RuntimeException("Class '$class' not found");
        }

        return new $class();
    }
}
