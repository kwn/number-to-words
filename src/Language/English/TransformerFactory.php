<?php

namespace Kwn\NumberToWords\Language\English;

use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;
use Kwn\NumberToWords\Language\English\Transformer\NumberTransformer;
use Kwn\NumberToWords\Language\English\Transformer\CurrencyTransformer;
use Kwn\NumberToWords\Language\English\Dictionary\Number as NumberDictionary;
use Kwn\NumberToWords\Language\English\Dictionary\Currency as CurrencyDictionary;
use Kwn\NumberToWords\Transformer\TransformerFactory as TransformerFactoryInterface;

class TransformerFactory implements TransformerFactoryInterface
{
    /**
     * Language identifier (RFC 3066)
     */
    const LANGUAGE_IDENTIFIER = 'en';

    /**
     * Language name
     */
    const LANGUAGE_NAME = 'English';

    /**
     * Native language name
     */
    const LANGUAGE_NATIVE_NAME = 'English';

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
        return new NumberTransformer(new NumberDictionary);
    }

    /**
     * Create currency transformer
     *
     * @param Currency $currency
     * @param SubunitFormat $currency
     *
     * @return CurrencyTransformerInterface
     */
    public function createCurrencyTransformer(Currency $currency, SubunitFormat $subunitFormat)
    {
        return new CurrencyTransformer($this->createNumberTransformer(), new CurrencyDictionary);
    }
}
