<?php

namespace Kwn\NumberToWords\Language\Polish;

use Kwn\NumberToWords\Factory\AbstractTransformerFactory;
use Kwn\NumberToWords\Language\Polish\Transformer\Decorator\CurrencyTransformerDecorator;
use Kwn\NumberToWords\Language\Polish\Transformer\NumberTransformer;
use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;

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
