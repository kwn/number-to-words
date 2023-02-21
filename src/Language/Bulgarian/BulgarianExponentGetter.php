<?php

namespace NumberToWords\Language\Bulgarian;

use NumberToWords\Language\ExponentGetter;

class BulgarianExponentGetter implements ExponentGetter
{
    private static array $exponent = [
        '',
        'хиляда',
        'милион',
        'милиард',
        'трилион',
        'квадрилион',
        'квинтилион',
        'секстилион',
        'септилион',
        'октилион',
        'ноналион',
        'декалион',
        'ундекалион',
        'дуодекалион',
        'тредекалион',
        'кватордекалион',
        'квинтдекалион',
        'сексдекалион',
        'септдекалион',
        'октодекалион',
        'новемдекалион',
        'вигинтилион',
        'унвигинтилион',
        'дуовигинтилион',
        'тревигинтилион',
        'кваторвигинтилион',
        'квинвигинтилион'
    ];

    public function getExponent(int $power): string
    {
        return self::$exponent[$power];
    }
}
