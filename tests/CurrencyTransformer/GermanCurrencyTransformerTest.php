<?php

namespace NumberToWords\CurrencyTransformer;

class GermanCurrencyTransformerTest extends CurrencyTransformerTestCase
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new GermanCurrencyTransformer();
    }

    public static function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [100, 'EUR', 'ein Euro'],
            [200, 'EUR', 'zwei Euro'],
            [600, 'EUR', 'sechs Euro'],
            [1200, 'EUR', 'zwölf Euro'],
            [2100, 'EUR', 'einundzwanzig Euro'],
            [10000, 'EUR', 'einhundert Euro'],
            [100000, 'EUR', 'eintausend Euro'],
            [150, 'EUR', 'ein Euro und fünfzig cent'],
            [299, 'EUR', 'zwei Euro und neunundneunzig cent'],
            [-600, 'EUR', 'minus sechs Euro'],
            [500, 'USD', 'fünf US Dollar'],
            [200000, 'USD', 'zweitausend US Dollar'],
            [300, 'SAR', 'drei Saudi-Arabischer Riyal'],
            [100, 'CNY', 'ein Chinesischer Yuan'],
            [500, 'NGN', 'fünf Nigerianische Naira'],
            [3000000, 'MXN', 'dreißigtausend Mexikanischer Peso'],
            [3000025, 'MXN', 'dreißigtausend Mexikanischer Peso und fünfundzwanzig Centavo'],
        ];
    }
}
