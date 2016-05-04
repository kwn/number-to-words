<?php

namespace Kwn\NumberToWords\Grammar\Slavonic\Dictionary;

use Kwn\NumberToWords\Model\Currency as CurrencyModel;

abstract class Currency
{
    protected $units = [];

    protected $subunits = [];

    /**
     * @param CurrencyModel $currency
     *
     * @return string
     */
    public function getUnitName(CurrencyModel $currency)
    {
        return $this->units[$currency->getIdentifier()];
    }

    /**
     * @param CurrencyModel $currency
     *
     * @return string
     */
    public function getSubunitName(CurrencyModel $currency)
    {
        return $this->subunits[$currency->getIdentifier()];
    }

    /**
     * @return array
     */
    public function getUnitNames()
    {
        return $this->units;
    }

    /**
     * @return array
     */
    public function getSubunitNames()
    {
        return $this->subunits;
    }
}
