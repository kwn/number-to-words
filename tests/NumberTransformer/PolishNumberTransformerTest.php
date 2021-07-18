<?php

namespace NumberToWords\NumberTransformer;

/**
 * @covers \NumberToWords\NumberTransformer\PolishNumberTransformer
 */
class PolishNumberTransformerTest extends NumberTransformerTest
{
    protected function setUp(): void
    {
        $this->numberTransformer = new PolishNumberTransformer();
    }

    public function providerItConvertsNumbersToWords(): array
    {
        return [
            [-5, 'minus pięć'],
            [-128, 'minus sto dwadzieścia osiem'],
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
            [10, 'dziesięć'],
            [11, 'jedenaście'],
            [12, 'dwanaście'],
            [14, 'czternaście'],
            [16, 'szesnaście'],
            [19, 'dziewiętnaście'],
            [20, 'dwadzieścia'],
            [21, 'dwadzieścia jeden'],
            [25, 'dwadzieścia pięć'],
            [26, 'dwadzieścia sześć'],
            [30, 'trzydzieści'],
            [31, 'trzydzieści jeden'],
            [40, 'czterdzieści'],
            [43, 'czterdzieści trzy'],
            [50, 'pięćdziesiąt'],
            [55, 'pięćdziesiąt pięć'],
            [58, 'pięćdziesiąt osiem'],
            [60, 'sześćdziesiąt'],
            [67, 'sześćdziesiąt siedem'],
            [70, 'siedemdziesiąt'],
            [79, 'siedemdziesiąt dziewięć'],
            [90, 'dziewięćdziesiąt'],
            [99, 'dziewięćdziesiąt dziewięć'],
            [100, 'sto'],
            [101, 'sto jeden'],
            [102, 'sto dwa'],
            [113, 'sto trzynaście'],
            [199, 'sto dziewięćdziesiąt dziewięć'],
            [203, 'dwieście trzy'],
            [229, 'dwieście dwadzieścia dziewięć'],
            [287, 'dwieście osiemdziesiąt siedem'],
            [300, 'trzysta'],
            [356, 'trzysta pięćdziesiąt sześć'],
            [410, 'czterysta dziesięć'],
            [434, 'czterysta trzydzieści cztery'],
            [500, 'pięćset'],
            [578, 'pięćset siedemdziesiąt osiem'],
            [660, 'sześćset sześćdziesiąt'],
            [666, 'sześćset sześćdziesiąt sześć'],
            [689, 'sześćset osiemdziesiąt dziewięć'],
            [729, 'siedemset dwadzieścia dziewięć'],
            [894, 'osiemset dziewięćdziesiąt cztery'],
            [999, 'dziewięćset dziewięćdziesiąt dziewięć'],
            [1000, 'jeden tysiąc'],
            [1001, 'jeden tysiąc jeden'],
            [1010, 'jeden tysiąc dziesięć'],
            [1015, 'jeden tysiąc piętnaście'],
            [1097, 'jeden tysiąc dziewięćdziesiąt siedem'],
            [1100, 'jeden tysiąc sto'],
            [1104, 'jeden tysiąc sto cztery'],
            [1111, 'jeden tysiąc sto jedenaście'],
            [1243, 'jeden tysiąc dwieście czterdzieści trzy'],
            [2385, 'dwa tysiące trzysta osiemdziesiąt pięć'],
            [3766, 'trzy tysiące siedemset sześćdziesiąt sześć'],
            [4196, 'cztery tysiące sto dziewięćdziesiąt sześć'],
            [4538, 'cztery tysiące pięćset trzydzieści osiem'],
            [5020, 'pięć tysięcy dwadzieścia'],
            [5846, 'pięć tysięcy osiemset czterdzieści sześć'],
            [6459, 'sześć tysięcy czterysta pięćdziesiąt dziewięć'],
            [7232, 'siedem tysięcy dwieście trzydzieści dwa'],
            [8569, 'osiem tysięcy pięćset sześćdziesiąt dziewięć'],
            [9539, 'dziewięć tysięcy pięćset trzydzieści dziewięć'],
            [11001, 'jedenaście tysięcy jeden'],
            [21512, 'dwadzieścia jeden tysięcy pięćset dwanaście'],
            [90000, 'dziewięćdziesiąt tysięcy'],
            [92100, 'dziewięćdziesiąt dwa tysiące sto'],
            [212112, 'dwieście dwanaście tysięcy sto dwanaście'],
            [720018, 'siedemset dwadzieścia tysięcy osiemnaście'],
            [1001001, 'jeden milion jeden tysiąc jeden'],
            [3248518, 'trzy miliony dwieście czterdzieści osiem tysięcy pięćset osiemnaście'],
            [247000000000, 'dwieście czterdzieści siedem miliardów'],
        ];
    }
}
