<?php

namespace NumberToWords\Language\Slovak;

use NumberToWords\Language\Dictionary;

class SlovakDictionary implements Dictionary
{
    public const LOCALE = 'sk';
    public const LANGUAGE_NAME = 'Slovak';
    public const LANGUAGE_NAME_NATIVE = 'slovák';

    private static array $units = [
        0 => '',
        1 => 'jeden',
        2 => 'dva',
        3 => 'tri',
        4 => 'štyri',
        5 => 'päť',
        6 => 'šesť',
        7 => 'sedem',
        8 => 'osem',
        9 => 'deväť',
    ];

    private static array $teens = [
        0 => 'desať',
        1 => 'jedenásť',
        2 => 'dvanásť',
        3 => 'trinásť',
        4 => 'štrnásť',
        5 => 'pätnásť',
        6 => 'šestnásť',
        7 => 'sedemnásť',
        8 => 'osemnásť',
        9 => 'devätnásť'
    ];

    private static array $twenties = [
        0 => 'dvadsať',
        1 => 'dvadsaťjeden',
        2 => 'dvadsaťdva',
        3 => 'dvadsaťtri',
        4 => 'dvadsaťštyri',
        5 => 'dvadsaťpäť',
        6 => 'dvadsaťšesť',
        7 => 'dvadsaťsedem',
        8 => 'dvadsaťosem',
        9 => 'dvadsaťdeväť'
    ];

    private static array $tens = [
        0 => '',
        1 => 'desať',
        2 => 'dvadsať',
        3 => 'tridsať',
        4 => 'štyridsať',
        5 => 'päťdesiat',
        6 => 'šesťdesiat',
        7 => 'sedemdesiat',
        8 => 'osemdesiat',
        9 => 'deväťdesiat'
    ];

    private static array $hundreds = [
        0 => '',
        1 => 'sto',
        2 => 'dvesto',
        3 => 'tristo',
        4 => 'štyristo',
        5 => 'päťsto',
        6 => 'šesťsto',
        7 => 'sedemsto',
        8 => 'osemsto',
        9 => 'deväťsto'
    ];

    public static array $currencyNames = [
        'ALL' => [['lek', 'leki', 'lekov'], ['quindarka', 'quindarki', 'quindarek']],
        'AUD' => [
            ['dolar australijski', 'dolary australijskie', 'dolarov australijskich'],
            ['cent', 'centy', 'centov']
        ],
        'BAM' => [['marka', 'marki', 'marek'], ['fenig', 'fenigi', 'fenigov']],
        'BGN' => [['lew', 'lewy', 'lew'], ['stotinka', 'stotinki', 'stotinek']],
        'BRL' => [['real', 'reale', 'realov'], ['centavos', 'centavos', 'centavos']],
        'BYR' => [['rubel', 'ruble', 'rubli'], ['kopiejka', 'kopiejki', 'kopiejek']],
        'CAD' => [['dolar kanadyjski', 'dolary kanadyjskie', 'dolarov kanadyjskich'], ['cent', 'centy', 'centov']],
        'CHF' => [['frank szwajcarski', 'franki szwajcarskie', 'frankov szwajcarskich'], ['rapp', 'rappy', 'rappov']],
        'CYP' => [['funt cypryjski', 'funty cypryjskie', 'funtov cypryjskich'], ['cent', 'centy', 'centov']],
        'CZK' => [['korona czeska', 'korony czeskie', 'koron czeskich'], ['halerz', 'halerze', 'halerzy']],
        'DKK' => [['korona duńska', 'korony duńskie', 'koron duńskich'], ['ore', 'ore', 'ore']],
        'EEK' => [['korona estońska', 'korony estońskie', 'koron estońskich'], ['senti', 'senti', 'senti']],
        'EUR' => [['euro', 'euro', 'euro'], ['eurocent', 'eurocenty', 'eurocentov']],
        'GBP' => [['funt szterling', 'funty szterlingi', 'funtov szterlingov'], ['pens', 'pensy', 'pensov']],
        'HKD' => [['dolar Hongkongu', 'dolary Hongkongu', 'dolarov Hongkongu'], ['cent', 'centy', 'centov']],
        'HRK' => [['kuna', 'kuny', 'kun'], ['lipa', 'lipy', 'lip']],
        'HUF' => [['forint', 'forinty', 'forintov'], ['filler', 'fillery', 'fillerov']],
        'ILS' => [['nowy szekel', 'nowe szekele', 'nowych szekeli'], ['agora', 'agory', 'agorot']],
        'ISK' => [['korona islandzka', 'korony islandzkie', 'koron islandzkich'], ['aurar', 'aurar', 'aurar']],
        'JPY' => [['jen', 'jeny', 'jenov'], ['sen', 'seny', 'senov']],
        'LTL' => [['lit', 'lity', 'litov'], ['cent', 'centy', 'centov']],
        'LVL' => [['łat', 'łaty', 'łatov'], ['sentim', 'sentimy', 'sentimov']],
        'MKD' => [['denar', 'denary', 'denarov'], ['deni', 'deni', 'deni']],
        'MTL' => [['lira maltańska', 'liry maltańskie', 'lir maltańskich'], ['centym', 'centymy', 'centymov']],
        'NOK' => [['korona norweska', 'korony norweskie', 'koron norweskich'], ['oere', 'oere', 'oere']],
        'PLN' => [['złoty', 'złote', 'złotych'], ['grosz', 'grosze', 'groszy']],
        'ROL' => [['lej', 'leje', 'lei'], ['bani', 'bani', 'bani']],
        'RUB' => [['rubel', 'ruble', 'rubli'], ['kopiejka', 'kopiejki', 'kopiejek']],
        'SEK' => [['korona szwedzka', 'korony szwedzkie', 'koron szweckich'], ['oere', 'oere', 'oere']],
        'SIT' => [['tolar', 'tolary', 'tolarov'], ['stotinia', 'stotinie', 'stotini']],
        'SKK' => [['korona słowacka', 'korony słowackie', 'koron słowackich'], ['halerz', 'halerze', 'halerzy']],
        'TRL' => [['lira turecka', 'liry tureckie', 'lir tureckich'], ['kurusza', 'kurysze', 'kuruszy']],
        'TRY' => [['lira turecka', 'liry tureckie', 'lir tureckich'], ['kurusza', 'kurysze', 'kuruszy']],
        'UAH' => [['hrivny', 'hrivny', 'hrivien'], ['cent', 'centy', 'centov']],
        'USD' => [['dolár', 'doláre', 'dolárov'], ['cent', 'centy', 'centov']],
        'YUM' => [['dinar', 'dinary', 'dinarov'], ['para', 'para', 'para']],
        'ZAR' => [['rand', 'randy', 'randov'], ['cent', 'centy', 'centov']],
        'UZS' => [['sum'], ['tiyin']],
    ];

    public function getMinus(): string
    {
        return 'mínus';
    }

    public function getZero(): string
    {
        return 'nula';
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

    public function getCorrespondingTwenty(int $twenty): string
    {
        return self::$twenties[$twenty];
    }

    public function getCorrespondingHundred(int $hundred): string
    {
        return self::$hundreds[$hundred];
    }
}
