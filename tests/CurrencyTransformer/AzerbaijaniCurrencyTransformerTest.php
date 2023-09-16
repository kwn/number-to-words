<?php

namespace NumberToWords\CurrencyTransformer;

class AzerbaijaniCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new AzerbaijaniCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [0, 'AZN', 'sıfır manat'],
            [50, 'AZN', 'sıfır manat əlli qəpik'],
            [100, 'AZN', 'bir manat'],
            [115, 'AZN', 'bir manat on beş qəpik'],
            [6474, 'AZN', 'altmış dörd manat yetmiş dörd qəpik'],
            [6574, 'AZN', 'altmış beş manat yetmiş dörd qəpik'],
            [8174, 'AZN', 'səksən bir manat yetmiş dörd qəpik'],
            [8255, 'AZN', 'səksən iki manat əlli beş qəpik'],
            [72900, 'AZN', 'yeddi yüz iyirmi doqquz manat'],
            [89400, 'AZN', 'səkkiz yüz doxsan dörd manat'],
            [99900, 'AZN', 'doqquz yüz doxsan doqquz manat'],
            [100000, 'AZN', 'bir min manat'],
            [100100, 'AZN', 'bir min bir manat'],
            [109725, 'AZN', 'bir min doxsan yeddi manat iyirmi beş qəpik'],
            [110400, 'AZN', 'bir min yüz dörd manat'],
            [124380, 'AZN', 'bir min iki yüz qırx üç manat səksən qəpik'],
            [238500, 'AZN', 'iki min üç yüz səksən beş manat'],
            [376600, 'AZN', 'üç min yeddi yüz altmış altı manat'],
            [419645, 'AZN', 'dörd min yüz doxsan altı manat qırx beş qəpik'],
            [584600, 'AZN', 'beş min səkkiz yüz qırx altı manat'],
            [645900, 'AZN', 'altı min dörd yüz əlli doqquz manat'],
            [723200, 'AZN', 'yeddi min iki yüz otuz iki manat'],
            [-72925, 'AZN', 'mənfi yeddi yüz iyirmi doqquz manat iyirmi beş qəpik'],
            [-89425, 'AZN', 'mənfi səkkiz yüz doxsan dörd manat iyirmi beş qəpik'],
            [-99925, 'AZN', 'mənfi doqquz yüz doxsan doqquz manat iyirmi beş qəpik'],
        ];
    }
}
