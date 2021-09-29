<?php

namespace arslanimamutdinov\ISOStandardUtilities\tests\unit\functions;

use arslanimamutdinov\ISOStandardUtilities\codes\AttributeCodes;
use arslanimamutdinov\ISOStandardUtilities\StandardSearchUtility;
use arslanimamutdinov\ISOStandardUtilities\StandardSearchUtilityService;
use PHPUnit\Framework\TestCase;

/**
 * Class GetAllAlpha3Test
 * @package arslanimamutdinov\ISOStandardUtilities\tests\unit\functions
 * @group unit-utility-functions
 */
class GetAllAlpha2Test extends TestCase
{
    /**
     * @dataProvider getTestGetAllAlpha2Data
     * @param array $standardsData
     * @param array $expectedResult
     */
    public function testGetAllAlpha2(array $standardsData, array $expectedResult): void
    {
        $utilityResult = StandardSearchUtility::getAllAlpha2($standardsData);
        $serviceResult = (new StandardSearchUtilityService())->getAllAlpha2($standardsData);

        $this->assertEquals($expectedResult, $utilityResult);
        $this->assertEquals($expectedResult, $serviceResult);
        $this->assertEquals($utilityResult, $serviceResult);
    }

    public function getTestGetAllAlpha2Data(): array
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
                        AttributeCodes::ATTRIBUTE_NAME => '15',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '16',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '17',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '18',
                    ],
                ],
                'expectedResult' => [
                    '2',
                    '6',
                    '16',
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
                'expectedResult' => [
                    '2',
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
                'expectedResult' => [],
            ],
            [
                'standardsData' => [],
                'expectedResult' => [],
            ],
        ];
    }
}
