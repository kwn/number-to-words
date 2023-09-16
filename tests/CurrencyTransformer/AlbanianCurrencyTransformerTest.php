<?php

namespace NumberToWords\CurrencyTransformer;

class AlbanianCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new AlbanianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [100, 'USD', 'një dollar'],
            [2000, 'USD', 'njëzet dollars'],
        ];
    }
}
