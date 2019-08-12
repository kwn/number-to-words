<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\Legacy\Numbers\Words;
use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class GeorgianCurrencyTransformer implements CurrencyTransformer
{

    public function toWords($amount, $currency, $options = null)
    {
        $converter = new Words($options);
        return $converter->transformToCurrency($amount, 'ka', $currency);
    }
}
