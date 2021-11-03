<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Language\Arabic\ArabicDictionary;
use NumberToWords\Language\Arabic\ArabicExponentInflector;
use NumberToWords\Language\Arabic\ArabicNounGenderInflector;
use NumberToWords\Language\Arabic\ArabicTripletTransformer;
use NumberToWords\NumberTransformer\NumberTransformerBuilder;
use NumberToWords\Service\NumberToTripletsConverter;

class ArabicCurrencyTransformer implements CurrencyTransformer
{
    /**
     * {@inheritdoc}
     *
     * @throws NumberToWordsException
     * @return string
     */
    public function toWords(int $amount, string $currency, $options = null): string
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

        $decimal = (int) ($amount / 100);
        $fraction = abs($amount % 100);

        if ($fraction === 0) {
            $fraction = null;
        }

        $currency = strtoupper($currency);

        if (!array_key_exists($currency, ArabicDictionary::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = ArabicDictionary::$currencyNames[$currency];

        $return = trim($numberTransformer->toWords($decimal));
        $return .= ' ' . $currencyNames[0][0];

        if (null !== $fraction) {
            $return .= ' و ' . trim($numberTransformer->toWords($fraction));
            $return .= ' ' . $currencyNames[1][0];
        }

        return $return;
    }
}
