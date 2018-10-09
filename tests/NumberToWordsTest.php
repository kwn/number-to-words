<?php

namespace NumberToWords;

use NumberToWords\CurrencyTransformer\CurrencyTransformer;
use NumberToWords\NumberTransformer\NumberTransformer;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class NumberToWordsTest extends TestCase
{
    public function testItThrowsExceptionIfNumberTransformerDoesNotExist()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        $numberToWords = new NumberToWords();
        $numberToWords->getNumberTransformer('xx');
    }

    public function testItThrowsExceptionIfCurrencyTransformerDoesNotExist()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        $numberToWords = new NumberToWords();
        $numberToWords->getCurrencyTransformer('xx');
    }

    public function testItReturnsNumberTransformer()
    {
        $numberToWords = new NumberToWords();
        $numberToWordsTransformer = $numberToWords->getNumberTransformer('en');

        Assert::assertInstanceOf(NumberTransformer::class, $numberToWordsTransformer);
    }

    public function testItReturnsCurrencyTransformer()
    {
        $numberToWords = new NumberToWords();
        $numberToWordsTransformer = $numberToWords->getCurrencyTransformer('en');

        Assert::assertInstanceOf(CurrencyTransformer::class, $numberToWordsTransformer);
    }
}
