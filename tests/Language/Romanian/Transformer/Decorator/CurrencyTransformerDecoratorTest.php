<?php

namespace Kwn\NumberToWords\Language\Romanian\Transformer\Decorator;

use Kwn\NumberToWords\Language\Romanian\Transformer\NumberTransformer;
use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\Number;

class CurrencyTransformerDecoratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Casual testing for a couple of values in the local currency
     * (in this case, RON)
     */
    public function testLocalCurrency()
    {
        $transformer = new CurrencyTransformerDecorator(
            new NumberTransformer(),
            new Currency('ROL')
        );

        $this->assertEquals('un leu', $transformer->toWords(new Number(1)));
        $this->assertEquals('un leu', $transformer->toWords(new Number(1.00)));
        $this->assertEquals('doi lei', $transformer->toWords(new Number(2)));
        $this->assertEquals('două mii de lei', $transformer->toWords(new Number(2000)));

    }
}
