<?php

namespace NumberToWords\Language\Azerbaijani;

use PHPUnit\Framework\TestCase;

class AzerbaijaniNounGenderInflectorTest extends TestCase
{
    private static array $nouns = ['fincan', 'fincanlar', 'fincanlar'];

    /**
     * @dataProvider providerItInflectsNounsByNumbers
     */
    public function testItInflectsNounsByNumbers($number, $expectedNoun): void
    {
        $azerbaijaniInflector = new AzerbaijaniNounGenderInflector();

        $inflected = $azerbaijaniInflector->inflectNounByNumber($number, self::$nouns[0], self::$nouns[1], self::$nouns[2]);

        self::assertEquals($expectedNoun, $inflected);
    }

    public function providerItInflectsNounsByNumbers(): array
    {
        return [
            [1, 'fincan'],
            [2, 'fincanlar'],
            [3, 'fincanlar'],
            [4, 'fincanlar'],
            [5, 'fincanlar'],
            [6, 'fincanlar'],
            [10, 'fincanlar'],
            [19, 'fincanlar'],
            [20, 'fincanlar'],
            [21, 'fincanlar'],
            [22, 'fincanlar'],
            [24, 'fincanlar'],
            [25, 'fincanlar'],
            [29, 'fincanlar'],
            [101, 'fincanlar'],
            [102, 'fincanlar']
        ];
    }
}
