<?php

namespace NumberToWords\Language\Polish;

use NumberToWords\Language\TripletTransformer;

class PolishTripletTransformer implements TripletTransformer
{
    /**
     * @var PolishDictionary
     */
    private $polishDictionary;

    /**
     * @param PolishDictionary $polishDictionary
     */
    public function __construct(PolishDictionary $polishDictionary)
    {
        $this->polishDictionary = $polishDictionary;
    }

    /**
     * @param int $number
     *
     * @return string
     */
    public function transformToWords($number)
    {
        $units = $number % 10;
        $tens = (int) ($number / 10) % 10;
        $hundreds = (int) ($number / 100) % 10;
        $words = [];

        if ($hundreds > 0) {
            $words[] = $this->polishDictionary->getCorrespondingHundred($hundreds);
        }

        if ($tens === 1) {
            $words[] = $this->polishDictionary->getCorrespondingTeen($units);
        }

        if ($tens > 1) {
            $words[] = $this->polishDictionary->getCorrespondingTen($tens);
        }

        if ($units > 0 && $tens !== 1) {
            $words[] = $this->polishDictionary->getCorrespondingUnit($units);
        }

        return implode(' ', $words);
    }
}
