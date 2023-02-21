<?php

namespace NumberToWords\Language\Bulgarian;

use NumberToWords\Language\Dictionary;

class BulgarianDictionary implements Dictionary
{
    public const LOCALE = 'bg_BG';
    public const LANGUAGE_NAME = 'Bulgarian';
    public const LANGUAGE_NAME_NATIVE = 'Български';

    private static array $units = ['', 'едно', 'две', 'три', 'четири', 'пет', 'шест', 'седем', 'осем', 'девет'];

    private static array $teens = [
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

    private static array $tens = [
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

    private static string $hundred = 'сто';

    public static array $currencyNames = [
        'ALL' => [['лек'], ['киндарка']],
        'AUD' => [['Австралийски долар'], ['цент']],
        'BAM' => [['конвертируема марка'], ['фенинг']],
        'BGN' => [['лев', 'лева'], ['стотинка', 'стотинки']],
        'BRL' => [['реал'], ['сентаво']],
        'BYR' => [['Беларуска рубла'], ['копейка']],
        'CAD' => [['Канадски долар'], ['цент']],
        'CHF' => [['Швейцарски франк'], ['сантим']],
        'CYP' => [['евро'], ['цент']],
        'CZK' => [['Чешка крона'], ['халер']],
        'DKK' => [['Датска крона'], ['йоре']],
        'DZD' => [['Алжирски динар'], ['сантим']],
        'EEK' => [['крона'], ['сантим']],
        'EUR' => [['евро'], ['евро-цент']],
        'GBP' => [['паунд', 'паунда'], ['пенс', 'пенс']],
        'HKD' => [['Хонконгски долар'], ['цента']],
        'HRK' => [['евро'], ['цент']],
        'HUF' => [['форинт'], ['филер']],
        'ILS' => [['нов шекел', 'нови шекели'], ['агора', 'агорот']],
        'ISK' => [['Исландска крона'], ['ейре']],
        'JPY' => [['Японска йена'], ['сен']],
        'LTL' => [['евро'], ['цент']],
        'LVL' => [['евро'], ['цент']],
        'LYD' => [['динар'], ['цента']],
        'MAD' => [['дирхам'], ['цента']],
        'MKD' => [['Македонски динар'], ['дени']],
        'MRO' => [['Мавританска угия'], ['хумс']],
        'MTL' => [['евро'], ['цент']],
        'NGN' => [['Найра'], ['кобо']],
        'NOK' => [['Норвежка крона'], ['йоре']],
        'PHP' => [['песо'], ['сентимо']],
        'PLN' => [['злота', 'злоти'], ['грош']],
        'ROL' => [['Румънска лея'], ['бани']],
        'RUB' => [['Руската рубла'], ['копийка']],
        'SAR' => [['Саудитски риал'], ['халал']],
        'SEK' => [['Шведска крона'], ['йоре']],
        'SIT' => [['евро'], ['цент']],
        'SKK' => [['евро'], ['цент']],
        'TMT' => [['манат'], ['тенге']],
        'TND' => [['динар'], ['милим']],
        'TRL' => [['лира'], ['куруш']],
        'TRY' => [['лира'], ['куруш']],
        'UAH' => [['гривня'], ['копийка']],
        'USD' => [['долар'], ['цент']],
        'XAF' => [['CFA франк'], ['цент']],
        'XOF' => [['CFA франк'], ['цент']],
        'XPF' => [['CFP франк'], ['цент']],
        'YUM' => [['динар'], ['пара']],
        'ZAR' => [['ранд'], ['цент']],
    ];

    public function getZero(): string
    {
        return 'нула';
    }

    public function getMinus(): string
    {
        return 'минус';
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
