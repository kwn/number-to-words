<?php

namespace NumberToWords\Language\German;

use NumberToWords\Language\Dictionary;
use NumberToWords\Language\PowerAwareTripletTransformer;

class GermanTripletTransformer implements PowerAwareTripletTransformer
{
    /**
     * @var Dictionary
     */
    private $dictionary;

    /**
     * @param Dictionary $dictionary
     */
    public function __construct(Dictionary $dictionary)
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

        if ($units > 0 && $tens !== 1) {
            $words[] = $this->dictionary->getCorrespondingUnit($units);

            if ($tens > 1) {
                $words[] = 'und';
            } elseif ($units === 1) {
                if ($power === 0) {
                    $words[] = 's';
                } elseif ($power !== 1) {
                    $words[] = 'e';
                }
            }
        }

        if ($tens > 1) {
            $words[] = $this->dictionary->getCorrespondingTen($tens);
        }

        return implode('', $words);
    }
}
