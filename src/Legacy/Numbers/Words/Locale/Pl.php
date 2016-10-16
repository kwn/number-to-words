<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Language\Polish\PolishDictionary;
use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Grammar\Inflector\PolishInflector;
use NumberToWords\Grammar\NumberTransformerBuilder;
use NumberToWords\Language\Polish\PolishExponentInflector;
use NumberToWords\Language\Polish\PolishTripletTransformer;

class Pl
{
    /**
     * @var PolishInflector
     */
    private $inflector;

    public function __construct()
    {
        $this->inflector = new PolishInflector();
    }

    /**
     * @param int $number
     *
     * @return string
     */
    public function toWords($number)
    {
        $languageDescriptor = (new NumberTransformerBuilder())
            ->withDictionary(new PolishDictionary())
            ->withWordsSeparatedBy(' ')
            ->transformNumbersBySplittingIntoTriplets(new PolishTripletTransformer())
            ->inflectExponentByNumbers(new PolishExponentInflector($this->inflector));

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
