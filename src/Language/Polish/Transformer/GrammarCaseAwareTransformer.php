<?php

namespace Kwn\NumberToWords\Language\Polish\Transformer;

use Kwn\NumberToWords\Language\Polish\Grammar\GrammarCaseSelector;

abstract class GrammarCaseAwareTransformer
{
    /**
     * @var NumberTransformer
     */
    private $numberTransformer;

    /**
     * @var GrammarCaseSelector
     */
    private $grammarCaseSelector;

    /**
     * @param NumberTransformer   $numberTransformer
     * @param GrammarCaseSelector $grammarCaseSelector
     */
    public function __construct(NumberTransformer $numberTransformer, GrammarCaseSelector $grammarCaseSelector)
    {
        $this->numberTransformer   = $numberTransformer;
        $this->grammarCaseSelector = $grammarCaseSelector;
    }

    /**
     * Convert number to words with grammar cased subject
     *
     * @param mixed  $number
     * @param array  $subject
     *
     * @return string
     */
    protected function toWordsWithGrammarCasedDescription($number, array $subject)
    {
        $convertedNumber = $this->numberTransformer->toWords($number);
        $grammarCase     = $this->grammarCaseSelector->getGrammarCase($number);

        return $convertedNumber . ' ' . $subject[$grammarCase];
    }
}
