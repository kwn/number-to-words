<?php

namespace Kwn\NumberToWords\Transformer;

use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;
use Kwn\NumberToWords\Transformer\NumberTransformer as NumberTransformerInterface;
use Kwn\NumberToWords\Transformer\CurrencyTransformer as CurrencyTransformerInterface;

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
     * @return NumberTransformerInterface
     */
    public function createNumberTransformer();

    /**
     * Create currency transformer
     *
     * @param Currency $currency
     * @param SubunitFormat $currency
     *
     * @return CurrencyTransformerInterface
     */
    public function createCurrencyTransformer(Currency $currency, SubunitFormat $subunitFormat);
}
