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
            [100, 'BGN', 'един лев'],
            [200, 'BGN', 'два лева'],
            [500, 'BGN', 'пет лева'],
            [54000, 'BGN', 'петстотин и четиридесет лева'],
            [54100, 'BGN', 'петстотин четиридесет и един лева'],
            [54200, 'BGN', 'петстотин четиридесет и два лева'],
            [54400, 'BGN', 'петстотин четиридесет и четири лева'],
            [54500, 'BGN', 'петстотин четиридесет и пет лева'],
            [54501, 'BGN', 'петстотин четиридесет и пет лева и една стотинка'],
            [54552, 'BGN', 'петстотин четиридесет и пет лева и петдесет и две стотинки'],
            [54599, 'BGN', 'петстотин четиридесет и пет лева и деветдесет и девет стотинки'],
            [304501, 'BGN', 'три хиляди четиридесет и пет лева и една стотинка'],
        ];
    }
}
