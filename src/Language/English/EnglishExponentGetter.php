<?php

namespace NumberToWords\Language\English;

use NumberToWords\Language\ExponentGetter;

class EnglishExponentGetter implements ExponentGetter
{
    private static $exponent = [
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

    /**
     * @param int $power
     *
     * @return string
     */
    public function getExponent($power)
    {
        return self::$exponent[$power];
    }
}
