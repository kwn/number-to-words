<?php

namespace NumberToWords;

use NumberToWords\CurrencyTransformer\CurrencyTransformer;
use NumberToWords\NumberTransformer\NumberTransformer;
use PHPUnit\Framework\TestCase;

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

        self::assertInstanceOf(NumberTransformer::class, $numberToWordsTransformer);
    }

    public function testItReturnsCurrencyTransformer(): void
    {
        $numberToWords = new NumberToWords();
        $numberToWordsTransformer = $numberToWords->getCurrencyTransformer('en');

        self::assertInstanceOf(CurrencyTransformer::class, $numberToWordsTransformer);
    }
}
