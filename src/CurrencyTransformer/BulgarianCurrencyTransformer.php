<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Language\Bulgarian\BulgarianDictionary;
use NumberToWords\Language\Bulgarian\BulgarianExponentInflector;
use NumberToWords\Language\Bulgarian\BulgarianFemaleTripletTransformer;
use NumberToWords\Language\Bulgarian\BulgarianNounGenderInflector;
use NumberToWords\Language\Bulgarian\BulgarianTripletTransformer;
use NumberToWords\NumberTransformer\NumberTransformerBuilder;
use NumberToWords\Service\NumberToTripletsConverter;
use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class BulgarianCurrencyTransformer implements CurrencyTransformer
{
    public function toWords(int $amount, string $currency, ?CurrencyTransformerOptions $options = null): string
    {
        $dictionary = new BulgarianDictionary();
        $nounGenderInflector = new BulgarianNounGenderInflector();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new BulgarianTripletTransformer($dictionary);
        $femaleTripletTransformer = new BulgarianFemaleTripletTransformer($dictionary);
        $exponentInflector = new BulgarianExponentInflector($nounGenderInflector);

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

        if (!array_key_exists($currency, BulgarianDictionary::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = BulgarianDictionary::$currencyNames[$currency];

        $words = [];

        $words[] = $numberTransformer->toWords($decimal);
        $words[] = $nounGenderInflector->inflectNounByNumber(
            $decimal,
            $currencyNames[0][0],
            $currencyNames[0][1],
            $currencyNames[0][1],
        );

        $words[] = BulgarianDictionary::$and;
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
                $currencyNames[1][1],
            );
        } else {
            $words[] = $dictionary->getZero();
            $words[] = $currencyNames[1][1];
        }

        return implode(' ', $words);
    }
}
