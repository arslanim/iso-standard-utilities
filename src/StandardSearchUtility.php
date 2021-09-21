<?php

namespace arslanimamutdinov\ISOStandardUtilities;

use arslanimamutdinov\ISOStandardUtilities\codes\AttributeCodes;

abstract class StandardSearchUtility
{
    /**
     * @param array $standardsData
     * @return string[]
     */
    public static function getAllNames(array $standardsData): array
    {
        return self::getAllAttributesByCode($standardsData, AttributeCodes::ATTRIBUTE_NAME);
    }

    /**
     * @param array $standardsData
     * @return string[]
     */
    public static function getAllNumericCodes(array $standardsData): array
    {
        return self::getAllAttributesByCode($standardsData, AttributeCodes::ATTRIBUTE_NUMERIC_CODE);
    }

    /**
     * @param array $standardsData
     * @return string[]
     */
    public static function getAllAlpha3(array $standardsData): array
    {
        return self::getAllAttributesByCode($standardsData, AttributeCodes::ATTRIBUTE_ALPHA3);
    }

    /**
     * @param array $standardsData
     * @return string[]
     */
    public static function getAllAlpha2(array $standardsData): array
    {
        return self::getAllAttributesByCode($standardsData, AttributeCodes::ATTRIBUTE_ALPHA2);
    }

    /**
     * @param array $standardsData
     * @param string $attributeCode
     * @return string[]
     */
    public static function getAllAttributesByCode(array $standardsData, string $attributeCode): array
    {
        $list = [];

        foreach ($standardsData as $standardData) {
            if (isset($standardData[$attributeCode]) && !empty($standardData[$attributeCode])) {
                $list[] = $standardData[$attributeCode];
            }
        }

        return $list;
    }

    /**
     * @param array $standardsData
     * @param string[] $values
     * @return array
     */
    public static function getAllByAlpha2Values(array $standardsData, array $values): array
    {
        return self::getAllByAttributeCodeValues($standardsData, AttributeCodes::ATTRIBUTE_ALPHA2, $values);
    }

    /**
     * @param array $standardsData
     * @param string $attributeCode
     * @param string[] $values
     * @return array
     */
    public static function getAllByAttributeCodeValues(
        array $standardsData,
        string $attributeCode,
        array $values
    ): array {
        return array_values(
            array_filter(
                $standardsData,
                function (array $standardData) use ($attributeCode, $values): bool {
                    return (isset($standardData[$attributeCode]) &&  in_array($standardData[$attributeCode], $values));
                }
            )
        );
    }

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
