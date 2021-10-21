<?php

namespace NumberToWords\Language\Arabic;

use NumberToWords\Language\Dictionary;

class ArabicDictionary implements Dictionary
{
    const LOCALE = 'ar';
    const LANGUAGE_NAME = 'Arabic';
    const LANGUAGE_NAME_NATIVE = 'Arabic';

    private static $units = [
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

    private static $teens = [
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

    private static $tens = [
        '',
        'عشرة',
        'عشرين',
        'ثلاثين',
        'اربعين',
        'خمسين',
        'ستين',
        'سبعين',
        'ثمانين',
        'تسعين'
    ];

    private static $hundred = [
        '',
        'مئة',
        'مئتين',
        'ثلاثمئة',
        'اربعمئة',
        'خمسمئة',
        'ستمئة',
        'سبعمئة',
        'ثمانمئة',
        'تسعمئة',
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
        'DZD' => [['dinar'], ['cent']],
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
        'LYD' => [['dinar'], ['cent']],
        'MAD' => [['dirham'], ['cent']],
        'MKD' => [['Macedonian dinar'], ['deni']],
        'MRO' => [['ouguiya'], ['khoums']],
        'MTL' => [['Maltese lira'], ['centym']],
        'NGN' => [['Naira'], ['kobo']],
        'NOK' => [['Norwegian krone'], ['oere']],
        'PHP' => [['peso'], ['centavo']],
        'PLN' => [['zloty', 'zlotys'], ['grosz']],
        'ROL' => [['Romanian leu'], ['bani']],
        'RUB' => [['Russian Federation rouble'], ['kopiejka']],
        'SAR' => [['ريال'], ['هللة']],
        'SEK' => [['Swedish krona'], ['oere']],
        'SIT' => [['Tolar'], ['stotinia']],
        'SKK' => [['Slovak koruna'], []],
        'TMT' => [['manat'], ['tenge']],
        'TND' => [['dinar'], ['cent']],
        'TRL' => [['lira'], ['kuruş']],
        'UAH' => [['hryvna'], ['cent']],
        'USD' => [['دولار'], ['سنت']],
        'XAF' => [['CFA franc'], ['cent']],
        'XOF' => [['CFA franc'], ['cent']],
        'XPF' => [['CFP franc'], ['centime']],
        'YUM' => [['dinar'], ['para']],
        'ZAR' => [['rand'], ['cent']],
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
        return 'ناقص';
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
        return self::$hundred[$hundred];
    }
}
