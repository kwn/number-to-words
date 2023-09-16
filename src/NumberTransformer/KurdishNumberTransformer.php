<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Language\Kurdish\KurdishDictionary;
use NumberToWords\Language\Kurdish\KurdishExponentGetter;
use NumberToWords\Language\Kurdish\KurdishTripletTransformer;
use NumberToWords\Service\NumberToTripletsConverter;

class KurdishNumberTransformer implements NumberTransformer
{
    public function toWords(int $number): string
    {
        $dictionary = new KurdishDictionary();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new KurdishTripletTransformer($dictionary);
        $exponentInflector = new KurdishExponentGetter();

        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withWordsSeparatedBy(' ')
            ->withExponentsSeparatedBy('و')
            ->transformNumbersBySplittingIntoTriplets($numberToTripletsConverter, $tripletTransformer)
            ->useRegularExponents($exponentInflector)
            ->build();

        return $numberTransformer->toWords($number);
    }
}
