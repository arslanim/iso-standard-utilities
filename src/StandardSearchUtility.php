<?php

namespace arslanimamutdinov\ISOStandardUtilities;

abstract class StandardSearchUtility
{
    public static function existByAttributeCode(array $standardsData, string $attributeCode, string $value): bool
    {
        return (array_search($value, array_column($standardsData, $attributeCode)) !== false) ? true : false;
    }
}
