<?php

namespace NumberToWords\Language\Uzbek;

use NumberToWords\Language\Dictionary;

class UzbekDictionary implements Dictionary
{
    public const LOCALE = 'uz';
    public const LANGUAGE_NAME = 'Uzbek';
    public const LANGUAGE_NAME_NATIVE = 'O\'zbek';

    private static array $units = ['', 'bir', 'ikki', 'uch', 'to\'rt', 'besh', 'olti', 'yetti', 'sakkiz', 'to\'qqiz'];

    private static array $teens = [
        'o\'n',
        'o\'n bir',
        'o\'n ikki',
        'o\'n uch',
        'o\'n to\'rt',
        'o\'n besh',
        'o\'n olti',
        'o\'n yetti',
        'o\'n sakkiz',
        'o\'n to\'qqiz'
    ];

    private static array $tens = [
        '',
        'o\'n',
        'yigirma',
        'o\'ttiz',
        'qirq',
        'ellik',
        'oltmish',
        'yetmish',
        'sakson',
        'to\'qson'
    ];

    private static string $hundred = 'yuz';

    public static array $currencyNames = [
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
        'EUR' => [['yevro'], ['sent']],
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
        'RUB' => [['rubl'], ['kopeyka']],
        'SAR' => [['Riyal'], ['Halalah']],
        'SEK' => [['Swedish krona'], ['oere']],
        'SIT' => [['Tolar'], ['stotinia']],
        'SKK' => [['Slovak koruna'], []],
        'TMT' => [['manat'], ['tenge']],
        'TND' => [['dinar'], ['millime']],
        'TRL' => [['lira'], ['kuruş']],
        'TRY' => [['lira'], ['kuruş']],
        'UAH' => [['grivna'], ['sent']],
        'USD' => [['dollar'], ['sent']],
        'UZS' => [['sum'], ['tiyin']],
        'XAF' => [['CFA franc'], ['cent']],
        'XOF' => [['CFA franc'], ['cent']],
        'XPF' => [['CFP franc'], ['centime']],
        'YUM' => [['dinar'], ['para']],
        'ZAR' => [['rand'], ['cent']],
    ];

    public function getZero(): string
    {
        return 'nol';
    }

    public function getMinus(): string
    {
        return 'minus';
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
