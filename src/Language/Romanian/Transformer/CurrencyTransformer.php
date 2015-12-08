<?php

namespace Kwn\NumberToWords\Language\Romanian\Transformer;

use Kwn\NumberToWords\Language\Romanian\Dictionary\Currency;
use Kwn\NumberToWords\Language\Romanian\Dictionary\Language;
use Kwn\NumberToWords\Transformer\CurrencyTransformer as BaseCurrencyTransformer;

class CurrencyTransformer extends BaseCurrencyTransformer
{
    /**
     * @var NumberTransformer
     */
    private $transformer;

    /**
     * @param NumberTransformer $transformer
     */
    public function __construct(NumberTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * Converts a currency value to its word representation (with monetary units) in Romanian
     *
     * @param string  $intCurr          An international currency symbol
     *                                  as defined by the ISO 4217 standard (three characters)
     * @param integer $decimal          A money total amount without fraction part (e.g. amount of dollars)
     * @param integer $fraction         Fractional part of the money amount (e.g. amount of cents)
     *                                  Optional. Defaults to false.
     * @param integer $convertFraction  Convert fraction to words (left as numeric if set to false).
     *                                  Optional. Defaults to true.
     *
     * @return string  The corresponding word representation for the currency
     *
     * @author Bogdan Stăncescu <bogdan@moongate.ro>
     */
    private function toCurrencyWords($intCurr, $decimal, $fraction = false, $convertFraction = true)
    {
        $intCurr = strtoupper($intCurr);
        if (!isset(Currency::getCurrencyNames()[$intCurr])) {
            $intCurr = 'EUR';
        }

        $currNouns = Currency::getCurrencyNames()[$intCurr];
        $ret = $this->transformer->toWords($decimal, $currNouns[0]);

        if ($fraction !== false) {
            $ret .= ' ' . Language::WORD_AND;

            if ($convertFraction) {
                $ret .= ' ' . $this->toWords($fraction, $currNouns[1]);
            } else {
                $ret .= $fraction . ' ';
                $plural_rule = $this->getPluralRule($fraction);
                $this->getNounDeclensionForNumber($plural_rule, $currNouns[1]);
            }
        }

        return trim($ret);
    }

    /**
     * @param mixed $number
     *
     * @return string
     */
    public function toWords($number)
    {
        $number = $this->createCurrencyNumber($number);
        $decimalPoint = '.';

        $amountValue = round($number->getValue(), 2);

        if (strpos($amountValue, $decimalPoint) === false) {
            return trim($this->toCurrencyWords($this->currency->getIdentifier(), $amountValue));
        }

        $currency = explode($decimalPoint, $amountValue, 2);

        $len = strlen($currency[1]);

        if ($len === 1) {
            $currency[1] .= '0';
        }

        return $this->toCurrencyWords($this->currency->getIdentifier(), $currency[0], $currency[1]);
    }

    /**
     * Gets an array of valid currencies (ISO 4217)
     *
     * @return array
     */
    protected function getValidCurrencies()
    {
        return array_keys(Currency::getCurrencyNames());
    }
}
