<?php

namespace NumberToWords\Legacy\Numbers;

use NumberToWords\Exception\NumberToWordsException;

class Words
{
    const GENDER_MASCULINE = 0;
    const GENDER_FEMININE = 1;
    const GENDER_NEUTER = 2;
    const GENDER_ABSTRACT = 3;
    const DEFAULT_LOCALE = 'en_US';
    const DEFAULT_DECIMAL_POINT = '.';

    /**
     * @param int    $number
     * @param string $locale
     *
     * @throws NumberToWordsException
     * @return string
     */
    public function toWords($number, $locale = '')
    {
        if ('' === $locale) {
            $locale = self::DEFAULT_LOCALE;
        }

        $localeClassName = $this->resolveLocaleClassName($locale);
        $transformer = new $localeClassName();

        return trim($transformer->_toWords($number));
    }

    /**
     * Converts a currency value to word representation (1.02 => one dollar two cents)
     * If the number has not any fraction part, the "cents" number is omitted.
     *
     * @param float  $num          A float/integer/string number representing currency value
     *
     * @param string $locale       Language name abbreviation. Optional. Defaults to en_US.
     *
     * @param string $intCurr      International currency symbol
     *                             as defined by the ISO 4217 standard (three characters).
     *                             E.g. 'EUR', 'USD', 'PLN'. Optional.
     *                             Defaults to $def_currency defined in the language class.
     *
     * @param string $decimalPoint Decimal mark symbol
     *                             E.g. '.', ','. Optional.
     *                             Defaults to $decimalPoint defined in the language class.
     *
     * @throws NumberToWordsException
     * @return string
     */
    public function toCurrency($num, $locale = 'en_US', $intCurr = '', $decimalPoint = null)
    {
        $localeClassName = $this->resolveLocaleClassName($locale);
        $transformer = new $localeClassName();

        $decimalPart = (int) ($num / 100);
        $fractionalPart = $num % 100;

        if (0 === $fractionalPart) {
            return trim($transformer->toCurrencyWords($intCurr, $decimalPart));
        }

        return trim($transformer->toCurrencyWords($intCurr, $decimalPart, $fractionalPart));
    }

    /**
     * @param string $locale
     *
     * @throws NumberToWordsException
     * @return string
     */
    private function resolveLocaleClassName($locale)
    {
        if (false === strpos($locale, '_')) {
            $locale = ucfirst(strtolower($locale));
        } else {
            $locale = implode('\\', array_map(function ($element) {
                return ucfirst(strtolower($element));
            }, explode('_', $locale)));
        }

        $class = 'NumberToWords\\Legacy\\Numbers\\Words\\Locale\\' . $locale;

        if (!class_exists($class)) {
            throw new NumberToWordsException(sprintf('Unable to load locale class %s', $class));
        }

        return $class;
    }
}
