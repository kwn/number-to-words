<?php

namespace NumberToWords\Language\Hebrew;

use NumberToWords\Language\PowerAwareTripletTransformer;

class HebrewTripletTransformer implements PowerAwareTripletTransformer
{
    private HebrewDictionary $dictionary;

    public function __construct(HebrewDictionary $dictionary)
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
            $words[] = $this->getSubHundred($tens, $units, $power, $number > 100);
        }
        return implode(' ', $words);
    }

    /**
     * @param int $tens
     * @param int $units
     *
     * @return string
     */
    private function getSubHundred($tens, $units, $power, $exPower)
    {
        $words = [];

        if ($tens === 1 && (($units > 0 || $exPower))) {
            $words[] = $this->dictionary->getCorrespondingTeen($units);
        } else {
            if ($units > 9 || $tens || $power === 0) {
                if ($tens > 0 && !($tens === 1 && $units === 0)) {
                    $words[] = $this->dictionary->getCorrespondingTen($tens);
                }
                if ($units > 0) {
                    $words[] = $this->dictionary->getCorrespondingUnit($units);
                }
                if($units === 0 && $tens === 1) {
                    $words[] = $this->dictionary->getCorrespondingTen($tens);
                }
            } elseif((!$power && !$tens) || (!$tens && $units && $exPower)) {
                $words[] = $this->dictionary->getCorrespondingUnit($units);
            } elseif($tens) { 
                $words[] = $this->dictionary->getCorrespondingTen($tens);
            }
        }

        if(count($words) === 1 && $exPower) {
            return 'ו' . $words[0];
        }

        return implode(' ו', $words);
    }

    // public function transformToWords(int $number): string
    // {
    //     $units = $number % 10;
    //     $tens = (int) ($number / 10) % 10;
    //     $hundreds = (int) ($number / 100) % 10;
    //     $words = [];

    //     if ($hundreds > 0) {
    //         $words[] = $this->dictionary->getCorrespondingHundred($hundreds);
    //     }

    //     if ($tens !== 0 || $units !== 0) {
    //         $words[] = $this->getSubHundred($tens, $units);
    //     }

    //     return implode(' ', $words);
    // }

    // private function getSubHundred($tens, $units): string
    // {
    //     $words = [];

    //     if ($tens === 1) {
    //         $words[] = $this->dictionary->getCorrespondingTeen($units);
    //     } else {
    //         if ($tens > 0) {
    //             $words[] = $this->dictionary->getCorrespondingTen($tens);
    //         }
    //         if ($units > 0) {
    //             $words[] = $this->dictionary->getCorrespondingUnit($units);
    //         }
    //     }

    //     return implode(' ו', $words);
    // }
}
