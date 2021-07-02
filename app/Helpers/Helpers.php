<?php

if (!function_exists('get_class_name')) {
    function get_class_name($object)
    {
        if (is_object($object)) {
            $object = get_class($object);
        }
        return substr($object, strrpos($object, '\\') + 1);
    }
}

if (!function_exists('date_interval_to_unix')) {
    function date_interval_to_unix(DateInterval $dateInterval): int
    {
        return now()
            ->add($dateInterval)
            ->getTimestamp();
    }
}

if (!function_exists('is_int_value')) {
    function is_int_value($value)
    {
        return is_string($value) && (string) intval($value) === (string) $value;
    }
}
