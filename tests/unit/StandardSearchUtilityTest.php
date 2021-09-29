<?php

namespace arslanimamutdinov\ISOStandardUtilities\tests\unit;

use arslanimamutdinov\ISOStandardUtilities\codes\AttributeCodes;
use arslanimamutdinov\ISOStandardUtilities\StandardSearchUtility;
use arslanimamutdinov\ISOStandardUtilities\StandardSearchUtilityService;
use PHPUnit\Framework\TestCase;

/**
 * Class StandardSearchUtilityTest
 * @package arslanimamutdinov\ISOStandardUtilities\tests\unit
 * @group unit-utility
 */
class StandardSearchUtilityTest extends TestCase
{
    /**
     * @var StandardSearchUtilityService
     */
    private $standardSearchUtilityService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->standardSearchUtilityService = new StandardSearchUtilityService();
    }

    /**
     * @dataProvider getTestGetAllNamesData
     * @param array $standardsData
     * @param array $expectedResult
     */
    public function testGetAllNames(array $standardsData, array $expectedResult): void
    {
        $utilityResult = StandardSearchUtility::getAllNames($standardsData);
        $serviceResult = $this->standardSearchUtilityService->getAllNames($standardsData);

        $this->assertEquals($expectedResult, $utilityResult);
        $this->assertEquals($expectedResult, $serviceResult);
        $this->assertEquals($utilityResult, $serviceResult);
    }

    public function getTestGetAllNamesData(): array
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
                    '1',
                    '5',
                    '15',
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
                    '1',
                ],
            ],
            [
                'standardsData' => [
                    [
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '3',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '4',
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

    /**
     * @dataProvider getTestGetAllNumericCodes
     * @param array $standardsData
     * @param array $expectedResult
     */
    public function testGetAllNumericCodes(array $standardsData, array $expectedResult): void
    {
        $utilityResult = StandardSearchUtility::getAllNumericCodes($standardsData);
        $serviceResult = $this->standardSearchUtilityService->getAllNumericCodes($standardsData);

        $this->assertEquals($expectedResult, $utilityResult);
        $this->assertEquals($expectedResult, $serviceResult);
        $this->assertEquals($utilityResult, $serviceResult);
    }

    public function getTestGetAllNumericCodes(): array
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
                    '4',
                    '8',
                    '18',
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
                    '4',
                ],
            ],
            [
                'standardsData' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '3',
                        AttributeCodes::ATTRIBUTE_ALPHA3 => '4',
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

    /**
     * @dataProvider getTestGetAllAlpha3Data
     * @param array $standardsData
     * @param array $expectedResult
     */
    public function testGetAllAlpha3(array $standardsData, array $expectedResult): void
    {
        $utilityResult = StandardSearchUtility::getAllAlpha3($standardsData);
        $serviceResult = $this->standardSearchUtilityService->getAllAlpha3($standardsData);

        $this->assertEquals($expectedResult, $utilityResult);
        $this->assertEquals($expectedResult, $serviceResult);
        $this->assertEquals($utilityResult, $serviceResult);
    }

    public function getTestGetAllAlpha3Data(): array
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
                    '3',
                    '7',
                    '17',
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
                    '3',
                ],
            ],
            [
                'standardsData' => [
                    [
                        AttributeCodes::ATTRIBUTE_NAME => '1',
                        AttributeCodes::ATTRIBUTE_ALPHA2 => '3',
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
