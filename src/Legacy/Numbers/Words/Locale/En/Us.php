<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale\En;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Us extends Words
{
    const LOCALE = 'en_US';
    const LANGUAGE_NAME = 'American English';
    const LANGUAGE_NAME_NATIVE = 'American English';
    const MINUS = 'minus';

    private $wordSeparator = ' ';

    protected static $zero = 'zero';

    protected static $units = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];

    protected static $teens = [
        'ten',
        'eleven',
        'twelve',
        'thirteen',
        'fourteen',
        'fifteen',
        'sixteen',
        'seventeen',
        'eighteen',
        'nineteen'
    ];

    protected static $tens = [
        '',
        'ten',
        'twenty',
        'thirty',
        'forty',
        'fifty',
        'sixty',
        'seventy',
        'eighty',
        'ninety'
    ];

    protected static $hundred = 'hundred';

    protected static $exponent = [
        '',
        'thousand',
        'million',
        'billion',
        'trillion',
        'quadrillion',
        'quintillion',
        'sextillion',
        'septillion',
        'octillion',
        'nonillion',
        'decillion',
        'undecillion',
        'duodecillion',
        'tredecillion',
        'quattuordecillion',
        'quindecillion',
        'sexdecillion',
        'septendecillion',
        'octodecillion',
        'novemdecillion',
        'vigintillion',
    ];

    private static $currencyNames = [
        'ALL' => [['lek'], ['qindarka']],
        'AUD' => [['Australian dollar'], ['cent']],
        'BAM' => [['convertible marka'], ['fenig']],
        'BGN' => [['lev'], ['stotinka']],
        'BRL' => [['real'], ['centavos']],
        'BYR' => [['Belarussian rouble'], ['kopiejka']],
        'CAD' => [['Canadian dollar'], ['cent']],
        'CHF' => [['Swiss franc'], ['rapp']],
        'CYP' => [['Cypriot pound'], ['cent']],
        'CZK' => [['Czech koruna'], ['halerz']],
        'DKK' => [['Danish krone'], ['ore']],
        'EEK' => [['kroon'], ['senti']],
        'EUR' => [['euro'], ['euro-cent']],
        'GBP' => [['pound', 'pounds'], ['pence', 'pence']],
        'HKD' => [['Hong Kong dollar'], ['cent']],
        'HRK' => [['Croatian kuna'], ['lipa']],
        'HUF' => [['forint'], ['filler']],
        'ILS' => [['new sheqel', 'new sheqels'], ['agora', 'agorot']],
        'ISK' => [['Icelandic króna'], ['aurar']],
        'JPY' => [['yen'], ['sen']],
        'LTL' => [['litas'], ['cent']],
        'LVL' => [['lat'], ['sentim']],
        'MKD' => [['Macedonian dinar'], ['deni']],
        'MTL' => [['Maltese lira'], ['centym']],
        'NOK' => [['Norwegian krone'], ['oere']],
        'PLN' => [['zloty', 'zlotys'], ['grosz']],
        'ROL' => [['Romanian leu'], ['bani']],
        'RUB' => [['Russian Federation rouble'], ['kopiejka']],
        'SEK' => [['Swedish krona'], ['oere']],
        'SIT' => [['Tolar'], ['stotinia']],
        'SKK' => [['Slovak koruna'], []],
        'TRL' => [['lira'], ['kuruş']],
        'UAH' => [['hryvna'], ['cent']],
        'USD' => [['dollar'], ['cent']],
        'YUM' => [['dinars'], ['para']],
        'ZAR' => [['rand'], ['cent']]
    ];

    /**
     * @param int $number
     *
     * @return string
     */
    protected function _toWords($number)
    {
        if ($number === 0) {
            return self::$zero;
        }

        $triplets = $this->buildTriplets(abs($number));
        $transformedNumber = $this->buildWordsFromTriplets($triplets);

        return $number < 0 ? self::MINUS . ' ' . $transformedNumber : $transformedNumber;
    }

    /**
     * @param int $number
     *
     * @return array
     */
    private function buildTriplets($number)
    {
        $triplets = [];

        while ($number > 0) {
            $triplets[] = $number % 1000;
            $number = (int) ($number / 1000);
        }

        return $triplets;
    }

    /**
     * @param array $triplets
     *
     * @return string
     */
    private function buildWordsFromTriplets(array $triplets)
    {
        $words = [];

        foreach ($triplets as $i => $triplet) {
            if ($triplet > 0) {
                $words[] = trim($this->threeDigitsToWords($triplet) . ' ' . self::$exponent[$i]);
            }
        }

        return implode(' ', array_reverse($words));
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

        if ($hundredsWord = $this->getHundred($hundreds)) {
            $words[] = $hundredsWord;
        }

        if ($subHundredsWord = $this->getSubHundred($tens, $units)) {
            $words[] = $subHundredsWord;
        }

        return implode(' ', $words);
    }

    /**
     * @param int $number
     *
     * @return string
     */
    private function getHundred($number)
    {
        $word = self::$units[$number];

        if ($word) {
            return $word . ' ' . self::$hundred;
        }

        return '';
    }

    /**
     * @param int $tens
     * @param int $units
     *
     * @return string
     */
    private function getSubHundred($tens, $units)
    {
        $words = [];

        if ($tens === 1) {
            $words[] = self::$teens[$units];
        } else {
            if ($tens > 0) {
                $words[] = self::$tens[$tens];
            }
            if ($units > 0) {
                $words[] = self::$units[$units];
            }
        }

        return implode('-', $words);
    }

    /**
     * @param string $currency
     * @param int    $decimal
     * @param int    $fraction
     * @param bool   $convertFraction
     *
     * @throws NumberToWordsException
     * @return string
     */
    public function toCurrencyWords($currency, $decimal, $fraction = null, $convertFraction = true)
    {
        $currency = strtoupper($currency);

        if (!array_key_exists($currency, self::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = self::$currencyNames[$currency];

        $return = trim($this->_toWords($decimal));
        $level = ($decimal === 1) ? 0 : 1;

        if ($level > 0) {
            if (count($currencyNames[0]) > 1) {
                $return .= $this->wordSeparator . $currencyNames[0][$level];
            } else {
                $return .= $this->wordSeparator . $currencyNames[0][0] . 's';
            }
        } else {
            $return .= $this->wordSeparator . $currencyNames[0][0];
        }

        if (null !== $fraction) {
            if (true === $convertFraction) {
                $return .= $this->wordSeparator . trim($this->_toWords($fraction));
            } else {
                $return .= $this->wordSeparator . $fraction;
            }

            $level = ($fraction === 1) ? 0 : 1;

            if ($level > 0) {
                if (count($currencyNames[1]) > 1) {
                    $return .= $this->wordSeparator . $currencyNames[1][$level];
                } else {
                    $return .= $this->wordSeparator . $currencyNames[1][0] . 's';
                }
            } else {
                $return .= $this->wordSeparator . $currencyNames[1][0];
            }
        }

        return $return;
    }
}
