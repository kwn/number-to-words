<?php

namespace NumberToWords\Language\German;

use NumberToWords\Language\Dictionary;

class GermanDictionary implements Dictionary
{
    const LOCALE               = 'de';
    const LANGUAGE_NAME        = 'German';
    const LANGUAGE_NAME_NATIVE = 'Deutsch';

    private static $units = [
        0 => 'null',
        1 => 'ein',
        2 => 'zwei',
        3 => 'drei',
        4 => 'vier',
        5 => 'fünf',
        6 => 'sechs',
        7 => 'sieben',
        8 => 'acht',
        9 => 'neun'
    ];

    private static $teens = [
        0 => 'zehn',
        1 => 'elf',
        2 => 'zwölf',
        3 => 'dreizehn',
        4 => 'vierzehn',
        5 => 'fünfzehn',
        6 => 'sechzehn',
        7 => 'siebzehn',
        8 => 'achtzehn',
        9 => 'neunzehn'
    ];

    private static $tens = [
        0 => '',
        1 => 'zehn',
        2 => 'zwanzig',
        3 => 'dreißig',
        4 => 'vierzig',
        5 => 'fünfzig',
        6 => 'sechzig',
        7 => 'siebzig',
        8 => 'achtzig',
        9 => 'neunzig'
    ];

    private static $hundreds = [
        0 => 'nullhundert',
        1 => 'einhundert',
        2 => 'zweihundert',
        3 => 'dreihundert',
        4 => 'vierhundert',
        5 => 'fünfhundert',
        6 => 'sechshundert',
        7 => 'siebenhundert',
        8 => 'achthundert',
        9 => 'neunhundert'
    ];

    public static $exponent = [
        ['', ''],
        ['tausend', 'tausend'],
        ['Million', 'Millionen'],
        ['Milliarde', 'Milliarden'],
        ['Billion', 'Billionen'],
        ['Billiarde', 'Billiarden'],
        ['Trillion', 'Trillionen'],
        ['Trilliarde', 'Trilliarden'],
        ['Quadrillion', 'Quadrillionen'],
        ['Quadrilliarde', 'Quadrilliarden'],
        ['Quintillion', 'Quintillionen'],
        ['Quintilliarde', 'Quintilliarden'],
        ['Sextillion', 'Sextillionen'],
        ['Sextilliarde', 'Sextilliarden'],
        ['Septillion', 'Septillionen'],
        ['Septilliarde', 'Septilliarden'],
        ['Oktillion', 'Oktillionen'], // oder Octillionen
        ['Oktilliarde', 'Oktilliarden'],
        ['Nonillion', 'Nonillionen'],
        ['Nonilliarde', 'Nonilliarden'],
        ['Dezillion', 'Dezillionen'],
        ['Dezilliarde', 'Dezilliarden'],
    ];

    public static $currencyNames = [
        'EUR' => [['Euro'], ['cent']]
    ];

    public static $and = 'und';

    /**
     * @return string
     */
    public function getMinus()
    {
        return 'Minus';
    }

    /**
     * @return string
     */
    public function getZero()
    {
        return 'null';
    }

    /**
     * @param int $unit
     *
     * @return string
     */
    public function getCorrespondingUnit($unit)
    {
        return self::$units[$unit];
    }

    /**
     * @param int $ten
     *
     * @return string
     */
    public function getCorrespondingTen($ten)
    {
        return self::$tens[$ten];
    }

    /**
     * @param int $teen
     *
     * @return string
     */
    public function getCorrespondingTeen($teen)
    {
        return self::$teens[$teen];
    }

    /**
     * @param int $hundred
     *
     * @return string
     */
    public function getCorrespondingHundred($hundred)
    {
        return self::$hundreds[$hundred];
    }
}
