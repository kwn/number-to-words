<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Language\Polish\Dictionary;
use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;
use NumberToWords\Service\NumberToTripletsConverter;

class Pl extends Words
{
    /**
     * @var NumberToTripletsConverter
     */
    private $numberToTripletsConverter;

    public function __construct()
    {
        $this->numberToTripletsConverter = new NumberToTripletsConverter();
    }

    /**
     * @param int $number
     *
     * @return string
     */
    protected function toWords($number)
    {
        if ($number === 0) {
            return Dictionary::$zero;
        }

        $words = [];

        if ($number < 0) {
            $words[] = Dictionary::$minus;
            $number *= -1;
        }

        $triplets = $this->numberToTripletsConverter->convertToTriplets($number);

        foreach ($triplets as $i => $triplet) {
            if ($triplet > 0) {
                $threeDigitsWords = $this->threeDigitsToWords($triplet);

                $case = $this->getGrammarCase($triplet);
                $mega = Dictionary::$exponent[count($triplets) - $i - 1][$case];

                $words[] = $threeDigitsWords . ' ' . $mega;
            }
        }

        return implode(' ', $words);
    }

    /**
     * @param int $number
     *
     * @return string
     */
    private function threeDigitsToWords($number)
    {
        $units = $number % 10;
        $tens = (int) ($number / 10) % 10;
        $hundreds = (int) ($number / 100) % 10;
        $words = [];

        if ($hundreds > 0) {
            $words[] = Dictionary::$hundreds[$hundreds];
        }

        if ($tens === 1) {
            $words[] = Dictionary::$teens[$units];
        } else {
            if ($tens > 0) {
                $words[] = Dictionary::$tens[$tens];
            }
            if ($units > 0) {
                $words[] = Dictionary::$units[$units];
            }
        }

        return implode(' ', $words);
    }

    /**
     * @param int $number
     *
     * @return int
     */
    private function getGrammarCase($number)
    {
        $units = $number % 10;
        $tens = ((int) ($number / 10)) % 10;
        $case = 2;

        if ($number === 1) {
            $case = 0;
        } elseif ($tens === 1 && $units > 1) {
            $case = 2;
        } elseif ($units >= 2 && $units <= 4) {
            $case = 1;
        }

        return $case;
    }

    /**
     * @param string $currency
     * @param int    $decimal
     * @param int    $fraction
     *
     * @throws NumberToWordsException
     * @return string
     */
    public function toCurrencyWords($currency, $decimal, $fraction = null)
    {
        $currency = strtoupper($currency);

        if (!array_key_exists($currency, Dictionary::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = Dictionary::$currencyNames[$currency];

        $return = trim($this->toWords($decimal));
        $grammarCase = $this->getGrammarCase($decimal);
        $return .= Dictionary::$wordSeparator . $currencyNames[0][$grammarCase];

        if (null !== $fraction) {
            $return .= Dictionary::$wordSeparator . trim($this->toWords($fraction));

            $grammarCase = $this->getGrammarCase($fraction);
            $return .= Dictionary::$wordSeparator . $currencyNames[1][$grammarCase];
        }

        return $return;
    }
}
