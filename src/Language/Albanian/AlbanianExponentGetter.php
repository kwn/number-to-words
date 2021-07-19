<?php

namespace NumberToWords\Language\Albanian;

use NumberToWords\Language\ExponentGetter;

class AlbanianExponentGetter implements ExponentGetter
{
    private static array $exponent = [
        '',
        'mijë',
        'milion',
        'miliard',
        'bilion',
        'biliard',
        'trilion',
        'triliard',
        'quadrilion',
        'quadriliard',
        'quintilion',
        'quintiliard',
        'sextilion',
        'sextiliard',
        'septilion',
        'septiliard',
        'octilion',
        'octiliard',
        'nonilion',
        'noniliard',
        'decilion',
        'deciliard',
        'undercilion',
        'underciliard',
        'duodecilion',
        'duodeciliard',
        'tredecilion',
        'tredeciliard',
        'quattuordecilion',
        'quattuordeciliard',
        'quindecilion',
        'quindeciliard',
        'sexdecilion',
        'sexdeciliard',
    ];

    public function getExponent(int $power): string
    {
        return self::$exponent[$power];
    }
}
