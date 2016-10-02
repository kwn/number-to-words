<?php

namespace NumberToWords\CurrencyTransformer;

class DanishCurrencyTransformerTest extends CurrencyTransformerTest
{
    public function setUp()
    {
        $this->currencyTransformer = new DanishCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords()
    {
        return [
            [100, 'DKK', 'en krone'],
            [200, 'USD', 'to dollars'],
            [600, 'EUR', 'seks euro'],
            [1300, 'CHF', 'tretten schweitzer franc'],
        ];
    }
}
