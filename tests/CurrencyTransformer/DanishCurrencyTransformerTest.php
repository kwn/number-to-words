<?php

namespace NumberToWords\CurrencyTransformer;

class DanishCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new DanishCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [100, 'DKK', 'en krone'],
            [200, 'USD', 'to dollars'],
            [600, 'EUR', 'seks euro'],
            [1300, 'CHF', 'tretten schweitzer franc'],
            [500, 'DKK', 'fem kroner'],
            [2000, 'DKK', 'tyve kroner'],
            [10000, 'EUR', 'et hundrede euro'],
            [150, 'DKK', 'en krone og halvtreds øre'],
            [275, 'EUR', 'to euro og fem og halvfjerds euro-cent'],
            [-600, 'EUR', 'minus seks euro'],
        ];
    }
}
