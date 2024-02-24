<?php

namespace NumberToWords\Language\Bulgarian;

use NumberToWords\Language\ExponentInflector;

class BulgarianExponentInflector implements ExponentInflector
{
    protected static array $exponent = [
        ['', ''],
        ['хиляда', 'хиляди'],
        ['милион', 'милиона'],
        ['милиард', 'милиарда'],
        ['трилион', 'трилиона'],
        ['квадрилион', 'квадрилиона'],
        ['квинтилион', 'квинтилиона'],
        ['секстилион', 'секстилиона'],
        ['септилион', 'септилиона'],
        ['октилион', 'октилиона'],
        ['ноналион', 'ноналиона'],
        ['декалион', 'декалиона'],
        ['ундекалион', 'ундекалиона'],
        ['дуодекалион', 'дуодекалиона'],
        ['тредекалион', 'тредекалиона'],
        ['кватордекалион', 'кватордекалиона'],
        ['квинтдекалион', 'квинтдекалиона'],
        ['сексдекалион', 'сексдекалиона'],
        ['септдекалион', 'септдекалиона'],
        ['октодекалион', 'октодекалиона'],
        ['новемдекалион', 'новемдекалиона'],
        ['вигинтилион', 'вигинтилион'],
    ];

    protected BulgarianNounGenderInflector $inflector;

    public function __construct(BulgarianNounGenderInflector $inflector)
    {
        $this->inflector = $inflector;
    }

    public function inflectExponent(int $number, int $power): string
    {
        return $this->inflector->inflectNounByNumber(
            $number,
            self::$exponent[$power][0],
            self::$exponent[$power][1],
            self::$exponent[$power][1],
        );
    }
}
