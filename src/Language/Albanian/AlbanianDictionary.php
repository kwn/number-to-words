<?php

namespace NumberToWords\Language\Albanian;

use NumberToWords\Language\Dictionary;

class AlbanianDictionary implements Dictionary
{
    public const LOCALE = 'sq_AL';
    public const LANGUAGE_NAME = 'Albanian';
    public const LANGUAGE_NAME_NATIVE = 'Shqip';

    private static array $units = ['', 'një', 'dy', 'tre', 'katër', 'pesë', 'gjashtë', 'shtatë', 'tetë', 'nëntë'];

    private static array $teens = [
        'dhjetë',
        'njëmbëdhjetë',
        'dymbëdhjetë',
        'trembëdhjetë',
        'katërmbëdhjetë',
        'pesëmbëdhjetë',
        'gjashtëmbëdhjetë',
        'shtatëmbëdhjetë',
        'tetëmbëdhjetë',
        'nëntëmbëdhjetë'
    ];

    private static array $tens = [
        '',
        'dhjetë',
        'njëzet',
        'tridhjetë',
        'katërdhjetë',
        'pesëdhjetë',
        'gjashtëdhjetë',
        'shtatëdhjetë',
        'tetëdhjetë',
        'nëntëdhjetë'
    ];

    private static string $hundred = 'qind';

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
        'SEK' => [['Swedish krona'], ['oere']],
        'SIT' => [['Tolar'], ['stotinia']],
        'SKK' => [['Slovak koruna'], []],
        'TMT' => [['manat'], ['tenge']],
        'TND' => [['dinar'], ['cent']],
        'TRL' => [['lira'], ['kuruş']],
        'UAH' => [['hryvna'], ['cent']],
        'USD' => [['dollar'], ['cent']],
        'XAF' => [['CFA franc'], ['cent']],
        'XOF' => [['CFA franc'], ['cent']],
        'XPF' => [['CFP franc'], ['centime']],
        'YUM' => [['dinar'], ['para']],
        'ZAR' => [['rand'], ['cent']],
    ];

    public function getZero(): string
    {
        return 'zero';
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
        return self::$units[$hundred] . self::$hundred;
    }
}
