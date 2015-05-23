<?php

namespace Kwn\NumberToWords\Language\Polish\Transformer\Decorator;

use Kwn\NumberToWords\Exception\InvalidArgumentException;
use Kwn\NumberToWords\Language\Polish\Dictionary\Currency as CurrencyDictionary;
use Kwn\NumberToWords\Language\Polish\Transformer\AbstractTransformer;
use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\Number;

class CurrencyTransformerDecorator extends AbstractTransformerDecorator
{
    const FORMAT_SUBUNITS_IN_WORDS   = 1;
    const FORMAT_SUBUNITS_IN_NUMBERS = 2;

    /**
     * @var Currency
     */
    protected $currency;

    /**
     * @var integer
     */
    protected $subunitsFormat;

    /**
     * @param AbstractTransformer $transformer
     * @param Currency            $currency
     * @param integer             $subunitsFormat
     */
    public function __construct(AbstractTransformer $transformer, Currency $currency, $subunitsFormat)
    {
        $this->guardAgainstUnexistingCurrency($currency);
        $this->guardAgainstUnexistingSubunitsFormat($subunitsFormat);

        parent::__construct($transformer);

        $this->currency       = $currency;
        $this->subunitsFormat = $subunitsFormat;
    }

    /**
     * @param Number $number
     *
     * @return string
     */
    public function toWords(Number $number)
    {
        $value = $number->getValue();

        $unitAmount    = (int) $value;
        $subunitAmount = (int) ($value * 100) % 100;

        $unit = $this->toWordsWithGrammarCasedDescription(
            new Number($unitAmount),
            CurrencyDictionary::getUnits()['PLN']
        );

        if ($this->subunitsFormat === self::FORMAT_SUBUNITS_IN_WORDS) {
            $subunit = $this->toWordsWithGrammarCasedDescription(
                new Number($subunitAmount),
                CurrencyDictionary::getSubunits()['PLN']
            );
        } else {
            $subunit = sprintf('%d/100', $subunitAmount);
        }

        return $unit . ' ' . $subunit;
    }

    /**
     * Check if currency definitions exist in dictionary
     *
     * @param Currency $currency
     */
    protected function guardAgainstUnexistingCurrency(Currency $currency)
    {
        if (!array_key_exists($currency->getIdentifier(), CurrencyDictionary::getUnits())) {
            throw new InvalidArgumentException(sprintf(
                'There is missing "%s" unit in a currency dictionary',
                $currency->getIdentifier()
            ));
        }

        if (!array_key_exists($currency->getIdentifier(), CurrencyDictionary::getSubunits())) {
            throw new InvalidArgumentException(sprintf(
                'There is missing "%s" subunit in a currency dictionary',
                $currency->getIdentifier()
            ));
        }
    }

    /**
     * Check if passed subunit format is correct
     *
     * @param integer $subunitsFormat
     */
    protected function guardAgainstUnexistingSubunitsFormat($subunitsFormat)
    {
        if (!in_array($subunitsFormat, [ self::FORMAT_SUBUNITS_IN_WORDS, self::FORMAT_SUBUNITS_IN_NUMBERS ])) {
            throw new InvalidArgumentException('Unexisting subunits format specified');
        }
    }
}
