<?php

namespace Kwn\NumberToWords\Language\Romanian;

use Kwn\NumberToWords\Transformer\TransformerFactory;
use Kwn\NumberToWords\Language\Romanian\Transformer\Decorator\CurrencyTransformerDecorator;
use Kwn\NumberToWords\Language\Romanian\Transformer\NumberTransformer;
use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;

class RomanianTransformerFactory extends TransformerFactory
{
    /**
     * Language identifier (RFC 3066)
     */
    const LANGUAGE_IDENTIFIER = 'ro';

    /**
     * Language name
     */
    const LANGUAGE_NAME = 'Romanian';

    /**
     * Native language name
     */
    const LANGUAGE_NATIVE_NAME = 'Română';

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
     * @param Currency $currency Currency model
     * @param SubunitFormat  $subunit  Subunits format model
     *
     * @return CurrencyTransformerDecorator
     */
    public function createCurrencyTransformer(
        Currency $currency,
        SubunitFormat $subunit = null
    ) {
        if (null === $subunit) {
            $subunit = new SubunitFormat(SubunitFormat::WORDS);
        }

        return new CurrencyTransformerDecorator(
            new NumberTransformer(),
            $currency,
            $subunit
        );
    }
}
