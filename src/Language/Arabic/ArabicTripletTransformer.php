<?php

namespace NumberToWords\Language\Arabic;

use NumberToWords\Language\PowerAwareTripletTransformer;

class ArabicTripletTransformer implements PowerAwareTripletTransformer
{
    /**
     * @var ArabicDictionary
     */
    private $dictionary;

    /**
     * @param ArabicDictionary $dictionary
     */
    public function __construct(ArabicDictionary $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    /**
     * @param int $number
     *
     * @return string
     */
    public function transformToWords($number, $power): string
    {
        $units = $number % 10;
        $tens = (int) ($number / 10) % 10;
        $hundreds = (int) ($number / 100) % 10;
        $words = [];

        if ($hundreds > 0) {
            $words[] = $this->dictionary->getCorrespondingHundred($hundreds);
        }

        if ($tens !== 0 || $units !== 0) {
            $words[] = $this->getSubHundred($tens, $units, $power);
        }

        return implode(' و ', $words);
    }

    /**
     * @param int $tens
     * @param int $units
     *
     * @return string
     */
    private function getSubHundred($tens, $units, $power)
    {
        $words = [];

        if ($tens === 1) {
            $words[] = $this->dictionary->getCorrespondingTeen($units);
        } else {
            if ($units > 2 || $tens || $power === 0) {
                if ($units > 0) {
                    $words[] = $this->dictionary->getCorrespondingUnit($units);
                }
                if ($tens > 0) {
                    $words[] = $this->dictionary->getCorrespondingTen($tens);
                }
            }
        }

        return implode(' و ', $words);
    }
}
