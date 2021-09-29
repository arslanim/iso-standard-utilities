<?php

namespace arslanimamutdinov\ISOStandardUtilities\tests\unit\functions;

use arslanimamutdinov\ISOStandardUtilities\codes\AttributeCodes;
use arslanimamutdinov\ISOStandardUtilities\StandardSearchUtility;
use arslanimamutdinov\ISOStandardUtilities\StandardSearchUtilityService;
use PHPUnit\Framework\TestCase;

/**
 * Class GetAllByAttributeCodeValuesTest
 * @package arslanimamutdinov\ISOStandardUtilities\tests\unit\functions
 * @group unit-utility-functions
 */
class GetAllByAttributeCodeValuesTest extends TestCase
{
    /**
     * @dataProvider getTestGetAllByAttributeCodeValuesData
     * @param array $standardsData
     * @param string $attributeCode
     * @param array $values
     * @param array $expectedResult
     */
    public function testGetAllByAttributeCodeValues(
        array $standardsData,
        string $attributeCode,
        array $values,
        array $expectedResult
    ): void {
        $utilityResult = StandardSearchUtility::getAllByAttributeCodeValues(
            $standardsData,
            $attributeCode,
            $values
        );
        $serviceResult = (new StandardSearchUtilityService())->getAllByAttributeCodeValues(
            $standardsData,
            $attributeCode,
            $values
        );

        $this->assertEquals($expectedResult, $utilityResult);
        $this->assertEquals($expectedResult, $serviceResult);
        $this->assertEquals($utilityResult, $serviceResult);
    }

    public function getTestGetAllByAttributeCodeValuesData(): array
    {
        return [
            [
                'standardsData' => [],
                'attributeCode' => AttributeCodes::ATTRIBUTE_ALPHA2,
                'values' => ['1', '2', '3'],
                'expectedResult' => [],
            ],
            [
                'standardsData' => [],
                'attributeCode' => '',
                'values' => ['1', '2', '3'],
                'expectedResult' => [],
            ],
            [
                'standardsData' => [],
                'attributeCode' => AttributeCodes::ATTRIBUTE_ALPHA2,
                'values' => [],
                'expectedResult' => [],
            ],
            [
                'standardsData' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '3',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '4',
                    ],
                ],
                'attributeCode' => '',
                'values' => [''],
                'expectedResult' => [],
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
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '9',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '10',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '11',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '12',
                    ],
                ],
                'attributeCode' => 'foo',
                'values' => ['2', '10'],
                'expectedResult' => [],
            ],
            [
                'standardsData' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '3',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '4',
                    ],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_ALPHA2,
                'values' => [''],
                'expectedResult' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '3',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '4',
                    ],
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
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '9',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '10',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '11',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '12',
                    ],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_ALPHA2,
                'values' => ['6'],
                'expectedResult' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '5',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '6',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '7',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '8',
                    ],
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
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '9',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '10',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '11',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '12',
                    ],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_ALPHA2,
                'values' => ['2', '10'],
                'expectedResult' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '2',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '3',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '4',
                    ],
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '9',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '10',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '11',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '12',
                    ],
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
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '9',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '10',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '11',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '12',
                    ],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_ALPHA2,
                'values' => ['', '10'],
                'expectedResult' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '9',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '10',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '11',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '12',
                    ],
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
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '9',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '10',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '11',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '12',
                    ],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_ALPHA2,
                'values' => ['10', '10'],
                'expectedResult' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '9',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '10',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '11',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '12',
                    ],
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
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '9',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '10',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '11',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '12',
                    ],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_ALPHA2,
                'values' => ['10', '10', '10'],
                'expectedResult' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '9',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '10',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '11',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '12',
                    ],
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
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '9',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '10',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '11',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '12',
                    ],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_ALPHA2,
                'values' => ['2', '6', '10'],
                'expectedResult' => [
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
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '9',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '10',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '11',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '12',
                    ],
                ],
            ],
            [
                'standardsData' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '2',
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
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '9',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '10',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '11',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '12',
                    ],
                ],
                'attributeCode' => AttributeCodes::ATTRIBUTE_ALPHA2,
                'values' => ['2', '6', '10'],
                'expectedResult' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '2',
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
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '9',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '10',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '11',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '12',
                    ],
                ],
            ],
        ];
    }
}
