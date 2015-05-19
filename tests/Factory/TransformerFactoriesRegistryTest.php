<?php

namespace Kwn\NumberToWords\Factory;

use Kwn\NumberToWords\Language\Polish\PolishTransformerFactory;

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
}
