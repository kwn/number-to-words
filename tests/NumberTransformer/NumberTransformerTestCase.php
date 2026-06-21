<?php

namespace NumberToWords\NumberTransformer;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

abstract class NumberTransformerTestCase extends TestCase
{
    protected NumberTransformer $numberTransformer;

    #[DataProvider('providerItConvertsNumbersToWords')]
    public function testItConvertsNumbersToWords($number, string $expectedString): void
    {
        if (null === $this->numberTransformer) {
            self::markTestIncomplete('Please initialize $numberTransformer property.');
        }

        self::assertEquals($expectedString, $this->numberTransformer->toWords($number));
    }

    abstract public static function providerItConvertsNumbersToWords();
}
