<?php

namespace NumberToWords\NumberTransformer;

abstract class NumberTransformerTest extends \PHPUnit_Framework_TestCase
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
