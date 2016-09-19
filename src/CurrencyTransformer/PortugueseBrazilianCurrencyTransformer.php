<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\Legacy\Numbers\Words;

class PortugueseBrazilianCurrencyTransformer implements CurrencyTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($amount, $currency)
    {
        $converter = new Words();

        return $converter->transformToCurrency($amount, 'pt_BR', $currency);
    }
}
