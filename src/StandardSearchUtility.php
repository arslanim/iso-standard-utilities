<?php

namespace arslanimamutdinov\ISOStandardUtilities;

use arslanimamutdinov\ISOStandardUtilities\codes\AttributeCodes;

abstract class StandardSearchUtility
{
    public static function getByAlpha2(array $standardsData, string $alpha2): ?array
    {
        return self::getStandardsDataByAttributeCode($standardsData, AttributeCodes::ATTRIBUTE_ALPHA2, $alpha2);
    }

    public static function getByAlpha3(array $standardsData, string $alpha3): ?array
    {
        return self::getStandardsDataByAttributeCode($standardsData, AttributeCodes::ATTRIBUTE_ALPHA3, $alpha3);
    }

    public static function getByNumericCode(array $standardsData, string $numericCode): ?array
    {
        return self::getStandardsDataByAttributeCode(
            $standardsData,
            AttributeCodes::ATTRIBUTE_NUMERIC_CODE,
            $numericCode
        );
    }

    public static function getStandardsDataByAttributeCode(
        array $standardsData,
        string $attributeCode,
        string $value
    ): ?array {
        foreach ($standardsData as $standardData) {
            $standardDataValue = $standardData[$attributeCode] ?? null;

            if ((!empty($standardDataValue) && ($standardDataValue === $value))) {
                return $standardData;
            }
        }

        return null;
    }

    public static function existByAlpha2(array $standardsData, string $alpha2): bool
    {
        return self::existByAttributeCode($standardsData, AttributeCodes::ATTRIBUTE_ALPHA2, $alpha2);
    }

    public static function existByAlpha3(array $standardsData, string $alpha3): bool
    {
        return self::existByAttributeCode($standardsData, AttributeCodes::ATTRIBUTE_ALPHA3, $alpha3);
    }

    public static function existByNumericCode(array $standardsData, string $numericCode): bool
    {
        return self::existByAttributeCode($standardsData, AttributeCodes::ATTRIBUTE_NUMERIC_CODE, $numericCode);
    }

    public static function existByAttributeCode(
        array $standardsData,
        string $attributeCode,
        string $value
    ): bool {
        return (array_search($value, array_column($standardsData, $attributeCode)) !== false) ? true : false;
    }
}
