<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Language\Dictionary;
use NumberToWords\Language\ExponentGetter;
use NumberToWords\Language\ExponentInflector;
use NumberToWords\Language\PowerAwareTripletTransformer;
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
     * @var PowerAwareTripletTransformer
     */
    private $powerAwareTripletTransformer;

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

        if (null !== $this->tripletTransformer || null !== $this->powerAwareTripletTransformer) {
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
                if (null !== $this->tripletTransformer) {
                    $words[] = $this->tripletTransformer->transformToWords($triplet);
                }

                if (null !== $this->powerAwareTripletTransformer) {
                    $words[] = $this->powerAwareTripletTransformer->transformToWords(
                        $triplet,
                        count($triplets) - $i - 1
                    );
                }

                if (null !== $this->exponentInflector) {
                    $words[] = $this->exponentInflector->inflectExponent($triplet, count($triplets) - $i - 1);
                }

                if (null !== $this->exponentGetter) {
                    $words[] = $this->exponentGetter->getExponent(count($triplets) - $i - 1);
                }
            }
        }
        if (null !== $this->exponentSeparator && count($words) > 2) {
            for ($i = 2; $i <= count($words) - 2; $i+=2) {
                array_splice($words, $i++, 0, $this->exponentSeparator);
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
        $this->powerAwareTripletTransformer = null;
    }

    /**
     * @param PowerAwareTripletTransformer $powerAwareTripletTransformer
     */
    public function setPowerAwareTripletTransformer(PowerAwareTripletTransformer $powerAwareTripletTransformer)
    {
        $this->powerAwareTripletTransformer = $powerAwareTripletTransformer;
        $this->tripletTransformer = null;
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
