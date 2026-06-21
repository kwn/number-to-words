<?php

namespace NumberToWords\CurrencyTransformer;

class PortugueseCurrencyTransformerTest extends CurrencyTransformerTestCase
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new PortugueseCurrencyTransformer();
    }

    public static function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [100, 'EUR', 'um euro'],
            [200, 'USD', 'dois dólares'],
            [500, 'EUR', 'cinco euros']
        ];
    }
}
