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

    public function testFluentCallOfNumberTransformerAndCurrencyTransformer()
    {
        $numberToWords = NumberToWords::numberTransformer('en')->toWords(5120);
        $currencyToWords = NumberToWords::currencyTransformer('en')->toWords(5099, 'USD');

        $this->assertEquals($numberToWords, 'five thousand one hundred twenty');
        $this->assertEquals($currencyToWords, 'fifty dollars ninety-nine cents');
    }
}
