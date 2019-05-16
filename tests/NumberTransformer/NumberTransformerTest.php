<?php

namespace NumberToWords\NumberTransformer;

use PHPUnit\Framework\TestCase;

abstract class NumberTransformerTest extends TestCase
{
    /** @var NumberTransformer */
    protected $numberTransformer;

    /**
     * @dataProvider providerItConvertsNumbersToWords
     */
    public function testItConvertsNumbersToWords(int $number, string $expectedString): void
    {
        if (null === $this->numberTransformer) {
            self::markTestIncomplete('Please initialize $numberTransformer property.');
        }

        self::assertEquals($expectedString, $this->numberTransformer->toWords($number));
    }

    abstract public function providerItConvertsNumbersToWords(): array;
}
