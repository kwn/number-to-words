<?php

namespace Kwn\NumberToWords\Language\English\Dictionary;

use Kwn\NumberToWords\Model\Currency as CurrencyModel;

class Currency
{
    protected $unitNames = [
        'PLN' => 'złoty',
        'EUR' => 'euro',
        'GBP' => 'pound',
        'USD' => 'dollar',
        'CHF' => 'franc',
    ];

    protected $subunitNames = [
        'PLN' => ['singular' => 'grosz', 'plural' => 'groszy'],
        'EUR' => ['singular' => 'cent', 'plural' => 'cents'],
        'GBP' => ['singular' => 'pence', 'plural' => 'pence'],
        'USD' => ['singular' => 'cent', 'plural' => 'cents'],
        'CHF' => ['singular' => 'centime', 'plural' => 'centimes'],
    ];

    /**
     * Gets all the unit names
     *
     * @return array
     */
    public function getUnitNames()
    {
        return $this->unitNames;
    }

    /**
     * Gets a single unit name for the provided currency
     *
     * @param CurrencyModel $currency
     * @param bool          $plural
     *
     * @return string
     */
    public function getUnitName(CurrencyModel $currency, $plural)
    {
        return $this->unitNames[$currency->getIdentifier()] . ($plural ? 's' : '');
    }

    /**
     * @return array
     */
    public function getSubunitNames()
    {
        return $this->subunitNames;
    }

    /**
     * Gets a single subunit name for the provided currency
     *
     * @param CurrencyModel $currency
     * @param bool          $plural
     *
     * @return string
     */
    public function getSubunitName(CurrencyModel $currency, $plural)
    {
        $subunit = $this->subunitNames[$currency->getIdentifier()];

        return $subunit[$plural ? 'plural' : 'singular'];
    }
}
