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
    private Dictionary $dictionary;
    private ?TripletTransformer $tripletTransformer;
    private ?PowerAwareTripletTransformer $powerAwareTripletTransformer;
    private NumberToTripletsConverter $numberToTripletsConverter;
    private ?ExponentInflector $exponentInflector;
    private ?ExponentGetter $exponentGetter;
    private ?string $wordsSeparator = null;
    private ?string $exponentSeparator = null;

    public function toWords(int $number): string
    {
        if ($number === 0) {
            return $this->dictionary->getZero();
        }

        $words = [];
        $minus = '';

        if ($number < 0) {
            $minus = $this->dictionary->getMinus();
            $number *= -1;
        }

        if ($this->tripletTransformer !== null || $this->powerAwareTripletTransformer !== null) {
            $words = array_merge($words, $this->getWordsBySplittingIntoTriplets($number));
        }

        return trim(sprintf('%s %s', $minus, implode($this->wordsSeparator, $words)));
    }

    private function getWordsBySplittingIntoTriplets(int $number): array
    {
        $words = [];
        $triplets = $this->numberToTripletsConverter->convertToTriplets($number);

        foreach ($triplets as $i => $triplet) {
            if ($triplet > 0) {
                if ($this->tripletTransformer !== null) {
                    $words[] = $this->tripletTransformer->transformToWords($triplet);
                }

                if ($this->powerAwareTripletTransformer !== null) {
                    $words[] = $this->powerAwareTripletTransformer->transformToWords(
                        $triplet,
                        count($triplets) - $i - 1
                    );
                }

                if ($this->exponentInflector !== null) {
                    $words[] = $this->exponentInflector->inflectExponent($triplet, count($triplets) - $i - 1);
                }

                if ($this->exponentGetter !== null) {
                    $words[] = $this->exponentGetter->getExponent(count($triplets) - $i - 1);
                }
            }
        }

        if ($this->exponentSeparator !== null && count($words) > 2) {
            for ($i = 2; $i <= count($words) - 2; $i += 2) {
                array_splice($words, $i++, 0, $this->exponentSeparator);
            }
        }

        return $words;
    }

    public function setDictionary(Dictionary $dictionary): void
    {
        $this->dictionary = $dictionary;
    }

    public function setTripletTransformer(TripletTransformer $tripletTransformer): void
    {
        $this->tripletTransformer = $tripletTransformer;
        $this->powerAwareTripletTransformer = null;
    }

    public function setPowerAwareTripletTransformer(PowerAwareTripletTransformer $powerAwareTripletTransformer): void
    {
        $this->powerAwareTripletTransformer = $powerAwareTripletTransformer;
        $this->tripletTransformer = null;
    }

    public function setWordsSeparator(string $wordsSeparator): void
    {
        $this->wordsSeparator = $wordsSeparator;
    }

    public function setNumberToTripletsConverter(NumberToTripletsConverter $numberToTripletsConverter): void
    {
        $this->numberToTripletsConverter = $numberToTripletsConverter;
    }

    public function setExponentInflector(ExponentInflector $exponentInflector): void
    {
        $this->exponentInflector = $exponentInflector;
        $this->exponentGetter = null;
    }

    public function setExponentGetter(ExponentGetter $exponentGetter): void
    {
        $this->exponentGetter = $exponentGetter;
        $this->exponentInflector = null;
    }

    public function setExponentsSeparator(string $exponentSeparator): void
    {
        $this->exponentSeparator = $exponentSeparator;
    }
}
