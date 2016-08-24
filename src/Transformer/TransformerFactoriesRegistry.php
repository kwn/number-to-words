<?php

namespace Kwn\NumberToWords\Transformer;

class TransformerFactoriesRegistry
{
    /**
     * @var \ArrayObject
     */
    private $transformerFactories;

    /**
     * @param array $transformerFactories
     */
    public function __construct(array $transformerFactories = [])
    {
        $this->transformerFactories = new \ArrayObject();

        foreach ($transformerFactories as $transformerFactory) {
            $this->addTransformerFactory($transformerFactory);
        }
    }

    /**
     * @return \ArrayObject
     */
    public function getTransformerFactories()
    {
        return $this->transformerFactories;
    }

    /**
     * @param TransformerFactory $factory
     */
    public function addTransformerFactory(TransformerFactory $factory)
    {
        $this->transformerFactories->offsetSet($factory->getLanguageIdentifier(), $factory);
    }

    /**
     * @param TransformerFactory $factory
     */
    public function removeTransformerFactory(TransformerFactory $factory)
    {
        $this->transformerFactories->offsetUnset($factory->getLanguageIdentifier());
    }
}
