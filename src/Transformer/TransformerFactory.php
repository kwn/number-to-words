<?php

namespace Kwn\NumberToWords\Transformer;

use Kwn\NumberToWords\Model\Currency;

abstract class TransformerFactory
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
     * @param Currency $currency Currency model
     *
     * @return mixed
     */
    abstract public function createCurrencyTransformer(Currency $currency);
}
