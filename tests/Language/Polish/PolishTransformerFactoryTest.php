<?php

namespace Kwn\NumberToWords\Language\Polish;

use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;

class PolishTransformerFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PolishTransformerFactory
     */
    private $transformerFactory;

    public function setUp()
    {
        $this->transformerFactory = new PolishTransformerFactory();
    }

    public function testGetLanguageIdentifier()
    {
        $this->assertEquals(
            PolishTransformerFactory::LANGUAGE_IDENTIFIER,
            $this->transformerFactory->getLanguageIdentifier()
        );
    }

    public function testCreateNumberTransformerBuildsCorrectClass()
    {
        $numberTransformer = $this->transformerFactory->createNumberTransformer();

        $this->assertInstanceOf(
            'Kwn\NumberToWords\Language\Polish\Transformer\NumberTransformer',
            $numberTransformer
        );
    }

    public function testCreateCurrencyTransformerBuildsCorrectClass()
    {
        $currencyTransformer = $this->transformerFactory->createCurrencyTransformer(new Currency('PLN'));

        $this->assertInstanceOf(
            'Kwn\NumberToWords\Language\Polish\Transformer\Decorator\CurrencyTransformerDecorator',
            $currencyTransformer
        );

        $this->assertEquals(
            new SubunitFormat(SubunitFormat::WORDS),
            $this->readAttribute($currencyTransformer, 'subunit')
        );
    }

    public function testCreateCurrencyTransformerBuildClassWithCorrectSubunitsValue()
    {
        $currencyTransformer = $this->transformerFactory->createCurrencyTransformer(
            new Currency('PLN'),
            new SubunitFormat(SubunitFormat::WORDS)
        );

        $this->assertEquals(
            new SubunitFormat(SubunitFormat::WORDS),
            $this->readAttribute($currencyTransformer, 'subunit')
        );

        $currencyTransformer = $this->transformerFactory->createCurrencyTransformer(
            new Currency('EUR'),
            new SubunitFormat(SubunitFormat::NUMBERS)
        );

        $this->assertEquals(
            new SubunitFormat(SubunitFormat::NUMBERS),
            $this->readAttribute($currencyTransformer, 'subunit')
        );
    }
}
