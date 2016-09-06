<?php

namespace NumberToWords\CurrencyTransformer;

abstract class CurrencyTransformerTest extends \PHPUnit_Framework_TestCase
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
