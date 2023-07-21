<?php

namespace NumberToWords\Language\Serbian;

class SerbianNounGenderInflector
{
    public function inflectNounByNumber(int $number, string $singular, string $plural, string $genitivePlural): string
    {
        $units = $number % 10;
        $tens = ((int) ($number / 10)) % 10;

        if ($units === 1 && $tens !== 1) {
            return $singular;
        }

        if ($tens === 1) {
            return $plural;
        }

        if ($units >= 2 && $units <= 4) {
            return $genitivePlural;
        }

        return $plural;
    }
}
