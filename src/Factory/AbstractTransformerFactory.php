<?php

namespace Kwn\NumberToWords\Factory;

abstract class AbstractTransformerFactory
{
    /**
     * Create number transformer
     *
     * @return mixed
     */
    abstract public function createNumberTransformer();

    /**
     * Create currency transformer
     *
     * @param string  $currency       Currency identifier (ISO 4217)
     * @param integer $subunitsFormat Subunits format
     *
     * @return mixed
     */
    abstract public function createCurrencyTransformer($currency, $subunitsFormat);
}
