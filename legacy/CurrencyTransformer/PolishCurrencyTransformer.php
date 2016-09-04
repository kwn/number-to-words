<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\Legacy\Numbers\Words;

class PolishCurrencyTransformer implements CurrencyTransformer
{
    /**
     * @param float  $amount
     * @param string $currency
     *
     * @return string
     */
    public function toWords($amount, $currency)
    {
        $converter = new Words();

        return $converter->toCurrency($amount / 100, 'pl', $currency);
    }
}
