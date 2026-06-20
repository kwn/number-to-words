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
            [200, 'USD', 'dy dollars'],
            [500, 'USD', 'pesë dollars'],
            [2000, 'USD', 'njëzet dollars'],
            [100, 'EUR', 'një euro'],
            [300, 'EUR', 'tre euros'],
            [10000, 'EUR', 'njëqind euros'],
            [150, 'USD', 'një dollar pesëdhjetë cents'],
            [-200, 'USD', 'minus dy dollars'],
        ];
    }
}
