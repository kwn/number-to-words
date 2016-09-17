<?php

namespace NumberToWords\CurrencyTransformer;

class PortugeseBrazilianCurrencyTransformerTest extends CurrencyTransformerTest
{
    public function setUp()
    {
        $this->currencyTransformer = new PortugueseBrazilianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords()
    {
        return [
            [100, 'BRL', 'um real'],
            [200, 'USD', 'dois dólares'],
            [500, 'EUR', 'cinco euros']
        ];
    }
}
