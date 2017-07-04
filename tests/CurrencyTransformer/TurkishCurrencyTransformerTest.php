<?php

namespace NumberToWords\CurrencyTransformer;

class TurkishCurrencyTransformerTest extends CurrencyTransformerTest
{
    public function setUp()
    {
        $this->currencyTransformer = new TurkishCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords()
    {
        return [
            [150, 'TRY', 'yüz elli'],
        ];
    }
}
