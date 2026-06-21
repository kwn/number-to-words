<?php

namespace NumberToWords\CurrencyTransformer;

class RomanianCurrencyTransformerTest extends CurrencyTransformerTestCase
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new RomanianCurrencyTransformer();
    }

    public static function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [100, 'RON', 'un leu'],
            [200, 'RON', 'doi lei'],
            [500, 'RON', 'cinci lei'],
            [140, 'RON', 'un leu și patruzeci de bani'],
            [145, 'RON', 'un leu și patruzeci și cinci de bani'],
            [200000, 'RON', 'două mii de lei'],
            [1000000, 'RON', 'zece mii de lei'],
            [-200, 'RON', 'minus doi lei'],
            [-145, 'RON', 'minus un leu și patruzeci și cinci de bani'],
            [500, 'GBP', 'cinci lire sterline'],
            [100, 'JPY', 'un yen'],
            [300, 'NOK', 'trei coroane norvegiene'],
            [200, 'SAR', 'doi riali saudiți'],
            [100, 'ZAR', 'un rand sud-african'],
        ];
    }
}
