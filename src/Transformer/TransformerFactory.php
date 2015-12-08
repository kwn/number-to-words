<?php

namespace Kwn\NumberToWords\Transformer;

use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;

interface TransformerFactory
{
    /**
     * Return language identifier (RFC 3066)
     *
     * @return string
     */
    public function getLanguageIdentifier();

    /**
     * Create number transformer
     *
     * @return NumberTransformer
     */
    public function createNumberTransformer();

    /**
     * Create currency transformer
     *
     * @param Currency      $currency
     * @param SubunitFormat $subunitFormat
     *
     * @return CurrencyTransformer
     */
    public function createCurrencyTransformer(Currency $currency, SubunitFormat $subunitFormat);
}
