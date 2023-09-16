<?php

namespace NumberToWords\CurrencyTransformer;

class TurkishCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new TurkishCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [72900, 'USD', 'yedi yüz yirmi dokuz ABD doları'],
            [89400, 'USD', 'sekiz yüz doksan dört ABD doları'],
            [99900, 'USD', 'dokuz yüz doksan dokuz ABD doları'],
            [100000, 'USD', 'bin ABD doları'],
            [100100, 'USD', 'bin bir ABD doları'],
            [109725, 'USD', 'bin doksan yedi ABD doları yirmi beş sent'],
            [110400, 'USD', 'bin yüz dört ABD doları'],
            [124380, 'EUR', 'bin iki yüz kırk üç avro seksen sent'],
            [238500, 'USD', 'iki bin üç yüz seksen beş ABD doları'],
            [376600, 'USD', 'üç bin yedi yüz altmış altı ABD doları'],
            [419645, 'TRL', 'dört bin yüz doksan altı Türk lirası kırk beş kuruş'],
            [419645, 'TRY', 'dört bin yüz doksan altı Türk lirası kırk beş kuruş'],
            [584600, 'USD', 'beş bin sekiz yüz kırk altı ABD doları'],
            [645900, 'USD', 'altı bin dört yüz elli dokuz ABD doları'],
            [723200, 'USD', 'yedi bin iki yüz otuz iki ABD doları'],
            [93829100, 'RUB', 'dokuz yüz otuz sekiz bin iki yüz doksan bir Rus rublesi'],
            [54123100, 'CHF', 'beş yüz kırk bir bin iki yüz otuz bir İsviçre frangı'],
            [43889300, 'CHF', 'dört yüz otuz sekiz bin sekiz yüz doksan üç İsviçre frangı'],
        ];
    }
}
