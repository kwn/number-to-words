<?php

namespace NumberToWords\Language\Arabic;

use NumberToWords\Language\Dictionary;

class ArabicDictionary implements Dictionary
{
    public const LOCALE = 'ar';
    public const LANGUAGE_NAME = 'Arabic';
    public const LANGUAGE_NAME_NATIVE = 'Arabic';

    private static array $units = [
        '',
        'واحد',
        'اثنين',
        'ثلاثة',
        'اربعة',
        'خمسة',
        'ستة',
        'سبعة',
        'ثمانية',
        'تسعة'
    ];

    private static array $teens = [
        'عشرة',
        'احدى عشر',
        'اثنا عشر',
        'ثلاثة عشر',
        'اربعة عشر',
        'خمسة عشر',
        'ستة عشر',
        'سبعة عشر',
        'ثمانية عشر',
        'تسعة عشر'
    ];

    private static array $tens = [
        '',
        'عشرة',
        'عشرون',
        'ثلاثون',
        'اربعون',
        'خمسون',
        'ستون',
        'سبعون',
        'ثمانون',
        'تسعون'
    ];

    private static array $hundred = [
        '',
        'مئة',
        'مئتين',
        'ثلاث مئة',
        'اربع مئة',
        'خمس مئة',
        'ست مئة',
        'سبع مئة',
        'ثمان مئة',
        'تسع مئة',
    ];

    public static array $currencyNames = [
        'ALL' => [['ليك'], ['قندركة']],
        'AUD' => [['دولار استرالي'], ['سنت']],
        'BAM' => [['ماركا'], ['فينق']],
        'BGN' => [['ليف'], ['ستوتينكا']],
        'BRL' => [['ريال'], ['سنتافوس']],
        'BYR' => [['روبل'], ['كوبيجكا']],
        'CAD' => [['دولار كندي'], ['سنت']],
        'CHF' => [['فرنك سويسري'], ['راب']],
        'CYP' => [['جنيه قبرصي'], ['سنت']],
        'CZK' => [['Czech koruna'], ['halerz']],
        'DKK' => [['Danish krone'], ['ore']],
        'DZD' => [['دينار'], ['سنت']],
        'EEK' => [['kroon'], ['senti']],
        'EUR' => [['euro'], ['euro-cent']],
        'GBP' => [['باوند', 'باوند'], ['بنس', 'بنس']],
        'HKD' => [['دولار كوري'], ['سنت']],
        'HRK' => [['Croatian kuna'], ['lipa']],
        'HUF' => [['forint'], ['filler']],
        'ILS' => [['new sheqel', 'new sheqels'], ['agora', 'agorot']],
        'ISK' => [['Icelandic króna'], ['aurar']],
        'JPY' => [['ين'], ['سن']],
        'LTL' => [['لياتس'], ['سنت']],
        'LVL' => [['lat'], ['sentim']],
        'LYD' => [['دينار'], ['سنت']],
        'MAD' => [['dirham'], ['سنت']],
        'MKD' => [['Macedonian dinar'], ['deni']],
        'MRO' => [['ouguiya'], ['khoums']],
        'MTL' => [['Maltese lira'], ['centym']],
        'NGN' => [['Naira'], ['kobo']],
        'NOK' => [['Norwegian krone'], ['oere']],
        'PHP' => [['peso'], ['centavo']],
        'PLN' => [['زلوتي', 'زلوتي'], ['grosz']],
        'ROL' => [['Romanian leu'], ['bani']],
        'RUB' => [['Russian Federation rouble'], ['kopiejka']],
        'SAR' => [['ريال'], ['هللة']],
        'SEK' => [['Swedish krona'], ['oere']],
        'SIT' => [['Tolar'], ['stotinia']],
        'SKK' => [['Slovak koruna'], []],
        'TMT' => [['manat'], ['tenge']],
        'TND' => [['دينار'], ['سنت']],
        'TRL' => [['lira'], ['kuruş']],
        'UAH' => [['هريفنا'], ['سنت']],
        'USD' => [['دولار'], ['سنت']],
        'XAF' => [['CFA فرنك'], ['سنت']],
        'XOF' => [['CFA فرنك'], ['سنت']],
        'XPF' => [['CFP فرنك'], ['سنتيم']],
        'YUM' => [['دينار'], ['الفقرة']],
        'ZAR' => [['راند'], ['سنت']],
    ];

    /**
     * @return string
     */
    public function getZero(): string
    {
        return 'صفر';
    }

    /**
     * @return string
     */
    public function getMinus(): string
    {
        return 'ناقص';
    }

    /**
     * @param int $unit
     *
     * @return string
     */
    public function getCorrespondingUnit($unit): string
    {
        return self::$units[$unit];
    }

    /**
     * @param int $ten
     *
     * @return string
     */
    public function getCorrespondingTen($ten): string
    {
        return self::$tens[$ten];
    }

    /**
     * @param int $teen
     *
     * @return string
     */
    public function getCorrespondingTeen($teen): string
    {
        return self::$teens[$teen];
    }

    /**
     * @param int $hundred
     *
     * @return string
     */
    public function getCorrespondingHundred($hundred): string
    {
        return self::$hundred[$hundred];
    }
}
