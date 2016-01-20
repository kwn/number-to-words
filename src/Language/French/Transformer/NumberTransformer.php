<?php

namespace Kwn\NumberToWords\Language\English\Transformer;

use Kwn\NumberToWords\Model\Number;
use Kwn\NumberToWords\Language\English\Dictionary\Number as NumberDictionary;
use Kwn\NumberToWords\Transformer\NumberTransformer as NumberTransformerInterface;

class NumberTransformer implements NumberTransformerInterface
{
    /**
     * @var NumberDictionary
     */
    protected $numberDictionary;

    /**
     * @param NumberDictionary $numberDictionary
     */
    public function __construct(NumberDictionary $numberDictionary)
    {
        $this->numberDictionary = $numberDictionary;
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

        //if we can't build any triplets, it means we're at (or below) zero
        if (!$triplets = $this->buildTriplets($number)) {
            return $this->numberDictionary->getZero();
        }

        return $this->buildWordsFromTriplets($triplets);
    }

    /**
     * Converts the provided number into an array of number triplets
     * starting at the lowest (i.e. 123456789 => [789, 456, 123])
     *
     * @param Number $number
     *
     * @return array
     */
    protected function buildTriplets(Number $number)
    {
        $triplets = [];
        $value = $number->getValue();

        while ($value > 0) {
            $triplets[] = $value % 1000;
            $value = (int) ($value / 1000);
        }

        return $triplets;
    }

    /**
     * Builds the number word string from the provided set of number triplets
     *
     * @param array $triplets
     *
     * @return string
     */
    protected function buildWordsFromTriplets(array $triplets)
    {
        $words = [];

        foreach ($triplets as $i => $triplet) {
            if ($triplet > 0) {
                $words[] = trim($this->threeDigitsToWords($triplet) . ' ' . $this->numberDictionary->getMega($i));
            }
        }

        return implode(' ', array_reverse($words));
    }

    /**
     * Return triplets in words
     *
     * @param int $value
     *
     * @return string
     */
    protected function threeDigitsToWords($value)
    {
        $units = $value % 10;
        $tens = (int) ($value / 10) % 10;
        $hundreds = (int) ($value / 100) % 10;

        $words = [];

        if ($hundredsWord = $this->numberDictionary->getHundred($hundreds)) {
            $words[] = $hundredsWord;
        }

        if ($subHundredsWord = $this->numberDictionary->getSubHundred($tens, $units)) {
            $words[] = $subHundredsWord;
        }

        return implode(' ', $words);
    }
}
