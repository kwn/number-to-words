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
            [100, 'DOP', 'uno peso dominicano'],
            [200, 'PLN', 'dos zlotys'],
            [200, 'DOP', 'dos pesos dominicanos'],
            [500, 'EUR', 'cinco euros'],
            [52481, 'CZK', 'quinientos veinticuatro czech korunas con ochenta y uno halerzs'],
            [52481, 'DOP', 'quinientos veinticuatro pesos dominicanos con ochenta y uno centavos'],
            [61500, 'NOK', 'seiscientos quince norwegian krones'],
            [154552, 'USD', 'mil quinientos cuarenta y cinco dólares con cincuenta y dos centavos'],
            [304501, 'EUR', 'tres mil cuarenta y cinco euros con uno centavo'],
            [100009633, 'DOP', 'un millón noventa y seis pesos dominicanos con treinta y tres centavos'],
        ];
    }
}
