<?php

namespace Kwn\NumberToWords\Language\Polish;

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
            'Kwn\NumberToWords\Language\Polish\Transformer\NumberTransformer',
            $numberTransformer
        );
    }

    public function testCreateCurrencyTransformerBuildsCorrectClass()
    {
        $currencyTransformer = $this->transformerFactory->createCurrencyTransformer();

        $this->assertInstanceOf(
            'Kwn\NumberToWords\Language\Polish\Transformer\CurrencyTransformer',
            $currencyTransformer
        );
    }
}
