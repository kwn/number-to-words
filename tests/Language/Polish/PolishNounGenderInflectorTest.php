<?php

namespace NumberToWords\Language\Polish;

use PHPUnit\Framework\TestCase;

class PolishNounGenderInflectorTest extends TestCase
{
    private static array $nouns = ['kubek', 'kubki', 'kubków'];

    /**
     * @dataProvider providerItInflectsNounsByNumbers
     */
    public function testItInflectsNounsByNumbers($number, $expectedNoun): void
    {
        $polishInflector = new PolishNounGenderInflector();

        $inflected = $polishInflector->inflectNounByNumber($number, self::$nouns[0], self::$nouns[1], self::$nouns[2]);

        self::assertEquals($expectedNoun, $inflected);
    }

    public function providerItInflectsNounsByNumbers(): array
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
