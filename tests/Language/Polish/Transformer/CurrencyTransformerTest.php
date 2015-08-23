<?php

namespace Kwn\NumberToWords\Language\Polish\Transformer;

use Kwn\NumberToWords\Language\Polish\Transformer\NumberTransformer;
use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\Number;
use Kwn\NumberToWords\Model\SubunitFormat;

class CurrencyTransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Kwn\NumberToWords\Exception\InvalidArgumentException
     */
    public function testConstructorThrowsExceptionWithUnknownCurrency()
    {
        new CurrencyTransformer(
            new NumberTransformer(),
            new Currency('UNK'),
            new SubunitFormat(SubunitFormat::WORDS)
        );
    }

    /**
     * @expectedException \Kwn\NumberToWords\Exception\InvalidArgumentException
     */
    public function testConstructorThrowsExceptionWithUnknownSubunitsFormat()
    {
        new CurrencyTransformer(
            new NumberTransformer(),
            new Currency('PLN'),
            new SubunitFormat(10)
        );
    }

    public function testTransformMoneyUnits()
    {
        $transformer = new CurrencyTransformer(
            new NumberTransformer(),
            new Currency('PLN'),
            new SubunitFormat(SubunitFormat::WORDS)
        );

        $this->assertEquals('jeden złoty zero groszy', $transformer->toWords(new Number(1)));
        $this->assertEquals('dwa złote zero groszy', $transformer->toWords(new Number(2)));
        $this->assertEquals('pięć złotych zero groszy', $transformer->toWords(new Number(5)));
        $this->assertEquals('pięćset czterdzieści jeden złotych zero groszy', $transformer->toWords(new Number(541)));
        $this->assertEquals('pięćset czterdzieści dwa złote zero groszy', $transformer->toWords(new Number(542)));
        $this->assertEquals('pięćset czterdzieści cztery złote zero groszy', $transformer->toWords(new Number(544)));
        $this->assertEquals('pięćset czterdzieści pięć złotych zero groszy', $transformer->toWords(new Number(545)));
    }

    public function testTransformMoneySubunitsNumberFormat()
    {
        $transformer = new CurrencyTransformer(
            new NumberTransformer(),
            new Currency('PLN'),
            new SubunitFormat(SubunitFormat::NUMBERS)
        );

        $this->assertEquals('pięćset czterdzieści pięć złotych 52/100', $transformer->toWords(new Number(545.52)));
        $this->assertEquals('pięćset czterdzieści pięć złotych 0/100', $transformer->toWords(new Number(545)));
        $this->assertEquals('pięćset czterdzieści pięć złotych 99/100', $transformer->toWords(new Number(545.99)));
    }

    public function testTransformMoneySubunitsWordsFormat()
    {
        $transformer = new CurrencyTransformer(
            new NumberTransformer(),
            new Currency('PLN'),
            new SubunitFormat(SubunitFormat::WORDS)
        );

        $this->assertEquals('pięćset czterdzieści pięć złotych pięćdziesiąt dwa grosze', $transformer->toWords(new Number(545.52)));
        $this->assertEquals('pięćset czterdzieści pięć złotych zero groszy', $transformer->toWords(new Number(545)));
        $this->assertEquals('pięćset czterdzieści pięć złotych jeden grosz', $transformer->toWords(new Number(545.01)));
        $this->assertEquals('pięćset czterdzieści pięć złotych dziewięćdziesiąt dziewięć groszy', $transformer->toWords(new Number(545.99)));
    }
}
