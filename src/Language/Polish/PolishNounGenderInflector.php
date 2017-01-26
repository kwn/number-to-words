<?php

namespace NumberToWords\Language\Polish;

class PolishNounGenderInflector
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

        if ($tens === 1 && $units > 1) {
            return $genitivePlural;
        }

        if ($units >= 2 && $units <= 4) {
            return $plural;
        }

        return $genitivePlural;
    }
}
