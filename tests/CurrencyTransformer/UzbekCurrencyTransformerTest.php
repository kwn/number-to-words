<?php

namespace NumberToWords\CurrencyTransformer;

class UzbekCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new UzbekCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            // UZS
            [10657, 'UZS', 'bir yuz olti sum ellik yetti tiyin'],
            [10000, 'UZS', 'bir yuz sum'],
            [20000, 'UZS', 'ikki yuz sum'],
            [30000, 'UZS', 'uch yuz sum'],
            [40000, 'UZS', 'to\'rt yuz sum'],
            [50000, 'UZS', 'besh yuz sum'],
            [60000, 'UZS', 'olti yuz sum'],
            [70000, 'UZS', 'yetti yuz sum'],
            [80000, 'UZS', 'sakkiz yuz sum'],
            [90000, 'UZS', 'to\'qqiz yuz sum'],
            [100000, 'UZS', 'bir ming sum'],
            [200000, 'UZS', 'ikki ming sum'],
            [1000000, 'UZS', 'o\'n ming sum'],
            [1500000, 'UZS', 'o\'n besh ming sum'],
            [1600000, 'UZS', 'o\'n olti ming sum'],
            [1700000, 'UZS', 'o\'n yetti ming sum'],
            [1800000, 'UZS', 'o\'n sakkiz ming sum'],
            [9634598400, 'UZS', 'to\'qson olti million uch yuz qirq besh ming to\'qqiz yuz sakson to\'rt sum'],
            [6238000, 'UZS', 'oltmish ikki ming uch yuz sakson sum'],
            [568661300, 'UZS', 'besh million olti yuz sakson olti ming olti yuz o\'n uch sum'],
            [-984207600, 'UZS', 'minus to\'qqiz million sakkiz yuz qirq ikki ming yetmish olti sum'],

            // USD
            [100, 'USD', 'bir dollar'],
            [5400, 'USD', 'ellik to\'rt dollar'],
            [9054, 'USD', 'to\'qson dollar ellik to\'rt sent'],
            [10000, 'USD', 'bir yuz dollar'],
            [20000, 'USD', 'ikki yuz dollar'],
            [30000, 'USD', 'uch yuz dollar'],
            [40000, 'USD', 'to\'rt yuz dollar'],
            [50000, 'USD', 'besh yuz dollar'],
            [60000, 'USD', 'olti yuz dollar'],
            [70000, 'USD', 'yetti yuz dollar'],
            [80000, 'USD', 'sakkiz yuz dollar'],
            [90000, 'USD', 'to\'qqiz yuz dollar'],
            [100000, 'USD', 'bir ming dollar'],
            [200000, 'USD', 'ikki ming dollar'],
            [1000000, 'USD', 'o\'n ming dollar'],
            [1500000, 'USD', 'o\'n besh ming dollar'],
            [1600000, 'USD', 'o\'n olti ming dollar'],
            [1700000, 'USD', 'o\'n yetti ming dollar'],
            [1800000, 'USD', 'o\'n sakkiz ming dollar'],
            [9634598400, 'USD', 'to\'qson olti million uch yuz qirq besh ming to\'qqiz yuz sakson to\'rt dollar'],

            // RUB
            [100, 'RUB', 'bir rubl'],
            [5400, 'RUB', 'ellik to\'rt rubl'],
            [9054, 'RUB', 'to\'qson rubl ellik to\'rt kopeyka'],
            [100000, 'RUB', 'bir ming rubl'],
            [550000, 'RUB', 'besh ming besh yuz rubl'],
            [876000, 'RUB', 'sakkiz ming yetti yuz oltmish rubl'],
            [1234500, 'RUB', 'o\'n ikki ming uch yuz qirq besh rubl'],
            [2500000, 'RUB', 'yigirma besh ming rubl'],
            [5123000, 'RUB', 'ellik bir ming ikki yuz o\'ttiz rubl'],
            [9999900, 'RUB', 'to\'qson to\'qqiz ming to\'qqiz yuz to\'qson to\'qqiz rubl'],
            [12345600, 'RUB', 'bir yuz yigirma uch ming to\'rt yuz ellik olti rubl']
        ];
    }
}
