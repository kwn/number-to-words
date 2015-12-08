<?php

namespace Kwn\NumberToWords\Transformer;

use Kwn\NumberToWords\Model\Number;
use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;
use Kwn\NumberToWords\Exception\InvalidArgumentException;

abstract class CurrencyTransformer
{
    /**
     * @var Currency
     */
    protected $currency;

    /**
     * @var SubunitFormat
     */
    protected $subunitFormat;

    /**
     * Set the currency to use for the transformation
     *
     * @param Currency $currency
     *
     * @throws InvalidArgumentException
     */
    public function setCurrency(Currency $currency)
    {
        $this->guardAgainstUnexistingCurrency($currency);

        $this->currency = $currency;
    }

    /**
     * Set the subunit format to use for the transformation
     *
     * @param SubunitFormat $subunitFormat
     */
    public function setSubunitFormat(SubunitFormat $subunitFormat)
    {
        $this->subunitFormat = $subunitFormat;
    }

    /**
     * Convert amount to words
     *
     * @param mixed $number
     *
     * @return string
     */
    abstract public function toWords($number);

    /**
     * Gets an array of valid currencies (ISO 4217)
     *
     * @return array
     */
    abstract protected function getValidCurrencies();

    /**
     * Reduce the provided number to just two significant digits
     *
     * @param mixed $number
     *
     * @return Number
     */
    protected function createCurrencyNumber($number)
    {
        $number = new Number($number);
        $fraction = (int) ($number->getSubunits() * pow(10, ($number->getDecimalPlaces() - 2) * -1));
        $normalizedValue = $number->getUnits() + ($fraction / 100);

        return new Number($normalizedValue);
    }

    /**
     * Check if currency definitions exist in dictionary
     *
     * @param Currency $currency
     *
     * @throws InvalidArgumentException
     */
    protected function guardAgainstUnexistingCurrency(Currency $currency)
    {
        if (!in_array($currency->getIdentifier(), $this->getValidCurrencies())) {
            throw new InvalidArgumentException(sprintf(
                'There is missing "%s" unit in a currency dictionary',
                $currency->getIdentifier()
            ));
        }
    }
}
