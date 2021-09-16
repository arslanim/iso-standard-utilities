<?php

namespace arslanimamutdinov\ISOStandardUtilities;

abstract class StandardSearchUtility
{
    public static function getStandardsDataByAttributeCode(
        array $standardsData,
        string $attributeCode,
        string $value
    ): ?array {
        foreach ($standardsData as $standardData) {
            if (($standardData[$attributeCode] ?? null) === $value) {
                return $standardData;
            }
        }

        return null;
    }

    public static function existByAttributeCode(
        array $standardsData,
        string $attributeCode,
        string $value
    ): bool {
        return (array_search($value, array_column($standardsData, $attributeCode)) !== false) ? true : false;
    }
}
