<?php


namespace Kwn\NumberToWords\Language\Romanian;

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
        $this->assertEquals('ro', $this->transformerFactory->getLanguageIdentifier());
    }

    public function testCreateNumberTransformerBuildsCorrectClass()
    {
        $numberTransformer = $this->transformerFactory->createNumberTransformer();

        $this->assertInstanceOf(
            'Kwn\NumberToWords\Language\Romanian\Transformer\NumberTransformer',
            $numberTransformer
        );
    }

    public function testCreateCurrencyTransformerBuildsCorrectClass()
    {
        $currencyTransformer = $this->transformerFactory->createCurrencyTransformer();

        $this->assertInstanceOf(
            'Kwn\NumberToWords\Language\Romanian\Transformer\Decorator\CurrencyTransformerDecorator',
            $currencyTransformer
        );

        $this->assertEquals(
            new SubunitFormat(SubunitFormat::WORDS),
            $this->readAttribute($currencyTransformer, 'subunit')
        );
    }

    public function testCreateCurrencyTransformerBuildClassWithCorrectSubunitsValue()
    {
        $currencyTransformer = $this->transformerFactory->createCurrencyTransformer();

        $this->assertEquals(
            new SubunitFormat(SubunitFormat::WORDS),
            $this->readAttribute($currencyTransformer, 'subunit')
        );

        $currencyTransformer = $this->transformerFactory->createCurrencyTransformer();

        $this->assertEquals(
            new SubunitFormat(SubunitFormat::NUMBERS),
            $this->readAttribute($currencyTransformer, 'subunit')
        );
    }
}
