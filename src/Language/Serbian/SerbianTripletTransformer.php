<?php

namespace NumberToWords\Language\Serbian;

use NumberToWords\Language\PowerAwareTripletTransformer;

class SerbianTripletTransformer implements PowerAwareTripletTransformer
{
    protected SerbianDictionary $dictionary;

    public function __construct(SerbianDictionary $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    public function transformToWords(int $number, int $power): string
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
            // Fetches the correct form (male vs female) for the unit name.
            // This doesn't cover the cent-values, which is performed by the other, SerbianFemailTripletTransformer
            if ($power % 2 === 0 && $tens !== 1 && in_array($units, [1, 2])) {
                $words[] = $this->dictionary->getCorrespondingUnit($units);
            } else {
                $words[] = $this->dictionary->getCorrespondingUnitFemale($units);
            }
        }
        return implode($this->dictionary->getSeparator(), $words);
    }
}
