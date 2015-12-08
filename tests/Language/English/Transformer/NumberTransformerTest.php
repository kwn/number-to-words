<?php

namespace Kwn\NumberToWords\Language\English\Transformer;

use Kwn\NumberToWords\Language\English\Dictionary\Number as NumberDictionary;

class NumberTransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerToWords
     */
    public function testToWords($expectedValue, $number)
    {
        $transformer = new NumberTransformer(new NumberDictionary);

        $this->assertEquals($expectedValue, $transformer->toWords($number));
    }

    public function providerToWords()
    {
        return [
            ['zero', 0],
            ['three', 3],
            ['three', 3.00],
            ['eight', 8.0],
            ['ten', 10],
            ['twenty', 20],
            ['fifty', 50],
            ['ninety', 90],
            ['twelve', 12],
            ['twenty five', 25],
            ['fifty eight', 58],
            ['ninety nine', 99],
            ['one hundred', 100],
            ['one hundred two', 102],
            ['one hundred thirteen', 113],
            ['two hundred twenty nine', 229.0],
            ['five hundred', 500.00],
            ['six hundred sixty six', 666],
            ['six hundred sixty', 660],
            ['one thousand', 1000],
            ['one thousand one', 1001],
            ['one thousand ten', 1010],
            ['one thousand fifteen', 1015],
            ['one thousand one hundred', 1100],
            ['one thousand one hundred eleven', 1111],
            ['four thousand five hundred thirty eight', 4538],
            ['five thousand twenty', 5020],
            ['eleven thousand one', 11001],
            ['twenty one thousand five hundred twelve', 21512],
            ['ninety thousand', 90000],
            ['ninety two thousand one hundred', 92100],
            ['two hundred twelve thousand one hundred twelve', 212112],
            ['seven hundred twenty thousand eighteen', 720018],
            ['one million one thousand one', 1001001],
            ['three million two hundred forty eight thousand five hundred eighteen', 3248518],
            ['one billion eight hundred million six', 1800000006],
        ];
    }
}
