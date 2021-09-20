<?php

namespace arslanimamutdinov\ISOStandardUtilities;

class StandardSearchUtilityService
{
    public function existByAttributeCode(
        array $standardsData,
        string $attributeCode,
        string $value
    ): bool {
        return StandardSearchUtility::existByAttributeCode($standardsData, $attributeCode, $value);
    }
}
