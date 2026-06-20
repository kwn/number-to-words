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
            [300, 'BRL', 'três reais'],
            [500, 'EUR', 'cinco euros'],
            [1000, 'BRL', 'dez reais'],
            [5000, 'USD', 'cinquenta dólares'],
            [150, 'BRL', 'um real e cinquenta centavos'],
            [275, 'USD', 'dois dólares e setenta e cinco centavos'],
        ];
    }
}
