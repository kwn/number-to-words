<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words\Locale\Pl;

class PolishCurrencyTransformer implements CurrencyTransformer
{
    /**
     * @param int    $amount
     * @param string $currency
     *
     * @throws NumberToWordsException
     * @return string
     */
    public function toWords($amount, $currency)
    {
        $converter = new Pl();

        $decimalPart = (int) ($amount / 100);
        $fractionalPart = $amount % 100;

        if ($fractionalPart === 0) {
            $fractionalPart = null;
        }

        return $converter->toCurrencyWords($currency, $decimalPart, $fractionalPart);
    }
}
