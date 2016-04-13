<?php

namespace Kwn\NumberToWords\Language\French;

use Kwn\NumberToWords\Exception\InvalidArgumentException;
use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\SubunitFormat;
use Kwn\NumberToWords\Language\French\Transformer\NumberTransformer;
use Kwn\NumberToWords\Language\French\Transformer\CurrencyTransformer;
use Kwn\NumberToWords\Language\French\Dictionary\Number as NumberDictionary;
use Kwn\NumberToWords\Language\French\Dictionary\Currency as CurrencyDictionary;
use Kwn\NumberToWords\Transformer\TransformerFactory as TransformerFactoryInterface;

class TransformerFactory implements TransformerFactoryInterface
{
    /**
     * Language identifier (RFC 3066)
     */
    const LANGUAGE_IDENTIFIER = 'fr';

    /**
     * Language name
     */
    const LANGUAGE_NAME = 'French';

    /**
     * Native language name
     */
    const LANGUAGE_NATIVE_NAME = 'Français';

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
        return new NumberTransformer(new NumberDictionary());
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
        $transformer = new CurrencyTransformer($this->createNumberTransformer(), new CurrencyDictionary());

        $transformer->setCurrency($currency);
        $transformer->setSubunitFormat($subunitFormat);

        return $transformer;
    }
}
