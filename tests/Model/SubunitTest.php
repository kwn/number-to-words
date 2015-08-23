<?php

namespace Kwn\NumberToWords\Model;

use Kwn\NumberToWords\Exception\InvalidArgumentException;

class SubunitTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructWithFormatInWords()
    {
        $subunit = new SubunitFormat(SubunitFormat::WORDS);

        $this->assertEquals(SubunitFormat::WORDS, $subunit->getFormat());
    }

    public function testConstructWithFormatInNumbers()
    {
        $subunit = new SubunitFormat(SubunitFormat::NUMBERS);

        $this->assertEquals(SubunitFormat::NUMBERS, $subunit->getFormat());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testConstructWithUnexistingFormat()
    {
        new SubunitFormat('unexisting format');
    }
}
