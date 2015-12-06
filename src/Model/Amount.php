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
     * @param Number        $number
     * @param Currency      $currency
     * @param SubunitFormat $subunitFormat
     */
    public function __construct(Number $number, Currency $currency, SubunitFormat $subunitFormat = null)
    {
        $this->number   = $this->normalizeNumberForAmount($number);
        $this->currency = $currency;

        if (null === $subunitFormat) {
            $subunitFormat = new SubunitFormat(SubunitFormat::NUMBERS);
        }

        $this->subunitFormat = $subunitFormat;
    }

    /**
     * @return Number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return SubunitFormat
     */
    public function getSubunitFormat()
    {
        return $this->subunitFormat;
    }

    /**
     * @param Number $number
     *
     * @return Number
     */
    private function normalizeNumberForAmount(Number $number)
    {
        $fraction = (int) ($number->getSubunits() * pow(10, ($number->getDecimalPlaces() - 2) * -1));
        $normalizedValue = $number->getUnits() + ($fraction / 100);

        return new Number($normalizedValue);
    }
}
