<?php
/**
 * @copyright Zicht Online
 */
namespace Zicht;

/**
 * Utility class for generating CSS class names based on supplied predicates.
 */
class HtmlClassHelper
{
    /**
     * Builds a string of CSS class names based on supplied predicates.
     *
     * @param array ...$config
     * @return string
     */
    public static function getClasses(...$config)
    {
        $classes = [];

        foreach ($config as $argument) {
            $classes = self::addArgumentToClasses($classes, $argument);
        }

        return join('  ', $classes);
    }

    /**
     * Helper function that determines whether the supplied classes should
     * be added, according to the supplied argument.
     *
     * @param array $classes
     * @param string|array $argument
     * @return array
     */
    private static function addArgumentToClasses($classes, $argument)
    {
        switch(gettype($argument))
        {
            case 'string':
                array_push($classes, $argument);
                break;
            case 'array':
                if (!self::hasStringKeys($argument)) {
                    $classes = array_merge($classes, $argument);
                    break;
                }

                foreach($argument as $class => $predicate) {
                    if (!$predicate) {
                        continue;
                    }

                    array_push($classes, $class);
                }
                break;

            default:
                break;
        }

        return $classes;
    }


    /**
     * Determines whether an array has string keys.
     *
     * @param array $array
     * @return bool
     */
    private static function hasStringKeys($array)
    {
        $keys = array_keys($array);

        /**
         * If the array keys of the keys match the keys, then the array must not be associative.
         */
        return array_keys($keys) !== $keys;
    }
}
