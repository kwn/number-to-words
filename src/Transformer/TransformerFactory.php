<?php

namespace Kwn\NumberToWords\Transformer;

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
     * @return CurrencyTransformerInterface
     */
    public function createCurrencyTransformer();
}
