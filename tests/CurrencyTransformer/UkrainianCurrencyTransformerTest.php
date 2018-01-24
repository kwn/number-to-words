<?php

namespace NumberToWords\CurrencyTransformer;

class UkrainianCurrencyTransformerTest extends CurrencyTransformerTest
{
    public function setUp()
    {
        $this->currencyTransformer = new UkrainianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords()
    {
        return [
            [100, 'UAH', 'одна гривна'],
            [200, 'UAH', 'дві гривні'],
            [500, 'UAH', 'п\'ять гривень'],
            [34000, 'UAH', 'триста сорок гривень'],
            [34100, 'UAH', 'триста сорок одна гривна'],
            [34200, 'RUB', 'триста сорок два рубля'],
            [34400, 'UAH', 'триста сорок чотири гривні'],
            [34500, 'UAH', 'триста сорок п\'ять гривень'],
            [34552, 'UAH', 'триста сорок п\'ять гривень п\'ятдесят два копійки'],
            [34501, 'UAH', 'триста сорок п\'ять гривень один копійка'],
            [34599, 'UAH', 'триста сорок п\'ять гривень дев\'яносто дев\'ять копійок'],
        ];
    }
}
