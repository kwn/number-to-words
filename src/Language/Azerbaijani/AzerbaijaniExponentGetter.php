<?php

namespace NumberToWords\Language\Azerbaijani;

use NumberToWords\Language\ExponentGetter;

class AzerbaijaniExponentGetter implements ExponentGetter
{
    private static array $exponent = [
        '',
        'min',
        'milyon',
        'milyard',
        'trilyon',
        'katrilyon',
        'kvintilyon',
        'sekstilyon',
        'septilyon',
        'oktilyon',
        'nonilyon',
        'dektilyon',
        'undektilyon',
        'duodektilyon',
        'tredektilyon',
        'quattuordektilyon',
        'quindektilyon',
        'sexdektilyon',
        'septendektilyon',
        'octodektilyon',
        'novemdektilyon',
        'vigintilyon',
    ];

    public function getExponent(int $power): string
    {
        return self::$exponent[$power];
    }
}
