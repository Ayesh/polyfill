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

class CURLStringFileTest extends TestCase
{
    private static $server;

    public static function setUpBeforeClass(): void
    {
        $spec = [
            1 => ['file', '/dev/null', 'w'],
            2 => ['file', '/dev/null', 'w'],
        ];
        if (!self::$server = @proc_open('exec '.\PHP_BINARY.' -S localhost:8086', $spec, $pipes, __DIR__.'/fixtures')) {
            self::markTestSkipped('Unable to start PHP server.');
        }
        sleep(1);
    }

    public static function tearDownAfterClass(): void
    {
        if (self::$server) {
            proc_terminate(self::$server);
            proc_close(self::$server);
        }
    }

    /**
     * @requires curl
     */
    public function testCurlFileShowsContents(): void {
        $file = new \CURLStringFile('Hello', 'symfony.txt', 'text/plain');
        $data = ['test_file' => $file];

        $ch = curl_init('http://localhost:8086/curl-echo-server.php');

        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $reponse = curl_exec($ch);

        $this->assertStringEqualsFile(__DIR__ . '/fixtures/CURLSTringFileTest-expect.txt', $reponse);
    }
}
