<?php

namespace Kwn\NumberToWords\Factory;

use Kwn\NumberToWords\Language\Polish\PolishTransformerFactory;
use Kwn\NumberToWords\Model\Language;

class TransformerFactoriesRegistryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateNewRegistryWithInitialFactories()
    {
        $registry = new TransformerFactoriesRegistry([
            new PolishTransformerFactory()
        ]);

        $this->assertCount(1, $registry->getTransformerFactories());
    }

    public function testAddTransformerFactory()
    {
        $registry = new TransformerFactoriesRegistry();
        $this->assertCount(0, $registry->getTransformerFactories());

        $registry->addTransformerFactory(new PolishTransformerFactory());
        $this->assertCount(1, $registry->getTransformerFactories());
    }

    public function testRemoveTransformerFactory()
    {
        $factory  = new PolishTransformerFactory();
        $registry = new TransformerFactoriesRegistry([
            $factory
        ]);

        $this->assertCount(1, $registry->getTransformerFactories());
        $registry->removeTransformerFactory($factory);
        $this->assertCount(0, $registry->getTransformerFactories());
    }

    public function testIsTransformerFactoryExists()
    {
        $factory  = new PolishTransformerFactory();
        $registry = new TransformerFactoriesRegistry([
            $factory
        ]);

        $this->assertEquals(true, $registry->isTransformerFactoryExists(new Language('pl')));
        $this->assertEquals(false, $registry->isTransformerFactoryExists(new Language('sq')));
    }

    public function testGetRegisteredTransformerFactory()
    {
        $factory  = new PolishTransformerFactory();
        $registry = new TransformerFactoriesRegistry([
            $factory
        ]);

        $transformerFactory = $registry->getTransformerFactory(new Language('pl'));
        $this->assertInstanceOf('Kwn\NumberToWords\Factory\AbstractTransformerFactory', $transformerFactory);
    }

    /**
     * @expectedException \Kwn\NumberToWords\Exception\InvalidArgumentException
     */
    public function testGetUnregisteredTransformerFactory()
    {
        $registry = new TransformerFactoriesRegistry();

        $registry->getTransformerFactory(new Language('sq'));
    }
}
