<?php

namespace NumberToWords\Language\Latvian;

use NumberToWords\Language\TripletTransformer;

class LatvianTripletTransformer implements TripletTransformer
{
    /**
     * @var LatvianDictionary
     */
    private $dictionary;

    /**
     * @param LatvianDictionary $latvianDictionary
     */
    public function __construct(LatvianDictionary $latvianDictionary)
    {
        $this->dictionary = $latvianDictionary;
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
