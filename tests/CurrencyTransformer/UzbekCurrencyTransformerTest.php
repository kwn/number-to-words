<?php

namespace NumberToWords\CurrencyTransformer;

class UzbekCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new TurkishCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [6474, 'USD', 'olti ming to\'rt yuz yetmish to\'rt dollar'],
            [-853, 'USD', 'minus sakkiz yuz ellik uch dollar'],
            [72900, 'USD', 'yetmish ikki ming to\'qqiz yuz dollar'],
            [89400, 'USD', 'sakson to\'qqiz ming to\'rt yuz dollar'],
            [99900, 'USD', 'to\'qson to\'qqiz ming to\'qqiz yuz dollar'],
            [100000, 'USD', 'yuz ming dollar'],
            [100100, 'USD', 'yuz ming yuz dollar'],
            [107725, 'USD', 'bir yuz yetti ming yetti yuz yigirma besh dollar'],
            [73828100, 'RUB', 'yetmish uch million sakkiz yuz yigirma sakkiz ming yuz kopiejka'],
            [53123107, 'CHF', 'ellik uch million bir yuz yigirma uch ming bir yuz yetti rapp'],
        ];
    }
}
