<?php

namespace arslanimamutdinov\ISOStandardUtilities;

class StandardSearchUtilityService
{
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
