<?php

namespace Kwn\NumberToWords\Transformer;

use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;

interface TransformerFactory
{
    /**
     * @return string
     */
    public function getLanguageIdentifier();

    /**
     * @return NumberTransformer
     */
    public function createNumberTransformer();

    /**
     * @param Currency      $currency
     * @param SubunitFormat $subunitFormat
     *
     * @return CurrencyTransformer
     */
    public function createCurrencyTransformer(Currency $currency, SubunitFormat $subunitFormat);
}
