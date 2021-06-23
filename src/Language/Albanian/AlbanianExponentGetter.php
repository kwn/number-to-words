<?php

namespace NumberToWords\Language\Albanian;

use NumberToWords\Language\ExponentGetter;

class AlbanianExponentGetter implements ExponentGetter
{
    private static $exponent = [
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
