<?php

namespace NumberToWords\Language\English;

use NumberToWords\Language\Dictionary;

class EnglishDictionary implements Dictionary
{
    const LOCALE = 'en_US';
    const LANGUAGE_NAME = 'American English';
    const LANGUAGE_NAME_NATIVE = 'American English';
    const MINUS = 'minus';

    public static $wordSeparator = ' ';

    public static $zero = 'zero';

    public static $units = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];

    public static $teens = [
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

    public static $tens = [
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

    public static $hundred = 'hundred';

    public static $exponent = [
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

    public static $currencyNames = [
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
     * @return string
     */
    public function getZero()
    {
        return self::$zero;
    }

    /**
     * @return string
     */
    public function getMinus()
    {
        return self::MINUS;
    }

    /**
     * @return array
     */
    public function getUnits()
    {
        // TODO: Implement getUnits() method.
    }

    /**
     * @param int $unit
     *
     * @return string
     */
    public function getCorrespondingUnit($unit)
    {
        // TODO: Implement getCorrespondingUnit() method.
    }

    /**
     * @return array
     */
    public function getTens()
    {
        // TODO: Implement getTens() method.
    }

    /**
     * @param int $ten
     *
     * @return string
     */
    public function getCorrespondingTen($ten)
    {
        // TODO: Implement getCorrespondingTen() method.
    }

    /**
     * @return array
     */
    public function getTeens()
    {
        // TODO: Implement getTeens() method.
    }

    /**
     * @param int $teen
     *
     * @return string
     */
    public function getCorrespondingTeen($teen)
    {
        // TODO: Implement getCorrespondingTeen() method.
    }

    /**
     * @return array
     */
    public function getHundreds()
    {
        // TODO: Implement getHundreds() method.
    }

    /**
     * @param int $hundred
     *
     * @return string
     */
    public function getCorrespondingHundred($hundred)
    {
        // TODO: Implement getCorrespondingHundred() method.
    }
}
