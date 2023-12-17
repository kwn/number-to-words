<?php

namespace NumberToWords\Language\Hebrew;

use NumberToWords\Language\ExponentGetter;

class HebrewExponentGetter implements ExponentGetter
{
    private static array $exponent = [
        '',
        'אלף',
        'מיליון',
        'מיליארד',
        'טריליון',
        'קוודריליון',
        'קווינטיליון',
        'סקסטיליון',
        'ספטיליון',
        'אוקטיליון',
        'נוניליון',
        'דציליון',
        'אנדציליון',
        'דודציליון',
        'טרדציליון',
        'קוואטורדציליון',
        'קווינדציליון',
        'סקסדציליון',
        'ספטנדציליון',
        'אוקטודציליון',
        'נובמדציליון',
        'ויגינטיליון',
    ];

    public function getExponent(int $power): string
    {
        return self::$exponent[$power];
    }
}
