<?php

namespace NumberToWords\NumberTransformer;

class DanishNumberTransformerTest extends NumberTransformerTestCase
{
    protected function setUp(): void
    {
        $this->numberTransformer = new DanishNumberTransformer();
    }

    public static function providerItConvertsNumbersToWords(): array
    {
        return [
            [-1000, 'minus et tusind'],
            [-100, 'minus et hundrede'],
            [-21, 'minus en og tyve'],
            [-13, 'minus tretten'],
            [-5, 'minus fem'],
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
            [10, 'ti'],
            [11, 'elleve'],
            [12, 'tolv'],
            [13, 'tretten'],
            [14, 'fjorten'],
            [15, 'femten'],
            [16, 'seksten'],
            [17, 'sytten'],
            [18, 'atten'],
            [19, 'nitten'],
            [20, 'tyve'],
            [21, 'en og tyve'],
            [30, 'tredive'],
            [31, 'en og tredive'],
            [40, 'fyrre'],
            [50, 'halvtreds'],
            [55, 'fem og halvtreds'],
            [60, 'tres'],
            [70, 'halvfjerds'],
            [80, 'firs'],
            [90, 'halvfems'],
            [99, 'ni og halvfems'],
            [100, 'et hundrede'],
            [101, 'et hundrede og en'],
            [200, 'to hundrede'],
            [300, 'tre hundrede'],
            [500, 'fem hundrede'],
            [999, 'ni hundrede og ni og halvfems'],
            [1000, 'et tusind'],
            [2000, 'to tusinde'],
            [5000, 'fem tusinde'],
            [10000, 'ti tusinde'],
            [21000, 'en og tyve tusinde'],
            [100000, 'et hundrede tusinde'],
            [1000000, 'en million'],
            [5000000, 'fem millioner'],
        ];
    }
}
