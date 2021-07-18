<?php

namespace NumberToWords\CurrencyTransformer;

/**
 * @covers \NumberToWords\CurrencyTransformer\DanishCurrencyTransformer
 */
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
        ];
    }
}
