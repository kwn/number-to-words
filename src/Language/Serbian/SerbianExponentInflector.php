<?php

namespace NumberToWords\Language\Serbian;

use NumberToWords\Language\ExponentInflector;
use NumberToWords\Language\German\GermanDictionary;

class
SerbianExponentInflector implements ExponentInflector
{
    public function inflectExponent(int $number, int $power): string
    {
        $singularPlural = $number % 10 === 1 ? 0 : 1;

        if ($power !== 1) {
            return ' ' . GermanDictionary::$exponent[$power][$singularPlural] . ' ';
        }

        return GermanDictionary::$exponent[$power][$singularPlural];
    }
}
