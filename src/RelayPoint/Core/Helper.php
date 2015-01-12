<?php

namespace RelayPoint\Core;

class Helper
{
    public static function getGatewayClassName($shortName)
    {
        if (strpos($shortName, '\\') === 0) {
            return $shortName;
        }

        $shortName = str_replace('_', '\\', $shortName);

        if (strpos($shortName, '\\') === false) {
            $shortName .= '\\';
        }

        return '\\RelayPoint\\' . $shortName . 'Gateway';
    }
}
