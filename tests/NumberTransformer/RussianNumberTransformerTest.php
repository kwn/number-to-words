<?php

namespace NumberToWords\NumberTransformer;

class RussianNumberTransformerTest extends NumberTransformerTest
{
    public function setUp()
    {
        $this->numberTransformer = new RussianNumberTransformer();
    }

    public function providerItConvertsNumbersToWords()
    {
        return [
            [-21, 'минус двадцать один'],
            [0, 'ноль'],
            [1, 'один'],
            [3, 'три'],
            [8, 'восемь'],
            [9, 'девять'],
            [10, 'десять'],
            [11, 'одиннадцать'],
            [12, 'двенадцать'],
            [19, 'девятнадцать'],
            [20, 'двадцать'],
            [21, 'двадцать один'],
            [25, 'двадцать пять'],
            [50, 'пятьдесят'],
            [58, 'пятьдесят восемь'],
            [90, 'девяносто'],
            [99, 'девяносто девять'],
            [100, 'сто'],
            [101, 'сто один'],
            [102, 'сто два'],
            [111, 'сто одиннадцать'],
            [113, 'сто тринадцать'],
            [120, 'сто двадцать'],
            [121, 'сто двадцать один'],
            [229, 'двести двадцать девять'],
            [500, 'пятьсот'],
            [660, 'шестьсот шестьдесят'],
            [666, 'шестьсот шестьдесят шесть'],
            [900, 'девятьсот'],
            [909, 'девятьсот девять'],
            [919, 'девятьсот девятнадцать'],
            [990, 'девятьсот девяносто'],
            [999, 'девятьсот девяносто девять'],
            [1000, 'одна тысяча'],
            [1001, 'одна тысяча один'],
            [1010, 'одна тысяча десять'],
            [1015, 'одна тысяча пятнадцать'],
            [1100, 'одна тысяча сто'],
            [1111, 'одна тысяча сто одиннадцать'],
            [2000, 'две тысячи'],
            [4000, 'четыре тысячи'],
            [4538, 'четыре тысячи пятьсот тридцать восемь'],
            [5000, 'пять тысяч'],
            [5020, 'пять тысяч двадцать'],
            [7700, 'семь тысяч семьсот'],
            [11000, 'одиннадцать тысяч'],
            [11001, 'одиннадцать тысяч один'],
            [21000, 'двадцать одна тысяча'],
            [21512, 'двадцать одна тысяча пятьсот двенадцать'],
            [90000, 'девяносто тысяч'],
            [92100, 'девяносто две тысячи сто'],
            [212112, 'двести двенадцать тысяч сто двенадцать'],
            [720018, 'семьсот двадцать тысяч восемнадцать'],
            [999000, 'девятьсот девяносто девять тысяч'],
            [999999, 'девятьсот девяносто девять тысяч девятьсот девяносто девять'],
            [1000000, 'один миллион'],
            [1001001, 'один миллион одна тысяча один'],
            [2000000, 'два миллиона'],
            [3248518, 'три миллиона двести сорок восемь тысяч пятьсот восемнадцать'],
            [4000000, 'четыре миллиона'],
            [5000000, 'пять миллионов'],
            [5000001, 'пять миллионов один'],
            [999000000, 'девятьсот девяносто девять миллионов'],
            [999000999, 'девятьсот девяносто девять миллионов девятьсот девяносто девять'],
            [999999000, 'девятьсот девяносто девять миллионов девятьсот девяносто девять тысяч'],
            [999999999, 'девятьсот девяносто девять миллионов девятьсот девяносто девять тысяч девятьсот девяносто девять'],
            [1174315110, 'один миллиард сто семьдесят четыре миллиона триста пятнадцать тысяч сто десять'],
            [1174315119, 'один миллиард сто семьдесят четыре миллиона триста пятнадцать тысяч сто девятнадцать'],
            [15174315110, 'пятнадцать миллиардов сто семьдесят четыре миллиона триста пятнадцать тысяч сто десять'],
            [35174315119, 'тридцать пять миллиардов сто семьдесят четыре миллиона триста пятнадцать тысяч сто девятнадцать'],
            [935174315119, 'девятьсот тридцать пять миллиардов сто семьдесят четыре миллиона триста пятнадцать тысяч сто девятнадцать'],
            [2935174315119, 'два триллиона девятьсот тридцать пять миллиардов сто семьдесят четыре миллиона триста пятнадцать тысяч сто девятнадцать'],
        ];
    }
}
