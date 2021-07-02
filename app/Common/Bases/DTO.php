<?php

namespace App\Common\Bases;

use App\Common\Exception\InvalidJsonForDTOException;
use App\Helpers\ArrayHelpers;
use ReflectionMethod;

abstract class DTO
{
    public static function getKeys(): array
    {
        return array_keys(get_class_vars(static::class));
    }

    public static function getMandatoryKeys(): array
    {
        $ref = new ReflectionMethod(static::class, '__construct');
        $result = [];
        foreach ($ref->getParameters() as $param) {
            if (!$param->allowsNull() && !$param->isOptional()) {
                $result[] = $param->getName();
            }
        }

        return $result;
    }

    public static function getOptionalParams(): array
    {
        $ref = new ReflectionMethod(static::class, '__construct');
        $result = [];
        foreach ($ref->getParameters() as $param) {
            if ($param->isOptional()) {
                $result[$param->getName()] = $param->getDefaultValue();
            }
        }

        return $result;
    }

    public static function fromJson(string $jsonString): static
    {
        $decodedAssociativeArray = json_decode($jsonString, true);

        throw_if(!is_array($decodedAssociativeArray), new InvalidJsonForDTOException());

        return static::fromArray($decodedAssociativeArray);
    }

    public static function fromArray(array $associativeArray): static
    {
        throw_if(
            !ArrayHelpers::arrayKeysExist(static::getMandatoryKeys(), $associativeArray),
            new InvalidJsonForDTOException()
        );

        $optionalParams = static::getOptionalParams();

        $result = [];
        foreach (static::getKeys() as $key) {
            if (array_key_exists($key, $associativeArray)) {
                $result[] = $associativeArray[$key];
            } else {
                $result[] = array_key_exists($key, $optionalParams) ? $optionalParams[$key] : null;
            }
        }

        return new static(...$result);
    }

    public function toArray(bool $ignoreNullValues = false): array
    {
        $keys = static::getKeys();
        $result = [];
        foreach ($keys as $key) {
            if ($ignoreNullValues && $this->$key === null) {
                continue;
            }
            $result[$key] = $this->$key;
        }

        return $result;
    }

    public function toJson()
    {
        return json_encode($this);
    }
}
