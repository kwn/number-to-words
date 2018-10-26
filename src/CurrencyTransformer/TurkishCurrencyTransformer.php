<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\Legacy\Numbers\Words;

class TurkishCurrencyTransformer implements CurrencyTransformer
{
    /**
     * @param int    $amount
     * @param string $currency
     *
     * @return string
     */
    public function toWords($amount, $currency)
    {
        $converter = new Words();

        return $converter->transformToCurrency($amount, 'tr', $currency);
    }
}
