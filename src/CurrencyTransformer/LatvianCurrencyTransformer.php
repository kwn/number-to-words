<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Language\Latvian\LatvianDictionary;
use NumberToWords\NumberTransformer\LatvianNumberTransformer;
use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class LatvianCurrencyTransformer implements CurrencyTransformer
{
    public function toWords(int $amount, string $currency, ?CurrencyTransformerOptions $options = null): string
    {
        $dictionary = new LatvianDictionary();
        $numberTransformer = new LatvianNumberTransformer();

        $decimal = (int) ($amount / 100);
        $fraction = abs($amount % 100);

        if ($fraction === 0) {
            $fraction = null;
        }

        $currency = strtoupper($currency);

        if (!array_key_exists($currency, LatvianDictionary::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = LatvianDictionary::$currencyNames[$currency];

        $return = trim($numberTransformer->toWords($decimal));
        $level = $this->getLevel($decimal);

        $return .= ' ' . $currencyNames[0][$level];

        if (!is_null($fraction)) {
            $return .= ' ' . $dictionary->getAnd() . ' ' . trim($numberTransformer->toWords($fraction));

            $level = $this->getLevel($fraction);

            $return .= ' ' . $currencyNames[1][$level];
        } else {
            $level = 1;

            $return .= ' ' . $dictionary->getAnd() . ' ' . $dictionary->getZero() . ' ' . $currencyNames[1][$level];
        }

        return $return;
    }

    /**
     * @param $number
     * @return int
     */
    public function getLevel($number)
    {
        $lastTwoDigits = $number % 100;
        $lastDigit = $number % 10;
        $isUnit = log($number) === 1;

        if ($number === 0) {
            return 1;
        }

        if (!$isUnit && $lastDigit === 0) {
            return 1;
        }

        if (10 <= $lastTwoDigits && $lastTwoDigits <= 20) {
            return 1;
        }

        if ($number === 1) {
            return 0;
        }

        if (!$isUnit && $lastDigit === 1) {
            return 0;
        }

        return 2;
    }
}
