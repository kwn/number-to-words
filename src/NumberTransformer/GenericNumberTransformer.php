<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Language\Dictionary;
use NumberToWords\Language\ExponentGetter;
use NumberToWords\Language\ExponentInflector;
use NumberToWords\Language\TripletTransformer;
use NumberToWords\Service\NumberToTripletsConverter;

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
     * @var string
     */
    private $wordsSeparator;

    /**
     * @var NumberToTripletsConverter
     */
    private $numberToTripletsConverter;

    /**
     * @var ExponentInflector
     */
    private $exponentInflector;

    /**
     * @var ExponentGetter
     */
    private $exponentGetter;

    /**
     * @var string
     */
    private $exponentSeparator;

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

        return trim(implode($this->wordsSeparator, $words));
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

                if (null !== $this->exponentGetter) {
                    $words[] = $this->exponentGetter->getExponent(count($triplets) - $i - 1);
                }
            }
        }

        return $words;
    }

    /**
     * @param Dictionary $dictionary
     */
    public function setDictionary(Dictionary $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    /**
     * @param TripletTransformer $tripletTransformer
     */
    public function setTripletTransformer(TripletTransformer $tripletTransformer)
    {
        $this->tripletTransformer = $tripletTransformer;
    }

    /**
     * @param string $wordsSeparator
     */
    public function setWordsSeparator($wordsSeparator)
    {
        $this->wordsSeparator = $wordsSeparator;
    }

    /**
     * @param NumberToTripletsConverter $numberToTripletsConverter
     */
    public function setNumberToTripletsConverter(NumberToTripletsConverter $numberToTripletsConverter)
    {
        $this->numberToTripletsConverter = $numberToTripletsConverter;
    }

    /**
     * @param ExponentInflector $exponentInflector
     */
    public function setExponentInflector(ExponentInflector $exponentInflector)
    {
        $this->exponentInflector = $exponentInflector;
        $this->exponentGetter = null;
    }

    /**
     * @param ExponentGetter $exponentGetter
     */
    public function setExponentGetter(ExponentGetter $exponentGetter)
    {
        $this->exponentGetter = $exponentGetter;
        $this->exponentInflector = null;
    }

    /**
     * @param string $exponentSeparator
     */
    public function setExponentsSeparator($exponentSeparator)
    {
        $this->exponentSeparator = $exponentSeparator;
    }
}
