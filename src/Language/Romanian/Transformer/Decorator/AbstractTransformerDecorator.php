<?php

namespace Kwn\NumberToWords\Language\Romanian\Transformer\Decorator;

use Kwn\NumberToWords\Language\Romanian\Transformer\AbstractTransformer;

abstract class AbstractTransformerDecorator
{
    /**
     * @var AbstractTransformer
     */
    protected $transformer;

    /**
     * Constructor
     *
     * @param AbstractTransformer $transformer
     */
    public function __construct(AbstractTransformer $transformer)
    {
        $this->transformer = $transformer;
    }
}
