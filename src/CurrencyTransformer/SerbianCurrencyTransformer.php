<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Language\Serbian\SerbianDictionary;
use NumberToWords\Language\Serbian\SerbianExponentInflector;
use NumberToWords\Language\Serbian\SerbianFemaleTripletTransformer;
use NumberToWords\Language\Serbian\SerbianNounGenderInflector;
use NumberToWords\Language\Serbian\SerbianTripletTransformer;
use NumberToWords\NumberTransformer\NumberTransformerBuilder;
use NumberToWords\Service\NumberToTripletsConverter;
use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class SerbianCurrencyTransformer implements CurrencyTransformer
{
    public function toWords(int $amount, string $currency, ?CurrencyTransformerOptions $options = null): string
    {
        $dictionary = new SerbianDictionary();
        $nounGenderInflector = new SerbianNounGenderInflector();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new SerbianTripletTransformer($dictionary);
        $femaleTripletTransformer = new SerbianFemaleTripletTransformer($dictionary);
        $exponentInflector = new SerbianExponentInflector($nounGenderInflector);

        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withWordsSeparatedBy($dictionary->getSeparator())
            ->transformNumbersBySplittingIntoPowerAwareTriplets($numberToTripletsConverter, $tripletTransformer)
            ->inflectExponentByNumbers($exponentInflector)
            ->build();

        $decimal = (int) ($amount / 100);
        $fraction = abs($amount % 100);

        if ($fraction === 0) {
            $fraction = null;
        }

        $currency = strtoupper($currency);

        if (!array_key_exists($currency, SerbianDictionary::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = SerbianDictionary::$currencyNames[$currency];

        $words = [];

        $words[] = $numberTransformer->toWords($decimal);
        $words[] = $nounGenderInflector->inflectNounByNumber(
            $decimal,
            $currencyNames[0][0],
            $currencyNames[0][1],
            $currencyNames[0][2]
        );

        if (null !== $fraction) {
            $centTransformer = (new NumberTransformerBuilder())
                ->withDictionary($dictionary)
                ->withWordsSeparatedBy($dictionary->getSeparator())
                ->transformNumbersBySplittingIntoPowerAwareTriplets(
                    $numberToTripletsConverter,
                    $femaleTripletTransformer
                )
                ->inflectExponentByNumbers($exponentInflector)
                ->build();

            $words[] = $centTransformer->toWords($fraction);
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
