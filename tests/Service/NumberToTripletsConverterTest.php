<?php

namespace NumberToWords\Service;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class NumberToTripletsConverterTest extends TestCase
{
    #[DataProvider('providerItConvertsNumberToTriplets')]
    public function testItConvertsNumberToTriplets($number, array $expectedArray): void
    {
        $numberToTripletsConverter = new NumberToTripletsConverter();

        $triplets = $numberToTripletsConverter->convertToTriplets($number);

        self::assertEquals($expectedArray, $triplets);
    }

    public static function providerItConvertsNumberToTriplets(): array
    {
        return [
            [123, [123]],
            [1234, [1, 234]],
            [22333, [22, 333]],
            [1222333, [1, 222, 333]],
            [111222333444, [111, 222, 333, 444]],
        ];
    }
}
