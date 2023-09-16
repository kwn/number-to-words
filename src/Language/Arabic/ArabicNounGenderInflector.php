<?php

namespace NumberToWords\Language\Arabic;

class ArabicNounGenderInflector
{
    /**
     * @param int    $number
     * @param string $singular
     * @param string $plural
     * @param string $genitivePlural
     *
     * @return string
     */
    public function inflectNounByNumber($number, $singular, $plural, $genitivePlural)
    {
        $units = $number % 10;
        $tens = ((int) ($number / 10)) % 10;

        if ($number === 1) {
            return $singular;
        }

        if ($number === 2) {
            return $plural;
        }

        if (($units > 2 && $tens === 0) || ($units === 0 && $tens === 1)) {
            return $genitivePlural;
        }

        return $singular;
    }
}
