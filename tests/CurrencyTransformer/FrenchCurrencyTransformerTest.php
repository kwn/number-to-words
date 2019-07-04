<?php

namespace NumberToWords\CurrencyTransformer;

class FrenchCurrencyTransformerTest extends CurrencyTransformerTest
{
    public function setUp()
    {
        $this->currencyTransformer = new FrenchCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords()
    {
        return [
            [100, 'EUR', 'un euro'],
            [200, 'EUR', 'deux euros'],
            [235715, 'EUR', 'deux mille trois cent cinquante-sept euros et quinze centimes'],
            [1522501, 'EUR', 'quinze mille deux cent vingt-cinq euros et un centime'],
            [123456789, 'XPF', 'un million deux cent trente-quatre mille cinq cent soixante-sept francs CFP et quatre-vingt-neuf centimes'],
            [754414599, 'AUD', 'sept millions cinq cent quarante-quatre mille cent quarante-cinq dollars australiens et quatre-vingt-dix-neuf cents'],
            [754414599, 'CAD', 'sept millions cinq cent quarante-quatre mille cent quarante-cinq dollars canadiens et quatre-vingt-dix-neuf cents'],
            [754414599, 'USD', 'sept millions cinq cent quarante-quatre mille cent quarante-cinq dollars américains et quatre-vingt-dix-neuf cents'],
        ];
    }
}
