<?php

namespace Kwn\NumberToWords\Language\French\Transformer;

use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;
use Kwn\NumberToWords\Language\French\Dictionary\Number as NumberDictionary;
use Kwn\NumberToWords\Language\French\Dictionary\Currency as CurrencyDictionary;

class CurrencyTransformerTest extends \PHPUnit_Framework_TestCase
{
    private $unitNames = [
        'PLN' => ['unit' => 'zloty polonais', 'subunit' => ['singular' => 'grosz', 'plural' => 'groszy']],
        'EUR' => ['unit' => 'euro', 'subunit' => ['singular' => 'centime', 'plural' => 'centimes']],
        'GBP' => ['unit' => 'livre sterling', 'subunit' => ['singular' => 'penny', 'plural' => 'pence']],
        'USD' => ['unit' => 'dollar américain', 'subunit' => ['singular' => 'cent', 'plural' => 'cents']],
        'CHF' => ['unit' => 'franc suisse', 'subunit' => ['singular' => 'centime', 'plural' => 'centimes']],
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
                [$transformer, "un {$unitName} et zéro {$pluralSubunitName}", 1],
                [$transformer, "deux {$unitName}s et zéro {$pluralSubunitName}", 2],
                [$transformer, "cinq {$unitName}s et zéro {$pluralSubunitName}", 5],
                [$transformer, "cinq cent quarante {$unitName}s et zéro {$pluralSubunitName}", 540],
                [$transformer, "cinq cent quarante et un {$unitName}s et zéro {$pluralSubunitName}", 541],
                [$transformer, "cinq cent quarante-deux {$unitName}s et zéro {$pluralSubunitName}", 542],
                [$transformer, "cinq cent quarante-quatre {$unitName}s et zéro {$pluralSubunitName}", 544],
                [$transformer, "cinq cent quarante-cinq {$unitName}s et zéro {$pluralSubunitName}", 545]
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
                [$transformer, "cinq cent quarante-cinq {$unitName}s et 52/100", 545.52],
                [$transformer, "cinq cent quarante-cinq {$unitName}s et 0/100", 545],
                [$transformer, "cinq cent quarante-cinq {$unitName}s et 99/100", 545.99]
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
                [$transformer, "cinq cent quarante-cinq {$unitName}s et cinquante-deux {$pluralSubunitName}", 545.52],
                [$transformer, "cinq cent quarante-cinq {$unitName}s et zéro {$pluralSubunitName}", 545],
                [$transformer, "cinq cent quarante-cinq {$unitName}s et un {$singularSubunitName}", 545.01],
                [
                    $transformer,
                    "cinq cent quarante-cinq {$unitName}s et trente et un {$pluralSubunitName}",
                    545.31
                ]
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
