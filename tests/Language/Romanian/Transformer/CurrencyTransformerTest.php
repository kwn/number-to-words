<?php

namespace Kwn\NumberToWords\Language\Romanian\Transformer;

use Kwn\NumberToWords\Model\Amount;
use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\Number;
use Kwn\NumberToWords\Model\SubunitFormat;

class CurrencyTransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerToWords
     */
    public function testToWords(CurrencyTransformer $transformer, $expectedValue, $amount)
    {
        $this->assertEquals($expectedValue, $transformer->toWords($amount));
    }

    public function providerToWords()
    {
        $transformer = $this->createTransformer('ROL', SubunitFormat::WORDS);

        return [
            [$transformer, 'un leu', 1],
            [$transformer, 'un leu', 1.00],
            [$transformer, 'doi lei', 2],
            [$transformer, 'două mii de lei', 2000],
            [$transformer, 'un leu și patruzeci și cinci de lei', 1.45],
            [$transformer, 'un leu și patruzeci de lei', 1.40],
            [$transformer, 'un leu și patruzeci de lei', 1.4],
            [$transformer, 'un leu și patruzeci de lei', 1.4000]
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
        $transformer = new CurrencyTransformer(new NumberTransformer);

        $transformer->setCurrency(new Currency($currencyCode));
        $transformer->setSubunitFormat(new SubunitFormat($subunitFormat));

        return $transformer;
    }
}
