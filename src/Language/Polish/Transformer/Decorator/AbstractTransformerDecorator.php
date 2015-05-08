<?php

namespace Kwn\NumberToWords\Language\Polish\Transformer\Decorator;

use Kwn\NumberToWords\Language\Polish\Transformer\AbstractTransformer;
use Kwn\NumberToWords\Model\Number;

abstract class AbstractTransformerDecorator extends AbstractTransformer
{
    /**
     * @var AbstractTransformer
     */
    private $transformer;

    /**
     * Constructor
     *
     * @param AbstractTransformer $transformer
     */
    public function __construct(AbstractTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * Convert number to words with grammar cased subject
     *
     * @param Number $number
     * @param array  $subject
     *
     * @return string
     */
    protected function toWordsWithGrammarCasedDescription(Number $number, array $subject)
    {
        return $this->transformer->toWords($number) . ' ' . $subject[$this->grammarCase($number->getValue())];
    }
}
