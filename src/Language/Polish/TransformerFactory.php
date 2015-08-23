<?php

namespace Kwn\NumberToWords\Language\Polish;

use Kwn\NumberToWords\Language\Polish\Grammar\GrammarCaseSelector;
use Kwn\NumberToWords\Transformer\TransformerFactory as TransformerFactoryInterface;
use Kwn\NumberToWords\Language\Polish\Transformer\CurrencyTransformer;
use Kwn\NumberToWords\Language\Polish\Transformer\NumberTransformer;
use Kwn\NumberToWords\Model\Currency;

class TransformerFactory implements TransformerFactoryInterface
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
        return new NumberTransformer(new GrammarCaseSelector());
    }

    /**
     * Create currency transformer
     *
     * @return CurrencyTransformer
     */
    public function createCurrencyTransformer()
    {
        return new CurrencyTransformer(new NumberTransformer(new GrammarCaseSelector()), new GrammarCaseSelector());
    }
}
