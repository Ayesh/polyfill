<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Polyfill\Php84;

/**
 * @author Ayesh Karunaratne <ayesh@aye.sh>
 *
 * @internal
 */
final class Php84
{
    public static function mb_ucfirst(string $string, ?string $encoding = null): string {
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $firstChar = mb_convert_case($firstChar, MB_CASE_TITLE, $encoding);

        return $firstChar . mb_substr($string, 1, null, $encoding);
    }

    public static function mb_lcfirst(string $string, ?string $encoding = null): string {
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $firstChar = mb_convert_case($firstChar, MB_CASE_LOWER, $encoding);

        return $firstChar . mb_substr($string, 1, null, $encoding);
    }
}
