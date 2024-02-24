<?php

namespace NumberToWords\Language\Bulgarian;

use PHPUnit\Framework\TestCase;

class BulgarianNounGenderInflectorTest extends TestCase
{
    private static array $nouns = ['лев', 'лева'];

    /**
     * @dataProvider providerItInflectsNounsByNumbers
     */
    public function testItInflectsNounsByNumbers($number, $expectedNoun): void
    {
        $inflector = new BulgarianNounGenderInflector();

        $inflected = $inflector->inflectNounByNumber($number, self::$nouns[0], self::$nouns[1], self::$nouns[1]);

        self::assertEquals($expectedNoun, $inflected, "Incorrect value: '$number $inflected'!");
    }

    /**
     * @dataProvider providerItInflectsThousandsByNumbers
     */

    public function providerItInflectsNounsByNumbers(): array
    {
        return [
            [1, 'лев'],
            [2, 'лева'],
            [3, 'лева'],
            [4, 'лева'],
            [5, 'лева'],
            [10, 'лева'],
            [11, 'лева'],
            [19, 'лева'],
            [20, 'лева'],
            [21, 'лева'],
            [22, 'лева'],
            [29, 'лева'],
            [31, 'лева'],
            [101, 'лева'],
            [102, 'лева'],
            [1000, 'лева'],
            [1001, 'лева'],
            [2555, 'лева'],
            [2561, 'лева'],
            [10001, 'лева'],
            [100001, 'лева'],
            [1000001, 'лева'],
            [1000000001, 'лева'],
        ];
    }
}
