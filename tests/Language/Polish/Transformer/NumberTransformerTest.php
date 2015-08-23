<?php

namespace Kwn\NumberToWords\Language\Polish\Transformer;

use Kwn\NumberToWords\Language\Polish\Grammar\GrammarCaseSelector;
use Kwn\NumberToWords\Model\Number;

class NumberTransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NumberTransformer
     */
    private $transformer;

    public function setUp()
    {
        $this->transformer = new NumberTransformer(new GrammarCaseSelector());
    }

    /**
     * @dataProvider providerToWords
     */
    public function testToWords($expectedValue, Number $number)
    {
        $this->assertEquals($expectedValue, $this->transformer->toWords($number));
    }

    public function providerToWords()
    {
        return [
            ['zero', new Number(0)],
            ['trzy', new Number(3)],
            ['trzy', new Number(3.00)],
            ['osiem', new Number(8.0)],
            ['dziesięć', new Number(10)],
            ['dwadzieścia', new Number(20)],
            ['pięćdziesiąt', new Number(50)],
            ['dziewięćdziesiąt', new Number(90)],
            ['dwanaście', new Number(12)],
            ['dwadzieścia pięć', new Number(25)],
            ['pięćdziesiąt osiem', new Number(58)],
            ['dziewięćdziesiąt dziewięć', new Number(99)],
            ['sto', new Number(100)],
            ['sto dwa', new Number(102)],
            ['sto trzynaście', new Number(113)],
            ['dwieście dwadzieścia dziewięć', new Number(229.0)],
            ['pięćset', new Number(500.00)],
            ['sześćset sześćdziesiąt sześć', new Number(666)],
            ['sześćset sześćdziesiąt', new Number(660)],
            ['jeden tysiąc', new Number(1000)],
            ['jeden tysiąc jeden', new Number(1001)],
            ['jeden tysiąc dziesięć', new Number(1010)],
            ['jeden tysiąc piętnaście', new Number(1015)],
            ['jeden tysiąc sto', new Number(1100)],
            ['jeden tysiąc sto jedenaście', new Number(1111)],
            ['cztery tysiące pięćset trzydzieści osiem', new Number(4538)],
            ['pięć tysięcy dwadzieścia', new Number(5020)],
            ['jedenaście tysięcy jeden', new Number(11001)],
            ['dwadzieścia jeden tysięcy pięćset dwanaście', new Number(21512)],
            ['dziewięćdziesiąt tysięcy', new Number(90000)],
            ['dziewięćdziesiąt dwa tysiące sto', new Number(92100)],
            ['dwieście dwanaście tysięcy sto dwanaście', new Number(212112)],
            ['siedemset dwadzieścia tysięcy osiemnaście', new Number(720018)],
            ['jeden milion jeden tysiąc jeden', new Number(1001001)],
            ['trzy miliony dwieście czterdzieści osiem tysięcy pięćset osiemnaście', new Number(3248518)],
        ];
    }
}
