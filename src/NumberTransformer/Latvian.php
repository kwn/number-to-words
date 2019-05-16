<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Language\Latvian\LatvianDictionary;
use NumberToWords\Language\Latvian\LatvianExponentInflector;
use NumberToWords\Language\Latvian\LatvianTripletTransformer;
use NumberToWords\Service\NumberToTripletsConverter;

class Latvian implements NumberTransformer
{
    public function toWords(int $number): string
    {
        $dictionary = new LatvianDictionary();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new LatvianTripletTransformer($dictionary);
        $exponentInflector = new LatvianExponentInflector();

        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withWordsSeparatedBy(' ')
            ->withExponentsSeparatedBy(' ')
            ->transformNumbersBySplittingIntoTriplets($numberToTripletsConverter, $tripletTransformer)
            ->inflectExponentByNumbers($exponentInflector)
            ->build();

        return $numberTransformer->toWords($number);
    }
}
