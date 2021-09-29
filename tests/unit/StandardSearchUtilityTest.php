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


}
