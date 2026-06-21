<?php

namespace NumberToWords\CurrencyTransformer;

class UkrainianCurrencyTransformerTest extends CurrencyTransformerTestCase
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new UkrainianCurrencyTransformer();
    }

    public static function providerItConvertsMoneyAmountToWords(): array
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
            [300, 'SAR', 'три саудівських ріяла'],
            [100, 'AED', 'один дирхам ОАЕ'],
            [500, 'NGN', 'п\'ять нігерійських найр'],
        ];
    }
}
