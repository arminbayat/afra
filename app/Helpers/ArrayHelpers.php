<?php

namespace App\Helpers;

class ArrayHelpers
{
    public static function arrayKeysExist(array $keys, array $array): bool
    {
        return !array_diff_key(array_flip($keys), $array);
    }
}
