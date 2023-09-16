<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Language\Polish\PolishDictionary;
use NumberToWords\Language\Polish\PolishExponentInflector;
use NumberToWords\Language\Polish\PolishNounGenderInflector;
use NumberToWords\Language\Polish\PolishTripletTransformer;
use NumberToWords\NumberTransformer\NumberTransformerBuilder;
use NumberToWords\Service\NumberToTripletsConverter;
use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class PolishCurrencyTransformer implements CurrencyTransformer
{
    public function toWords(int $amount, string $currency, ?CurrencyTransformerOptions $options = null): string
    {
        $dictionary = new PolishDictionary();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new PolishTripletTransformer($dictionary);
        $nounGenderInflector = new PolishNounGenderInflector();
        $exponentInflector = new PolishExponentInflector($nounGenderInflector);

        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withWordsSeparatedBy(' ')
            ->transformNumbersBySplittingIntoTriplets($numberToTripletsConverter, $tripletTransformer)
            ->inflectExponentByNumbers($exponentInflector)
            ->build();

        $decimal = (int) ($amount / 100);
        $fraction = abs($amount % 100);

        if ($fraction === 0) {
            $fraction = null;
        }

        $currency = strtoupper($currency);

        if (!array_key_exists($currency, PolishDictionary::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = PolishDictionary::$currencyNames[$currency];

        $words = [];

        $words[] = $numberTransformer->toWords($decimal);
        $words[] = $nounGenderInflector->inflectNounByNumber(
            $decimal,
            $currencyNames[0][0],
            $currencyNames[0][1],
            $currencyNames[0][2]
        );

        if (null !== $fraction) {
            $words[] = $numberTransformer->toWords($fraction);
            $words[] = $nounGenderInflector->inflectNounByNumber(
                $fraction,
                $currencyNames[1][0],
                $currencyNames[1][1],
                $currencyNames[1][2]
            );
        }

        return implode(' ', $words);
    }
}
