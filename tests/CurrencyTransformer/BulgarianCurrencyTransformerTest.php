<?php

namespace NumberToWords\CurrencyTransformer;

class BulgarianCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new BulgarianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [100, 'BGN', 'един лев и нула стотинки'],
            [200, 'BGN', 'два лева и нула стотинки'],
            [500, 'BGN', 'пет лева и нула стотинки'],
            [54000, 'BGN', 'петстотин и четиридесет лева и нула стотинки'],
            [54100, 'BGN', 'петстотин четиридесет и един лева и нула стотинки'],
            [54200, 'BGN', 'петстотин четиридесет и два лева и нула стотинки'],
            [54400, 'BGN', 'петстотин четиридесет и четири лева и нула стотинки'],
            [54500, 'BGN', 'петстотин четиридесет и пет лева и нула стотинки'],
            [54501, 'BGN', 'петстотин четиридесет и пет лева и една стотинка'],
            [54552, 'BGN', 'петстотин четиридесет и пет лева и петдесет и две стотинки'],
            [54599, 'BGN', 'петстотин четиридесет и пет лева и деветдесет и девет стотинки'],
            [304501, 'BGN', 'три хиляди четиридесет и пет лева и една стотинка'],
        ];
    }
}
