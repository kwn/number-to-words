<?php

namespace NumberToWords\CurrencyTransformer;

class UkrainianCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new UkrainianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [100, 'UAH', 'одна гривня'],
            [200, 'UAH', 'дві гривні'],
            [500, 'UAH', 'п\'ять гривень'],
            [34000, 'UAH', 'триста сорок гривень'],
            [34100, 'UAH', 'триста сорок одна гривня'],
            [34200, 'RUB', 'триста сорок два рубля'],
            [34400, 'UAH', 'триста сорок чотири гривні'],
            [34500, 'UAH', 'триста сорок п\'ять гривень'],
            [34501, 'UAH', 'триста сорок п\'ять гривень одна копійка'],
            [34552, 'UAH', 'триста сорок п\'ять гривень п\'ятдесят дві копійки'],
            [34599, 'UAH', 'триста сорок п\'ять гривень дев\'яносто дев\'ять копійок'],
            [234200, 'UAH', 'дві тисячі триста сорок дві гривні'],
        ];
    }
}
