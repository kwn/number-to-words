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

        $value = $amount->getNumber()->getValue();

        $this->assertInternalType('float' ,$value);
        $this->assertEquals(20, $value);

        $amount = new Amount(
            new Number(55.122),
            new Currency('GBP')
        );

        $value = $amount->getNumber()->getValue();

        $this->assertInternalType('float' ,$value);
        $this->assertEquals(55.12, $value);
    }

    public function testGetNumber()
    {
        $amount = new Amount(
            new Number(15.10),
            new Currency('PLN')
        );

        $this->assertInstanceOf('Kwn\NumberToWords\Model\Number', $amount->getNumber());
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
