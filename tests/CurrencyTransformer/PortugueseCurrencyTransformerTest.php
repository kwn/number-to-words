<?php

namespace NumberToWords\CurrencyTransformer;

class PortugueseCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new PortugueseCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [100, 'EUR', 'um euro'],
            [200, 'USD', 'dois dólares'],
            [500, 'EUR', 'cinco euros']
        ];
    }
}
