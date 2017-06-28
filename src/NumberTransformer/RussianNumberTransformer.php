<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Language\Russian\RussianExponentInflector;
use NumberToWords\Language\Russian\RussianNounGenderInflector;
use NumberToWords\Language\Russian\RussianTripletTransformer;
use NumberToWords\Language\Russian\RussianDictionary;
use NumberToWords\Service\NumberToTripletsConverter;

class RussianNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($number)
    {
        $dictionary = new RussianDictionary();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new RussianTripletTransformer($dictionary);
        $exponentInflector = new RussianExponentInflector(new RussianNounGenderInflector());

        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withWordsSeparatedBy(' ')
            ->transformNumbersBySplittingIntoPowerAwareTriplets($numberToTripletsConverter, $tripletTransformer)
            ->inflectExponentByNumbers($exponentInflector)
            ->build();

        return $numberTransformer->toWords($number);
    }
}
