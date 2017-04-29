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

namespace Humbug\Test\Mutator\Arithmetic;

use Humbug\Mutator;
use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    public function testReturnsTokenEquivalentToSubstractionOperator()
    {
        $mutation = new Mutator\Arithmetic\Addition;
        $tokens = [];
        $mutation->getMutation($tokens, 10);
        $this->assertEquals([10 => '-'], $tokens);
    }

    public function testMutatesAdditionOperatorToSubstractionOperator()
    {
        $tokens = [10 => '+'];

        $this->assertTrue(Mutator\Arithmetic\Addition::mutates($tokens, 10));

        $tokens = [11 => '-'];

        $this->assertFalse(Mutator\Arithmetic\Addition::mutates($tokens, 11));
    }
}
