<?php

namespace NumberToWords\Language\Nepali;

use NumberToWords\Language\ExponentGetter;

class NepaliExponentGetter implements ExponentGetter
{
    private static array $exponent = [
        '',
        'thousand',
        'million',
        'billion',
        'trillion',
        'quadrillion',
        'quintillion',
        'sextillion',
        'septillion',
        'octillion',
        'nonillion',
        'decillion',
        'undecillion',
        'duodecillion',
        'tredecillion',
        'quattuordecillion',
        'quindecillion',
        'sexdecillion',
        'septendecillion',
        'octodecillion',
        'novemdecillion',
        'vigintillion',
    ];

    public function getExponent(int $power): string
    {
        return self::$exponent[$power];
    }
}
