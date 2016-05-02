<?php
namespace Kwn\NumberToWords\Grammar\Slavonic\Dictionary;

use Kwn\NumberToWords\Model\Currency as CurrencyModel;

abstract class Currency
{

    protected $units = [];

    protected $subunits = [];

    public function getUnitName(CurrencyModel $currency)
    {
        return $this->units[$currency->getIdentifier()];
    }

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
