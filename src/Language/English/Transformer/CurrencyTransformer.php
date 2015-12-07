<?php

namespace Kwn\NumberToWords\Language\English\Transformer;

use Kwn\NumberToWords\Model\Amount;
use Kwn\NumberToWords\Model\Number;
use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;
use Kwn\NumberToWords\Exception\InvalidArgumentException;
use Kwn\NumberToWords\Language\English\Dictionary\Currency as CurrencyDictionary;
use Kwn\NumberToWords\Transformer\CurrencyTransformer as CurrencyTransformerInterface;

class CurrencyTransformer implements CurrencyTransformerInterface
{

    /**
     * @var NumberTransformer
     */
    protected $numberTransformer;

    /**
     * @var CurrencyDictionary
     */
    protected $currencyDictionary;

    /**
     * @param NumberTransformer $numberTransformer
     * @param CurrencyDictionary $currencyDictionary
     */
    public function __construct(NumberTransformer $numberTransformer, CurrencyDictionary $currencyDictionary)
    {
        $this->numberTransformer = $numberTransformer;
        $this->currencyDictionary = $currencyDictionary;
    }

    /**
     * Check if currency definitions exist in dictionary
     *
     * @param Currency $currency
     *
     * @throws InvalidArgumentException
     */
    private function guardAgainstUnexistingCurrency(Currency $currency)
    {
        if (!array_key_exists($currency->getIdentifier(), $this->currencyDictionary->getUnitNames())) {
            throw new InvalidArgumentException(sprintf(
                'There is missing "%s" unit in a currency dictionary',
                $currency->getIdentifier()
            ));
        }

        if (!array_key_exists($currency->getIdentifier(), $this->currencyDictionary->getSubunitNames())) {
            throw new InvalidArgumentException(sprintf(
                'There is missing "%s" subunit in a currency dictionary',
                $currency->getIdentifier()
            ));
        }
    }

    /**
     * Convert given number to words
     *
     * @param Amount $amount
     *
     * @return string
     */
    public function toWords(Amount $amount)
    {
        $this->guardAgainstUnexistingCurrency($amount->getCurrency());

        return $this->getIntegerPart($amount) . ' ' . $this->getFractionalPart($amount);
    }

    /**
     * Gets the integer part of the provided amount
     *
     * @param Amount $amount
     *
     * @return string
     */
    protected function getIntegerPart(Amount $amount)
    {
        $number = $amount->getNumber();
        $value = $number->getValue();
        $unitName = $this->currencyDictionary->getUnitName($amount->getCurrency(), !$this->isSingular($value));

        return $this->numberTransformer->toWords($value) . ' ' . $unitName;
    }

    /**
     * Gets the fractional part of the provided amount
     *
     * @param Amount $amount
     *
     * @return string
     */
    protected function getFractionalPart(Amount $amount)
    {
        $subunitValue = $amount->getNumber()->getSubunits();

        //if the subunit format is numbers, we want to simply return a fraction
        if ($amount->getSubunitFormat()->getFormat() === SubunitFormat::NUMBERS)
            return $subunitValue . '/100';

        $unitName = $this->currencyDictionary->getSubunitName($amount->getCurrency(), !$this->isSingular($subunitValue));

        return $this->numberTransformer->toWords($subunitValue) . ' ' . $unitName;
    }

    /**
     * Determines if the provided number is singular
     *
     * @param mixed $number
     *
     * @return bool
     */
    protected function isSingular($number)
    {
        return $number == 1;
    }
}
