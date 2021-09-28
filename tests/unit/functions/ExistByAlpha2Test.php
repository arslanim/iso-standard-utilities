<?php

namespace arslanimamutdinov\ISOStandardUtilities\tests\unit\functions;

use arslanimamutdinov\ISOStandardUtilities\codes\AttributeCodes;
use arslanimamutdinov\ISOStandardUtilities\StandardSearchUtility;
use arslanimamutdinov\ISOStandardUtilities\StandardSearchUtilityService;
use PHPUnit\Framework\TestCase;

/**
 * Class ExistByAlpha2Test
 * @package arslanimamutdinov\ISOStandardUtilities\tests\unit\functions
 * @group unit-utility-functions
 */
class ExistByAlpha2Test extends TestCase
{
    /**
     * @dataProvider getTestExistByAlpha2
     * @param array $standardsData
     * @param string $alpha2
     * @param bool $expectedResult
     */
    public function testExistByAlpha2(array $standardsData, string $alpha2, bool $expectedResult): void
    {
        $utilityResult = StandardSearchUtility::existByAlpha2($standardsData, $alpha2);
        $serviceResult = (new StandardSearchUtilityService())->existByAlpha2($standardsData, $alpha2);

        $this->assertEquals($expectedResult, $utilityResult);
        $this->assertEquals($expectedResult, $serviceResult);
        $this->assertEquals($utilityResult, $serviceResult);
    }

    public function getTestExistByAlpha2(): array
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
                'alpha2' => '2',
                'expectedResult' => true,
            ],
            [
                'standardsData' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '10',
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
                'alpha2' => '2',
                'expectedResult' => false,
            ],
            [
                'standardsData' => [],
                'alpha2' => '2',
                'expectedResult' => false,
            ],
            [
                'standardsData' => [
                    [],
                    [],
                    [],
                ],
                'alpha2' => '2',
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
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '15',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '16',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '17',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '18',
                    ],
                ],
                'alpha2' => '',
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
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '15',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '16',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '17',
                        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => '18',
                    ],
                ],
                'alpha2' => '900',
                'expectedResult' => false,
            ],
        ];
    }
}
