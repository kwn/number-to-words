<?php

namespace NumberToWords\Language\Russian;

use NumberToWords\Grammar\Gender;
use NumberToWords\Language\PowerAwareTripletTransformer;

class RussianTripletTransformer implements PowerAwareTripletTransformer
{
    private static $powerToGenderMappings = [
        0 => Gender::GENDER_MASCULINE,
        1 => Gender::GENDER_FEMININE,
        2 => Gender::GENDER_MASCULINE,
        3 => Gender::GENDER_MASCULINE,
        4 => Gender::GENDER_MASCULINE,
        5 => Gender::GENDER_MASCULINE,
        6 => Gender::GENDER_MASCULINE,
        7 => Gender::GENDER_MASCULINE,
        8 => Gender::GENDER_MASCULINE,
    ];

    /**
     * @var RussianDictionary
     */
    private $dictionary;

    /**
     * @param RussianDictionary $dictionary
     */
    public function __construct(RussianDictionary $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    /**
     * @param int $number
     * @param int $power
     *
     * @return string
     */
    public function transformToWords($number, $power)
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
            $words[] = $this->dictionary->getCorrespondingUnit($units, self::$powerToGenderMappings[$power]);
        }

        return implode(' ', $words);
    }
}
