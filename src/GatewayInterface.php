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

    public function getParameter($name);

    public function setParameter($name, $value);

    /**
     * Returns the list of the relay points for a specific search.
     *
     * @param array $fields Search fields
     * @param boolean $active Turn to false if you only want active relay points
     * @return Address[]
     * @throws RelayPointException
     */
    public function search(array $fields, $active = true);

    /**
     * Returns the details of one specific relay point.
     *
     * @param array $fields Search fields
     * @return Address|null
     * @throws RelayPointException
     */
    public function detail(array $fields);
}
