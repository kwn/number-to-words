<?php

namespace Kwn\NumberToWords\Language\Polish\Transformer;

use Kwn\NumberToWords\Language\Polish\Grammar\GrammarCaseSelector;
use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;

class CurrencyTransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerToWordsWithUnitsOnly
     */
    public function testToWordsWithUnitsOnly($expectedValue, $amount)
    {
        $transformer = $this->createTransformer('PLN', SubunitFormat::WORDS);

        $this->assertEquals($expectedValue, $transformer->toWords($amount));
    }

    public function providerToWordsWithUnitsOnly()
    {
        return [
            ['jeden złoty zero groszy', 1],
            ['dwa złote zero groszy', 2],
            ['pięć złotych zero groszy', 5],
            ['pięćset czterdzieści złotych zero groszy', 540],
            ['pięćset czterdzieści jeden złotych zero groszy', 541],
            ['pięćset czterdzieści dwa złote zero groszy', 542],
            ['pięćset czterdzieści cztery złote zero groszy', 544],
            ['pięćset czterdzieści pięć złotych zero groszy', 545],
        ];
    }

    /**
     * @dataProvider providerToWordsWithNumbersFormatSubunits
     */
    public function testToWordsWithNumbersFormatSubunits($expectedValue, $amount)
    {
        $transformer = $this->createTransformer('PLN', SubunitFormat::NUMBERS);

        $this->assertEquals($expectedValue, $transformer->toWords($amount));
    }

    public function providerToWordsWithNumbersFormatSubunits()
    {
        return [
            ['pięćset czterdzieści pięć złotych 52/100', 545.52],
            ['pięćset czterdzieści pięć złotych 0/100', 545],
            ['pięćset czterdzieści pięć złotych 99/100', 545.99],
        ];
    }

    /**
     * @dataProvider providerToWordsWithWordsFormatSubunits
     */
    public function testToWordsWithWordsFormatSubunits($expectedValue, $amount)
    {
        $transformer = $this->createTransformer('PLN', SubunitFormat::WORDS);

        $this->assertEquals($expectedValue, $transformer->toWords($amount));
    }

    public function providerToWordsWithWordsFormatSubunits()
    {
        return [
            ['pięćset czterdzieści pięć złotych pięćdziesiąt dwa grosze', 545.52],
            ['pięćset czterdzieści pięć złotych zero groszy', 545],
            ['pięćset czterdzieści pięć złotych jeden grosz', 545.01],
            ['pięćset czterdzieści pięć złotych dziewięćdziesiąt dziewięć groszy', 545.99],
        ];
    }

    /**
     * @param string $currencyCode
     * @param int    $subunitFormat
     *
     * @return CurrencyTransformer
     */
    private function createTransformer($currencyCode, $subunitFormat)
    {
        $grammarCaseSelector = new GrammarCaseSelector();
        $transformer = new CurrencyTransformer(new NumberTransformer($grammarCaseSelector), $grammarCaseSelector);

        $transformer->setCurrency(new Currency($currencyCode));
        $transformer->setSubunitFormat(new SubunitFormat($subunitFormat));

        return $transformer;
    }
}
