<?php

namespace Kwn\NumberToWords\Language\French\Transformer;

use Kwn\NumberToWords\Model\Number;
use Kwn\NumberToWords\Model\SubunitFormat;
use Kwn\NumberToWords\Language\French\Dictionary\Currency as CurrencyDictionary;
use Kwn\NumberToWords\Transformer\CurrencyTransformer as BaseCurrencyTransformer;

class CurrencyTransformer extends BaseCurrencyTransformer
{
    /**
     * @var NumberTransformer
     */
    protected $numberTransformer;

    /**
     * @var CurrencyDictionary
     */
    protected $currencyDictionary;

    /**
     * @param NumberTransformer  $numberTransformer
     * @param CurrencyDictionary $currencyDictionary
     */
    public function __construct(NumberTransformer $numberTransformer, CurrencyDictionary $currencyDictionary)
    {
        $this->numberTransformer = $numberTransformer;
        $this->currencyDictionary = $currencyDictionary;
    }

    /**
     * Convert given number to words
     *
     * @param mixed $number
     *
     * @return string
     */
    public function toWords($number)
    {
        $number = $this->createCurrencyNumber($number);

        return $this->getIntegerPart($number) . ' et ' . $this->getFractionalPart($number);
    }

    /**
     * Gets an array of valid currencies (ISO 4217)
     *
     * @return array
     */
    protected function getValidCurrencies()
    {
        return array_keys($this->currencyDictionary->getUnitNames());
    }

    /**
     * Gets the integer part of the provided amount
     *
     * @param Number $number
     *
     * @return string
     */
    protected function getIntegerPart(Number $number)
    {
        $value = $number->getValue();
        $unitName = $this->currencyDictionary->getUnitName($this->currency, !$this->isSingular($value));

        if ($value % 1000 === 0) {
            return $this->numberTransformer->toWords($value) . ' d\'' . $unitName;
        } else {
            return $this->numberTransformer->toWords($value) . ' ' . $unitName;
        }
    }

    /**
     * Gets the fractional part of the provided amount
     *
     * @param Number $number
     *
     * @return string
     */
    protected function getFractionalPart(Number $number)
    {
        $subunitValue = $number->getSubunits();

        if ($subunitValue < 10 && $number->getDecimalPlaces() === 1) {
            $subunitValue *= 10;
        }

        //if the subunit format is numbers, we want to simply return a fraction
        if ($this->subunitFormat->getFormat() === SubunitFormat::NUMBERS) {
            return $subunitValue . '/100';
        }

        $unitName = $this->currencyDictionary->getSubunitName($this->currency, !$this->isSingular($subunitValue));

        return $this->numberTransformer->toWords($subunitValue) . ' ' . $unitName;
    }

    /**
     * Determines if the provided number is singular
     *
     * @param mixed $number
     *
     * @return bool
     */
    protected function isSingular($number)
    {
        return $number == 1;
    }
}
