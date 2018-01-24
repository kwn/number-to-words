<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\Legacy\Numbers\Words;

class UkrainianCurrencyTransformer implements CurrencyTransformer
{
    /**
     * @param int $amount
     * @param string $currency
     * @return string
     * @throws \NumberToWords\Exception\NumberToWordsException
     */
    public function toWords($amount, $currency)
    {
        $converter = new Words();

        return $converter->transformToCurrency($amount, 'ua', $currency);
    }
}
