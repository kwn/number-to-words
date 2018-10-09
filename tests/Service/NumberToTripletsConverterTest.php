<?php

namespace NumberToWords\Service;

use PHPUnit\Framework\TestCase;

class NumberToTripletsConverterTest extends TestCase
{
    /**
     * @dataProvider providerItConvertsNumberToTriplets
     */
    public function testItConvertsNumberToTriplets($number, array $expectedArray)
    {
        $numberToTripletsConverter = new NumberToTripletsConverter();

        $triplets = $numberToTripletsConverter->convertToTriplets($number);

        self::assertEquals($expectedArray, $triplets);
    }

    public function providerItConvertsNumberToTriplets()
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
