<?php

namespace NumberToWords\Language\Russian;

class RussianNounGenderInflector
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
        $number %= 100;

        if ($number > 10 && $number < 20) {
            return $genitivePlural;
        }

        $number %= 10;

        if ($number > 1 && $number < 5) {
            return $plural;
        }

        if ($number === 1) {
            return $singular;
        }

        return $genitivePlural;
    }
}
