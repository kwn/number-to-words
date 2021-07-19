<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\Legacy\Numbers\Words;
use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class TurkishCurrencyTransformer implements CurrencyTransformer
{
    public function toWords(int $amount, string $currency, ?CurrencyTransformerOptions $options = null): string
    {
        $converter = new Words();

        return $converter->transformToCurrency($amount, 'tr', $currency);
    }
}
