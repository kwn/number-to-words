<?php

namespace NumberToWords\Language\English;

use NumberToWords\Language\TripletTransformer;

class EnglishTripletTransformer implements TripletTransformer
{
    /**
     * @var EnglishDictionary
     */
    private $dictionary;

    /**
     * @param EnglishDictionary $dictionary
     */
    public function __construct(EnglishDictionary $dictionary)
    {
        $this->dictionary = $dictionary;
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
            $words[] = $this->dictionary->getCorrespondingHundred($hundreds);
        }

        if ($tens !== 0 || $units !== 0) {
            $words[] = $this->getSubHundred($tens, $units);
        }

        return implode(' ', $words);
    }

    /**
     * @param int $tens
     * @param int $units
     *
     * @return string
     */
    private function getSubHundred($tens, $units)
    {
        $words = [];

        if ($tens === 1) {
            $words[] = $this->dictionary->getCorrespondingTeen($units);
        } else {
            if ($tens > 0) {
                $words[] = $this->dictionary->getCorrespondingTen($tens);
            }
            if ($units > 0) {
                $words[] = $this->dictionary->getCorrespondingUnit($units);
            }
        }

        return implode('-', $words);
    }
}
