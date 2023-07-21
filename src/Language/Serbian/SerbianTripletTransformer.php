<?php

namespace NumberToWords\Language\Serbian;

use NumberToWords\Language\English\EnglishDictionary;
use NumberToWords\Language\TripletTransformer;

class SerbianTripletTransformer implements TripletTransformer
{
    private SerbianDictionary $dictionary;

    public function __construct(SerbianDictionary $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    public function transformToWords(int $number): string
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
                $words[] = 'i';
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

        return implode(' ', $words);
    }

    private function getSubHundred($tens, $units): string
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
