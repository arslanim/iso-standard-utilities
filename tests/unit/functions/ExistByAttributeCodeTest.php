<?php

namespace arslanimamutdinov\ISOStandardUtilities\tests\unit\functions;

use arslanimamutdinov\ISOStandardUtilities\codes\AttributeCodes;
use arslanimamutdinov\ISOStandardUtilities\StandardSearchUtility;
use arslanimamutdinov\ISOStandardUtilities\StandardSearchUtilityService;
use PHPUnit\Framework\TestCase;

/**
 * Class ExistByAttributeCodeTest
 * @package arslanimamutdinov\ISOStandardUtilities\tests\unit\functions
 * @group unit-utility-functions
 */
class ExistByAttributeCodeTest extends TestCase
{
    /**
     * @dataProvider getStandardsData
     * @param array $standardsData
     * @param string $attributeCode
     * @param string $value
     * @param bool $expectedResult
     */
    public function testExistByAttributeCode(
        array $standardsData,
        string $attributeCode,
        string $value,
        bool $expectedResult
    ): void {
        $utilityResult = StandardSearchUtility::existByAttributeCode($standardsData, $attributeCode, $value);
        $serviceResult = (new StandardSearchUtilityService())->existByAttributeCode($standardsData, $attributeCode, $value);

        $this->assertEquals($expectedResult, $utilityResult);
        $this->assertEquals($expectedResult, $serviceResult);
        $this->assertEquals($utilityResult, $serviceResult);
    }

    public function getStandardsData(): array
    {
        return [
            [
                'standardsData' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '2',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '3',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '4',
                    ],
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '5',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '6',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '7',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '8',
                    ],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_NAME,
                'value' => '1',
                'expectedResult' => true,
            ],
            [
                'standardsData' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '2',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '3',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '4',
                    ],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_NAME,
                'value' => '1',
                'expectedResult' => true,
            ],
            [
                'standardsData' => [],
                'attributeCode' => AttributeCodes::ATTRIBUTE_NAME,
                'value' => '1',
                'expectedResult' => false,
            ],
            [
                'standardsData' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '2',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '3',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '4',
                    ],
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '5',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '6',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '7',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '8',
                    ],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_ALPHA2,
                'value' => '2',
                'expectedResult' => true,
            ],
            [
                'standardsData' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                    ],
                    [
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '7',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '8',
                    ],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_ALPHA3,
                'value' => '7',
                'expectedResult' => true,
            ],
            [
                'standardsData' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                    ],
                    [
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '7',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '8',
                    ],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_NUMERIC_CODE,
                'value' => '8',
                'expectedResult' => true,
            ],
            [
                'standardsData' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                    ],
                    [
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '7',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '8',
                    ],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_ALPHA2,
                'value' => '8',
                'expectedResult' => false,
            ],
            [
                'standardsData' => [
                    [],
                    [],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_ALPHA2,
                'value' => '8',
                'expectedResult' => false,
            ],
            [
                'standardsData' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '2',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '3',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '4',
                    ],
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '5',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '6',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '7',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '8',
                    ],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_NAME,
                'value' => '',
                'expectedResult' => false,
            ],
        ];
    }
}
