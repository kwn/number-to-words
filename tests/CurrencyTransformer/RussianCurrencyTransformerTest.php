<?php

namespace NumberToWords\CurrencyTransformer;

class RussianCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new RussianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [100, 'UAH', 'одна гривна'],
            [200, 'UAH', 'две гривны'],
            [500, 'UAH', 'пять гривен'],
            [34000, 'UAH', 'триста сорок гривен'],
            [34100, 'UAH', 'триста сорок одна гривна'],
            [34200, 'RUB', 'триста сорок два рубля'],
            [34400, 'UAH', 'триста сорок четыре гривны'],
            [34500, 'UAH', 'триста сорок пять гривен'],
            [34552, 'UAH', 'триста сорок пять гривен пятьдесят две копейки'],
            [34501, 'UAH', 'триста сорок пять гривен одна копейка'],
            [34599, 'UAH', 'триста сорок пять гривен девяносто девять копеек'],
        ];
    }
}
