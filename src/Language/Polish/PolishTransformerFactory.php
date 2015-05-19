<?php

namespace Kwn\NumberToWords\Language\Polish;

use Kwn\NumberToWords\Factory\AbstractTransformerFactory;
use Kwn\NumberToWords\Language\Polish\Transformer\Decorator\CurrencyTransformerDecorator;
use Kwn\NumberToWords\Language\Polish\Transformer\NumberTransformer;
use Kwn\NumberToWords\Model\Currency;

class PolishTransformerFactory extends AbstractTransformerFactory
{
    const LANGUAGE_IDENTIFIER = 'pl';

    /**
     * Return language identifier (RFC 3066)
     *
     * @return string
     */
    public function getLanguageIdentifier()
    {
        return self::LANGUAGE_IDENTIFIER;
    }

    /**
     * Create number transformer
     *
     * @return NumberTransformer
     */
    public function createNumberTransformer()
    {
        return new NumberTransformer();
    }

    /**
     * Create currency transformer
     *
     * @param string  $currency       Currency identifier (ISO 4217)
     * @param integer $subunitsFormat Subunits format
     *
     * @return CurrencyTransformerDecorator
     */
    public function createCurrencyTransformer(
        $currency,
        $subunitsFormat = CurrencyTransformerDecorator::FORMAT_SUBUNITS_IN_WORDS
    ) {
        return new CurrencyTransformerDecorator(
            new NumberTransformer(),
            new Currency($currency),
            $subunitsFormat
        );
    }
}
