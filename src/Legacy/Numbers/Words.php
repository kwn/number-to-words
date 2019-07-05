<?php

namespace NumberToWords\Legacy\Numbers;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;
use NumberToWords\Exception\NumberToWordsException;

class Words
{
    /** @var CurrencyTransformerOptions */
    protected $options;

    public function __construct($options = null)
    {
        if (null === $options) {
            $this->options = new CurrencyTransformerOptions();
        } else {
            $this->options = $options;
        }
    }

    /**
     * @param int    $number
     * @param string $locale
     *
     * @throws NumberToWordsException
     * @return string
     */
    public function transformToWords($number, $locale)
    {
        $localeClassName = $this->resolveLocaleClassName($locale);
        $transformer = new $localeClassName();

        return trim($transformer->toWords($number));
    }

    /**
     * @param int    $amount
     * @param string $locale
     * @param string $currency
     *
     * @throws NumberToWordsException
     * @return string
     */
    public function transformToCurrency($amount, $locale, $currency)
    {
        $localeClassName = $this->resolveLocaleClassName($locale);
        $transformer = new $localeClassName($this->options);

        $decimalPart = (int) ($amount / 100);
        $fractionalPart = abs($amount % 100);

        if (0 === $fractionalPart) {
            return trim($transformer->toCurrencyWords($currency, $decimalPart));
        }

        return trim($transformer->toCurrencyWords($currency, $decimalPart, $fractionalPart));
    }

    /**
     * @param string $locale
     *
     * @throws NumberToWordsException
     * @return string
     */
    private function resolveLocaleClassName($locale)
    {
        $locale = implode('\\', array_map(function ($element) {
            return ucfirst(strtolower($element));
        }, explode('_', $locale)));

        $class = 'NumberToWords\\Legacy\\Numbers\\Words\\Locale\\' . $locale;

        if (!class_exists($class)) {
            throw new NumberToWordsException(sprintf('Unable to load locale class %s', $class));
        }

        return $class;
    }
}
