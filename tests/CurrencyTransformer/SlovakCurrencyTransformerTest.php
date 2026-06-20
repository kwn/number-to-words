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
            [200, 'USD', 'dva doláre'],
            [500, 'USD', 'päť dolárov'],
            [2000, 'USD', 'dvadsať dolárov'],
            [2100, 'USD', 'dvadsaťjeden dolárov'],
            [100, 'EUR', 'jeden euro'],
            [500, 'EUR', 'päť euro'],
            [250, 'USD', 'dva doláre päťdesiat centov'],
            [10000, 'EUR', 'sto euro'],
            [-500, 'USD', 'mínus päť dolárov'],
            [300, 'SAR', 'tri saudskoarabské rijály'],
            [100, 'CNY', 'jeden čínsky jüan'],
            [500, 'NGN', 'päť nigérijských nair'],
        ];
    }
}
