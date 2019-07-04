<?php

namespace NumberToWords\NumberTransformer;

class DanishNumberTransformerTest extends NumberTransformerTest
{
    public function setUp()
    {
        $this->numberTransformer = new DanishNumberTransformer();
    }

    public function providerItConvertsNumbersToWords()
    {
        return [
            [-13, 'minus tretten'],
            [0, 'nul'],
            [1, 'en'],
            [2, 'to'],
            [3, 'tre'],
            [4, 'fire'],
            [5, 'fem'],
            [6, 'seks'],
            [7, 'syv'],
            [8, 'otte'],
            [9, 'ni'],
            [13, 'tretten'],
        ];
    }
}
