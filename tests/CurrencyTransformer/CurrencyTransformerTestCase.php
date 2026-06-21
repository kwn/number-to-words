<?php

namespace NumberToWords\CurrencyTransformer;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

abstract class CurrencyTransformerTestCase extends TestCase
{
    protected CurrencyTransformer $currencyTransformer;

    #[DataProvider('providerItConvertsMoneyAmountToWords')]
    public function testItConvertsMoneyAmountToWords(float $amount, string $currency, string $expectedString): void
    {
        if (null === $this->currencyTransformer) {
            self::markTestIncomplete('Please initialize $currencyTransformer property.');
        }

        self::assertEquals($expectedString, $this->currencyTransformer->toWords($amount, $currency));
    }

    abstract public static function providerItConvertsMoneyAmountToWords(): array;
}
