<?php

namespace Kwn\NumberToWords\Transformer;

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
     * @return mixed
     */
    public function createNumberTransformer();

    /**
     * Create currency transformer
     *
     * @return mixed
     */
    public function createCurrencyTransformer();
}
