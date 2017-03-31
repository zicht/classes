<?php
/**
 * @copyright Zicht Online
 */
namespace Zicht;

use PHPUnit_Framework_TestCase;
use Zicht\HtmlClassHelper;

/**
 * Tests for the HtmlClassHelperTest class.
 */
class HtmlClassHelperTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function getClassesSupportsSingleString()
    {
        $classes = HtmlClassHelper::getClasses('art-vandelay');

        $this->assertEquals('art-vandelay', $classes);
    }

    /**
     * @test
     */
    public function getClassesSupportsMultipleStrings()
    {
        $classes = HtmlClassHelper::getClasses('art-vandelay', 'kramerica');

        $this->assertEquals('art-vandelay  kramerica', $classes);
    }

    /**
     * @test
     */
    public function getClassesSupportsArrayWithSingleEntry()
    {
        $classes = HtmlClassHelper::getClasses(['art-vandelay']);

        $this->assertEquals('art-vandelay', $classes);
    }

    /**
     * @test
     */
    public function getClassesSupportsStringWithArray()
    {
        $classes = HtmlClassHelper::getClasses('art-vandelay', ['kramerica', 'kel-varnsen']);

        $this->assertEquals('art-vandelay  kramerica  kel-varnsen', $classes);
    }

    /**
     * @test
     */
    public function getClassesSupportsArrayWithMultipleEntries()
    {
        $classes = HtmlClassHelper::getClasses(['art-vandelay', 'kramerica']);

        $this->assertEquals('art-vandelay  kramerica', $classes);
    }

    /**
     * @test
     */
    public function getClassesSupportsObjectWithTruePredicate()
    {
        $classes = HtmlClassHelper::getClasses(['art-vandelay' => true]);

        $this->assertEquals('art-vandelay', $classes);
    }

    /**
     * @test
     */
    public function getClassesSupportsObjectWithFalsePredicate()
    {
        $classes = HtmlClassHelper::getClasses(['art-vandelay' => false]);

        $this->assertEmpty($classes);
    }

    /**
     * @test
     */
    public function getClassesSupportsObjectWithMultipleTruePredicates()
    {
        $classes = HtmlClassHelper::getClasses(['art-vandelay' => true, 'kramerica' => true]);

        $this->assertEquals('art-vandelay  kramerica', $classes);
    }

    /**
     * @test
     */
    public function getClassesSupportsObjectWithMultipleFalsePredicates()
    {
        $classes = HtmlClassHelper::getClasses(['art-vandelay' => false, 'kramerica' => false]);

        $this->assertEmpty($classes);
    }

    /**
     * @test
     */
    public function getClassesSupportsObjectWithMultipleMixedPredicates()
    {
        $classes = HtmlClassHelper::getClasses(['art-vandelay' => true, 'kramerica' => false, 'kel-varnsen' => true]);

        $this->assertEquals('art-vandelay  kel-varnsen', $classes);
    }

    /**
     * @test
     */
    public function getClassesSupportsStringAndObjectWithMultipleMixedPredicates()
    {
        $classes = HtmlClassHelper::getClasses('jerry', ['art-vandelay' => true, 'kramerica' => false, 'kel-varnsen' => false]);

        $this->assertEquals('jerry  art-vandelay', $classes);
    }

    /**
     * @test
     */
    public function getClassesDoesNotBreakOnUnsupportedTypes()
    {
        $classes = HtmlClassHelper::getClasses(new \stdClass(), false, 0, 1, true, null);

        $this->assertEmpty($classes);
    }
}