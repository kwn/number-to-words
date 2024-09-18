<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Language\Hebrew\HebrewDictionary;
use NumberToWords\Language\Hebrew\HebrewTripletTransformer;
use NumberToWords\Language\Hebrew\HebrewExponentInflector;
use NumberToWords\Language\Hebrew\HebrewNounGenderInflector;
use NumberToWords\Service\NumberToTripletsConverter;

class HebrewNumberTransformer implements NumberTransformer
{
    public function toWords(int $number): string
    {
        $dictionary = new HebrewDictionary();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new HebrewTripletTransformer($dictionary);
        $exponentInflector = new HebrewExponentInflector(new HebrewNounGenderInflector());

        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withWordsSeparatedBy(' ')
            ->transformNumbersBySplittingIntoPowerAwareTriplets($numberToTripletsConverter, $tripletTransformer)
            ->inflectExponentByNumbers($exponentInflector)
            ->build();

        return $numberTransformer->toWords($number);
    }
}
