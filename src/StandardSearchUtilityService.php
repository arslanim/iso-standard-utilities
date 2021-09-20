<?php

namespace arslanimamutdinov\ISOStandardUtilities;

use arslanimamutdinov\ISOStandardUtilities\codes\AttributeCodes;

class StandardSearchUtilityService
{
    public function existByAlpha2(array $standardsData, string $alpha2): bool
    {
        return StandardSearchUtility::existByAttributeCode(
            $standardsData,
            AttributeCodes::ATTRIBUTE_ALPHA2,
            $alpha2
        );
    }

    public function existByAlpha3(array $standardsData, string $alpha3): bool
    {
        return StandardSearchUtility::existByAttributeCode(
            $standardsData,
            AttributeCodes::ATTRIBUTE_ALPHA3,
            $alpha3
        );
    }

    public function existByNumericCode(array $standardsData, string $numericCode): bool
    {
        return StandardSearchUtility::existByAttributeCode(
            $standardsData,
            AttributeCodes::ATTRIBUTE_NUMERIC_CODE,
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
