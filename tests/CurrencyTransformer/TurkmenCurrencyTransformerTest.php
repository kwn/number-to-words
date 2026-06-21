<?php

namespace NumberToWords\CurrencyTransformer;

class TurkmenCurrencyTransformerTest extends CurrencyTransformerTestCase
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new TurkmenCurrencyTransformer();
    }

    public static function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [100, 'TMT', 'bir manat'],
            [200, 'USD', 'iki dollar'],
            [500, 'TMT', 'bäş manat'],
            [34000, 'USD', 'üç ýüz kyrk dollar'],
            [34100, 'TMT', 'üç ýüz kyrk bir manat'],
            [34200, 'USD', 'üç ýüz kyrk iki dollar'],
            [34400, 'TMT', 'üç ýüz kyrk dört manat'],
            [34501, 'TMT', 'üç ýüz kyrk bäş manat bir teňňe'],
            [34552, 'TMT', 'üç ýüz kyrk bäş manat elli iki teňňe'],
            [34599, 'USD', 'üç ýüz kyrk bäş dollar togsan dokuz sent'],
            [500, 'EUR', 'bäş ýewro'],
            [100, 'GBP', 'bir britan funty'],
            [300, 'RUB', 'üç Russiýa rubly'],
            [200, 'JPY', 'iki Ýaponiýa ýenasy'],
            [100, 'SAR', 'bir Saud Arabiýasy riýaly'],
        ];
    }
}
