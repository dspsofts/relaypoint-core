<?php

namespace RelayPoint\Core;

interface Finder
{
    public function search(array $fields, $active = true);

    public function detail(array $fields);
}
