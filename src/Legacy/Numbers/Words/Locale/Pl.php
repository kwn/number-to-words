<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Language\Polish\Dictionary;
use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Grammar\Inflector\PolishInflector;
use NumberToWords\Service\NumberToTripletsConverter;

class Pl
{
    /**
     * @var NumberToTripletsConverter
     */
    private $numberToTripletsConverter;

    /**
     * @var \NumberToWords\Grammar\Inflector\PolishInflector
     */
    private $inflector;

    public function __construct()
    {
        $this->numberToTripletsConverter = new NumberToTripletsConverter();
        $this->inflector = new PolishInflector();
    }

    /**
     * @param int $number
     *
     * @return string
     */
    public function toWords($number)
    {
        if ($number === 0) {
            return Dictionary::$zero;
        }

        $words = [];

        if ($number < 0) {
            $words[] = Dictionary::$minus;
            $number *= -1;
        }

        $triplets = $this->numberToTripletsConverter->convertToTriplets($number);

        foreach ($triplets as $i => $triplet) {
            if ($triplet > 0) {
                $words[] = $this->threeDigitsToWords($triplet);
                $words[] = $this->inflector->inflectNounByNumber(
                    $triplet,
                    Dictionary::$exponent[count($triplets) - $i - 1][0],
                    Dictionary::$exponent[count($triplets) - $i - 1][1],
                    Dictionary::$exponent[count($triplets) - $i - 1][2]
                );
            }
        }

        return trim(implode(' ', $words));
    }

    /**
     * @param int $number
     *
     * @return string
     */
    private function threeDigitsToWords($number)
    {
        $units = $number % 10;
        $tens = (int) ($number / 10) % 10;
        $hundreds = (int) ($number / 100) % 10;
        $words = [];

        if ($hundreds > 0) {
            $words[] = Dictionary::$hundreds[$hundreds];
        }

        if ($tens === 1) {
            $words[] = Dictionary::$teens[$units];
        }

        if ($tens > 1) {
            $words[] = Dictionary::$tens[$tens];
        }

        if ($units > 0 && $tens !== 1) {
            $words[] = Dictionary::$units[$units];
        }

        return implode(' ', $words);
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

        if (!array_key_exists($currency, Dictionary::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = Dictionary::$currencyNames[$currency];

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
