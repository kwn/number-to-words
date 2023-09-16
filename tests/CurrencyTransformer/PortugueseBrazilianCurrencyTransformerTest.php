<?php

namespace NumberToWords\CurrencyTransformer;

class PortugueseBrazilianCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new PortugueseBrazilianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [100, 'BRL', 'um real'],
            [200, 'USD', 'dois dólares'],
            [500, 'EUR', 'cinco euros']
        ];
    }
}
