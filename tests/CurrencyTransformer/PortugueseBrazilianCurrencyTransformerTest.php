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
            [500, 'GBP', 'cinco libras esterlinas'],
            [300, 'RUB', 'três rublos russos'],
            [200, 'SAR', 'dois riyals sauditas'],
            [1000, 'NOK', 'dez coroas norueguesas'],
            [100, 'ZAR', 'um rand sul-africano'],
        ];
    }
}
