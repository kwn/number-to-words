<?php

namespace NumberToWords\Language\Persian;

use NumberToWords\Language\Dictionary;

class PersianDictionary implements Dictionary
{
    public const LOCALE = 'fa';
    public const LANGUAGE_NAME = 'Perisan';
    public const LANGUAGE_NAME_NATIVE = 'Farsi';

    private static array $units = ['', 'یک', 'دو', 'سه', 'چهار', 'پنج', 'شش', 'هفت', 'هشت', 'نه'];

    private static array $teens = [
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

    private static array $tens = [
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

    private static string $hundred = 'هزار';

    public static array $currencyNames = [
        'IRR' => [['ریال'], ['ریال']],
    ];

    public function getZero(): string
    {
        return 'صفر';
    }

    public function getMinus(): string
    {
        return 'منفی';
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
        return self::$units[$hundred] . ' ' . self::$hundred;
    }
}
