<?php

namespace NumberToWords\CurrencyTransformer;

class HungarianCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new HungarianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [100, 'HUF', 'egy forint'],
            [200, 'PLN', 'kettő zlotys'],
            [500, 'USD', 'öt dollars']
        ];
    }
}
