<?php

namespace NumberToWords\NumberTransformer;

class TurkishNumberTransformerTest extends NumberTransformerTest
{
    public function setUp()
    {
        $this->numberTransformer = new TurkishNumberTransformer();
    }

    public function providerItConvertsNumbersToWords()
    {
        return [
            [0, 'sıfır'],
            [1, 'bir'],
            [9, 'dokuz'],
            [10, 'on'],
            [11, 'on bir'],
            [19, 'on dokuz'],
            [20, 'yirmi'],
            [21, 'yirmi bir'],
            [80, 'seksen'],
            [90, 'doksan'],
            [99, 'doksan dokuz'],
            [100, 'yüz'],
            [101, 'yüz bir'],
            [111, 'yüz on bir'],
            [120, 'yüz yirmi'],
            [121, 'yüz yirmi bir'],
            [900, 'dokuz yüz'],
            [909, 'dokuz yüz dokuz'],
            [919, 'dokuz yüz on dokuz'],
            [990, 'dokuz yüz doksan'],
            [999, 'dokuz yüz doksan dokuz'],
            [1000, 'bin'],
            [1001, 'bin bir'],
            [1020, 'bin yirmi'],
            [2000, 'iki bin'],
            [4000, 'dört bin'],
            [5000, 'beş bin'],
            [11000, 'on bir bin'],
            [21000, 'yirmi bir bin'],
            [102100, 'yüz iki bin yüz'],
            [999000, 'dokuz yüz doksan dokuz bin'],
            [999999, 'dokuz yüz doksan dokuz bin dokuz yüz doksan dokuz'],
            [1000000, 'bir milyon'],
            [2000000, 'iki milyon'],
            [4000000, 'dört milyon'],
            [5000000, 'beş milyon'],
            [98320561, 'doksan sekiz milyon üç yüz yirmi bin beş yüz altmış bir'],
            [999000000, 'dokuz yüz doksan dokuz milyon'],
            [999000999, 'dokuz yüz doksan dokuz milyon dokuz yüz doksan dokuz'],
            [999999000, 'dokuz yüz doksan dokuz milyon dokuz yüz doksan dokuz bin'],
            [999999999, 'dokuz yüz doksan dokuz milyon dokuz yüz doksan dokuz bin dokuz yüz doksan dokuz'],
            [1174315110, 'bir milyar yüz yetmiş dört milyon üç yüz on beş bin yüz on'],
            [1174315119, 'bir milyar yüz yetmiş dört milyon üç yüz on beş bin yüz on dokuz'],
            [15174315119, 'on beş milyar yüz yetmiş dört milyon üç yüz on beş bin yüz on dokuz'],
            [35174315119, 'otuz beş milyar yüz yetmiş dört milyon üç yüz on beş bin yüz on dokuz'],
            [935174315119, 'dokuz yüz otuz beş milyar yüz yetmiş dört milyon üç yüz on beş bin yüz on dokuz'],
            [2935174315119, 'iki trilyon dokuz yüz otuz beş milyar yüz yetmiş dört milyon üç yüz on beş bin yüz on dokuz'],
        ];
    }
}
