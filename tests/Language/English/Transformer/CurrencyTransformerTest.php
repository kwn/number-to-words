<?php

namespace Kwn\NumberToWords\Language\English\Transformer;

use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;
use Kwn\NumberToWords\Language\English\Dictionary\Number as NumberDictionary;
use Kwn\NumberToWords\Language\English\Dictionary\Currency as CurrencyDictionary;

class CurrencyTransformerTest extends \PHPUnit_Framework_TestCase
{
    private $unitNames = [
        'PLN' => ['unit' => 'złoty', 'subunit' => ['singular' => 'grosz', 'plural' => 'groszy']],
        'EUR' => ['unit' => 'euro', 'subunit' => ['singular' => 'cent', 'plural' => 'cents']],
        'GBP' => ['unit' => 'pound', 'subunit' => ['singular' => 'pence', 'plural' => 'pence']],
        'USD' => ['unit' => 'dollar', 'subunit' => ['singular' => 'cent', 'plural' => 'cents']],
        'CHF' => ['unit' => 'franc', 'subunit' => ['singular' => 'centime', 'plural' => 'centimes']],
    ];

    /**
     * @dataProvider providerToWordsWithUnitsOnly
     */
    public function testToWordsWithUnitsOnly(CurrencyTransformer $transformer, $expectedValue, $amount)
    {
        $this->assertEquals($expectedValue, $transformer->toWords($amount));
    }

    public function providerToWordsWithUnitsOnly()
    {
        $data = [];

        foreach ($this->unitNames as $code => $currency) {
            $unitName = $currency['unit'];
            $pluralSubunitName = $currency['subunit']['plural'];
            $transformer = $this->createTransformer($code, SubunitFormat::WORDS);

            $data = array_merge($data, [
                [$transformer, "one {$unitName} zero {$pluralSubunitName}", 1],
                [$transformer, "two {$unitName}s zero {$pluralSubunitName}", 2],
                [$transformer, "five {$unitName}s zero {$pluralSubunitName}", 5],
                [$transformer, "five hundred forty {$unitName}s zero {$pluralSubunitName}", 540],
                [$transformer, "five hundred forty one {$unitName}s zero {$pluralSubunitName}", 541],
                [$transformer, "five hundred forty two {$unitName}s zero {$pluralSubunitName}", 542],
                [$transformer, "five hundred forty four {$unitName}s zero {$pluralSubunitName}", 544],
                [$transformer, "five hundred forty five {$unitName}s zero {$pluralSubunitName}", 545]
            ]);
        }

        return $data;
    }

    /**
     * @dataProvider providerToWordsWithNumbersFormatSubunits
     */
    public function testToWordsWithNumbersFormatSubunits(CurrencyTransformer $transformer, $expectedValue, $amount)
    {
        $this->assertEquals($expectedValue, $transformer->toWords($amount));
    }

    public function providerToWordsWithNumbersFormatSubunits()
    {
        $data = [];

        foreach ($this->unitNames as $code => $currency) {
            $unitName = $currency['unit'];
            $transformer = $this->createTransformer($code, SubunitFormat::NUMBERS);

            $data = array_merge($data, [
                [$transformer, "five hundred forty five {$unitName}s 52/100", 545.52],
                [$transformer, "five hundred forty five {$unitName}s 0/100", 545],
                [$transformer, "five hundred forty five {$unitName}s 99/100", 545.99],
            ]);
        }

        return $data;
    }

    /**
     * @dataProvider providerToWordsWithWordsFormatSubunits
     */
    public function testToWordsWithWordsFormatSubunits(CurrencyTransformer $transformer, $expectedValue, $amount)
    {
        $this->assertEquals($expectedValue, $transformer->toWords($amount));
    }

    public function providerToWordsWithWordsFormatSubunits()
    {
        $data = [];

        foreach ($this->unitNames as $code => $currency) {
            $unitName = $currency['unit'];
            $singularSubunitName = $currency['subunit']['singular'];
            $pluralSubunitName = $currency['subunit']['plural'];
            $transformer = $this->createTransformer($code, SubunitFormat::WORDS);

            $data = array_merge($data, [
                [$transformer, "five hundred forty five {$unitName}s fifty two {$pluralSubunitName}", 545.52],
                [$transformer, "five hundred forty five {$unitName}s zero {$pluralSubunitName}", 545],
                [$transformer, "five hundred forty five {$unitName}s one {$singularSubunitName}", 545.01],
                [$transformer, "five hundred forty five {$unitName}s ninety nine {$pluralSubunitName}", 545.99],
            ]);
        }

        return $data;
    }

    /**
     * Creates a new transformer
     *
     * @param string $currencyCode
     * @param int    $subunitFormat
     *
     * @return CurrencyTransformer
     */
    private function createTransformer($currencyCode, $subunitFormat)
    {
        $transformer = new CurrencyTransformer(new NumberTransformer(new NumberDictionary()), new CurrencyDictionary());

        $transformer->setCurrency(new Currency($currencyCode));
        $transformer->setSubunitFormat(new SubunitFormat($subunitFormat));

        return $transformer;
    }
}
