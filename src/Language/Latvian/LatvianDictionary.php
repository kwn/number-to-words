<?php

namespace NumberToWords\Language\Latvian;

use NumberToWords\Language\Dictionary;

class LatvianDictionary implements Dictionary
{
    public const LOCALE = 'lv';
    public const LANGUAGE_NAME = 'Latvian';
    public const LANGUAGE_NAME_NATIVE = 'latviešu';

    private static array $units = [
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

    private static array $teens = [
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

    private static array $tens = [
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

    public static array $currencyNames = [
        'EUR' => [['eiro', 'eiro', 'eiro'], ['cents', 'centi', 'centi']],
        'USD' => [['dolārs', 'dolāri', 'dolāri'], ['cents', 'centi', 'centi']],
    ];

    public function getAnd(): string
    {
        return 'un';
    }

    public function getZero(): string
    {
        return 'nulle';
    }

    public function getMinus(): string
    {
        return 'mīnus';
    }

    public function getCorrespondingUnit(int $unit): string
    {
        return self::$units[$unit];
    }

    public function getCorrespondingTen(int $ten): string
    {
        return self::$tens[$ten];
    }

    public function getCorrespondingTeen(int $teen): string
    {
        return self::$teens[$teen];
    }

    public function getCorrespondingHundred(int $hundred): string
    {
        if ($hundred === 1) {
            return 'viens simts';
        }

        return self::$units[$hundred] . ' simti';
    }
}
