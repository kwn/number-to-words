<?php

namespace NumberToWords\Language\Serbian;

use NumberToWords\Language\Dictionary;

class SerbianDictionary implements Dictionary
{
    public const LOCALE = 'sr_RS';
    public const LANGUAGE_NAME = 'Serbian';
    public const LANGUAGE_NAME_NATIVE = 'srpski';

    protected string $zero = "nula";
    protected string $minus = "minus";
    /** Token to separate words in triplets and chunks in final string */
    protected string $separator = " ";

    protected static array $units = ['', 'jedan', 'dva', 'tri', 'četiri', 'pet', 'šest', 'sedam', 'osam', 'devet'];
    protected static array $unitsFemale = [
        '',
        'jedna',
        'dve',
        'tri',
        'četiri',
        'pet',
        'šest',
        'sedam',
        'osam',
        'devet',
    ];

    protected static array $teens = [
        'deset',
        'jedanaest',
        'dvanaest',
        'trinaest',
        'četrnaest',
        'petnaest',
        'šesnaest',
        'sedamnaest',
        'osamnaest',
        'devetnaest'
    ];

    protected static array $tens = [
        '',
        'deset',
        'dvadeset',
        'trideset',
        'četrdeset',
        'pedeset',
        'šezdeset',
        'sedamdeset',
        'osamdeset',
        'devedeset'
    ];

    private static array $hundreds = [
        0 => '',
        1 => 'sto',
        2 => 'dvesta',
        3 => 'trista',
        4 => 'četiristo',
        5 => 'petsto',
        6 => 'šeststo',
        7 => 'sedamsto',
        8 => 'osamsto',
        9 => 'devetsto'
    ];

    public static array $currencyNames = [
        'ALL' => [['lek'], ['qindarka']],
        'AUD' => [['australijski dolar'], ['cent']],
        'BAM' => [['konvertibilna marka'], ['fenig']],
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
        'EUR' => [['evro', 'evra', 'evra'], ['cent', 'centi', 'centa']],
        'GBP' => [['pound', 'pounds'], ['pence', 'pence']],
        'HKD' => [['Hong Kong dollar'], ['cent']],
        'HRK' => [['kuna'], ['lipa']],
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
        'RSD' => [['dinar', 'dinara', 'dinara'], ['para', 'para', 'pare']],
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
