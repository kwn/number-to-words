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
     * @dataProvider providerToWordsWithUnitsOnly
     */
    public function testToWordsWithUnitsOnly(CurrencyTransformer $transformer, $expectedValue, $amount)
    {
        $this->assertEquals($expectedValue, $transformer->toWords($amount));
    }

    public function providerToWordsWithUnitsOnly()
    {
        $transformer = $this->createTransformer('PLN', SubunitFormat::WORDS);

        return [
            [$transformer, 'jeden złoty zero groszy', 1],
            [$transformer, 'dwa złote zero groszy', 2],
            [$transformer, 'pięć złotych zero groszy', 5],
            [$transformer, 'pięćset czterdzieści złotych zero groszy', 540],
            [$transformer, 'pięćset czterdzieści jeden złotych zero groszy', 541],
            [$transformer, 'pięćset czterdzieści dwa złote zero groszy', 542],
            [$transformer, 'pięćset czterdzieści cztery złote zero groszy', 544],
            [$transformer, 'pięćset czterdzieści pięć złotych zero groszy', 545],
        ];
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
        $transformer = $this->createTransformer('PLN', SubunitFormat::NUMBERS);

        return [
            [$transformer, 'pięćset czterdzieści pięć złotych 52/100', 545.52],
            [$transformer, 'pięćset czterdzieści pięć złotych 0/100', 545],
            [$transformer, 'pięćset czterdzieści pięć złotych 99/100', 545.99],
        ];
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
        $transformer = $this->createTransformer('PLN', SubunitFormat::WORDS);

        return [
            [$transformer, 'pięćset czterdzieści pięć złotych pięćdziesiąt dwa grosze', 545.52],
            [$transformer, 'pięćset czterdzieści pięć złotych zero groszy', 545],
            [$transformer, 'pięćset czterdzieści pięć złotych jeden grosz', 545.01],
            [$transformer, 'pięćset czterdzieści pięć złotych dziewięćdziesiąt dziewięć groszy', 545.99],
        ];
    }

    /**
     * Creates a new transformer
     *
     * @param string $currencyCode
     * @param int $subunitFormat
     *
     * @return CurrencyTransformer
     */
    protected function createTransformer($currencyCode, $subunitFormat)
    {
        $grammarCaseSelector = new GrammarCaseSelector;
        $transformer = new CurrencyTransformer(new NumberTransformer($grammarCaseSelector), $grammarCaseSelector);

        $transformer->setCurrency(new Currency($currencyCode));
        $transformer->setSubunitFormat(new SubunitFormat($subunitFormat));

        return $transformer;
    }
}
