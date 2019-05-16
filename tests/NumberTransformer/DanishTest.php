<?php

namespace NumberToWords\NumberTransformer;

class DanishTest extends NumberTransformerTest
{
    public function setUp(): void
    {
        $this->numberTransformer = new Danish();
    }

    public function providerItConvertsNumbersToWords(): array
    {
        return [
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
            [-13, 'minus tretten'],
        ];
    }
}
