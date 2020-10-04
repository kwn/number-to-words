<?php

namespace NumberToWords\Language\Latvian;

use NumberToWords\Language\Dictionary;

class LatvianDictionary implements Dictionary
{
    const LOCALE               = 'lv';
    const LANGUAGE_NAME        = 'Latvian';
    const LANGUAGE_NAME_NATIVE = 'latviešu';

    private static $units = [
        0 => '',
        1 => 'viens',
        2 => 'divi',
        3 => 'trīs',
        4 => 'četri',
        5 => 'pieci',
        6 => 'seši',
        7 => 'septiņi',
        8 => 'astoņi',
        9 => 'deviņi'
    ];

    private static $teens = [
        0 => 'desmit',
        1 => 'vienpadsmit',
        2 => 'divpadsmit',
        3 => 'trīspadsmit',
        4 => 'četrpadsmit',
        5 => 'piecpadsmit',
        6 => 'sešpadsmit',
        7 => 'septiņpadsmit',
        8 => 'astoņpadsmit',
        9 => 'deviņpadsmit'
    ];

    private static $tens = [
        0 => '',
        1 => 'desmit',
        2 => 'divdesmit',
        3 => 'trīsdesmit',
        4 => 'četrdesmit',
        5 => 'piecdesmit',
        6 => 'sešdesmit',
        7 => 'septiņdesmit',
        8 => 'astoņdesmit',
        9 => 'deviņdesmit'
    ];

    /** @var array<array<string>>  */
    public static $currencyNames = [
        'EUR' => [['eiro', 'eiro', 'eiro'], ['eiro cents', 'eiro centi', 'eiro centi']],
        'USD' => [['dolārs', 'dolāri', 'dolāri'], ['cents', 'centi', 'centi']],
    ];

    /**
     * @return string
     */
    public function getAnd()
    {
        return 'un';
    }

    /**
     * @return string
     */
    public function getZero()
    {
        return 'nulle';
    }

    /**
     * @return string
     */
    public function getMinus()
    {
        return 'minus';
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
        if ($hundred === 1) {
            return 'simts';
        }

        return self::$units[$hundred] . ' simti';
    }
}
