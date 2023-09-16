<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Language\Serbian\SerbianDictionary;
use NumberToWords\Language\Serbian\SerbianExponentInflector;
use NumberToWords\Language\Serbian\SerbianNounGenderInflector;
use NumberToWords\Language\Serbian\SerbianTripletTransformer;
use NumberToWords\Service\NumberToTripletsConverter;

class SerbianNumberTransformer implements NumberTransformer
{
    public function toWords(int $number): string
    {
        $dictionary = new SerbianDictionary();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new SerbianTripletTransformer($dictionary);
        $exponentInflector = new SerbianExponentInflector(new SerbianNounGenderInflector());

        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withWordsSeparatedBy(' ')
            ->transformNumbersBySplittingIntoPowerAwareTriplets($numberToTripletsConverter, $tripletTransformer)
            ->inflectExponentByNumbers($exponentInflector)
            ->build();

        return $numberTransformer->toWords($number);
    }
}
