<?php

namespace NumberToWords\Language\Persian;

use NumberToWords\Language\Dictionary;

class PersianDictionary implements Dictionary
{
    const LOCALE = 'fa';
    const LANGUAGE_NAME = 'Perisan';
    const LANGUAGE_NAME_NATIVE = 'Farsi';

    private static $units = ['', 'یک', 'دو', 'سه', 'چهار', 'پنج', 'شش', 'هفت', 'هشت', 'نه'];

    private static $teens = [
        'ده',
        'یازده',
        'دوازده',
        'سیزده',
        'چهارده',
        'پانزده',
        'شانزده',
        'هفده',
        'هجده',
        'نوزده'
    ];

    private static $tens = [
        '',
        'ده',
        'بیست',
        'سی',
        'چهل',
        'پنجاه',
        'شصت',
        'هفتاد',
        'هشتاد',
        'نود'
    ];

    private static $hundred = 'هزار';

    public static $currencyNames = [
        'IRR' => [['ریال'], ['ریال']],
    ];

    /**
     * @return string
     */
    public function getZero()
    {
        return 'صفر';
    }

    /**
     * @return string
     */
    public function getMinus()
    {
        return 'منفی';
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
        return self::$units[$hundred] . ' ' . self::$hundred;
    }
}
