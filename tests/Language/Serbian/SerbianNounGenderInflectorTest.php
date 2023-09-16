<?php

namespace NumberToWords\Language\Serbian;

use NumberToWords\Language\Polish\PolishNounGenderInflector;
use PHPUnit\Framework\TestCase;

class SerbianNounGenderInflectorTest extends TestCase
{
    private static array $nouns = ['dinar', 'dinara', 'dinara'];

    /**
     * @dataProvider providerItInflectsNounsByNumbers
     */
    public function testItInflectsNounsByNumbers($number, $expectedNoun): void
    {
        $inflector = new SerbianNounGenderInflector();

        $inflected = $inflector->inflectNounByNumber($number, self::$nouns[0], self::$nouns[1], self::$nouns[2]);

        self::assertEquals($expectedNoun, $inflected, "Incorrect value: '$number $inflected'!");
    }

    /**
     * @dataProvider providerItInflectsThousandsByNumbers
     */

    public function providerItInflectsNounsByNumbers(): array
    {
        return [
            [1, 'dinar'],
            [2, 'dinara'],
            [3, 'dinara'],
            [4, 'dinara'],
            [5, 'dinara'],
            [10, 'dinara'],
            [11, 'dinara'],
            [19, 'dinara'],
            [20, 'dinara'],
            [21, 'dinar'],
            [22, 'dinara'],
            [29, 'dinara'],
            [31, 'dinar'],
            [101, 'dinar'],
            [102, 'dinara'],
            [1000, 'dinara'],
            [1001, 'dinar'],
            [2555, 'dinara'],
            [2561, 'dinar'],
            [10001, 'dinar'],
            [100001, 'dinar'],
            [1000001, 'dinar'],
            [1000000001, 'dinar'], // 1 milijarda i 1 dinar
        ];
    }
}
