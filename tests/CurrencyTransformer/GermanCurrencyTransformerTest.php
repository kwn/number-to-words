<?php

namespace NumberToWords\CurrencyTransformer;

class GermanCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new GermanCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [600, 'EUR', 'sechs Euro']
        ];
    }
}
