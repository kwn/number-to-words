<?php

namespace NumberToWords\Grammar\Inflector;

use NumberToWords\Language\Polish\PolishNounGenderInflector;
use PHPUnit\Framework\TestCase;

class PolishInflectorTest extends TestCase
{
    private static $nouns = ['kubek', 'kubki', 'kubków'];

    /**
     * @dataProvider providerItInflectsNounsByNumbers
     */
    public function testItInflectsNounsByNumbers($number, $expectedNoun)
    {
        $polishInflector = new PolishNounGenderInflector();

        $inflected = $polishInflector->inflectNounByNumber($number, self::$nouns[0], self::$nouns[1], self::$nouns[2]);

        self::assertEquals($expectedNoun, $inflected);
    }

    public function providerItInflectsNounsByNumbers()
    {
        return [
            [1, 'kubek'],
            [2, 'kubki'],
            [3, 'kubki'],
            [4, 'kubki'],
            [5, 'kubków'],
            [6, 'kubków'],
            [10, 'kubków'],
            [19, 'kubków'],
            [20, 'kubków'],
            [21, 'kubków'],
            [22, 'kubki'],
            [24, 'kubki'],
            [25, 'kubków'],
            [29, 'kubków'],
            [101, 'kubków'],
            [102, 'kubki']
        ];
    }
}
