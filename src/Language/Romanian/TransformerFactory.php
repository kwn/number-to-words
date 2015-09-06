<?php

namespace Kwn\NumberToWords\Language\Romanian;

use Kwn\NumberToWords\Language\Romanian\Transformer\CurrencyTransformer;
use Kwn\NumberToWords\Language\Romanian\Transformer\NumberTransformer;
use Kwn\NumberToWords\Transformer\CurrencyTransformer as CurrencyTransformerInterface;
use Kwn\NumberToWords\Transformer\NumberTransformer as NumberTransformerInterface;
use Kwn\NumberToWords\Transformer\TransformerFactory as TransformerFactoryInterface;

class TransformerFactory implements TransformerFactoryInterface
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
     * @return NumberTransformerInterface
     */
    public function createNumberTransformer()
    {
        return new NumberTransformer();
    }

    /**
     * Create currency transformer
     *
     * @return CurrencyTransformerInterface
     */
    public function createCurrencyTransformer()
    {
        return new CurrencyTransformer(new NumberTransformer());
    }
}
