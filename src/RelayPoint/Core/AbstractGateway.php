<?php

/**
 * Base RelayPoint gateway class
 *
 * @author Pierre Feyssaguet <pfeyssaguet@gmail.com>
 * @since 2014-11-12
 */

namespace RelayPoint\Core;

abstract class AbstractGateway implements GatewayInterface
{
    protected $parameters = array();

    public function __construct()
    {
        $this->initialize();
    }

    public function getShortName()
    {
        return Helper::getGatewayShortName(get_class($this));
    }

    public function initialize(array $parameters = array())
    {
        foreach ($this->getDefaultParameters() as $name => $value) {
            $this->setParameter($name, $value);
        }

        Helper::initialize($this, $parameters);
    }

    public function getDefaultParameters()
    {
        return array();
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function getParameter($name)
    {
        if (isset($this->parameters[$name])) {
            return $this->parameters[$name];
        }

        return '';
    }

    public function setParameter($name, $value)
    {
        $this->parameters[$name] = $value;
    }

    public function setCountry($country)
    {
        $this->setParameter('country', $country);
    }

    public function getCountry($country)
    {
        return $this->getParameter($country);
    }
}
