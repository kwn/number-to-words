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
            [500, 'ROL', 'cinci lei'],
            [140, 'ROL', 'un leu și patruzeci de bani'],
            [145, 'ROL', 'un leu și patruzeci și cinci de bani'],
            [200000, 'ROL', 'două mii de lei'],
            [1000000, 'ROL', 'zece mii de lei'],
            [-200, 'ROL', 'minus doi lei'],
            [-145, 'ROL', 'minus un leu și patruzeci și cinci de bani'],
            [500, 'GBP', 'cinci lire sterline'],
            [100, 'JPY', 'un yen'],
            [300, 'NOK', 'trei coroane norvegiene'],
            [200, 'SAR', 'doi riali saudiți'],
            [100, 'ZAR', 'un rand sud-african'],
        ];
    }
}
