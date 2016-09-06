<?php

namespace NumberToWords\NumberTransformer;

class ItalianNumberTransformerTest extends NumberTransformerTest
{
    public function setUp()
    {
        $this->numberTransformer = new ItalianNumberTransformer();
    }

    public function providerItConvertsNumbersToWords()
    {
        return [
            [0, 'zero'],
            [1, 'uno'],
            [2, 'due'],
            [3, 'tre'],
            [4, 'quattro'],
            [5, 'cinque'],
            [6, 'sei'],
            [7, 'sette'],
            [8, 'otto'],
            [9, 'nove'],
            [11, 'undici'],
            [12, 'dodici'],
            [16, 'sedici'],
            [19, 'diciannove'],
            [20, 'venti'],
            [21, 'ventuno'],
            [26, 'ventisei'],
            [30, 'trenta'],
            [31, 'trentuno'],
            [40, 'quaranta'],
            [43, 'quarantatre'],
            [50, 'cinquanta'],
            [55, 'cinquantacinque'],
            [60, 'sessanta'],
            [67, 'sessantasette'],
            [70, 'settanta'],
            [79, 'settantanove'],
            [100, 'cento'],
            [101, 'centouno'],
            [199, 'centonovantanove'],
            [203, 'duecentotre'],
            [287, 'duecentoottantasette'],
            [300, 'trecento'],
            [356, 'trecentocinquantasei'],
            [410, 'quattrocentodieci'],
            [434, 'quattrocentotrentaquattro'],
            [578, 'cinquecentosettantotto'],
            [689, 'seicentoottantanove'],
            [729, 'settecentoventinove'],
            [894, 'ottocentonovantaquattro'],
            [999, 'novecentonovantanove'],
            [1000, 'mille'],
            [1001, 'milleuno'],
            [1097, 'millenovantasette'],
            [1104, 'millecentoquattro'],
            [1243, 'milleduecentoquarantatre'],
            [2385, 'duemilatrecentoottantacinque'],
            [3766, 'tremilasettecentosessantasei'],
            [4196, 'quattromilacentonovantasei'],
            [5846, 'cinquemilaottocentoquarantasei'],
            [6459, 'seimilaquattrocentocinquantanove'],
            [7232, 'settemiladuecentotrentadue'],
            [8569, 'ottomilacinquecentosessantanove'],
            [9539, 'novemilacinquecentotrentanove'],
        ];
    }
}
