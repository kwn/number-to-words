<?php

namespace NumberToWords\CurrencyTransformer;

class SpanishCurrencyTransformerTest extends CurrencyTransformerTest
{
    public function setUp()
    {
        $this->currencyTransformer = new SpanishCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords()
    {
        return [
            [100, 'PLN', 'uno zloty'],
            [200, 'PLN', 'dos zlotys'],
            [500, 'EUR', 'cinco euros'],
            [61500, 'NOK', 'seiscientos quince norwegian krones'],
            [154552, 'USD', 'mil quinientos cuarenta y cinco dólares con cincuenta y dos centavos'],
            [304501, 'EUR', 'tres mil cuarenta y cinco euros con uno centavo'],
            [52481, 'CZK', 'quinientos veinticuatro czech korunas con ochenta y uno halerzs'],
        ];
    }
}
