<?php

namespace NumberToWords\Language\Bulgarian;

class BulgarianNounGenderInflector
{
    public function inflectNounByNumber(int $number, string $singular, string $plural, string $genitivePlural): string
    {
        if ($number === 1) {
            return $singular;
        }

        return $plural;
    }
}
