<?php

namespace Kwn\NumberToWords\Model;

class NumberTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateNewObject()
    {
        $number = new Number(49.99);

        $this->assertInstanceOf('Kwn\NumberToWords\Model\Number', $number);
        $this->assertSame(49.99, $number->getValue());
    }

    public function testValueIsCastedToFloatInConstructor()
    {
        $number = new Number(40);

        $this->assertInternalType('float', $number->getValue());
        $this->assertSame(40.0, $number->getValue());

        $number = new Number('40');

        $this->assertInternalType('float', $number->getValue());
        $this->assertSame(40.0, $number->getValue());
    }
}
