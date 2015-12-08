<?php

namespace Kwn\NumberToWords\Transformer;

class TransformerFactoriesRegistry
{
    /**
     * @var \ArrayObject
     */
    private $transformerFactories;

    /**
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
     * @param TransformerFactory $factory
     */
    public function addTransformerFactory(TransformerFactory $factory)
    {
        $this->transformerFactories->offsetSet($factory->getLanguageIdentifier(), $factory);
    }

    /**
     * Remove transformer factory from registry
     *
     * @param TransformerFactory $factory
     */
    public function removeTransformerFactory(TransformerFactory $factory)
    {
        $this->transformerFactories->offsetUnset($factory->getLanguageIdentifier());
    }
}
