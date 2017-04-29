<?php
/**
 * Humbug
 *
 * @category   Humbug
 * @package    Humbug
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2015 Pádraic Brady (http://blog.astrumfutura.com)
 * @license    https://github.com/padraic/humbug/blob/master/LICENSE New BSD License
 */

namespace Humbug\Test\Mutator\ConditionalNegation;

use Humbug\Mutator;
use PHPUnit\Framework\TestCase;

class LessThanOrEqualToTest extends TestCase
{
    public function testReturnsTokenEquivalentToGreaterThan()
    {
        $mutation = new Mutator\ConditionalNegation\LessThanOrEqualTo;
        $tokens = [];
        $mutation->getMutation($tokens, 10);
        $this->assertEquals([10 => '>'], $tokens);
    }

    public function testMutatesLessThanOrEqualToToGreaterThan()
    {
        $tokens = [10 => [T_IS_SMALLER_OR_EQUAL, '<=']];

        $this->assertTrue(Mutator\ConditionalNegation\LessThanOrEqualTo::mutates($tokens, 10));

        $tokens = [11 => '>'];

        $this->assertFalse(Mutator\ConditionalNegation\LessThanOrEqualTo::mutates($tokens, 11));
    }
}
