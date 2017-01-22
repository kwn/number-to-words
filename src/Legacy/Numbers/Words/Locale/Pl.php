<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Language\Polish\PolishDictionary;
use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Language\Polish\PolishNounGenderInflector;
use NumberToWords\NumberTransformer\NumberTransformerBuilder;
use NumberToWords\Language\Polish\PolishExponentInflector;
use NumberToWords\Language\Polish\PolishTripletTransformer;
use NumberToWords\Service\NumberToTripletsConverter;

class Pl
{
    /**
     * @var PolishNounGenderInflector
     */
    private $inflector;

    public function __construct()
    {
        $this->inflector = new PolishNounGenderInflector();
    }

    /**
     * @param int $number
     *
     * @return string
     */
    public function toWords($number)
    {
        $polishDictionary = new PolishDictionary();

        $languageDescriptor = (new NumberTransformerBuilder())
            ->withDictionary($polishDictionary)
            ->withWordsSeparatedBy(' ')
            ->transformNumbersBySplittingIntoTriplets(
                new NumberToTripletsConverter(),
                new PolishTripletTransformer($polishDictionary)
            )
            ->inflectExponentByNumbers(new PolishExponentInflector($this->inflector))
            ->build();

        return $languageDescriptor->toWords($number);
    }

    /**
     * @param string $currency
     * @param int    $decimal
     * @param int    $fraction
     *
     * @throws NumberToWordsException
     * @return string
     */
    public function toCurrencyWords($currency, $decimal, $fraction = null)
    {
        $currency = strtoupper($currency);

        if (!array_key_exists($currency, PolishDictionary::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = PolishDictionary::$currencyNames[$currency];

        $words = [];

        $words[] = $this->toWords($decimal);
        $words[] = $this->inflector->inflectNounByNumber(
            $decimal,
            $currencyNames[0][0],
            $currencyNames[0][1],
            $currencyNames[0][2]
        );

        if (null !== $fraction) {
            $words[] = $this->toWords($fraction);
            $words[] = $this->inflector->inflectNounByNumber(
                $fraction,
                $currencyNames[1][0],
                $currencyNames[1][1],
                $currencyNames[1][2]
            );
        }

        return implode(' ', $words);
    }
}
