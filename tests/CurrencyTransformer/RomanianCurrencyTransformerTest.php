<?php

namespace NumberToWords\CurrencyTransformer;

class RomanianCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new RomanianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [100, 'ROL', 'un leu'],
            [200, 'ROL', 'doi lei'],
            [140, 'ROL', 'un leu și patruzeci de bani'],
            [145, 'ROL', 'un leu și patruzeci și cinci de bani'],
            [200000, 'ROL', 'două mii de lei'],
        ];
    }
}
