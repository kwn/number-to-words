<?php

namespace Kwn\NumberToWords\Model;

class AmountTest extends \PHPUnit_Framework_TestCase
{
    public function testNumberIsNormalized()
    {
        $amount = new Amount(
            new Number(19.999),
            new Currency('PLN')
        );

        $this->assertEquals(99, $amount->getSubunits());

        $amount = new Amount(
            new Number(55.122),
            new Currency('GBP')
        );

        $this->assertEquals(12, $amount->getSubunits());
    }

    public function testGetUnits()
    {
        $amount = new Amount(
            new Number(15.10),
            new Currency('PLN')
        );

        $this->assertInternalType('integer', $amount->getUnits());
        $this->assertEquals(15, $amount->getUnits());
    }

    public function testGetSubunits()
    {
        $amount = new Amount(
            new Number(19.99),
            new Currency('EUR')
        );

        $this->assertInternalType('integer', $amount->getSubunits());
        $this->assertEquals(99, $amount->getSubunits());
    }

    public function testGetCurrency()
    {
        $amount = new Amount(
            new Number(12.10),
            new Currency('USD')
        );

        $this->assertInstanceOf('Kwn\NumberToWords\Model\Currency', $amount->getCurrency());
    }
}
