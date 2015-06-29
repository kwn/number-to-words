<?php

namespace Kwn\NumberToWords\Model;

class Amount
{
    /**
     * @var Number
     */
    private $number;

    /**
     * @var Currency
     */
    private $currency;

    /**
     * @var SubunitFormat
     */
    private $subunitFormat;

    /**
     * Constructor
     *
     * @param Number        $number
     * @param Currency      $currency
     * @param SubunitFormat $subunitFormat
     */
    public function __construct(Number $number, Currency $currency, SubunitFormat $subunitFormat)
    {
        $this->number        = $this->normalizeNumberForAmount($number);
        $this->currency      = $currency;
        $this->subunitFormat = $subunitFormat;
    }

    /**
     * Get number
     *
     * @return Number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Get currency
     *
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Get subunit format
     *
     * @return SubunitFormat
     */
    public function getSubunitFormat()
    {
        return $this->subunitFormat;
    }

    /**
     * Normalize number for amount
     *
     * @param Number $number
     *
     * @return Number
     */
    private function normalizeNumberForAmount(Number $number)
    {
        $normalizedValue = $number->getUnits() + ($number->getSubunits() / 100);

        return new Number($normalizedValue);
    }
}
