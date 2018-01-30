<?php

namespace NumberToWords\Language\German;

use NumberToWords\Language\ExponentInflector;

class GermanExponentInflector implements ExponentInflector
{
    /**
     * @param int $number
     * @param int $power
     *
     * @return string
     */
    public function inflectExponent($number, $power)
    {
        $singularPlural = 1 === $number % 10 ? 0 : 1;

        if (1 !== $power) {
            return ' '.GermanDictionary::$exponent[$power][$singularPlural].' ';
        }

        return GermanDictionary::$exponent[$power][$singularPlural];
    }
}
