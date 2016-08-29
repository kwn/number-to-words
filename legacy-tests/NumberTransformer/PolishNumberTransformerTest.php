<?php

namespace NumberToWords\NumberTransformer;

class PolishNumberTransformerTest extends \PHPUnit_Framework_TestCase
{

    /** @var PolishNumberTransformer */
    private $numberTransformer;

    public function setUp()
    {
        $this->numberTransformer = new PolishNumberTransformer();
    }

    /**
     * @dataProvider providerItConvertsNumbersToWords
     *
     * @param int    $number
     * @param string $expectedString
     */
    public function testItConvertsNumbersToWords($number, $expectedString)
    {
        self::assertEquals($expectedString, $this->numberTransformer->toWords($number));
    }

    public function providerItConvertsNumbersToWords()
    {
        return [
            [0, 'zero'],
            [1, 'jeden'],
            [2, 'dwa'],
            [3, 'trzy'],
            [4, 'cztery'],
            [5, 'pięć'],
            [6, 'sześć'],
            [7, 'siedem'],
            [8, 'osiem'],
            [9, 'dziewięć'],
            [11, 'jedenaście'],
            [12, 'dwanaście'],
            [16, 'szesnaście'],
            [19, 'dziewiętnaście'],
            [20, 'dwadzieścia'],
            [21, 'dwadzieścia jeden'],
            [26, 'dwadzieścia sześć'],
            [30, 'trzydzieści'],
            [31, 'trzydzieści jeden'],
            [40, 'czterdzieści'],
            [43, 'czterdzieści trzy'],
            [50, 'pięćdziesiąt'],
            [55, 'pięćdziesiąt pięć'],
            [60, 'sześćdziesiąt'],
            [67, 'sześćdziesiąt siedem'],
            [70, 'siedemdziesiąt'],
            [79, 'siedemdziesiąt dziewięć'],
            [100, 'sto'],
            [101, 'sto jeden'],
            [199, 'sto dziewięćdziesiąt dziewięć'],
            [203, 'dwieście trzy'],
            [287, 'dwieście osiemdziesiąt siedem'],
            [300, 'trzysta'],
            [356, 'trzysta pięćdziesiąt sześć'],
            [410, 'czterysta dziesięć'],
            [434, 'czterysta trzydzieści cztery'],
            [578, 'pięćset siedemdziesiąt osiem'],
            [689, 'sześćset osiemdziesiąt dziewięć'],
            [729, 'siedemset dwadzieścia dziewięć'],
            [894, 'osiemset dziewięćdziesiąt cztery'],
            [999, 'dziewięćset dziewięćdziesiąt dziewięć'],
            [1000, 'jeden tysiąc'],
            [1001, 'jeden tysiąc jeden'],
            [1097, 'jeden tysiąc dziewięćdziesiąt siedem'],
            [1104, 'jeden tysiąc sto cztery'],
            [1243, 'jeden tysiąc dwieście czterdzieści trzy'],
            [2385, 'dwa tysiące trzysta osiemdziesiąt pięć'],
            [3766, 'trzy tysiące siedemset sześćdziesiąt sześć'],
            [4196, 'cztery tysiące sto dziewięćdziesiąt sześć'],
            [5846, 'pięć tysięcy osiemset czterdzieści sześć'],
            [6459, 'sześć tysięcy czterysta pięćdziesiąt dziewięć'],
            [7232, 'siedem tysięcy dwieście trzydzieści dwa'],
            [8569, 'osiem tysięcy pięćset sześćdziesiąt dziewięć'],
            [9539, 'dziewięć tysięcy pięćset trzydzieści dziewięć'],
        ];
    }
}
