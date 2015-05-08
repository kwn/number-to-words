<?php

namespace Kwn\NumberToWords\Model;

class CurrencyTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateNewObject()
    {
        $currency = new Currency('PLN');

        $this->assertInstanceOf('Kwn\NumberToWords\Model\Currency', $currency);
        $this->assertSame('PLN', $currency->getIdentifier());
    }
}
