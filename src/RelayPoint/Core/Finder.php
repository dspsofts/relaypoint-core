<?php

/**
 * This interface describes the search of any relay point.
 *
 * @author Pierre Feyssaguet <pfeyssaguet@gmail.com>
 * @since 2015-01-10
 */

namespace RelayPoint\Core;

interface Finder
{
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
