<?php

namespace NumberToWords\CurrencyTransformer;

class HungarianCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new HungarianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [0, 'HUF', 'nulla forint'],
            [53, 'HUF', 'nulla forint ötvenhárom fillér'],
            [100, 'HUF', 'egy forint'],
            [103, 'HUF', 'egy forint három fillér'],
            [300, 'HUF', 'három forint'],
            [301, 'HUF', 'három forint egy fillér'],
            [1000, 'HUF', 'tíz forint'],
            [1100, 'HUF', 'tizenegy forint'],
            [1130, 'HUF', 'tizenegy forint harminc fillér'],
            [110000, 'HUF', 'egyezeregyszáz forint'],
            [200000, 'HUF', 'kettőezer forint'],
            [210000, 'HUF', 'kettőezer-egyszáz forint'],
            [99900, 'EUR', 'kilencszázkilencvenkilenc euró'],
            [100054, 'EUR', 'egyezer euró ötvennégy cent'],
            [101000, 'USD', 'egyezertíz dollár'],
            [111111, 'USD', 'egyezeregyszáztizenegy dollár tizenegy cent']
        ];
    }
}
