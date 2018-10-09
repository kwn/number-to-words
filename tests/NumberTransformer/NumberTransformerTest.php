<?php

namespace NumberToWords\NumberTransformer;

use PHPUnit\Framework\TestCase;

abstract class NumberTransformerTest extends TestCase
{
    /** @var NumberTransformer */
    protected $numberTransformer;

    /**
     * @dataProvider providerItConvertsNumbersToWords
     *
     * @param int    $number
     * @param string $expectedString
     */
    public function testItConvertsNumbersToWords($number, $expectedString)
    {
        if (null === $this->numberTransformer) {
            self::markTestIncomplete('Please initialize $numberTransformer property.');
        }

        self::assertEquals($expectedString, $this->numberTransformer->toWords($number));
    }

    abstract public function providerItConvertsNumbersToWords();
}
