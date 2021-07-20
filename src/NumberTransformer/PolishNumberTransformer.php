<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Language\Polish\PolishDictionary;
use NumberToWords\Language\Polish\PolishNounGenderInflector;
use NumberToWords\Language\Polish\PolishExponentInflector;
use NumberToWords\Language\Polish\PolishTripletTransformer;
use NumberToWords\Service\NumberToTripletsConverter;

class PolishNumberTransformer implements NumberTransformer
{
    public function toWords(int $number): string
    {
        $dictionary = new PolishDictionary();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new PolishTripletTransformer($dictionary);
        $exponentInflector = new PolishExponentInflector(new PolishNounGenderInflector());

        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withWordsSeparatedBy(' ')
            ->transformNumbersBySplittingIntoTriplets($numberToTripletsConverter, $tripletTransformer)
            ->inflectExponentByNumbers($exponentInflector)
            ->build();

        return $numberTransformer->toWords($number);
    }
}
