<?php

namespace Kwn\NumberToWords\Model;

class AmountTest extends \PHPUnit_Framework_TestCase
{
    public function testNumberIsNormalizedFromUp()
    {
        $amount = new Amount(new Number(19.99999), new Currency('PLN'), new SubunitFormat(SubunitFormat::NUMBERS));

        $this->assertEquals(99, $amount->getNumber()->getSubunits());
    }

    public function testNumberIsNormalizedFromDown()
    {
        $amount = new Amount(new Number(55.122112), new Currency('GBP'), new SubunitFormat(SubunitFormat::NUMBERS));

        $this->assertEquals(12, $amount->getNumber()->getSubunits());
    }

    public function testSubunitFormatIsSetToDefaultIfNotSpecified()
    {
        $amount = new Amount(new Number(5), new Currency('USD'));

        $this->assertEquals(SubunitFormat::NUMBERS, $amount->getSubunitFormat()->getFormat());
    }

    public function testGetNumber()
    {
        $amount = new Amount(new Number(157.15), new Currency('EUR'), new SubunitFormat(SubunitFormat::NUMBERS));

        $this->assertInstanceOf('Kwn\NumberToWords\Model\Number', $amount->getNumber());
    }

    public function testGetCurrency()
    {
        $amount = new Amount(new Number(12.10), new Currency('USD'), new SubunitFormat(SubunitFormat::NUMBERS));

        $this->assertInstanceOf('Kwn\NumberToWords\Model\Currency', $amount->getCurrency());
    }

    public function testGetSubunitFormat()
    {
        $amount = new Amount(new Number(5.99), new Currency('EUR'), new SubunitFormat(SubunitFormat::NUMBERS));

        $this->assertInstanceOf('Kwn\NumberToWords\Model\SubunitFormat', $amount->getSubunitFormat());
    }
}
