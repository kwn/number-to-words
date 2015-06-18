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
     * Constructor
     *
     * @param Number $number
     * @param Currency $currency
     */
    public function __construct(Number $number, Currency $currency)
    {
        $this->number   = $this->getNormalizedNumber($number);
        $this->currency = $currency;
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
     * Round number value and return normalized object
     *
     * @param Number $number
     *
     * @return Number
     */
    private function getNormalizedNumber(Number $number)
    {
        $roundedValue = round($number->getValue(), 2);

        return new Number($roundedValue);
    }
}
