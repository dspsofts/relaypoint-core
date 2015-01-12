<?php

/**
 * RelayPoint gateway interface
 *
 * @author Pierre Feyssaguet <pfeyssaguet@gmail.com>
 * @since 2014-01-12
 */

namespace RelayPoint\Core;

interface GatewayInterface
{
    public function getName();

    public function getShortName();

    public function getDefaultParameters();

    public function initialize(array $parameters = array());

    public function getParameters();
}
