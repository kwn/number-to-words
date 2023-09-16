<?php

namespace NumberToWords\Legacy\Numbers;

use NumberToWords\TransformerOptions\CurrencyTransformerOptions;
use NumberToWords\Exception\NumberToWordsException;

class Words
{
    protected CurrencyTransformerOptions $options;

    public function __construct($options = null)
    {
        if ($options === null) {
            $this->options = new CurrencyTransformerOptions();
        } else {
            $this->options = $options;
        }
    }

    /**
     * @throws NumberToWordsException
     */
    public function transformToWords(int $number, string $locale): string
    {
        $localeClassName = $this->resolveLocaleClassName($locale);
        $transformer = new $localeClassName();

        return trim($transformer->toWords($number));
    }

    /**
     * @throws NumberToWordsException
     */
    public function transformToCurrency(int $amount, string $locale, string $currency): string
    {
        $localeClassName = $this->resolveLocaleClassName($locale);
        $transformer = new $localeClassName($this->options);

        $decimalPart = (int) ($amount / 100);
        $fractionalPart = abs($amount % 100);

        if ($fractionalPart === 0) {
            return trim($transformer->toCurrencyWords($currency, $decimalPart));
        }

        return trim($transformer->toCurrencyWords($currency, $decimalPart, $fractionalPart));
    }

    /**
     * @throws NumberToWordsException
     */
    private function resolveLocaleClassName(string $locale): string
    {
        $locale = implode('\\', array_map(
            static fn ($element) => ucfirst(strtolower($element)),
            explode('_', $locale)
        ));

        $class = 'NumberToWords\\Legacy\\Numbers\\Words\\Locale\\' . $locale;

        if (!class_exists($class)) {
            throw new NumberToWordsException(sprintf('Unable to load locale class %s', $class));
        }

        return $class;
    }
}
