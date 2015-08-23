<?php

namespace Kwn\NumberToWords\Language\Polish\Transformer;

use Kwn\NumberToWords\Language\Polish\Grammar\GrammarCaseSelector;
use Kwn\NumberToWords\Model\Amount;
use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\Number;
use Kwn\NumberToWords\Model\SubunitFormat;

class CurrencyTransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CurrencyTransformer
     */
    private $transformer;

    public function setUp()
    {
        $this->transformer = new CurrencyTransformer(
            new NumberTransformer(new GrammarCaseSelector()),
            new GrammarCaseSelector()
        );
    }

    /**
     * @expectedException \Kwn\NumberToWords\Exception\InvalidArgumentException
     */
    public function testToWordsThrowsExceptionWithUnknownCurrency()
    {
        $amount = new Amount(new Number(50), new Currency('UNK'), new SubunitFormat(SubunitFormat::WORDS));

        $this->transformer->toWords($amount);
    }

    /**
     * @dataProvider providerToWordsWithUnitsOnly
     */
    public function testToWordsWithUnitsOnly($expectedValue, Amount $amount)
    {
        $this->assertEquals($expectedValue, $this->transformer->toWords($amount));
    }

    public function providerToWordsWithUnitsOnly()
    {
        return [
            [
                'jeden złoty zero groszy',
                new Amount(new Number(1), new Currency('PLN'), new SubunitFormat(SubunitFormat::WORDS))
            ],
            [
                'dwa złote zero groszy',
                new Amount(new Number(2), new Currency('PLN'), new SubunitFormat(SubunitFormat::WORDS))
            ],
            [
                'pięć złotych zero groszy',
                new Amount(new Number(5), new Currency('PLN'), new SubunitFormat(SubunitFormat::WORDS))
            ],
            [
                'pięćset czterdzieści złotych zero groszy',
                new Amount(new Number(540), new Currency('PLN'), new SubunitFormat(SubunitFormat::WORDS))
            ],
            [
                'pięćset czterdzieści jeden złotych zero groszy',
                new Amount(new Number(541), new Currency('PLN'), new SubunitFormat(SubunitFormat::WORDS))
            ],
            [
                'pięćset czterdzieści dwa złote zero groszy',
                new Amount(new Number(542), new Currency('PLN'), new SubunitFormat(SubunitFormat::WORDS))
            ],
            [
                'pięćset czterdzieści cztery złote zero groszy',
                new Amount(new Number(544), new Currency('PLN'), new SubunitFormat(SubunitFormat::WORDS))
            ],
            [
                'pięćset czterdzieści pięć złotych zero groszy',
                new Amount(new Number(545), new Currency('PLN'), new SubunitFormat(SubunitFormat::WORDS))
            ]
        ];
    }

    /**
     * @dataProvider providerToWordsWithNumbersFormatSubunits
     */
    public function testToWordsWithNumbersFormatSubunits($expectedValue, Amount $amount)
    {
        $this->assertEquals($expectedValue, $this->transformer->toWords($amount));
    }

    public function providerToWordsWithNumbersFormatSubunits()
    {
        return [
            [
                'pięćset czterdzieści pięć złotych 52/100',
                new Amount(new Number(545.52), new Currency('PLN'), new SubunitFormat(SubunitFormat::NUMBERS))
            ],
            [
                'pięćset czterdzieści pięć złotych 0/100',
                new Amount(new Number(545), new Currency('PLN'), new SubunitFormat(SubunitFormat::NUMBERS))
            ],
            [
                'pięćset czterdzieści pięć złotych 99/100',
                new Amount(new Number(545.99), new Currency('PLN'), new SubunitFormat(SubunitFormat::NUMBERS))
            ]
        ];
    }

    /**
     * @dataProvider providerToWordsWithWordsFormatSubunits
     */
    public function testToWordsWithWordsFormatSubunits($expectedValue, Amount $amount)
    {
        $this->assertEquals($expectedValue, $this->transformer->toWords($amount));
    }

    public function providerToWordsWithWordsFormatSubunits()
    {
        return [
            [
                'pięćset czterdzieści pięć złotych pięćdziesiąt dwa grosze',
                new Amount(new Number(545.52), new Currency('PLN'), new SubunitFormat(SubunitFormat::WORDS))
            ],
            [
                'pięćset czterdzieści pięć złotych zero groszy',
                new Amount(new Number(545), new Currency('PLN'), new SubunitFormat(SubunitFormat::WORDS))
            ],
            [
                'pięćset czterdzieści pięć złotych jeden grosz',
                new Amount(new Number(545.01), new Currency('PLN'), new SubunitFormat(SubunitFormat::WORDS))
            ],
            [
                'pięćset czterdzieści pięć złotych dziewięćdziesiąt dziewięć groszy',
                new Amount(new Number(545.99), new Currency('PLN'), new SubunitFormat(SubunitFormat::WORDS))
            ]
        ];
    }
}
