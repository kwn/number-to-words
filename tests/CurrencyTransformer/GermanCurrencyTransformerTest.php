<?php

namespace NumberToWords\CurrencyTransformer;

class GermanCurrencyTransformerTest extends CurrencyTransformerTest
{
    public function setUp()
    {
        $this->currencyTransformer = new GermanCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords()
    {
        return [
            [600, 'EUR', 'sechs Euro']
        ];
    }
}
