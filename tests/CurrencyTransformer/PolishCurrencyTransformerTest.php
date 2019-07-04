<?php

namespace NumberToWords\CurrencyTransformer;

class PolishCurrencyTransformerTest extends CurrencyTransformerTest
{
    public function setUp()
    {
        $this->currencyTransformer = new PolishCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords()
    {
        return [
            //[100, 'CZK', 'jedna korona czeska'],
            [100, 'PLN', 'jeden złoty'],
            [200, 'PLN', 'dwa złote'],
            [500, 'PLN', 'pięć złotych'],
            [52481, 'CZK', 'pięćset dwadzieścia cztery korony czeskie osiemdziesiąt jeden halerzy'],
            [54000, 'PLN', 'pięćset czterdzieści złotych'],
            [54100, 'PLN', 'pięćset czterdzieści jeden złotych'],
            [54200, 'PLN', 'pięćset czterdzieści dwa złote'],
            [54400, 'PLN', 'pięćset czterdzieści cztery złote'],
            [54500, 'PLN', 'pięćset czterdzieści pięć złotych'],
            [54501, 'PLN', 'pięćset czterdzieści pięć złotych jeden grosz'],
            [54552, 'PLN', 'pięćset czterdzieści pięć złotych pięćdziesiąt dwa grosze'],
            [54599, 'PLN', 'pięćset czterdzieści pięć złotych dziewięćdziesiąt dziewięć groszy'],
            [61500, 'NOK', 'sześćset piętnaście koron norweskich'],
            [154552, 'USD', 'jeden tysiąc pięćset czterdzieści pięć dolarów pięćdziesiąt dwa centy'],
            [304501, 'EUR', 'trzy tysiące czterdzieści pięć euro jeden eurocent'],
        ];
    }
}
