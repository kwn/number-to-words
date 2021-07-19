<?php

namespace NumberToWords\NumberTransformer;

class SlovakNumberTransformerTest extends NumberTransformerTest
{
    protected function setUp(): void
    {
        $this->numberTransformer = new SlovakNumberTransformer();
    }

    public function providerItConvertsNumbersToWords(): array
    {
        return [
            [-5, 'mínus päť'],
            [-128, 'mínus sto dvadsaťosem'],
            [0, 'nula'],
            [1, 'jeden'],
            [2, 'dva'],
            [3, 'tri'],
            [4, 'štyri'],
            [5, 'päť'],
            [6, 'šesť'],
            [7, 'sedem'],
            [8, 'osem'],
            [9, 'deväť'],
            [10, 'desať'],
            [11, 'jedenásť'],
            [12, 'dvanásť'],
            [14, 'štrnásť'],
            [16, 'šestnásť'],
            [19, 'devätnásť'],
            [20, 'dvadsať'],
            [21, 'dvadsaťjeden'],
            [25, 'dvadsaťpäť'],
            [26, 'dvadsaťšesť'],
            [30, 'tridsať'],
            [31, 'tridsať jeden'],
            [40, 'štyridsať'],
        ];
    }
}
