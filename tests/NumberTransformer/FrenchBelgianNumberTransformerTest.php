<?php

namespace NumberToWords\NumberTransformer;

class FrenchBelgianNumberTransformerTest extends NumberTransformerTest
{
    protected function setUp(): void
    {
        $this->numberTransformer = new FrenchBelgianNumberTransformer();
    }

    public function providerItConvertsNumbersToWords(): array
    {
        return [
            [-1104, 'moins mille cent quatre'],
            [0, 'zéro'],
            [1, 'un'],
            [2, 'deux'],
            [3, 'trois'],
            [4, 'quatre'],
            [5, 'cinq'],
            [6, 'six'],
            [7, 'sept'],
            [8, 'huit'],
            [9, 'neuf'],
            [11, 'onze'],
            [12, 'douze'],
            [16, 'seize'],
            [19, 'dix-neuf'],
            [20, 'vingt'],
            [21, 'vingt et un'],
            [26, 'vingt-six'],
            [30, 'trente'],
            [31, 'trente et un'],
            [40, 'quarante'],
            [43, 'quarante-trois'],
            [50, 'cinquante'],
            [55, 'cinquante-cinq'],
            [60, 'soixante'],
            [67, 'soixante-sept'],
            [70, 'septante'],
            [71, 'septante et un'],
            [79, 'septante-neuf'],
            [80, 'quatre-vingts'],
            [81, 'quatre-vingt-un'],
            [91, 'nonante et un'],
            [100, 'cent'],
            [101, 'cent un'],
            [199, 'cent nonante-neuf'],
            [203, 'deux cent trois'],
            [287, 'deux cent quatre-vingt-sept'],
            [300, 'trois cents'],
            [356, 'trois cent cinquante-six'],
            [410, 'quatre cent dix'],
            [434, 'quatre cent trente-quatre'],
            [578, 'cinq cent septante-huit'],
            [689, 'six cent quatre-vingt-neuf'],
            [729, 'sept cent vingt-neuf'],
            [894, 'huit cent nonante-quatre'],
            [999, 'neuf cent nonante-neuf'],
            [1000, 'mille'],
            [1001, 'mille un'],
            [1097, 'mille nonante-sept'],
            [1104, 'mille cent quatre'],
            [1243, 'mille deux cent quarante-trois'],
            [2385, 'deux mille trois cent quatre-vingt-cinq'],
            [3766, 'trois mille sept cent soixante-six'],
            [4196, 'quatre mille cent nonante-six'],
            [5846, 'cinq mille huit cent quarante-six'],
            [6459, 'six mille quatre cent cinquante-neuf'],
            [7232, 'sept mille deux cent trente-deux'],
            [8569, 'huit mille cinq cent soixante-neuf'],
            [9539, 'neuf mille cinq cent trente-neuf'],
        ];
    }
}
