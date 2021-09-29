<?php

namespace arslanimamutdinov\ISOStandardUtilities\tests\unit\functions;

use arslanimamutdinov\ISOStandardUtilities\codes\AttributeCodes;
use arslanimamutdinov\ISOStandardUtilities\StandardSearchUtility;
use arslanimamutdinov\ISOStandardUtilities\StandardSearchUtilityService;
use PHPUnit\Framework\TestCase;

/**
 * Class GetAllByNameValuesTest
 * @package arslanimamutdinov\ISOStandardUtilities\tests\unit\functions
 * @group unit-utility-functions
 */
class GetAllByNameValuesTest extends TestCase
{
    /**
     * @dataProvider getTestGetAllByNameValuesData
     * @param array $standardsData
     * @param string[] $values
     * @param array $expectedResult
     */
    public function testGetAllByNameValues(array $standardsData, array $values, array $expectedResult): void
    {
        $utilityResult = StandardSearchUtility::getAllByNameValues($standardsData, $values);
        $serviceResult = (new StandardSearchUtilityService())->getAllByNameValues($standardsData, $values);

        $this->assertEquals($expectedResult, $utilityResult);
        $this->assertEquals($expectedResult, $serviceResult);
        $this->assertEquals($utilityResult, $serviceResult);
    }

    public function getTestGetAllByNameValuesData(): array
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
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '9',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '10',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '11',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '12',
                    ],
                ],
                'values' => ['1',],
                'expectedResult' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '2',
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
                'values' => ['1', '1',],
                'expectedResult' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '2',
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
                'values' => ['1', '1', '1',],
                'expectedResult' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '2',
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
                'values' => ['1', '1', '9',],
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
                'values' => ['1', '1', '9', '5'],
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
                'values' => ['1', '5', '9'],
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
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '2',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '3',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '4',
                    ],
                ],
                'values' => ['1', '10', '6'],
                'expectedResult' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '2',
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
                ],
                'values' => ['1',],
                'expectedResult' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '2',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '3',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '4',
                    ],
                ],
            ],
            [
                'standardsData' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '3',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '4',
                    ],
                ],
                'values' => ['3',],
                'expectedResult' => [],
            ],
            [
                'standardsData' => [],
                'values' => ['1',],
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
                ],
                'values' => [],
                'expectedResult' => [],
            ],
        ];
    }
}
