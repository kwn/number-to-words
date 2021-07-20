<?php

namespace NumberToWords\CurrencyTransformer;

class SpanishCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new SpanishCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [100, 'PLN', 'un zloty'],
            [100, 'DOP', 'un peso dominicano'],
            [200, 'PLN', 'dos zlotys'],
            [200, 'DOP', 'dos pesos dominicanos'],
            [500, 'EUR', 'cinco euros'],
            [10100, 'EUR', 'ciento un euros'],
            [10100, 'DOP', 'ciento un pesos dominicanos'],
            [52481, 'CZK', 'quinientos veinticuatro czech korunas con ochenta y un halerzs'],
            [52481, 'DOP', 'quinientos veinticuatro pesos dominicanos con ochenta y un centavos'],
            [61500, 'NOK', 'seiscientos quince norwegian krones'],
            [154552, 'USD', 'mil quinientos cuarenta y cinco dólares con cincuenta y dos centavos'],
            [304501, 'EUR', 'tres mil cuarenta y cinco euros con un centavo'],
            [100009633, 'DOP', 'un millón noventa y seis pesos dominicanos con treinta y tres centavos'],
            [2100000101, 'DOP', 'veintiún millones un pesos dominicanos con un centavo'],
            [100009633, 'USD', 'un millón noventa y seis dólares con treinta y tres centavos'],
            [2100000101, 'USD', 'veintiún millones un dólares con un centavo'],
        ];
    }
}
