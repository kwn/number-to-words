<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\Legacy\Numbers\Words;
use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class IndonesianCurrencyTransformer implements CurrencyTransformer
{
    public function toWords(int $amount, string $currency, ?CurrencyTransformerOptions $options = null): string
    {
        $converter = new Words($options);

        return $converter->transformToCurrency($amount, 'id', $currency);
    }
}
