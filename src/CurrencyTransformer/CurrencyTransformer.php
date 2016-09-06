<?php

namespace NumberToWords\CurrencyTransformer;

interface CurrencyTransformer
{
    /**
     * @param int    $amount
     * @param string $currency
     *
     * @return string
     */
    public function toWords($amount, $currency);
}
