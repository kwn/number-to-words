<?php

namespace NumberToWords\Language\Slovak;

class SlovakNounGenderInflector
{
    public function inflectNounByNumber(int $number, string $singular, string $plural, string $genitivePlural): string
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
