<?php
namespace Kwn\NumberToWords\Language\Ukrainian\Transformer;

use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;
use Kwn\NumberToWords\Language\Ukrainian\Dictionary\Number as NumberDictionary;
use Kwn\NumberToWords\Language\Ukrainian\Dictionary\Currency as CurrencyDictionary;

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
            ['одна гривня нуль копійок', 1],
            ['дві гривні нуль копійок', 2],
            ['п\'ять гривень нуль копійок', 5],
            ['триста сорок гривень нуль копійок', 340],
            ['триста сорок одна гривня нуль копійок', 341],
            ['триста сорок дві гривні нуль копійок', 342],
            ['триста сорок чотири гривні нуль копійок', 344],
            ['триста сорок п\'ять гривень нуль копійок', 345],
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
            ['триста сорок п\'ять гривень 32/100', 345.32],
            ['триста сорок п\'ять гривень 0/100', 345],
            ['триста сорок п\'ять гривень 99/100', 345.99],
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
            ['триста сорок п\'ять гривень п\'ятдесят дві копійки', 345.52],
            ['триста сорок п\'ять гривень нуль копійок', 345],
            ['триста сорок п\'ять гривень одна копійка', 345.01],
            ['триста сорок п\'ять гривень дев\'яносто дев\'ять копійок', 345.99],
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
