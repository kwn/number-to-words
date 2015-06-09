<?php


namespace Kwn\NumberToWords\Language\Romanian;

use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\Subunit;

class RomanianTransformerFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RomanianTransformerFactory
     */
    private $transformerFactory;

    public function setUp()
    {
        $this->transformerFactory = new RomanianTransformerFactory();
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
        $currencyTransformer = $this->transformerFactory->createCurrencyTransformer(new Currency('ROL'));

        $this->assertInstanceOf(
            'Kwn\NumberToWords\Language\Romanian\Transformer\Decorator\CurrencyTransformerDecorator',
            $currencyTransformer
        );

        $this->assertEquals(
            new Subunit(Subunit::FORMAT_IN_WORDS),
            $this->readAttribute($currencyTransformer, 'subunit')
        );
    }

    public function testCreateCurrencyTransformerBuildClassWithCorrectSubunitsValue()
    {
        $currencyTransformer = $this->transformerFactory->createCurrencyTransformer(
            new Currency('ROL'),
            new Subunit(Subunit::FORMAT_IN_WORDS)
        );

        $this->assertEquals(
            new Subunit(Subunit::FORMAT_IN_WORDS),
            $this->readAttribute($currencyTransformer, 'subunit')
        );

        $currencyTransformer = $this->transformerFactory->createCurrencyTransformer(
            new Currency('EUR'),
            new Subunit(Subunit::FORMAT_IN_NUMBERS)
        );

        $this->assertEquals(
            new Subunit(Subunit::FORMAT_IN_NUMBERS),
            $this->readAttribute($currencyTransformer, 'subunit')
        );
    }
}
