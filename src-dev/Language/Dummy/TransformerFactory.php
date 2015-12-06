<?php

namespace Kwn\NumberToWords\Language\Dummy;

use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;
use Kwn\NumberToWords\Transformer\CurrencyTransformer as CurrencyTransformerInterface;
use Kwn\NumberToWords\Transformer\NumberTransformer as NumberTransformerInterface;
use Kwn\NumberToWords\Transformer\TransformerFactory as TransformerFactoryInterface;

class TransformerFactory implements TransformerFactoryInterface
{
    /**
     * Language identifier (RFC 3066)
     */
    const LANGUAGE_IDENTIFIER = 'du';

    /**
     * Language name
     */
    const LANGUAGE_NAME = 'Dummy';

    /**
     * Native language name
     */
    const LANGUAGE_NATIVE_NAME = 'Dummy';

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
        return null;
    }

    /**
     * Create currency transformer
     *
     * @param Currency      $currency
     * @param SubunitFormat $subunitFormat
     *
     * @return CurrencyTransformerInterface
     */
    public function createCurrencyTransformer(Currency $currency, SubunitFormat $subunitFormat)
    {
        return null;
    }
}
