<?php

namespace Kwn\NumberToWords\Language\Polish\Transformer;

use Kwn\NumberToWords\Model\Number;

class NumberTransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NumberTransformer
     */
    private $transformer;

    public function setUp()
    {
        $this->transformer = new NumberTransformer();
    }

    public function testTransformOneDigitNumber()
    {
        $this->assertEquals('zero', $this->transformer->toWords(new Number(0)));
        $this->assertEquals('trzy', $this->transformer->toWords(new Number(3)));
        $this->assertEquals('trzy', $this->transformer->toWords(new Number(3.00)));
        $this->assertEquals('osiem', $this->transformer->toWords(new Number(8.0)));
    }

    public function testTransformTwoDigitsNumber()
    {
        $this->assertEquals('dziesięć', $this->transformer->toWords(new Number(10)));
        $this->assertEquals('dwadzieścia', $this->transformer->toWords(new Number(20)));
        $this->assertEquals('pięćdziesiąt', $this->transformer->toWords(new Number(50)));
        $this->assertEquals('dziewięćdziesiąt', $this->transformer->toWords(new Number(90)));
        $this->assertEquals('dwanaście', $this->transformer->toWords(new Number(12)));
        $this->assertEquals('dwadzieścia pięć', $this->transformer->toWords(new Number(25)));
        $this->assertEquals('pięćdziesiąt osiem', $this->transformer->toWords(new Number(58)));
        $this->assertEquals('dziewięćdziesiąt dziewięć', $this->transformer->toWords(new Number(99)));
    }

    public function testTransformThreeDigitsNumber()
    {
        $this->assertEquals('sto', $this->transformer->toWords(new Number(100)));
        $this->assertEquals('sto dwa', $this->transformer->toWords(new Number(102)));
        $this->assertEquals('sto trzynaście', $this->transformer->toWords(new Number(113)));
        $this->assertEquals('dwieście dwadzieścia dziewięć', $this->transformer->toWords(new Number(229.0)));
        $this->assertEquals('pięćset', $this->transformer->toWords(new Number(500.00)));
        $this->assertEquals('sześćset sześćdziesiąt sześć', $this->transformer->toWords(new Number(666)));
        $this->assertEquals('sześćset sześćdziesiąt', $this->transformer->toWords(new Number(660)));
    }

    public function testTransformFourDigitsNumber()
    {
        $this->assertEquals('jeden tysiąc', $this->transformer->toWords(new Number(1000)));
        $this->assertEquals('jeden tysiąc jeden', $this->transformer->toWords(new Number(1001)));
        $this->assertEquals('jeden tysiąc dziesięć', $this->transformer->toWords(new Number(1010)));
        $this->assertEquals('jeden tysiąc piętnaście', $this->transformer->toWords(new Number(1015)));
        $this->assertEquals('jeden tysiąc sto', $this->transformer->toWords(new Number(1100)));
        $this->assertEquals('jeden tysiąc sto jedenaście', $this->transformer->toWords(new Number(1111)));
        $this->assertEquals('cztery tysiące pięćset trzydzieści osiem', $this->transformer->toWords(new Number(4538)));
        $this->assertEquals('pięć tysięcy dwadzieścia', $this->transformer->toWords(new Number(5020)));
    }

    public function testTransformFiveDigitsNumber()
    {
        $this->assertEquals('jedenaście tysięcy jeden', $this->transformer->toWords(new Number(11001)));
        $this->assertEquals('dwadzieścia jeden tysięcy pięćset dwanaście', $this->transformer->toWords(new Number(21512)));
        $this->assertEquals('dziewięćdziesiąt tysięcy', $this->transformer->toWords(new Number(90000)));
        $this->assertEquals('dziewięćdziesiąt dwa tysiące sto', $this->transformer->toWords(new Number(92100)));
    }

    public function testTransformSixDigitsNumber()
    {
        $this->assertEquals('dwieście dwanaście tysięcy sto dwanaście', $this->transformer->toWords(new Number(212112)));
        $this->assertEquals('siedemset dwadzieścia tysięcy osiemnaście', $this->transformer->toWords(new Number(720018)));
    }

    public function testTransformSevenDigitsNumber()
    {
        $this->assertEquals('jeden milion jeden tysiąc jeden', $this->transformer->toWords(new Number(1001001)));
        $this->assertEquals('trzy miliony dwieście czterdzieści osiem tysięcy pięćset osiemnaście', $this->transformer->toWords(new Number(3248518)));
    }
}
