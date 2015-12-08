<?php

namespace Kwn\NumberToWords\Model;

use Kwn\NumberToWords\Exception\InvalidArgumentException;

class NumberTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerCreateNewObject
     */
    public function testCreateNewObject($expectedValue, Number $number)
    {
        $this->assertInstanceOf('Kwn\NumberToWords\Model\Number', $number);
        $this->assertSame($expectedValue, $number->getValue());
    }

    public function providerCreateNewObject()
    {
        return [
            [49.991, new Number(49.991)],
            [0.2222, new Number(0.2222)]
        ];
    }

    /**
     * @dataProvider providerValueIsCastedToFloatInConstructor
     */
    public function testValueIsCastedToFloatInConstructor($expectedValue, Number $number)
    {
        $this->assertInternalType('float', $number->getValue());
        $this->assertSame($expectedValue, $number->getValue());
    }

    public function providerValueIsCastedToFloatInConstructor()
    {
        return [
            [40.0, new Number(40)],
            [40.0, new Number('40')],
            [40.0, new Number('40.0')]
        ];
    }

    /**
     * @dataProvider providerGetUnits
     */
    public function testGetUnits($expectedValue, Number $number)
    {
        $this->assertInternalType('integer', $number->getUnits());
        $this->assertEquals($expectedValue, $number->getUnits());
    }

    public function providerGetUnits()
    {
        return [
            [15, new Number(15.10)],
            [0, new Number(0.50)],
            [9999, new Number(9999.9999)]
        ];
    }

    /**
     * @dataProvider providerGetSubunits
     */
    public function testGetSubunits($expectedValue, Number $number)
    {
        $this->assertInternalType('integer', $number->getSubunits());
        $this->assertEquals($expectedValue, $number->getSubunits());
    }

    public function providerGetSubunits()
    {
        return [
            [99, new Number(4119.99)],
            [1097, new Number(9419.01097)],
            [1, new Number(5.00001)],
            [505, new Number(0.005050)],
            [0, new Number(7)]
        ];
    }

    /**
     * @dataProvider providerGetDecimalPlaces
     */
    public function testGetDecimalPlaces($expectedValue, Number $number)
    {
        $this->assertEquals($expectedValue, $number->getDecimalPlaces());
    }

    public function providerGetDecimalPlaces()
    {
        return [
            [5, new Number(5.00001)],
            [6, new Number(5.000011)],
            [1, new Number(5)]
        ];
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testConstructorThrowsExceptionIfValueIsNotNumeric()
    {
        new Number('not numeric');
    }
}
