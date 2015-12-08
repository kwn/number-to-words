<?php

namespace Kwn\NumberToWords\Language\Polish\Transformer;

use Kwn\NumberToWords\Model\SubunitFormat;
use Kwn\NumberToWords\Language\Polish\Grammar\GrammarCaseSelector;
use Kwn\NumberToWords\Language\Polish\Dictionary\Currency as CurrencyDictionary;
use Kwn\NumberToWords\Transformer\CurrencyTransformer as BaseCurrencyTransformer;

class CurrencyTransformer extends BaseCurrencyTransformer
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
        $this->numberTransformer = $numberTransformer;
        $this->grammarCaseSelector = $grammarCaseSelector;
    }

    /**
     * Convert given number to words
     *
     * @param mixed $number
     *
     * @return string
     */
    public function toWords($number)
    {
        $number = $this->createCurrencyNumber($number);

        $unit = $this->toWordsWithGrammarCasedDescription(
            $number->getUnits(),
            CurrencyDictionary::getUnits()['PLN']
        );

        if ($this->subunitFormat->getFormat() === SubunitFormat::WORDS) {
            $subunit = $this->toWordsWithGrammarCasedDescription(
                $number->getSubunits(),
                CurrencyDictionary::getSubunits()['PLN']
            );
        } else {
            $subunit = sprintf('%d/100', $number->getSubunits());
        }

        return $unit . ' ' . $subunit;
    }

    /**
     * Gets an array of valid currencies (ISO 4217)
     *
     * @return array
     */
    protected function getValidCurrencies()
    {
        return array_keys(CurrencyDictionary::getUnits());
    }

    /**
     * Convert number to words with grammar cased subject
     *
     * @param mixed $number
     * @param array $subject
     *
     * @return string
     */
    protected function toWordsWithGrammarCasedDescription($number, array $subject)
    {
        $convertedNumber = $this->numberTransformer->toWords($number);
        $grammarCase = $this->grammarCaseSelector->getGrammarCase($number);

        return $convertedNumber . ' ' . $subject[$grammarCase];
    }
}
