<?php

namespace Kwn\NumberToWords\Language\Polish\Transformer;

use Kwn\NumberToWords\Language\Polish\Grammar\GrammarCaseSelector;

class NumberTransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerToWords
     */
    public function testToWords($expectedValue, $number)
    {
        $transformer = new NumberTransformer(new GrammarCaseSelector());

        $this->assertEquals($expectedValue, $transformer->toWords($number));
    }

    public function providerToWords()
    {
        return [
            ['zero', 0],
            ['trzy', 3],
            ['trzy', 3.00],
            ['osiem', 8.0],
            ['dziesięć', 10],
            ['dwadzieścia', 20],
            ['pięćdziesiąt', 50],
            ['dziewięćdziesiąt', 90],
            ['dwanaście', 12],
            ['dwadzieścia pięć', 25],
            ['pięćdziesiąt osiem', 58],
            ['dziewięćdziesiąt dziewięć', 99],
            ['sto', 100],
            ['sto dwa', 102],
            ['sto trzynaście', 113],
            ['dwieście dwadzieścia dziewięć', 229.0],
            ['pięćset', 500.00],
            ['sześćset sześćdziesiąt sześć', 666],
            ['sześćset sześćdziesiąt', 660],
            ['jeden tysiąc', 1000],
            ['jeden tysiąc jeden', 1001],
            ['jeden tysiąc dziesięć', 1010],
            ['jeden tysiąc piętnaście', 1015],
            ['jeden tysiąc sto', 1100],
            ['jeden tysiąc sto jedenaście', 1111],
            ['cztery tysiące pięćset trzydzieści osiem', 4538],
            ['pięć tysięcy dwadzieścia', 5020],
            ['jedenaście tysięcy jeden', 11001],
            ['dwadzieścia jeden tysięcy pięćset dwanaście', 21512],
            ['dziewięćdziesiąt tysięcy', 90000],
            ['dziewięćdziesiąt dwa tysiące sto', 92100],
            ['dwieście dwanaście tysięcy sto dwanaście', 212112],
            ['siedemset dwadzieścia tysięcy osiemnaście', 720018],
            ['jeden milion jeden tysiąc jeden', 1001001],
            ['trzy miliony dwieście czterdzieści osiem tysięcy pięćset osiemnaście', 3248518],
        ];
    }
}
