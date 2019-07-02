<?php

namespace NumberToWords\NumberTransformer;

class LithuanianNumberTransformerTest extends NumberTransformerTest
{
    public function setUp()
    {
        $this->numberTransformer = new LithuanianNumberTransformer();
    }

    public function providerItConvertsNumbersToWords()
    {
        return [
            [0, 'nulis'],
            [1, 'vienas'],
            [9, 'devyni'],
            [10, 'dešimt'],
            [11, 'vienuolika'],
            [19, 'devyniolika'],
            [20, 'dvidešimt'],
            [21, 'dvidešimt vienas'],
            [90, 'devyniasdešimt'],
            [99, 'devyniasdešimt devyni'],
            [100, 'šimtas'],
            [101, 'šimtas vienas'],
            [111, 'šimtas vienuolika'],
            [120, 'šimtas dvidešimt'],
            [121, 'šimtas dvidešimt vienas'],
            [726, 'septyni šimtai dvidešimt šeši'],
            [900, 'devyni šimtai'],
            [909, 'devyni šimtai devyni'],
            [919, 'devyni šimtai devyniolika'],
            [990, 'devyni šimtai devyniasdešimt'],
            [999, 'devyni šimtai devyniasdešimt devyni'],
            [1000, 'tūkstantis'],
            [2000, 'du tūkstančiai'],
            [4000, 'keturi tūkstančiai'],
            [5000, 'penki tūkstančiai'],
            [11000, 'vienuolika tūkstančių'],
            [21000, 'dvidešimt vienas tūkstantis'],
            [999000, 'devyni šimtai devyniasdešimt devyni tūkstančiai'],
            [999999, 'devyni šimtai devyniasdešimt devyni tūkstančiai devyni šimtai devyniasdešimt devyni'],
            [1000000, 'milijonas'], // or "vienas milijonas"
            [2000000, 'du milijonai'],
            [4000000, 'keturi milijonai'],
            [5000000, 'penki milijonai'],
            [999000000, 'devyni šimtai devyniasdešimt devyni milijonai'],
            [999000999, 'devyni šimtai devyniasdešimt devyni milijonai devyni šimtai devyniasdešimt devyni'],
            [999999000, 'devyni šimtai devyniasdešimt devyni milijonai devyni šimtai devyniasdešimt devyni tūkstančiai'],
            [999999999, 'devyni šimtai devyniasdešimt devyni milijonai devyni šimtai devyniasdešimt devyni tūkstančiai devyni šimtai devyniasdešimt devyni'],
            [1174315110, 'bilijonas šimtas septyniasdešimt keturi milijonai trys šimtai penkiolika tūkstančių šimtas dešimt'], // or "vienas bilijonas"
            [1174315119, 'bilijonas šimtas septyniasdešimt keturi milijonai trys šimtai penkiolika tūkstančių šimtas devyniolika'], // or "vienas bilijonas"
            [15174315110, 'penkiolika bilijonų šimtas septyniasdešimt keturi milijonai trys šimtai penkiolika tūkstančių šimtas dešimt'],
            [35174315119, 'trisdešimt penki bilijonai šimtas septyniasdešimt keturi milijonai trys šimtai penkiolika tūkstančių šimtas devyniolika'],
            [935174315119, 'devyni šimtai trisdešimt penki bilijonai šimtas septyniasdešimt keturi milijonai trys šimtai penkiolika tūkstančių šimtas devyniolika'],
            [2935174315119, 'du trilijonai devyni šimtai trisdešimt penki bilijonai šimtas septyniasdešimt keturi milijonai trys šimtai penkiolika tūkstančių šimtas devyniolika'],
        ];
    }
}
