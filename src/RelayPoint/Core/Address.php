<?php

namespace RelayPoint\Core;

class Address
{
    /**
     * Address fields
     *
     * @var array
     */
    private $fields;

    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function getField($name)
    {
        if (!isset($this->fields[$name])) {
            return '';
        }
        return $this->fields[$name];
    }
}
