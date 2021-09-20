<?php

namespace arslanimamutdinov\ISOStandardUtilities;

use arslanimamutdinov\ISOStandardUtilities\codes\AttributeCodes;

class StandardSearchUtilityService
{
    public static function existByNumericCode(array $standardsData, string $numericCode): bool
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
        return StandardSearchUtility::existByAttributeCode($standardsData, $attributeCode, $value);
    }
}
