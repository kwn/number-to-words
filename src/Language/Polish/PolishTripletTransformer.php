<?php

namespace NumberToWords\Language\Polish;

use NumberToWords\Language\Polish\PolishDictionary;
use NumberToWords\Language\TripletTransformer;

class PolishTripletTransformer implements TripletTransformer
{
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
            $words[] = PolishDictionary::$hundreds[$hundreds];
        }

        if ($tens === 1) {
            $words[] = PolishDictionary::$teens[$units];
        }

        if ($tens > 1) {
            $words[] = PolishDictionary::$tens[$tens];
        }

        if ($units > 0 && $tens !== 1) {
            $words[] = PolishDictionary::$units[$units];
        }

        return implode(' ', $words);
    }
}
