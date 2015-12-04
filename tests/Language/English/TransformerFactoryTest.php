<?php

namespace Kwn\NumberToWords\Language\English;

use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;

class TransformerFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TransformerFactory
     */
    private $transformerFactory;

    public function setUp()
    {
        $this->transformerFactory = new TransformerFactory();
    }

    public function testGetLanguageIdentifier()
    {
        $this->assertEquals(
            TransformerFactory::LANGUAGE_IDENTIFIER,
            $this->transformerFactory->getLanguageIdentifier()
        );
    }

    public function testCreateNumberTransformerBuildsCorrectClass()
    {
        $numberTransformer = $this->transformerFactory->createNumberTransformer();

        $this->assertInstanceOf(
            'Kwn\NumberToWords\Language\English\Transformer\NumberTransformer',
            $numberTransformer
        );
    }

    public function testCreateCurrencyTransformerBuildsCorrectClass()
    {
        $currencyTransformer = $this->transformerFactory->createCurrencyTransformer(new Currency('USD'), new SubunitFormat(SubunitFormat::WORDS));

        $this->assertInstanceOf(
            'Kwn\NumberToWords\Language\English\Transformer\CurrencyTransformer',
            $currencyTransformer
        );
    }
}
