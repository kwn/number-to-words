<?php

namespace NumberToWords\NumberTransformer;

class SlovakNumberTransformerTest extends NumberTransformerTestCase
{
    protected function setUp(): void
    {
        $this->numberTransformer = new SlovakNumberTransformer();
    }

    public static function providerItConvertsNumbersToWords(): array
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
            [50, 'päťdesiat'],
            [55, 'päťdesiat päť'],
            [60, 'šesťdesiat'],
            [70, 'sedemdesiat'],
            [79, 'sedemdesiat deväť'],
            [80, 'osemdesiat'],
            [90, 'deväťdesiat'],
            [99, 'deväťdesiat deväť'],
            [100, 'sto'],
            [111, 'sto jedenásť'],
            [200, 'dvesto'],
            [500, 'päťsto'],
            [999, 'deväťsto deväťdesiat deväť'],
            [1000, 'jeden tisíc'],
            [2000, 'dva tisíce'],
            [5000, 'päť tisíc'],
            [11000, 'jedenásť tisíc'],
            [21000, 'dvadsaťjeden tisíc'],
            [100000, 'sto tisíc'],
            [999999, 'deväťsto deväťdesiat deväť tisíc deväťsto deväťdesiat deväť'],
            [1000000, 'jeden milión'],
            [2000000, 'dva milióny'],
            [5000000, 'päť miliónov'],
        ];
    }
}
