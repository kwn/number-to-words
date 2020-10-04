<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Service\NumberToTripletsConverter;
use NumberToWords\Language\Persian\PersianDictionary;
use NumberToWords\Language\Persian\PersianExponentGetter;
use NumberToWords\Language\Persian\PersianTripletTransformer;

class PersianNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($number)
    {
        $dictionary = new PersianDictionary();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new PersianTripletTransformer($dictionary);
        $exponentInflector = new PersianExponentGetter();

        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withWordsSeparatedBy(' ')
            ->transformNumbersBySplittingIntoTriplets($numberToTripletsConverter, $tripletTransformer)
            ->useRegularExponents($exponentInflector)
            ->build();

        return $numberTransformer->toWords($number);
    }
}
