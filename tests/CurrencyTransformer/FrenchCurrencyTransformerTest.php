<?php

namespace NumberToWords\CurrencyTransformer;

class FrenchCurrencyTransformerTest extends CurrencyTransformerTestCase
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new FrenchCurrencyTransformer();
    }

    public static function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [100, 'EUR', 'un euro'],
            [100, 'JPY', 'un yen'],
            [101, 'JPY', 'un yen et un sen'],
            [115, 'JPY', 'un yen et quinze sens'],
            [200, 'EUR', 'deux euros'],
            [235715, 'EUR', 'deux mille trois cent cinquante-sept euros et quinze centimes'],
            [1522501, 'EUR', 'quinze mille deux cent vingt-cinq euros et un centime'],
            [123456789, 'XPF', 'un million deux cent trente-quatre mille cinq cent soixante-sept francs CFP et quatre-vingt-neuf centimes'],
            [754414599, 'AUD', 'sept millions cinq cent quarante-quatre mille cent quarante-cinq dollars australiens et quatre-vingt-dix-neuf cents'],
            [754414599, 'CAD', 'sept millions cinq cent quarante-quatre mille cent quarante-cinq dollars canadiens et quatre-vingt-dix-neuf cents'],
            [754414599, 'USD', 'sept millions cinq cent quarante-quatre mille cent quarante-cinq dollars américains et quatre-vingt-dix-neuf cents'],
            [100, 'GBP', 'un pound'],
            [1000, 'GBP', 'dix pounds'],
            [70001, 'GBP', 'sept cents pounds et un penny'],
            [700010, 'GBP', 'sept mille pounds et dix pence'],
            [500, 'GBP', 'cinq pounds'],
            [10000, 'JPY', 'cent yens'],
            [30050, 'RUB', 'trois cents roubles russes et cinquante kopeks'],
            [20001, 'SAR', 'deux cents riyals saoudiens et un halala'],
            [10099, 'ZAR', 'cent rands sud-africains et quatre-vingt-dix-neuf cents'],
            [50000, 'MXN', 'cinq cents pesos mexicains'],
            [50099, 'MXN', 'cinq cents pesos mexicains et quatre-vingt-dix-neuf centavos'],
        ];
    }
}
