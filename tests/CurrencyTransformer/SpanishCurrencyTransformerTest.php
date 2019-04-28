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
        /*
        $A=[];
        for($x=100;$x<3500;$x+=100){
            for($y=0;$y<35;$y++){
                $A[]=[$x+$y,'MXN', ''];
            }
        }
        return $A;
        */
        return [
            [100, 'MXN', 'un peso'],
            [101, 'MXN', 'un peso con un centavo'],
            [121, 'MXN', 'un peso con veintiun centavos'],
            [2131,'MXN', 'veintiun pesos con treinta y un centavos'],
            [3151,'MXN', 'treinta y un pesos con cincuenta y un centavos'],
        ];
    }
}
