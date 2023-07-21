<?php

namespace NumberToWords\CurrencyTransformer;

class SerbianCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new SerbianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [100, 'RSD', 'jedan dinar'],
            [200, 'RSD', 'dva dinara'],
            [500, 'RSD', 'pet dinara'],
            [54000, 'RSD', 'petsto četrdeset dinara'],
            [54100, 'RSD', 'petsto četrdeset jedan dinar'],
            [54200, 'RSD', 'petsto četrdeset dva dinara'],
            [54400, 'RSD', 'petsto četrdeset četiri dinara'],
            [54500, 'RSD', 'petsto četrdeset pet dinara'],
            [54501, 'RSD', 'petsto četrdeset pet dinara jedna para'],
            [54552, 'RSD', 'petsto četrdeset pet dinara pedeset dve pare'],
            [54599, 'RSD', 'petsto četrdeset pet dinara devedeset devet para'],
            [304501, 'EUR', 'tri hiljade četrdeset pet evra jedna cent'],
        ];
    }
}
