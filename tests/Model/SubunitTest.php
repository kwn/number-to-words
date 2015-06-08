<?php

namespace Kwn\NumberToWords\Model;

use Kwn\NumberToWords\Exception\InvalidArgumentException;

class SubunitTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructWithFormatInWords()
    {
        $subunit = new Subunit(Subunit::FORMAT_IN_WORDS);

        $this->assertEquals(Subunit::FORMAT_IN_WORDS, $subunit->getFormat());
    }

    public function testConstructWithFormatInNumbers()
    {
        $subunit = new Subunit(Subunit::FORMAT_IN_NUMBERS);

        $this->assertEquals(Subunit::FORMAT_IN_NUMBERS, $subunit->getFormat());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testConstructWithUnexistingFormat()
    {
        new Subunit('format');
    }
}
