<?php

namespace NumberToWords\Language\Albanian;

use NumberToWords\Language\ExponentGetter;

class AlbanianExponentGetter implements ExponentGetter
{
    private static $exponent = [
        '',
        'mijë',
        'milion',
        'bilion',
        'trilion',
        'kuatrilion',
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
