<?php

namespace Kwn\NumberToWords\Language\Polish\Transformer\Decorator;

use Kwn\NumberToWords\Exception\InvalidArgumentException;
use Kwn\NumberToWords\Language\Polish\Dictionary\Currency as CurrencyDictionary;
use Kwn\NumberToWords\Language\Polish\Transformer\AbstractTransformer;
use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\Number;
use Kwn\NumberToWords\Model\SubunitFormat;

class CurrencyTransformerDecorator extends AbstractTransformerDecorator
{
    /**
     * @var Currency
     */
    protected $currency;

    /**
     * @var SubunitFormat
     */
    protected $subunit;

    /**
     * Constructor
     *
     * @param AbstractTransformer $transformer
     * @param Currency            $currency
     * @param SubunitFormat             $subunit
     *
     * @throws InvalidArgumentException
     */
    public function __construct(AbstractTransformer $transformer, Currency $currency, SubunitFormat $subunit)
    {
        $this->guardAgainstUnexistingCurrency($currency);

        parent::__construct($transformer);

        $this->currency = $currency;
        $this->subunit  = $subunit;
    }

    /**
     * Check if currency definitions exist in dictionary
     *
     * @param Currency $currency
     *
     * @throws InvalidArgumentException
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
     * Convert given number to words
     *
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

        if ($this->subunit->getFormat() === SubunitFormat::WORDS) {
            $subunit = $this->toWordsWithGrammarCasedDescription(
                new Number($subunitAmount),
                CurrencyDictionary::getSubunits()['PLN']
            );
        } else {
            $subunit = sprintf('%d/100', $subunitAmount);
        }

        return $unit . ' ' . $subunit;
    }
}
