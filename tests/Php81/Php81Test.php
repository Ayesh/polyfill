<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Polyfill\Tests\Php81;

use PHPUnit\Framework\TestCase;

class Php81Test extends TestCase
{
    /**
     * @covers \Symfony\Polyfill\Php81\Php81::array_is_list
     */
    public function testArrayIsList()
    {
        $this->assertTrue(array_is_list([]));
        $this->assertTrue(array_is_list([\NAN, 'foo', 123]));
        $this->assertFalse(array_is_list([1 => 'a', 0 => 'b']));
        $this->assertFalse(array_is_list(['a' => 'b']));
        $this->assertFalse(array_is_list([0 => 'a', 2 => 'b']));
        $this->assertFalse(array_is_list([1 => 'a', 2 => 'b']));
    }

    /**
     * @covers \Symfony\Polyfill\Php81\Php81::println
     */
    public function testPrintln()
    {
        $this->expectOutputString("Hello\nWorld\n\nSymfony🚀\n");
        $this->assertSame(6, println('Hello'));
        $this->assertSame(6, println('World'));
        $this->assertSame(1, println(''));
        $this->assertSame(12, println('Symfony🚀'));
    }
}
