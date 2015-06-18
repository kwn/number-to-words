<?php

namespace Kwn\NumberToWords\Model;

class Amount
{
    /**
     * @var integer
     */
    private $units;

    /**
     * @var integer
     */
    private $subunits;

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
        $this->units    = $this->extractUnits($number);
        $this->subunits = $this->extractSubunits($number);
        $this->currency = $currency;
    }

    /**
     * Get units
     *
     * @return integer
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * Get subunits
     *
     * @return integer
     */
    public function getSubunits()
    {
        return $this->subunits;
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
     * Extract units from given number
     *
     * @param Number $number
     *
     * @return integer
     */
    private function extractUnits(Number $number)
    {
        return (int) $number->getValue();
    }

    /**
     * Extract subunits from given number.
     *
     * @param Number $number
     *
     * @return integer
     */
    private function extractSubunits(Number $number)
    {
        return (int) bcmod(bcmul($number->getValue(), 100, 20), 100);
    }
}
