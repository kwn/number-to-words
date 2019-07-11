<?php

namespace NumberToWords\Language\Slovak;

use NumberToWords\Language\TripletTransformer;

class SlovakTripletTransformer implements TripletTransformer
{
    /**
     * @var SlovakDictionary
     */
    private $slovakDictionary;

    /**
     * @param SlovakDictionary $slovakDictionary
     */
    public function __construct(SlovakDictionary $slovakDictionary)
    {
        $this->slovakDictionary = $slovakDictionary;
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
            $words[] = $this->slovakDictionary->getCorrespondingHundred($hundreds);
        }

        if ($tens === 1) {
            $words[] = $this->slovakDictionary->getCorrespondingTeen($units);
        }
        if ($tens === 2) {
            $words[] = $this->slovakDictionary->getCorrespondingTwenteen($units);
        }

        if ($tens > 2) {
            $words[] = $this->slovakDictionary->getCorrespondingTen($tens);
        }

        if ($units > 0 && $tens !== 1 && $tens !== 2) {
            $words[] = $this->slovakDictionary->getCorrespondingUnit($units);
        }

        return implode(' ', $words);
    }
}
