<?php

namespace arslanimamutdinov\ISOStandardUtilities;

class StandardSearchUtilityService
{
    public function getAllNames(array $standardsData): array
    {
        return StandardSearchUtility::getAllNames($standardsData);
    }

    public function getAllNumericCodes(array $standardsData): array
    {
        return StandardSearchUtility::getAllNumericCodes($standardsData);
    }

    public function getAllAlpha3(array $standardsData): array
    {
        return StandardSearchUtility::getAllAlpha3($standardsData);
    }

    public function getAllAlpha2(array $standardsData): array
    {
        return StandardSearchUtility::getAllAlpha2($standardsData);
    }

    public function getAllAttributesByCode(array $standardsData, string $attributeCode): array
    {
        return StandardSearchUtility::getAllAttributesByCode($standardsData, $attributeCode);
    }

    /**
     * @param array $standardsData
     * @param string $attributeCode
     * @param string[] $values
     * @return array
     */
    public function getAllByAttributeCodeValues(
        array $standardsData,
        string $attributeCode,
        array $values
    ): array {
        return StandardSearchUtility::getAllByAttributeCodeValues($standardsData, $attributeCode, $values);
    }

    public function getByAlpha2(array $standardsData, string $alpha2): ?array
    {
        return StandardSearchUtility::getByAlpha2($standardsData, $alpha2);
    }

    public function getByAlpha3(array $standardsData, string $alpha3): ?array
    {
        return StandardSearchUtility::getByAlpha3($standardsData, $alpha3);
    }

    public function getByNumericCode(array $standardsData, string $numericCode): ?array
    {
        return StandardSearchUtility::getByNumericCode($standardsData, $numericCode);
    }

    public function getStandardsDataByAttributeCode(
        array $standardsData,
        string $attributeCode,
        string $value
    ): ?array {
        return StandardSearchUtility::getStandardsDataByAttributeCode(
            $standardsData,
            $attributeCode,
            $value
        );
    }

    public function existByAlpha2(array $standardsData, string $alpha2): bool
    {
        return StandardSearchUtility::existByAlpha2(
            $standardsData,
            $alpha2
        );
    }

    public function existByAlpha3(array $standardsData, string $alpha3): bool
    {
        return StandardSearchUtility::existByAlpha3(
            $standardsData,
            $alpha3
        );
    }

    public function existByNumericCode(array $standardsData, string $numericCode): bool
    {
        return StandardSearchUtility::existByNumericCode(
            $standardsData,
            $numericCode
        );
    }

    public function existByAttributeCode(
        array $standardsData,
        string $attributeCode,
        string $value
    ): bool {
        return StandardSearchUtility::existByAttributeCode(
            $standardsData,
            $attributeCode,
            $value
        );
    }
}
