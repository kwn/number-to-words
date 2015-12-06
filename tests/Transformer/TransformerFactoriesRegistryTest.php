<?php

namespace Kwn\NumberToWords\Transformer;

use Kwn\NumberToWords\Language\Dummy\TransformerFactory;

class TransformerFactoriesRegistryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateNewRegistryWithInitialFactories()
    {
        $registry = new TransformerFactoriesRegistry([
            new TransformerFactory()
        ]);

        $this->assertCount(1, $registry->getTransformerFactories());
    }

    public function testAddTransformerFactory()
    {
        $registry = new TransformerFactoriesRegistry();
        $this->assertCount(0, $registry->getTransformerFactories());

        $registry->addTransformerFactory(new TransformerFactory());
        $this->assertCount(1, $registry->getTransformerFactories());
    }

    public function testRemoveTransformerFactory()
    {
        $factory  = new TransformerFactory();
        $registry = new TransformerFactoriesRegistry([
            $factory
        ]);

        $this->assertCount(1, $registry->getTransformerFactories());
        $registry->removeTransformerFactory($factory);
        $this->assertCount(0, $registry->getTransformerFactories());
    }
}
