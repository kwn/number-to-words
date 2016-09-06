<?php

namespace NumberToWords;

class NumberToWordsTest extends \PHPUnit_Framework_TestCase
{
    public function testItThrowsExceptionIfLanguageDoesNotExist()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        $numberToWords = new NumberToWords();
        $numberToWords->getNumberTransformer('xx');
    }
}
