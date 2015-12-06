<?php

namespace Kwn\NumberToWords\Language\English\Transformer;

use Kwn\NumberToWords\Model\Amount;
use Kwn\NumberToWords\Model\Number;
use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;
use Kwn\NumberToWords\Language\English\Dictionary\Number as NumberDictionary;
use Kwn\NumberToWords\Language\English\Dictionary\Currency as CurrencyDictionary;

class CurrencyTransformerTest extends \PHPUnit_Framework_TestCase
{
    protected $unitNames = [
        'PLN' => ['unit' => 'złoty', 'subunit' => ['singular' => 'grosz', 'plural' => 'groszy']],
        'EUR' => ['unit' => 'euro', 'subunit' => ['singular' => 'cent', 'plural' => 'cents']],
        'GBP' => ['unit' => 'pound', 'subunit' => ['singular' => 'pence', 'plural' => 'pence']],
        'USD' => ['unit' => 'dollar', 'subunit' => ['singular' => 'cent', 'plural' => 'cents']],
        'CHF' => ['unit' => 'franc', 'subunit' => ['singular' => 'centime', 'plural' => 'centimes']],
    ];

    /**
     * @var CurrencyTransformer
     */
    private $transformer;

    public function setUp()
    {
        $this->transformer = new CurrencyTransformer(new NumberTransformer(new NumberDictionary), new CurrencyDictionary);
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
        $data = [];

        foreach ($this->unitNames as $code => $currency)
        {
            $unitName = $currency['unit'];
            $pluralSubunitName = $currency['subunit']['plural'];

            $data = array_merge($data, [
                [
                    "one {$unitName} zero {$pluralSubunitName}",
                    new Amount(new Number(1), new Currency($code), new SubunitFormat(SubunitFormat::WORDS))
                ],
                [
                    "two {$unitName}s zero {$pluralSubunitName}",
                    new Amount(new Number(2), new Currency($code), new SubunitFormat(SubunitFormat::WORDS))
                ],
                [
                    "five {$unitName}s zero {$pluralSubunitName}",
                    new Amount(new Number(5), new Currency($code), new SubunitFormat(SubunitFormat::WORDS))
                ],
                [
                    "five hundred forty {$unitName}s zero {$pluralSubunitName}",
                    new Amount(new Number(540), new Currency($code), new SubunitFormat(SubunitFormat::WORDS))
                ],
                [
                    "five hundred forty one {$unitName}s zero {$pluralSubunitName}",
                    new Amount(new Number(541), new Currency($code), new SubunitFormat(SubunitFormat::WORDS))
                ],
                [
                    "five hundred forty two {$unitName}s zero {$pluralSubunitName}",
                    new Amount(new Number(542), new Currency($code), new SubunitFormat(SubunitFormat::WORDS))
                ],
                [
                    "five hundred forty four {$unitName}s zero {$pluralSubunitName}",
                    new Amount(new Number(544), new Currency($code), new SubunitFormat(SubunitFormat::WORDS))
                ],
                [
                    "five hundred forty five {$unitName}s zero {$pluralSubunitName}",
                    new Amount(new Number(545), new Currency($code), new SubunitFormat(SubunitFormat::WORDS))
                ]
            ]);
        }

        return $data;
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
        $data = [];

        foreach ($this->unitNames as $code => $currency)
        {
            $unitName = $currency['unit'];

            $data = array_merge($data, [
                [
                    "five hundred forty five {$unitName}s 52/100",
                    new Amount(new Number(545.52), new Currency($code), new SubunitFormat(SubunitFormat::NUMBERS))
                ],
                [
                    "five hundred forty five {$unitName}s 0/100",
                    new Amount(new Number(545), new Currency($code), new SubunitFormat(SubunitFormat::NUMBERS))
                ],
                [
                    "five hundred forty five {$unitName}s 99/100",
                    new Amount(new Number(545.99), new Currency($code), new SubunitFormat(SubunitFormat::NUMBERS))
                ]
            ]);
        }

        return $data;
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
        $data = [];

        foreach ($this->unitNames as $code => $currency)
        {
            $unitName = $currency['unit'];
            $singularSubunitName = $currency['subunit']['singular'];
            $pluralSubunitName = $currency['subunit']['plural'];

            $data = array_merge($data, [
                [
                    "five hundred forty five {$unitName}s fifty two {$pluralSubunitName}",
                    new Amount(new Number(545.52), new Currency($code), new SubunitFormat(SubunitFormat::WORDS))
                ],
                [
                    "five hundred forty five {$unitName}s zero {$pluralSubunitName}",
                    new Amount(new Number(545), new Currency($code), new SubunitFormat(SubunitFormat::WORDS))
                ],
                [
                    "five hundred forty five {$unitName}s one {$singularSubunitName}",
                    new Amount(new Number(545.01), new Currency($code), new SubunitFormat(SubunitFormat::WORDS))
                ],
                [
                    "five hundred forty five {$unitName}s ninety nine {$pluralSubunitName}",
                    new Amount(new Number(545.99), new Currency($code), new SubunitFormat(SubunitFormat::WORDS))
                ]
            ]);
        }

        return $data;
    }
}
