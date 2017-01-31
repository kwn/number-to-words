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
        $singularPlural = $number % 10 === 1 ? 0 : 1;

        if ($power !== 1) {
            return ' ' . GermanDictionary::$exponent[$power][$singularPlural] . ' ';
        }

        return GermanDictionary::$exponent[$power][$singularPlural];
    }
}
