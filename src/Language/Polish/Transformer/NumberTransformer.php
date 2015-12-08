<?php

namespace Kwn\NumberToWords\Language\Polish\Transformer;

use Kwn\NumberToWords\Language\Polish\Grammar\GrammarCaseSelector;
use Kwn\NumberToWords\Model\Number;
use Kwn\NumberToWords\Language\Polish\Dictionary\Number as NumberDictionary;
use Kwn\NumberToWords\Transformer\NumberTransformer as NumberTransformerInterface;

class NumberTransformer implements NumberTransformerInterface
{
    /**
     * @var GrammarCaseSelector
     */
    private $grammarCaseSelector;

    /**
     * @param GrammarCaseSelector $grammarCaseSelector
     */
    public function __construct(GrammarCaseSelector $grammarCaseSelector)
    {
        $this->grammarCaseSelector = $grammarCaseSelector;
    }

    /**
     * Convert number to words
     *
     * @param mixed $number
     *
     * @return string
     */
    public function toWords($number)
    {
        $number = new Number($number);
        $value = $number->getValue();

        if ($value === 0.0) {
            return NumberDictionary::$zero;
        }

        $triplets = $this->extractTriplets($value);

        $words = [];

        foreach ($triplets as $i => $triplet) {
            if ($triplet > 0) {
                $threeDigitsWords = $this->threeDigitsToWords($triplet);

                if ($i > 0) {
                    $case = $this->grammarCaseSelector->getGrammarCase($triplet);
                    $mega = NumberDictionary::$mega[$i][$case];

                    $threeDigitsWords = $threeDigitsWords . ' ' . $mega;
                }

                $words[] = $threeDigitsWords;
            }
        }

        return implode(' ', array_reverse($words));
    }

    /**
     * @param $value
     *
     * @return array
     */
    private function extractTriplets($value)
    {
        $triplets = [];

        while ($value > 0) {
            $triplets[] = $value % 1000;
            $value = (int) ($value / 1000);
        }

        return $triplets;
    }

    /**
     * Return triplets in words
     *
     * @param $value
     *
     * @return string
     */
    private function threeDigitsToWords($value)
    {
        $units = $value % 10;
        $tens = (int) ($value / 10) % 10;
        $hundreds = (int) ($value / 100) % 10;

        $words = [];

        if ($hundreds > 0) {
            $words[] = NumberDictionary::$hundreds[$hundreds];
        }

        if ($tens === 1) {
            $words[] = NumberDictionary::$teens[$units];
        } else {
            if ($tens > 0) {
                $words[] = NumberDictionary::$tens[$tens];
            }
            if ($units > 0) {
                $words[] = NumberDictionary::$units[$units];
            }
        }

        return implode(' ', $words);
    }
}
