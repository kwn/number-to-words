<?php

namespace NumberToWords\CurrencyTransformer;

class MalaysianCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new MalaysianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [6474, 'USD', 'enam puluh empat dolar tujuh puluh empat sen'],
            [6574, 'USD', 'enam puluh lima dolar tujuh puluh empat sen'],
            [8174, 'USD', 'lapan puluh satu dolar tujuh puluh empat sen'],
            [8255, 'USD', 'lapan puluh dua dolar lima puluh lima sen'],
            [72900, 'USD', 'tujuh ratus dua puluh sembilan dolar'],
            [89400, 'USD', 'lapan ratus sembilan puluh empat dolar'],
            [99900, 'USD', 'sembilan ratus sembilan puluh sembilan dolar'],
            [100000, 'USD', 'seribu dolar'],
            [100100, 'USD', 'seribu satu dolar'],
            [109725, 'USD', 'seribu sembilan puluh tujuh dolar dua puluh lima sen'],
            [110400, 'USD', 'seribu seratus empat dolar'],
            [124380, 'EUR', 'seribu dua ratus empat puluh tiga euro lapan puluh sen euro'],
            [238500, 'USD', 'dua ribu tiga ratus lapan puluh lima dolar'],
            [376600, 'USD', 'tiga ribu tujuh ratus enam puluh enam dolar'],
            [419645, 'PLN', 'empat ribu seratus sembilan puluh enam zloty empat puluh lima grosz'],
            [584600, 'USD', 'lima ribu lapan ratus empat puluh enam dolar'],
            [645900, 'USD', 'enam ribu empat ratus lima puluh sembilan dolar'],
            [723200, 'USD', 'tujuh ribu dua ratus tiga puluh dua dolar'],
            [123456789, 'XPF', 'satu juta dua ratus tiga puluh empat ribu lima ratus enam puluh tujuh franc CFP lapan puluh sembilan sen'],
            [-72925, 'USD', 'negatif tujuh ratus dua puluh sembilan dolar dua puluh lima sen'],
            [-89425, 'USD', 'negatif lapan ratus sembilan puluh empat dolar dua puluh lima sen'],
            [-99925, 'USD', 'negatif sembilan ratus sembilan puluh sembilan dolar dua puluh lima sen'],
        ];
    }
}
