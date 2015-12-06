<?php

namespace Kwn\NumberToWords\Language\Polish\Transformer;

use Kwn\NumberToWords\Language\Polish\Grammar\GrammarCaseSelector;
use Kwn\NumberToWords\Model\Number;

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
     * @param Number $number
     * @param array  $subject
     *
     * @return string
     */
    protected function toWordsWithGrammarCasedDescription(Number $number, array $subject)
    {
        $convertedNumber = $this->numberTransformer->toWords($number);
        $grammarCase     = $this->grammarCaseSelector->getGrammarCase($number->getUnits());

        return $convertedNumber . ' ' . $subject[$grammarCase];
    }
}
