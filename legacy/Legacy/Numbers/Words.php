<?php

namespace NumberToWords\Legacy\Numbers;

use NumberToWords\Legacy\Math\BigInteger;
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
     * @param integer $number
     * @param string  $locale
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

        if (!is_int($number)) {
            $normalizedNumber = $this->normalizeNumber($number);
            $number = preg_replace('/(.*?)('.preg_quote(self::DEFAULT_DECIMAL_POINT).'.*?)?$/', '$1', $normalizedNumber);
        }

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
        $className = $this->resolveLocaleClassName($locale);

        $obj = new $className();

        if (null === $decimalPoint) {
            $decimalPoint = self::DEFAULT_DECIMAL_POINT;
        }

        // round if a float is passed, use BigInteger otherwise
        if (is_float($num)) {
            $num = round($num, 2);
        }

        $num = $this->normalizeNumber($num, $decimalPoint);

        if (strpos($num, $decimalPoint) === false) {
            return trim($obj->toCurrencyWords($intCurr, $num));
        }

        $currency = explode($decimalPoint, $num, 2);

        $len = strlen($currency[1]);

        if ($len == 1) {
            // add leading zero
            $currency[1] .= '0';
        } elseif ($len > 2) {
            // get the 3rd digit after the comma
            $round_digit = substr($currency[1], 2, 1);

            // cut everything after the 2nd digit
            $currency[1] = substr($currency[1], 0, 2);

            if ($round_digit >= 5) {
                // round up without losing precision
                include_once "Math/BigInteger.php";

                $int = new BigInteger(join($currency));
                $int = $int->add(new BigInteger(1));
                $int_str = $int->toString();

                $currency[0] = substr($int_str, 0, -2);
                $currency[1] = substr($int_str, -2);

                // check if the rounded decimal part became zero
                if ($currency[1] == '00') {
                    $currency[1] = false;
                }
            }
        }

        return trim($obj->toCurrencyWords($intCurr, $currency[0], $currency[1]));
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

    /**
     * @param string $number
     * @param string $decimalPoint
     *
     * @return string
     */
    private function normalizeNumber($number, $decimalPoint = null)
    {
        if (null === $decimalPoint) {
            $decimalPoint = self::DEFAULT_DECIMAL_POINT;
        }

        return preg_replace('/[^-'.preg_quote($decimalPoint).'0-9]/', '', $number);
    }
}
