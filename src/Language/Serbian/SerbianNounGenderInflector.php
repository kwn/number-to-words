<?php

namespace NumberToWords\Language\Serbian;

class SerbianNounGenderInflector
{
    public function inflectNounByNumber(int $number, string $singular, string $plural, string $genitivePlural): string
    {
        $units = $number % 10;
        $tens = ((int) ($number / 10)) % 10;

        if ($number === 1) {
            return $singular;

        } else if ($tens === 1) {
            // For 10..19, 110..119, .., 1010..1019, ..., 5510..5519, etc
            return $genitivePlural;

        } else {
            if ($units === 1) {
                // For anything ending with "1" except things ending with "11" (which are caught by the earlier rule)
                return $singular;
            } else {
                return $genitivePlural;
            }
        }
    }
}
