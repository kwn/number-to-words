<?php


namespace Kwn\NumberToWords\Language\Romanian;

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
}
