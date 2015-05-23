<?php

namespace Kwn\NumberToWords\Factory;

use Kwn\NumberToWords\Model\Currency;

abstract class AbstractTransformerFactory
{
    /**
     * Return language identifier (RFC 3066)
     *
     * @return string
     */
    abstract public function getLanguageIdentifier();

    /**
     * Create number transformer
     *
     * @return mixed
     */
    abstract public function createNumberTransformer();

    /**
     * Create currency transformer
     *
     * @param Currency $currency       Currency model
     * @param integer  $subunitsFormat Subunits format
     *
     * @return mixed
     */
    abstract public function createCurrencyTransformer(Currency $currency, $subunitsFormat);
}
