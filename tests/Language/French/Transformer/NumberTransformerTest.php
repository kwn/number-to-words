<?php

namespace Kwn\NumberToWords\Language\French\Transformer;

use Kwn\NumberToWords\Language\French\Dictionary\Number as NumberDictionary;

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
            ['zéro', 0],
            ['trois', 3],
            ['trois', 3.00],
            ['huit', 8.0],
            ['dix', 10],
            ['douze', 12],
            ['vingt', 20],
            ['vingt-cinq', 25],
            ['trente et un', 31],
            ['cinquante', 50],
            ['cinquante-huit', 58],
            ['soixante-dix', 70],
            ['soixante et onze', 71],
            ['soixante-douze', 72],
            ['quatre-vingts', 80],
            ['quatre-vingt-un', 81],
            ['quatre-vingt-deux', 82],
            ['quatre-vingt-dix', 90],
            ['quatre-vingt-onze', 91],
            ['quatre-vingt-douze', 92],
            ['cent', 100],
            ['cent deux', 102],
            ['cent treize', 113],
            ['deux cent vingt-neuf', 229.0],
            ['cinq cent', 500.00],
            ['six cent soixante-six', 666],
            ['six cent soixante', 660],
            ['mille', 1000],
            ['mille un', 1001],
            ['mille dix', 1010],
            ['mille quinze', 1015],
            ['mille cent', 1100],
            ['mille cent onze', 1111],
            ['quatre mille cinq cent trente-huit', 4538],
            ['cinq mille vingt', 5020],
            ['onze mille un', 11001],
            ['vingt et un mille cinq cent douze', 21512],
            ['quatre-vingt-dix mille', 90000],
            ['quatre-vingt-douze mille cent', 92100],
            ['deux cent douze mille cent douze', 212112],
            ['sept cent vingt mille dix-huit', 720018],
            ['un million mille un', 1001001],
            ['trois million deux cent quarante-huit mille cinq cent dix-huit', 3248518],
            ['un milliard huit cent million six', 1800000006],
        ];
    }
}
