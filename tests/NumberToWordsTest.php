<?php

namespace NumberToWords;

use NumberToWords\Exception\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class NumberToWordsTest extends TestCase
{
    public function testItThrowsExceptionIfNumberTransformerDoesNotExist(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $numberToWords = new NumberToWords();
        $numberToWords->getNumberTransformer('xx');
    }

    public function testItThrowsExceptionIfCurrencyTransformerDoesNotExist(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $numberToWords = new NumberToWords();
        $numberToWords->getCurrencyTransformer('xx');
    }

    public function testItNumberTransformerAndCurrencyTransformerWithStaticMethods(): void
    {
        $numberToWords = NumberToWords::transformNumber('en', 5120);
        $currencyToWords = NumberToWords::transformCurrency('en', 5099, 'USD');

        $this->assertEquals($numberToWords, 'five thousand one hundred twenty');
        $this->assertEquals($currencyToWords, 'fifty dollars ninety-nine cents');
    }
}
