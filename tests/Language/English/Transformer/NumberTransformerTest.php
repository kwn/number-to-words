<?php

namespace Kwn\NumberToWords\Language\English\Transformer;

use Kwn\NumberToWords\Model\Number;
use Kwn\NumberToWords\Language\English\Dictionary\Number as NumberDictionary;

class NumberTransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NumberTransformer
     */
    private $transformer;

    public function setUp()
    {
        $this->transformer = new NumberTransformer(new NumberDictionary);
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
            ['three', new Number(3)],
            ['three', new Number(3.00)],
            ['eight', new Number(8.0)],
            ['ten', new Number(10)],
            ['twenty', new Number(20)],
            ['fifty', new Number(50)],
            ['ninety', new Number(90)],
            ['twelve', new Number(12)],
            ['twenty five', new Number(25)],
            ['fifty eight', new Number(58)],
            ['ninety nine', new Number(99)],
            ['one hundred', new Number(100)],
            ['one hundred two', new Number(102)],
            ['one hundred thirteen', new Number(113)],
            ['two hundred twenty nine', new Number(229.0)],
            ['five hundred', new Number(500.00)],
            ['six hundred sixty six', new Number(666)],
            ['six hundred sixty', new Number(660)],
            ['one thousand', new Number(1000)],
            ['one thousand one', new Number(1001)],
            ['one thousand ten', new Number(1010)],
            ['one thousand fifteen', new Number(1015)],
            ['one thousand one hundred', new Number(1100)],
            ['one thousand one hundred eleven', new Number(1111)],
            ['four thousand five hundred thirty eight', new Number(4538)],
            ['five thousand twenty', new Number(5020)],
            ['eleven thousand one', new Number(11001)],
            ['twenty one thousand five hundred twelve', new Number(21512)],
            ['ninety thousand', new Number(90000)],
            ['ninety two thousand one hundred', new Number(92100)],
            ['two hundred twelve thousand one hundred twelve', new Number(212112)],
            ['seven hundred twenty thousand eighteen', new Number(720018)],
            ['one million one thousand one', new Number(1001001)],
            ['three million two hundred forty eight thousand five hundred eighteen', new Number(3248518)],
            ['one billion eight hundred million six', new Number(1800000006)],
        ];
    }
}
