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
    public function __construct($dictionary)
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

        if ($hundredsWord = $this->getHundred($hundreds)) {
            $words[] = $hundredsWord;
        }

        if ($subHundredsWord = $this->getSubHundred($tens, $units)) {
            $words[] = $subHundredsWord;
        }

        return implode(' ', $words);
    }

    /**
     * @param int $number
     *
     * @return string
     */
    private function getHundred($number)
    {
        $word = EnglishDictionary::$units[$number];

        if ($word) {
            return $word . ' ' . EnglishDictionary::$hundred;
        }

        return '';
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
            $words[] = EnglishDictionary::$teens[$units];
        } else {
            if ($tens > 0) {
                $words[] = EnglishDictionary::$tens[$tens];
            }
            if ($units > 0) {
                $words[] = EnglishDictionary::$units[$units];
            }
        }

        return implode('-', $words);
    }
}
