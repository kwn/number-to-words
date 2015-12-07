<?php

namespace Kwn\NumberToWords\Language\Polish\Transformer;

use Kwn\NumberToWords\Exception\InvalidArgumentException;
use Kwn\NumberToWords\Language\Polish\Dictionary\Currency as CurrencyDictionary;
use Kwn\NumberToWords\Model\Amount;
use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;
use Kwn\NumberToWords\Transformer\CurrencyTransformer as CurrencyTransformerInterface;

class CurrencyTransformer extends GrammarCaseAwareTransformer implements CurrencyTransformerInterface
{
    /**
     * Check if currency definitions exist in dictionary
     *
     * @param Currency $currency
     *
     * @throws InvalidArgumentException
     */
    private function guardAgainstUnexistingCurrency(Currency $currency)
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
     * @param Amount $amount
     *
     * @return string
     */
    public function toWords(Amount $amount)
    {
        $this->guardAgainstUnexistingCurrency($amount->getCurrency());

        $unit = $this->toWordsWithGrammarCasedDescription(
            $amount->getNumber()->getUnits(),
            CurrencyDictionary::getUnits()['PLN']
        );

        if ($amount->getSubunitFormat()->getFormat() === SubunitFormat::WORDS) {
            $subunit = $this->toWordsWithGrammarCasedDescription(
                $amount->getNumber()->getSubunits(),
                CurrencyDictionary::getSubunits()['PLN']
            );
        } else {
            $subunit = sprintf('%d/100', $amount->getNumber()->getSubunits());
        }

        return $unit . ' ' . $subunit;
    }
}
