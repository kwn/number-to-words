<?php

namespace NumberToWords\Language\Latvian;

use NumberToWords\Language\ExponentInflector;

class LatvianExponentInflector implements ExponentInflector
{
    private static array $exponent = [
        ['', '', ''],
        ['tūkstotis', 'tūkstoši', 'tūkstoši'],
        ['miljons', 'miljoni', 'miljons'],
        ['miljards', 'miljardi', 'miljardi'],
        ['triljons', 'triljoni', 'triljoni'],
        ['kvadriljons', 'kvadriljoni', 'kvadriljoni'],
        ['kvintiljons', 'kvintiljoni', 'kvintiljoni']
    ];

    public function inflectExponent(int $number, int $power): string
    {
        $level = self::$exponent[$power];
        $units = $number % 10;
        $tens = ((int) ($number / 10)) % 10;

        if ($tens === 1 || ($tens > 0 && $units === 0)) {
            return $level[2];
        } elseif ($units > 1) {
            return $level[1];
        } else {
            return $level[0];
        }
    }
}
