<?php

namespace arslanimamutdinov\ISOStandardUtilities\tests\unit\codes;

use arslanimamutdinov\ISOStandardUtilities\codes\AttributeCodes;
use PHPUnit\Framework\TestCase;

/**
 * Class AttributeCodesTest
 * @package arslanimamutdinov\ISOStandardUtilities\tests\unit\codes
 * @group unit-codes
 */
class AttributeCodesTest extends TestCase
{
    public function testAttributeCodesValueNotEmpty(): void
    {
        $this->assertEquals('alpha2', AttributeCodes::ATTRIBUTE_ALPHA2);
        $this->assertEquals('alpha3', AttributeCodes::ATTRIBUTE_ALPHA3);
        $this->assertEquals('name', AttributeCodes::ATTRIBUTE_NAME);
        $this->assertEquals('numericCode', AttributeCodes::ATTRIBUTE_NUMERIC_CODE);
    }
}
