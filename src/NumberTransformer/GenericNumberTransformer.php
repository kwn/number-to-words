<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Language\Dictionary;
use NumberToWords\Language\TripletTransformer;

class GenericNumberTransformer implements NumberTransformer
{
    /**
     * @var Dictionary
     */
    private $dictionary;

    /**
     * @var TripletTransformer
     */
    private $tripletTransformer;

    /**
     * @param int $number
     *
     * @return string
     */
    public function toWords($number)
    {
        if ($number === 0) {
            return $this->dictionary->getZero();
        }

        $words = [];

        if ($number < 0) {
            $words[] = $this->dictionary->getMinus();
            $number *= -1;
        }

        if (null !== $this->tripletTransformer) {
            $words = array_merge($words, $this->getWordsBySplittingIntoTriplets($number));
        }

        return trim(implode($this->separator, $words));
    }

    /**
     * @param int $number
     *
     * @return array
     */
    private function getWordsBySplittingIntoTriplets($number)
    {
        $words = [];
        $triplets = $this->numberToTripletsConverter->convertToTriplets($number);

        foreach ($triplets as $i => $triplet) {
            if ($triplet > 0) {
                $words[] = $this->tripletTransformer->transformToWords($triplet);

                if (null !== $this->exponentInflector) {
                    $words[] = $this->exponentInflector->inflectExponent($triplet, count($triplets) - $i - 1);
                }
            }
        }

        return $words;
    }
}
