<?php

namespace Kwn\NumberToWords\Language\Polish;

use Kwn\NumberToWords\Factory\AbstractTransformerFactory;
use Kwn\NumberToWords\Language\Polish\Transformer\Decorator\CurrencyTransformerDecorator;
use Kwn\NumberToWords\Language\Polish\Transformer\NumberTransformer;
use Kwn\NumberToWords\Model\Currency;

class PolishTransformerFactory extends AbstractTransformerFactory
{
    /**
     * Language identifier (RFC 3066)
     */
    const LANGUAGE_IDENTIFIER = 'pl';

    /**
     * Language name
     */
    const LANGUAGE_NAME = 'Polish';

    /**
     * Native language name
     */
    const LANGUAGE_NATIVE_NAME = 'Polski';

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
     * @param Currency $currency       Currency model
     * @param integer  $subunitsFormat Subunits format
     *
     * @return CurrencyTransformerDecorator
     */
    public function createCurrencyTransformer(
        Currency $currency,
        $subunitsFormat = CurrencyTransformerDecorator::FORMAT_SUBUNITS_IN_WORDS
    ) {
        return new CurrencyTransformerDecorator(
            new NumberTransformer(),
            $currency,
            $subunitsFormat
        );
    }
}
