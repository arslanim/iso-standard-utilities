<?php

namespace arslanimamutdinov\ISOStandardUtilities\tests\unit\functions;

use arslanimamutdinov\ISOStandardUtilities\codes\AttributeCodes;
use arslanimamutdinov\ISOStandardUtilities\StandardSearchUtility;
use arslanimamutdinov\ISOStandardUtilities\StandardSearchUtilityService;
use PHPUnit\Framework\TestCase;

/**
 * Class GetStandardsDataByAttributeCodeTest
 * @package arslanimamutdinov\ISOStandardUtilities\tests\unit\functions
 * @group unit-utility-functions
 */
class GetStandardsDataByAttributeCodeTest extends TestCase
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
        $utilityResult = StandardSearchUtility::getStandardsDataByAttributeCode(
            $standardsData,
            $attributeCode,
            $value
        );
        $serviceResult = (new StandardSearchUtilityService())->getStandardsDataByAttributeCode(
            $standardsData,
            $attributeCode,
            $value
        );

        $this->assertEquals($expectedResult, $utilityResult);
        $this->assertEquals($expectedResult, $serviceResult);
        $this->assertEquals($utilityResult, $serviceResult);
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
            [
                'standardsData' => [
                    [
                        'foo' => '',
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
        ];
    }
}
