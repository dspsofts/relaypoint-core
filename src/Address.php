<?php

/**
 * Describes a relay point address.
 *
 * @author Pierre Feyssaguet <pfeyssaguet@gmail.com>
 * @since 2015-01-10
 */

namespace RelayPoint\Core;

class Address
{
    /**
     * Address fields
     *
     * @var array
     */
    private $fields;

    /**
     * Opening hours
     *
     * @var OpeningHours[]
     */
    private $openingHours = array();

    /**
     * Constructor.
     *
     * @param array $fields Address fields
     */
    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }

    /**
     * Adds an opening schedule for a day.
     *
     * @param string $day Day
     * @param string $hours Opening hours of that day
     */
    public function addOpeningHour($day, $hours)
    {
        $openingHour = new OpeningHours($day, $hours);
        $this->openingHours[$day] = $openingHour;
    }

    /**
     * Returns all the fields.
     *
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Returns a specific field.
     *
     * @param string $name Field name
     * @return string
     */
    public function getField($name)
    {
        if (!isset($this->fields[$name])) {
            return '';
        }
        return $this->fields[$name];
    }

    /**
     * Returns all the opening hours.
     *
     * @return OpeningHours[]
     */
    public function getOpeningHours()
    {
        return $this->openingHours;
    }
}
