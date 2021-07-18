<?php

namespace NumberToWords;

use NumberToWords\CurrencyTransformer\CurrencyTransformer;
use NumberToWords\NumberTransformer\NumberTransformer;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NumberToWords\NumberToWords
 */
class NumberToWordsTest extends TestCase
{
    public function testItThrowsExceptionIfNumberTransformerDoesNotExist(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $numberToWords = new NumberToWords();
        $numberToWords->getNumberTransformer('xx');
    }

    public function testItThrowsExceptionIfCurrencyTransformerDoesNotExist(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $numberToWords = new NumberToWords();
        $numberToWords->getCurrencyTransformer('xx');
    }

    public function testItReturnsNumberTransformer(): void
    {
        $numberToWords = new NumberToWords();
        $numberToWordsTransformer = $numberToWords->getNumberTransformer('en');

        Assert::assertInstanceOf(NumberTransformer::class, $numberToWordsTransformer);
    }

    public function testItReturnsCurrencyTransformer(): void
    {
        $numberToWords = new NumberToWords();
        $numberToWordsTransformer = $numberToWords->getCurrencyTransformer('en');

        Assert::assertInstanceOf(CurrencyTransformer::class, $numberToWordsTransformer);
    }
}
