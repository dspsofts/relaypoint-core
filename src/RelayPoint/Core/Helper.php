<?php

/**
 * Helper class
 *
 * @author Pierre Feyssaguet <pfeyssaguet@gmail.com>
 * @since 2015-01-11
 */

namespace RelayPoint\Core;

class Helper
{
    /**
     * Convert a string to camelCase. Strings already in camelCase will not be harmed.
     *
     * @param string $str The input string
     * @return string camelCased output string
     */
    public static function camelCase($str)
    {
        return preg_replace_callback(
            '/_([a-z])/',
            function ($match) {
                return strtoupper($match[1]);
            },
            $str
        );
    }

    /**
     * Initialize an object with a given array of parameters.
     *
     * Parameters are automatically converted to camelCase. Any parameters which do
     * not match a setter on the target object are ignored.
     *
     * @param mixed $target The object to set parameters on
     * @param array $parameters An array of parameters to set
     */
    public static function initialize($target, $parameters)
    {
        if (is_array($parameters)) {
            foreach ($parameters as $key => $value) {
                $method = 'set'.ucfirst(static::camelCase($key));
                if (method_exists($target, $method)) {
                    $target->$method($value);
                }
            }
        }
    }

    /**
     * Resolve a short gateway name to a full namespaced gateway class.
     *
     * Class names beginning with a namespace marker (\) are left intact.
     * Non-namespaced classes are expected to be in the \RelayPoint namespace, e.g.:
     *
     *      \Custom\Gateway     => \Custom\Gateway
     *      \Custom_Gateway     => \Custom_Gateway
     *      Kiala               => \RelayPoint\Kiala\Gateway
     *
     * @param  string $shortName The short gateway name
     * @return string The fully namespaced gateway class name
     */
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
