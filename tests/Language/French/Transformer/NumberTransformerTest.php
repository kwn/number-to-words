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
            ['cinquante', 50],
            ['cinquante-huit', 58],
            ['quatre-vingt-dix', 90],
            ['quatre-vingt-dix et un', 91], // Should be quatre-vingt-onze
            ['quatre-vingt-dix-deux', 92], // Should be quatre-vingt-douze
            ['quatre-vingt-dix-trois', 93], // Should be quatre-vingt-treize
            ['quatre-vingt-dix-quatre', 94], // Should be quatre-vingt-quatorze
            ['quatre-vingt-dix-cinq', 95], // Should be quatre-vingt-quinze
            ['quatre-vingt-dix-six', 96], // Should be quatre-vingt-seize
            ['quatre-vingt-dix-sept', 97],
            ['quatre-vingt-dix-huit', 98],
            ['quatre-vingt-dix-neuf', 99],
            ['cent', 100],
            ['cent deux', 102],
            ['cent treize', 113],
            ['deux cent vingt-neuf', 229.0],
            ['cinq cent', 500.00],
            ['six cent soixante-six', 666],
            ['six cent soixante', 660],
            ['un millier', 1000], // Should be mille
            ['un millier un', 1001], // Should be mille un
            ['un millier dix', 1010], // Should be mille dix
            ['un millier quinze', 1015], // Should be mille quinze
            ['un millier cent', 1100], // Should be mille cent
            ['un millier cent onze', 1111], // Should be mille cent onze
            ['quatre millier cinq cent trente-huit', 4538], // Should be quatre mille cinq cent trente-huit
            ['cinq millier vingt', 5020], // Should be cinq mille vingt
            ['onze millier un', 11001], // Should be onze mille un
            ['vingt et un millier cinq cent douze', 21512], // Should be vingt et un mille cinq cent douze
            ['quatre-vingt-dix millier', 90000], // Should be quatre-vingt-dix mille
            ['quatre-vingt-dix-deux millier cent', 92100], // Should be quatre-vingt-douze mille cent
            ['deux cent douze millier cent douze', 212112], // Should be deux cent douze mille cent douze
            ['sept cent vingt millier dix-huit', 720018], // Should be sept cent vingt mille dix-huit
            ['un million un millier un', 1001001], // Should be un million mille un
            ['trois million deux cent quarante-huit millier cinq cent dix-huit', 3248518], // Should be trois million deux cent quarante-huit mille cinq cent dix-huit
            ['un milliard huit cent million six', 1800000006],
        ];
    }
}
