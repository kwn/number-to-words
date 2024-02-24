<?php

namespace NumberToWords\Language\Bulgarian;

use NumberToWords\Language\PowerAwareTripletTransformer;

class BulgarianTripletTransformer implements PowerAwareTripletTransformer
{
    protected BulgarianDictionary $dictionary;

    public function __construct(BulgarianDictionary $dictionary)
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

        if ($hundreds > 0 && $tens > 0 && $units == 0) {
            $words[] = BulgarianDictionary::$and;
        }

        if ($tens === 1) {
            $words[] = $this->dictionary->getCorrespondingTeen($units);
        }

        if ($tens > 1) {
            $words[] = $this->dictionary->getCorrespondingTen($tens);
        }

        if ($units > 0 && $tens !== 1) {
            // Skip "one" in one thousand because in Bulgarian it's not used
            if ($power == 1 && $units == 1) {
                return implode($this->dictionary->getSeparator(), $words);
            } else {
                if ($units > 0 && ($hundreds > 0 || $tens > 0)) {
                    $words[] = BulgarianDictionary::$and;
                }
                if ($units == 2 && $power == 1) {
                    $words[] = $this->dictionary->getCorrespondingUnitFemale($units);
                } else {
                    $words[] = $this->dictionary->getCorrespondingUnit($units);
                }
            }
        }
        return implode($this->dictionary->getSeparator(), $words);
    }
}
