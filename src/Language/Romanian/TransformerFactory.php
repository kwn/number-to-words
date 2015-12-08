<?php

namespace Kwn\NumberToWords\Language\Romanian;

use Kwn\NumberToWords\Exception\InvalidArgumentException;
use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;
use Kwn\NumberToWords\Language\Romanian\Transformer\CurrencyTransformer;
use Kwn\NumberToWords\Language\Romanian\Transformer\NumberTransformer;
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
     * @return NumberTransformer
     */
    public function createNumberTransformer()
    {
        return new NumberTransformer();
    }

    /**
     * Create currency transformer
     *
     * @param Currency      $currency
     * @param SubunitFormat $subunitFormat
     *
     * @throws InvalidArgumentException
     * @return CurrencyTransformer
     */
    public function createCurrencyTransformer(Currency $currency, SubunitFormat $subunitFormat)
    {
        $transformer = new CurrencyTransformer(new NumberTransformer());

        $transformer->setCurrency($currency);
        $transformer->setSubunitFormat($subunitFormat);

        return $transformer;
    }
}
