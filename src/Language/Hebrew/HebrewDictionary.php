<?php

namespace NumberToWords\Language\Hebrew;

use NumberToWords\Language\Dictionary;

class HebrewDictionary implements Dictionary
{
    public const LOCALE = 'he_IL';
    public const LANGUAGE_NAME = 'עברית';
    public const LANGUAGE_NAME_NATIVE = 'עברית';

    private static array $units = ['', 'אחד', 'שתיים', 'שלוש', 'ארבע', 'חמש', 'שש', 'שבע', 'שמונה', 'תשע'];

    private static array $teens = [
        'עשר',
        'אחד עשרה',
        'שתיים עשרה',
        'שלוש עשרה',
        'ארבע עשרה',
        'חמש עשרה',
        'שש עשרה',
        'שבע עשרה',
        'שמונה עשרה',
        'תשע עשרה'
    ];

    private static array $tens = [
        '',
        'עשר',
        'עשרים',
        'שלושים',
        'ארבעים',
        'חמישים',
        'שישים',
        'שבעים',
        'שמונים',
        'תשעים'
    ];

    private static array $hundred = [
        '',
        'מאה',
        'מאתיים',
        'שלוש מאות',
        'ארבע מאות',
        'חמש מאות',
        'שש מאות',
        'שבע מאות',
        'שמונה מאות',
        'תשע מאות'
    ];

    public static array $currencyNames = [
        'ALL' => [['lek'], ['qindarka']],
        'AED' => [['Dirham'], ['Fils']],
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
        'EGP' => [['Egyptian Pound'], ['piastre']],
        'EUR' => [['אירו'], ['אירו סנט']],
        'GBP' => [['pound', 'pounds'], ['pence', 'pence']],
        'HKD' => [['Hong Kong dollar'], ['cent']],
        'HRK' => [['Croatian kuna'], ['lipa']],
        'HUF' => [['forint'], ['filler']],
        'ILS' => [['ש"ח', 'ש"ח'], ['אגו\'', 'אגו\'']],
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
        'SAR' => [['Riyal'], ['Halalah']],
        'SEK' => [['Swedish krona'], ['oere']],
        'SIT' => [['Tolar'], ['stotinia']],
        'SKK' => [['Slovak koruna'], []],
        'TMT' => [['manat'], ['tenge']],
        'TND' => [['dinar'], ['millime']],
        'TRL' => [['lira'], ['kuruş']],
        'TRY' => [['lira'], ['kuruş']],
        'UAH' => [['hryvna'], ['cent']],
        'USD' => [['דולר', 'דולר'], ['סנט', 'סנט']],
        'XAF' => [['CFA franc'], ['cent']],
        'XOF' => [['CFA franc'], ['cent']],
        'XPF' => [['CFP franc'], ['centime']],
        'YUM' => [['dinar'], ['para']],
        'ZAR' => [['rand'], ['cent']],
        'UZS' => [['sum'], ['tiyin']],
    ];

    public function getZero(): string
    {
        return 'אפס';
    }

    public function getMinus(): string
    {
        return 'מינוס';
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
        return self::$hundred[$hundred];
    }
}
