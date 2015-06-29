<?php

namespace Kwn\NumberToWords\Model;

class NumberTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateNewObject()
    {
        $number = new Number(49.991);

        $this->assertInstanceOf('Kwn\NumberToWords\Model\Number', $number);
        $this->assertSame(49.991, $number->getValue());
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

    public function testGetUnits()
    {
        $number = new Number(15.10);

        $this->assertInternalType('integer', $number->getUnits());
        $this->assertEquals(15, $number->getUnits());
    }

    public function testGetSubunitsWithTwoDigitsFraction()
    {
        $amount = new Number(4119.99);

        $this->assertInternalType('integer', $amount->getSubunits());
        $this->assertEquals(99, $amount->getSubunits());
    }

    public function testGetSubunitsWithFiveDigitsFraction()
    {
        $amount = new Number(9419.01097);

        $this->assertInternalType('integer', $amount->getSubunits());
        $this->assertEquals(1097, $amount->getSubunits());
    }
}
