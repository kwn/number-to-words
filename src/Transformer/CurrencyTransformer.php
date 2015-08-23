<?php

namespace Kwn\NumberToWords\Transformer;

use Kwn\NumberToWords\Model\Amount;

interface CurrencyTransformer
{
    /**
     * Convert amount to words
     *
     * @param Amount $amount
     *
     * @return string
     */
    public function toWords(Amount $amount);
}
