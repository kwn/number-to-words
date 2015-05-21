<?php

namespace Kwn\NumberToWords\Factory;

use Kwn\NumberToWords\Model\Language;

class TransformerFactoriesRegistry
{
    /**
     * @var \ArrayObject
     */
    private $transformerFactories;

    /**
     * Constructor
     *
     * @param array $transformerFactories A list of transformer factories to registry
     */
    public function __construct(array $transformerFactories = [])
    {
        $this->transformerFactories = new \ArrayObject();

        foreach ($transformerFactories as $transformerFactory) {
            $this->addTransformerFactory($transformerFactory);
        }
    }

    /**
     * Get registered transformer factories
     *
     * @return \ArrayObject
     */
    public function getTransformerFactories()
    {
        return $this->transformerFactories;
    }

    /**
     * Add transformer factory to registry
     *
     * @param AbstractTransformerFactory $factory
     */
    public function addTransformerFactory(AbstractTransformerFactory $factory)
    {
        $this->transformerFactories->offsetSet(
            $factory->getLanguageIdentifier(),
            $factory
        );
    }

    /**
     * Remove transformer factory from registry
     *
     * @param AbstractTransformerFactory $factory
     */
    public function removeTransformerFactory(AbstractTransformerFactory $factory)
    {
        $this->transformerFactories->offsetUnset($factory->getLanguageIdentifier());
    }

    /**
     * Check if transformer factory of particular language exists
     *
     * @param Language $language
     *
     * @return bool
     */
    public function isTransformerFactoryExists(Language $language)
    {
        return $this->transformerFactories->offsetExists($language->getIdentifier());
    }
}
