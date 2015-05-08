<?php

namespace Kwn\NumberToWords\Language\Polish\Transformer\Decorator;

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
     * @var int
     */
    protected $format;

    /**
     * @param AbstractTransformer $transformer
     * @param Currency            $currency
     * @param int                 $format
     */
    public function __construct(
        AbstractTransformer $transformer,
        Currency $currency,
        $format = self::FORMAT_SUBUNITS_IN_WORDS
    ) {
        $this->guardAgainstUnexistingIdentifier($currency);
        $this->guardAgainstUnexistingFormat($format);

        parent::__construct($transformer);

        $this->currency = $currency;
        $this->format   = $format;
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

        if ($this->format === self::FORMAT_SUBUNITS_IN_WORDS) {
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
     * @param Currency $currency
     */
    protected function guardAgainstUnexistingIdentifier(Currency $currency)
    {
        if (!array_key_exists($currency->getIdentifier(), CurrencyDictionary::getUnits())) {
            throw new \InvalidArgumentException(sprintf(
                'There is missing "%s" unit in a currency dictionary',
                $currency->getIdentifier()
            ));
        }

        if (!array_key_exists($currency->getIdentifier(), CurrencyDictionary::getSubunits())) {
            throw new \InvalidArgumentException(sprintf(
                'There is missing "%s" subunit in a currency dictionary',
                $currency->getIdentifier()
            ));
        }
    }

    /**
     * @param int $format
     */
    protected function guardAgainstUnexistingFormat($format)
    {
        if (!in_array($format, [ self::FORMAT_SUBUNITS_IN_WORDS, self::FORMAT_SUBUNITS_IN_NUMBERS ])) {
            throw new \InvalidArgumentException('Unexisting subunits format specified');
        }
    }
}
