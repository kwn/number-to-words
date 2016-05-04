<?php
namespace Kwn\NumberToWords\Language\Russian\Transformer;

use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;
use Kwn\NumberToWords\Language\Russian\Dictionary\Number as NumberDictionary;
use Kwn\NumberToWords\Language\Russian\Dictionary\Currency as CurrencyDictionary;

class CurrencyTransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerToWordsWithUnitsOnly
     */
    public function testToWordsWithUnitsOnly($expectedValue, $amount)
    {
        $transformer = $this->createTransformer('UAH', SubunitFormat::WORDS);
        $this->assertEquals($expectedValue, $transformer->toWords($amount));
    }

    public function providerToWordsWithUnitsOnly()
    {
        return [
            ['одна гривна ноль копеек', 1],
            ['две гривны ноль копеек', 2],
            ['пять гривен ноль копеек', 5],
            ['триста сорок гривен ноль копеек', 340],
            ['триста сорок одна гривна ноль копеек', 341],
            ['триста сорок две гривны ноль копеек', 342],
            ['триста сорок четыре гривны ноль копеек', 344],
            ['триста сорок пять гривен ноль копеек', 345],
        ];
    }

    /**
     * @dataProvider providerToWordsWithNumbersFormatSubunits
     */
    public function testToWordsWithNumbersFormatSubunits($expectedValue, $amount)
    {
        $transformer = $this->createTransformer('UAH', SubunitFormat::NUMBERS);
        $this->assertEquals($expectedValue, $transformer->toWords($amount));
    }

    public function providerToWordsWithNumbersFormatSubunits()
    {
        return [
            ['триста сорок пять гривен 32/100', 345.32],
            ['триста сорок пять гривен 0/100', 345],
            ['триста сорок пять гривен 99/100', 345.99],
        ];
    }

    /**
     * @dataProvider providerToWordsWithWordsFormatSubunits
     */
    public function testToWordsWithWordsFormatSubunits($expectedValue, $amount)
    {
        $transformer = $this->createTransformer('UAH', SubunitFormat::WORDS);
        $this->assertEquals($expectedValue, $transformer->toWords($amount));
    }

    public function providerToWordsWithWordsFormatSubunits()
    {
        return [
            ['триста сорок пять гривен пятьдесят две копейки', 345.52],
            ['триста сорок пять гривен ноль копеек', 345],
            ['триста сорок пять гривен одна копейка', 345.01],
            ['триста сорок пять гривен девяносто девять копеек', 345.99],
        ];
    }

    /**
     * @param string $currencyCode
     * @param int $subunitFormat
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
