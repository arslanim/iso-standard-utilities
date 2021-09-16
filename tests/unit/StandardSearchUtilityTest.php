<?php

namespace arslanimamutdinov\ISOStandardUtilities\tests\unit;

use arslanimamutdinov\ISOStandardUtilities\codes\AttributeCodes;
use arslanimamutdinov\ISOStandardUtilities\StandardSearchUtility;
use PHPUnit\Framework\TestCase;

/**
 * Class StandardSearchUtilityTest
 * @package arslanimamutdinov\ISOStandardUtilities\tests\unit
 * @group unit-utility
 */
class StandardSearchUtilityTest extends TestCase
{
    /**
     * @dataProvider getTestGetStandardsDataByAttributeCode
     * @param array $standardsData
     * @param string $attributeCode
     * @param string $value
     * @param array|null $expectedResult
     */
    public function testGetStandardsDataByAttributeCode(
        array $standardsData,
        string $attributeCode,
        string $value,
        ?array $expectedResult
    ): void {
        $this->assertEquals(
            $expectedResult,
            StandardSearchUtility::getStandardsDataByAttributeCode(
                $standardsData,
                $attributeCode,
                $value
            )
        );
    }

    public function getTestGetStandardsDataByAttributeCode(): array
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
                'expectedResult' => [
                    AttributeCodes::ATTRIBUTE_NAME => '1',
                    AttributeCodes::ATTRIBUTE_ALPHA2 => '2',
                    AttributeCodes::ATTRIBUTE_ALPHA3 => '3',
                    AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '4',
                ],
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
                'expectedResult' => null,
            ],
            [
                'standardsData' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
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
                'expectedResult' => null,
            ],
            [
                'standardsData' => [
                    [],
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '5',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '6',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '7',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '8',
                    ],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_ALPHA2,
                'value' => '6',
                'expectedResult' => [
                    AttributeCodes::ATTRIBUTE_NAME => '5',
                    AttributeCodes::ATTRIBUTE_ALPHA2 => '6',
                    AttributeCodes::ATTRIBUTE_ALPHA3 => '7',
                    AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '8',
                ],
            ],
            [
                'standardsData' => [],
                'attributeCode' => AttributeCodes::ATTRIBUTE_NAME,
                'value' => '1',
                'expectedResult' => null,
            ],
            [
                'standardsData' => [
                    [],
                    [],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_NAME,
                'value' => '1',
                'expectedResult' => null,
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
                'attributeCode' => 'foo',
                'value' => '1',
                'expectedResult' => null,
            ],
            [
                'standardsData' => [
                    [
                        'foo' => '1',
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
                'attributeCode' => 'foo',
                'value' => '1',
                'expectedResult' => [
                    'foo' => '1',
                    AttributeCodes::ATTRIBUTE_ALPHA2 => '2',
                    AttributeCodes::ATTRIBUTE_ALPHA3 => '3',
                    AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '4',
                ],
            ],
        ];
    }

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
        $this->assertEquals(
            $expectedResult,
            StandardSearchUtility::existByAttributeCode($standardsData, $attributeCode, $value)
        );
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
