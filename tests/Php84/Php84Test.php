<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Polyfill\Tests\Php84;

use PHPUnit\Framework\TestCase;

class Php84Test extends TestCase
{
    /**
     * @covers \Symfony\Polyfill\Php84\Php84::mb_ucfirst
     *
     * @dataProvider ucfirstDataProvider
     */
    public function testMbUcfirst(string $string, string $expectedResult, ?string $encoding = null): void
    {
        $this->assertSame($expectedResult, mb_ucfirst($string, $encoding));
    }

    public static function ucfirstDataProvider(): \Generator {
        // Simple ASCII strings
        yield ['hello', 'Hello'];
    }
}
