<?php

namespace NumberToWords\CurrencyTransformer;

use PHPUnit\Framework\TestCase;

abstract class CurrencyTransformerTest extends TestCase
{
    /** @var CurrencyTransformer */
    protected $currencyTransformer;

    /**
     * @dataProvider providerItConvertsMoneyAmountToWords
     *
     * @param float  $amount
     * @param string $currency
     * @param string $expectedString
     */
    public function testItConvertsMoneyAmountToWords($amount, $currency, $expectedString)
    {
        if (null === $this->currencyTransformer) {
            self::markTestIncomplete('Please initialize $currencyTransformer property.');
        }

        self::assertEquals($expectedString, $this->currencyTransformer->toWords($amount, $currency));
    }

    abstract public function providerItConvertsMoneyAmountToWords();
}
