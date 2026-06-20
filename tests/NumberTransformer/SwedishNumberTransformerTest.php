<?php

namespace NumberToWords\NumberTransformer;

class SwedishNumberTransformerTest extends NumberTransformerTest
{
    protected function setUp(): void
    {
        $this->numberTransformer = new SwedishNumberTransformer();
    }

    public function providerItConvertsNumbersToWords(): array
    {
        return [
            [-1000, 'minus en tusen'],
            [-100, 'minus en hundra'],
            [-13, 'minus tretton'],
            [-5, 'minus fem'],
            [0, 'noll'],
            [1, 'en'],
            [9, 'nio'],
            [10, 'tio'],
            [11, 'elva'],
            [12, 'tolv'],
            [13, 'tretton'],
            [14, 'fjorton'],
            [15, 'femton'],
            [16, 'sexton'],
            [17, 'sjutton'],
            [18, 'arton'],
            [19, 'nitton'],
            [20, 'tjugo'],
            [21, 'tjugo en'],
            [30, 'trettio'],
            [40, 'fyrtio'],
            [50, 'femtio'],
            [60, 'sextio'],
            [70, 'sjuttio'],
            [80, 'åttio'],
            [90, 'nittio'],
            [99, 'nittio nio'],
            [100, 'en hundra'],
            [101, 'en hundra en'],
            [111, 'en hundra elva'],
            [120, 'en hundra tjugo'],
            [121, 'en hundra tjugo en'],
            [900, 'nio hundra'],
            [909, 'nio hundra nio'],
            [919, 'nio hundra nitton'],
            [990, 'nio hundra nittio'],
            [999, 'nio hundra nittio nio'],
            [1000, 'en tusen'],
            [2000, 'två tusen'],
            [4000, 'fyra tusen'],
            [5000, 'fem tusen'],
            [11000, 'elva tusen'],
            [21000, 'tjugo en tusen'],
            [999000, 'nio hundra nittio nio tusen'],
            [999999, 'nio hundra nittio nio tusen nio hundra nittio nio'],
            [1000000, 'en miljon'],
            [2000000, 'två miljoner'],
            [5000000, 'fem miljoner'],
        ];
    }
}
