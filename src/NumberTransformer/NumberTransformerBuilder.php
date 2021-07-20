<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Language\Dictionary;
use NumberToWords\Language\ExponentGetter;
use NumberToWords\Language\ExponentInflector;
use NumberToWords\Language\PowerAwareTripletTransformer;
use NumberToWords\Language\TripletTransformer;
use NumberToWords\Service\NumberToTripletsConverter;

class NumberTransformerBuilder
{
    private NumberTransformer $numberTransformer;

    public function __construct()
    {
        $this->numberTransformer = new GenericNumberTransformer();
    }

    public function withDictionary(Dictionary $dictionary): self
    {
        $this->numberTransformer->setDictionary($dictionary);

        return $this;
    }

    public function withWordsSeparatedBy(string $separator): self
    {
        $this->numberTransformer->setWordsSeparator($separator);

        return $this;
    }

    public function withExponentsSeparatedBy(string $separator): self
    {
        $this->numberTransformer->setExponentsSeparator($separator);

        return $this;
    }

    public function transformNumbersBySplittingIntoTriplets(
        NumberToTripletsConverter $numberToTripletsConverter,
        TripletTransformer $tripletTransformer
    ): self {
        $this->numberTransformer->setNumberToTripletsConverter($numberToTripletsConverter);
        $this->numberTransformer->setTripletTransformer($tripletTransformer);

        return $this;
    }

    public function transformNumbersBySplittingIntoPowerAwareTriplets(
        NumberToTripletsConverter $numberToTripletsConverter,
        PowerAwareTripletTransformer $powerAwareTripletTransformer
    ): self {
        $this->numberTransformer->setNumberToTripletsConverter($numberToTripletsConverter);
        $this->numberTransformer->setPowerAwareTripletTransformer($powerAwareTripletTransformer);

        return $this;
    }

    public function inflectExponentByNumbers(ExponentInflector $exponentInflector): self
    {
        $this->numberTransformer->setExponentInflector($exponentInflector);

        return $this;
    }

    public function useRegularExponents(ExponentGetter $exponentGetter): self
    {
        $this->numberTransformer->setExponentGetter($exponentGetter);

        return $this;
    }

    public function build(): NumberTransformer
    {
        return $this->numberTransformer;
    }
}
