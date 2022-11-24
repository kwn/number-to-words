<?php

namespace NumberToWords\Language\Kurdish;

use NumberToWords\Language\Dictionary;

class KurdishDictionary implements Dictionary
{
    public const LOCALE = 'ku';
    public const LANGUAGE_NAME = 'Kurdish';
    public const LANGUAGE_NAME_NATIVE = 'Kurdish';

    private static array $units = ['', 'یەک', 'دوو', 'سێ', 'چوار', 'پێنج', 'شەش', 'حەوت', 'هەشت', 'نۆ'];

    private static array $teens = [
        'دە',
        'یازدە',
        'دوازدە',
        'سێزدە',
        'چواردە',
        'پازدە',
        'شازدە',
        'حەڤدە',
        'هەژدە',
        'نۆزدە'
    ];

    private static array $tens = [
        '',
        'دە',
        'بیست',
        'سی',
        'چل',
        'پەنجا',
        'شەست',
        'حەفتا',
        'هەشتا',
        'نەوەد'
    ];

    private static string $hundred = 'سەد';

    public static array $currencyNames = [
        'ALL' => [['لێک'], ['قیندارکە']],
        'AUD' => [['دۆلاری ئوسترالی'], ['سەنت']],
        'BAM' => [['مارکە'], ['فێنیگ']],
        'BGN' => [['لێڤ'], ['ستۆتینکا']],
        'BRL' => [['ڕیال'], ['سەنتاڤۆس']],
        'BYR' => [['ڕوبڵی بێلاڕووسی'], ['کۆپیجکا']],
        'CAD' => [['دۆلاری کەنەدی'], ['سەنت']],
        'CHF' => [['فرانکی سویسری'], ['ڕاپ']],
        'CYP' => [['پاوەندی قوبرسی'], ['سەنت']],
        'CZK' => [['Czech koruna'], ['halerz']],
        'DKK' => [['Danish krone'], ['ore']],
        'DZD' => [['دینار'], ['سەنت']],
        'EEK' => [['kroon'], ['senti']],
        'EUR' => [['euro'], ['euro-cent']],
        'GBP' => [['پاوەند', 'پاوەند'], ['پێنس', 'پێنس']],
        'HKD' => [['دۆلاری کۆری'], ['سەنت']],
        'HRK' => [['Croatian kuna'], ['lipa']],
        'HUF' => [['forint'], ['filler']],
        'ILS' => [['new sheqel', 'new sheqels'], ['agora', 'agorot']],
        'ISK' => [['Icelandic króna'], ['aurar']],
        'JPY' => [['یێن'], ['سێن']],
        'LTL' => [['لیتاس'], ['سەنت']],
        'LVL' => [['lat'], ['sentim']],
        'LYD' => [['دینار'], ['سەنت']],
        'MAD' => [['درهەم'], ['سەنت']],
        'MKD' => [['دیناری مەقدۆنی'], ['دەنی']],
        'MRO' => [['ouguiya'], ['khoums']],
        'MTL' => [['لیرەی ماڵتی'], ['سەنت']],
        'NGN' => [['Naira'], ['kobo']],
        'NOK' => [['کرۆنی نەرویجی'], ['ۆر']],
        'PHP' => [['پیسۆ'], ['سێنتاڤۆ']],
        'PLN' => [['زلۆتی', 'زلۆتی'], ['گرۆسز']],
        'ROL' => [['لیوی رۆمانی'], ['بانی']],
        'RUB' => [['ڕوبڵی فیدراسیۆنی ڕووسیا'], ['کۆپیجکا']],
        'SAR' => [['ڕیال'], ['هەڵەڵا']],
        'SEK' => [['کرۆنی سویدی'], ['ۆری']],
        'SIT' => [['تۆلار'], ['ستۆتینیا']],
        'SKK' => [['کرۆنی سلۆڤاکی'], []],
        'TMT' => [['مانات'], ['تێنج']],
        'TND' => [['دینار'], ['سەنت']],
        'TRL' => [['لیرە'], ['کوروش']],
        'TRY' => [['لیرە'], ['کوروش']],
        'UAH' => [['هیریڤنا'], ['سەنت']],
        'USD' => [['دۆلار'], ['سەنت']],
        'XAF' => [['CFA فرانک'], ['سەنت']],
        'XOF' => [['CFA فرانک'], ['سەنت']],
        'XPF' => [['CFP فرانک'], ['centime']],
        'YUM' => [['دینار'], ['بڕگە']],
        'ZAR' => [['ڕاند'], ['سەنت']],
    ];

    public function getZero(): string
    {
        return 'سفر';
    }

    public function getMinus(): string
    {
        return 'سالب';
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
            return self::$hundred;
        }
        return self::$units[$hundred] . ' ' . self::$hundred;
    }
}
