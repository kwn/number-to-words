<?php

namespace NumberToWords\Language\Russian;

use NumberToWords\Grammar\Gender;
use NumberToWords\Language\Dictionary;

class RussianDictionary implements Dictionary
{
    const LOCALE = 'ru';
    const LANGUAGE_NAME = 'Russian';
    const LANGUAGE_NAME_NATIVE = 'Русский';

    private static $units = [
        Gender::GENDER_MASCULINE => ['', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'],
        Gender::GENDER_FEMININE => ['', 'одна', 'две', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'],
    ];

    private static $teens = [
        0 => 'десять',
        1 => 'одиннадцать',
        2 => 'двенадцать',
        3 => 'тринадцать',
        4 => 'четырнадцать',
        5 => 'пятнадцать',
        6 => 'шестнадцать',
        7 => 'семнадцать',
        8 => 'восемнадцать',
        9 => 'девятнадцать',
    ];

    private static $tens = [
        0 => '',
        1 => 'десять',
        2 => 'двадцать',
        3 => 'тридцать',
        4 => 'сорок',
        5 => 'пятьдесят',
        6 => 'шестьдесят',
        7 => 'семьдесят',
        8 => 'восемьдесят',
        9 => 'девяносто',
    ];

    private static $hundreds = [
        0 => '',
        1 => 'сто',
        2 => 'двести',
        3 => 'триста',
        4 => 'четыреста',
        5 => 'пятьсот',
        6 => 'шестьсот',
        7 => 'семьсот',
        8 => 'восемьсот',
        9 => 'девятьсот',
    ];

    /**
     * @return string
     */
    public function getZero()
    {
        return 'ноль';
    }

    /**
     * @return string
     */
    public function getMinus()
    {
        return 'минус';
    }

    /**
     * @param int $unit
     * @param int $gender
     *
     * @return string
     */
    public function getCorrespondingUnit($unit, $gender = Gender::GENDER_MASCULINE)
    {
        return self::$units[$gender][$unit];
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
