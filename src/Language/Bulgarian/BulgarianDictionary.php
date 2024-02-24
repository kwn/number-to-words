<?php

namespace NumberToWords\Language\Bulgarian;

use NumberToWords\Language\Dictionary;

class BulgarianDictionary implements Dictionary
{
    public const LOCALE = 'bg_BG';
    public const LANGUAGE_NAME = 'Bulgarian';
    public const LANGUAGE_NAME_NATIVE = 'български';

    protected string $zero = "нула";
    protected string $minus = "минус";
    /** Token to separate words in triplets and chunks in final string */
    protected string $separator = " ";

    protected static array $units = ['', 'един', 'два', 'три', 'четири', 'пет', 'шест', 'седем', 'осем', 'девет'];
    protected static array $unitsFemale = [
        '',
        'една',
        'две',
        'три',
        'четири',
        'пет',
        'шест',
        'седем',
        'осем',
        'девет',
    ];

    protected static array $teens = [
        'десет',
        'единадесет',
        'дванадесет',
        'тринадесет',
        'четиринадесет',
        'петнадесет',
        'шестнадесет',
        'седемнадесет',
        'осемнадесет',
        'деветнадесет'
    ];

    protected static array $tens = [
        '',
        'десет',
        'двадесет',
        'тридесет',
        'четиридесет',
        'петдесет',
        'шестдесет',
        'седемдесет',
        'осемдесет',
        'деветдесет'
    ];

    private static array $hundreds = [
        0 => '',
        1 => 'сто',
        2 => 'двеста',
        3 => 'триста',
        4 => 'четиристотин',
        5 => 'петстотин',
        6 => 'шестстотин',
        7 => 'седемстотин',
        8 => 'осемстотин',
        9 => 'деветстотин'
    ];

    public static string $and = 'и';
    public static array $currencyNames = [
        'ALL' => [['lek'], ['qindarka']],
        'AED' => [['Dirham'], ['Fils']],
        'AUD' => [['Australian dollar'], ['cent']],
        'BAM' => [['convertible marka'], ['fenig']],
        'BGN' => [['лев', 'лева'], ['стотинка', 'стотинки']],
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
        'SAR' => [['Riyal'], ['Halalah']],
        'SEK' => [['Swedish krona'], ['oere']],
        'SIT' => [['Tolar'], ['stotinia']],
        'SKK' => [['Slovak koruna'], []],
        'TMT' => [['manat'], ['tenge']],
        'TND' => [['dinar'], ['millime']],
        'TRL' => [['lira'], ['kuruş']],
        'TRY' => [['lira'], ['kuruş']],
        'UAH' => [['hryvna'], ['cent']],
        'USD' => [['dollar'], ['cent']],
        'XAF' => [['CFA franc'], ['cent']],
        'XOF' => [['CFA franc'], ['cent']],
        'XPF' => [['CFP franc'], ['centime']],
        'YUM' => [['dinar'], ['para']],
        'ZAR' => [['rand'], ['cent']],
        'UZS' => [['sum'], ['tiyin']],
    ];

    public function getSeparator(): string
    {
        return $this->separator;
    }

    public function getZero(): string
    {
        return $this->zero;
    }

    public function getMinus(): string
    {
        return $this->minus;
    }

    public function getCorrespondingUnit(int $unit): string
    {
        return self::$units[$unit];
    }

    public function getCorrespondingUnitFemale(int $unit): string
    {
        return self::$unitsFemale[$unit];
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
        return self::$hundreds[$hundred];
    }
}
