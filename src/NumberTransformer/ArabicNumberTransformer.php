<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Language\Arabic\ArabicDictionary;
use NumberToWords\Language\Arabic\ArabicExponentInflector;
use NumberToWords\Language\Arabic\ArabicNounGenderInflector;
use NumberToWords\Language\Arabic\ArabicTripletTransformer;
use NumberToWords\Service\NumberToTripletsConverter;

class ArabicNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords(int $number): string
    {
        $dictionary = new ArabicDictionary();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new ArabicTripletTransformer($dictionary);
        $exponentInflector = new ArabicExponentInflector(new ArabicNounGenderInflector());

        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withWordsSeparatedBy(' ')
            ->withExponentsSeparatedBy(' و ')
            ->transformNumbersBySplittingIntoPowerAwareTriplets($numberToTripletsConverter, $tripletTransformer)
            ->inflectExponentByNumbers($exponentInflector)
            ->build();

        return $numberTransformer->toWords($number);
    }
}
