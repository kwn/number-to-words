<?php

namespace NumberToWords\CurrencyTransformer;

class HungarianCurrencyTransformerTest extends CurrencyTransformerTest
{
    public function setUp()
    {
        $this->currencyTransformer = new HungarianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords()
    {
        return [
            [100, 'HUF', 'egy forint'],
            [200, 'PLN', 'kettő zlotys'],
            [500, 'USD', 'öt dollars']
        ];
    }
}
