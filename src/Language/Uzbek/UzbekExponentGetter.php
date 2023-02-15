<?php

namespace NumberToWords\Language\Uzbek;

use NumberToWords\Language\ExponentGetter;

class UzbekExponentGetter implements ExponentGetter
{
    private static array $exponent = [
        '',
        'ming',
        'million',
        'milliard',
        'trillion',
        'kvadrillion',
        'kvintillion',
        'sextillion',
        'septillion',
        'oktillion',
        'nonillion',
        'decillion',
        'undecillionname',
        'duodecillionname',
        'tredecillionname',
        'quattuordecillion',
        'quindecillionname',
        'sexdecillion',
        'septendecillion',
        'oktodecillion',
        'novemdecillion',
        'vigintillion',
    ];

    public function getExponent(int $power): string
    {
        return self::$exponent[$power];
    }
}
