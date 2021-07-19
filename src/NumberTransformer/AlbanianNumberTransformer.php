<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Language\Albanian\AlbanianDictionary;
use NumberToWords\Language\Albanian\AlbanianExponentGetter;
use NumberToWords\Language\Albanian\AlbanianTripletTransformer;
use NumberToWords\Service\NumberToTripletsConverter;

class AlbanianNumberTransformer implements NumberTransformer
{
    public function toWords(int $number): string
    {
        $dictionary = new AlbanianDictionary();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new AlbanianTripletTransformer($dictionary);
        $exponentInflector = new AlbanianExponentGetter();

        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withExponentsSeparatedBy('e')
            ->withWordsSeparatedBy(' ')
            ->transformNumbersBySplittingIntoTriplets($numberToTripletsConverter, $tripletTransformer)
            ->useRegularExponents($exponentInflector)
            ->build();

        return $numberTransformer->toWords($number);
    }
}
