<?php

namespace NumberToWords\CurrencyTransformer;

class LithuaniaCurrencyTransformerTest extends CurrencyTransformerTest
{
    public function setUp()
    {
        $this->currencyTransformer = new LithuanianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords()
    {
        return array_merge([
            [0, 'EUR', 'nulis eurų ir nulis euro centų'],
            [1, 'EUR', 'nulis eurų ir vienas euro centas'],
            [9, 'EUR', 'nulis eurų ir devyni euro centai'],
            [10, 'EUR', 'nulis eurų ir dešimt euro centų'],
            [11, 'EUR', 'nulis eurų ir vienuolika euro centų'],
            [19, 'EUR', 'nulis eurų ir devyniolika euro centų'],
            [20, 'EUR', 'nulis eurų ir dvidešimt euro centų'],
            [21, 'EUR', 'nulis eurų ir dvidešimt vienas euro centas'],
            [25, 'EUR', 'nulis eurų ir dvidešimt penki euro centai'],
            [30, 'EUR', 'nulis eurų ir trisdešimt euro centų'],
            [99, 'EUR', 'nulis eurų ir devyniasdešimt devyni euro centai'],
            [100, 'EUR', 'vienas euras ir nulis euro centų'],
            [101, 'EUR', 'vienas euras ir vienas euro centas'],
            [103, 'EUR', 'vienas euras ir trys euro centai'],
            [111, 'EUR', 'vienas euras ir vienuolika euro centų'],
            [120, 'EUR', 'vienas euras ir dvidešimt euro centų'],
            [121, 'EUR', 'vienas euras ir dvidešimt vienas euro centas'],
            [726, 'EUR', 'septyni eurai ir dvidešimt šeši euro centai'],
            [850, 'EUR', 'aštuoni eurai ir penkiasdešimt euro centų'],
            [900, 'EUR', 'devyni eurai ir nulis euro centų'],
            [919, 'EUR', 'devyni eurai ir devyniolika euro centų'],
            [930, 'EUR', 'devyni eurai ir trisdešimt euro centų'],
            [990, 'EUR', 'devyni eurai ir devyniasdešimt euro centų'],
            [999, 'EUR', 'devyni eurai ir devyniasdešimt devyni euro centai'],
            [1000, 'EUR', 'dešimt eurų ir nulis euro centų'],
            [1001, 'EUR', 'dešimt eurų ir vienas euro centas'],
            [2000, 'EUR', 'dvidešimt eurų ir nulis euro centų'],
            [3000, 'EUR', 'trisdešimt eurų ir nulis euro centų'],
            [3210, 'EUR', 'trisdešimt du eurai ir dešimt euro centų'],
            [4000, 'EUR', 'keturiasdešimt eurų ir nulis euro centų'],
            [4011, 'EUR', 'keturiasdešimt eurų ir vienuolika euro centų'],
            [7000, 'EUR', 'septyniasdešimt eurų ir nulis euro centų'],
            [11000, 'EUR', 'šimtas dešimt eurų ir nulis euro centų'],
            [21000, 'EUR', 'du šimtai dešimt eurų ir nulis euro centų'],
            [999000, 'EUR', 'devyni tūkstančiai devyni šimtai devyniasdešimt eurų ir nulis euro centų'],
            [999999, 'EUR', 'devyni tūkstančiai devyni šimtai devyniasdešimt devyni eurai ir devyniasdešimt devyni euro centai'],
            [1000000, 'EUR', 'dešimt tūkstančių eurų ir nulis euro centų'],
            [2500001, 'EUR', 'dvidešimt penki tūkstančiai eurų ir vienas euro centas'],

            [1174315110, 'EUR', 'vienuolika milijonų septyni šimtai keturiasdešimt trys tūkstančiai šimtas penkiasdešimt vienas euras ir dešimt euro centų'], // or "vienas bilijonas"
            [1174315119, 'EUR', 'vienuolika milijonų septyni šimtai keturiasdešimt trys tūkstančiai šimtas penkiasdešimt vienas euras ir devyniolika euro centų'], // or "vienas bilijonas"
            [15174315110, 'EUR', 'šimtas penkiasdešimt vienas milijonas septyni šimtai keturiasdešimt trys tūkstančiai šimtas penkiasdešimt vienas euras ir dešimt euro centų'],
            [35174315119, 'EUR', 'trys šimtai penkiasdešimt vienas milijonas septyni šimtai keturiasdešimt trys tūkstančiai šimtas penkiasdešimt vienas euras ir devyniolika euro centų'],
            [935174315119, 'EUR', 'devyni bilijonai trys šimtai penkiasdešimt vienas milijonas septyni šimtai keturiasdešimt trys tūkstančiai šimtas penkiasdešimt vienas euras ir devyniolika euro centų'],
            [222935174315119, 'EUR', 'du trilijonai du šimtai dvidešimt devyni bilijonai trys šimtai penkiasdešimt vienas milijonas septyni šimtai keturiasdešimt trys tūkstančiai šimtas penkiasdešimt vienas euras ir devyniolika euro centų'],
        ], [
            [0, 'LT', 'nulis litų ir nulis lito centų'],
            [1, 'LT', 'nulis litų ir vienas lito centas'],
            [9, 'LT', 'nulis litų ir devyni lito centai'],
            [10, 'LT', 'nulis litų ir dešimt lito centų'],
            [11, 'LT', 'nulis litų ir vienuolika lito centų'],
            [19, 'LT', 'nulis litų ir devyniolika lito centų'],
            [20, 'LT', 'nulis litų ir dvidešimt lito centų'],
            [21, 'LT', 'nulis litų ir dvidešimt vienas lito centas'],
            [25, 'LT', 'nulis litų ir dvidešimt penki lito centai'],
            [30, 'LT', 'nulis litų ir trisdešimt lito centų'],
            [99, 'LT', 'nulis litų ir devyniasdešimt devyni lito centai'],
            [100, 'LT', 'vienas litas ir nulis lito centų'],
            [101, 'LT', 'vienas litas ir vienas lito centas'],
            [103, 'LT', 'vienas litas ir trys lito centai'],
            [111, 'LT', 'vienas litas ir vienuolika lito centų'],
            [120, 'LT', 'vienas litas ir dvidešimt lito centų'],
            [121, 'LT', 'vienas litas ir dvidešimt vienas lito centas'],
            [726, 'LT', 'septyni litai ir dvidešimt šeši lito centai'],
            [850, 'LT', 'aštuoni litai ir penkiasdešimt lito centų'],
            [900, 'LT', 'devyni litai ir nulis lito centų'],
            [919, 'LT', 'devyni litai ir devyniolika lito centų'],
            [930, 'LT', 'devyni litai ir trisdešimt lito centų'],
            [990, 'LT', 'devyni litai ir devyniasdešimt lito centų'],
            [999, 'LT', 'devyni litai ir devyniasdešimt devyni lito centai'],
            [1000, 'LT', 'dešimt litų ir nulis lito centų'],
            [1001, 'LT', 'dešimt litų ir vienas lito centas'],
            [2000, 'LT', 'dvidešimt litų ir nulis lito centų'],
            [3000, 'LT', 'trisdešimt litų ir nulis lito centų'],
            [3210, 'LT', 'trisdešimt du litai ir dešimt lito centų'],
            [4000, 'LT', 'keturiasdešimt litų ir nulis lito centų'],
            [4011, 'LT', 'keturiasdešimt litų ir vienuolika lito centų'],
            [7000, 'LT', 'septyniasdešimt litų ir nulis lito centų'],
            [11000, 'LT', 'šimtas dešimt litų ir nulis lito centų'],
            [21000, 'LT', 'du šimtai dešimt litų ir nulis lito centų'],
            [999000, 'LT', 'devyni tūkstančiai devyni šimtai devyniasdešimt litų ir nulis lito centų'],
            [999999, 'LT', 'devyni tūkstančiai devyni šimtai devyniasdešimt devyni litai ir devyniasdešimt devyni lito centai'],
            [1000000, 'LT', 'dešimt tūkstančių litų ir nulis lito centų'],
            [2500001, 'LT', 'dvidešimt penki tūkstančiai litų ir vienas lito centas'],

            [1174315110, 'LT', 'vienuolika milijonų septyni šimtai keturiasdešimt trys tūkstančiai šimtas penkiasdešimt vienas litas ir dešimt lito centų'], // or "vienas bilijonas"
            [1174315119, 'LT', 'vienuolika milijonų septyni šimtai keturiasdešimt trys tūkstančiai šimtas penkiasdešimt vienas litas ir devyniolika lito centų'], // or "vienas bilijonas"
            [15174315110, 'LT', 'šimtas penkiasdešimt vienas milijonas septyni šimtai keturiasdešimt trys tūkstančiai šimtas penkiasdešimt vienas litas ir dešimt lito centų'],
            [35174315119, 'LT', 'trys šimtai penkiasdešimt vienas milijonas septyni šimtai keturiasdešimt trys tūkstančiai šimtas penkiasdešimt vienas litas ir devyniolika lito centų'],
            [935174315119, 'LT', 'devyni bilijonai trys šimtai penkiasdešimt vienas milijonas septyni šimtai keturiasdešimt trys tūkstančiai šimtas penkiasdešimt vienas litas ir devyniolika lito centų'],
            [222935174315119, 'LT', 'du trilijonai du šimtai dvidešimt devyni bilijonai trys šimtai penkiasdešimt vienas milijonas septyni šimtai keturiasdešimt trys tūkstančiai šimtas penkiasdešimt vienas litas ir devyniolika lito centų'],
        ]);
    }
}
