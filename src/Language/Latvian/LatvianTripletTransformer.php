<?php

namespace NumberToWords\Language\Latvian;

use NumberToWords\Language\TripletTransformer;

class LatvianTripletTransformer implements TripletTransformer
{
    private LatvianDictionary $dictionary;

    public function __construct(LatvianDictionary $latvianDictionary)
    {
        $this->dictionary = $latvianDictionary;
    }

    public function transformToWords(int $number): string
    {
        $units = $number % 10;
        $tens = (int) ($number / 10) % 10;
        $hundreds = (int) ($number / 100) % 10;
        $words = [];

        if ($hundreds > 0) {
            $words[] = $this->dictionary->getCorrespondingHundred($hundreds);
        }

        if ($tens === 1) {
            $words[] = $this->dictionary->getCorrespondingTeen($units);
        }

        if ($tens > 1) {
            $words[] = $this->dictionary->getCorrespondingTen($tens);
        }

        if ($units > 0 && $tens !== 1) {
            $words[] = $this->dictionary->getCorrespondingUnit($units);
        }

        return implode(' ', $words);
    }
}
