<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Language\Slovak\SlovakDictionary;
use NumberToWords\Language\Slovak\SlovakNounGenderInflector;
use NumberToWords\Language\Slovak\SlovakExponentInflector;
use NumberToWords\Language\Slovak\SlovakTripletTransformer;
use NumberToWords\Service\NumberToTripletsConverter;

class SlovakNumberTransformer implements NumberTransformer
{
    public function toWords(int $number): string
    {
        $dictionary = new SlovakDictionary();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new SlovakTripletTransformer($dictionary);
        $exponentInflector = new SlovakExponentInflector(new SlovakNounGenderInflector());

        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withWordsSeparatedBy(' ')
            ->transformNumbersBySplittingIntoTriplets($numberToTripletsConverter, $tripletTransformer)
            ->inflectExponentByNumbers($exponentInflector)
            ->build();

        return $numberTransformer->toWords($number);
    }
}
