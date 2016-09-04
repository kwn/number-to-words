<?php

namespace NumberToWords\CurrencyTransformer;

interface CurrencyTransformer
{
    /**
     * @param float $amount
     * @param string $currency
     *
     * @return string
     */
    public function toWords($amount, $currency);
}
