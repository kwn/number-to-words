<?php

namespace NumberToWords;

class NumberToWordsTest extends \PHPUnit_Framework_TestCase
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
}
