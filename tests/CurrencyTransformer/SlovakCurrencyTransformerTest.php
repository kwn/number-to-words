<?php

namespace NumberToWords\CurrencyTransformer;

class SlovakCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new SlovakCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [100, 'USD', 'jeden dolár'],
            [2000, 'USD', 'dvadsať dolárov'],
            [2100, 'USD', 'dvadsaťjeden dolárov'],
        ];
    }
}
