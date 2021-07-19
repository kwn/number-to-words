<?php

namespace NumberToWords\Language\Polish;

use NumberToWords\Language\Dictionary;

class PolishDictionary implements Dictionary
{
    public const LOCALE = 'pl';
    public const LANGUAGE_NAME = 'Polish';
    public const LANGUAGE_NAME_NATIVE = 'polski';

    private static array $units = [
        0 => '',
        1 => 'jeden',
        2 => 'dwa',
        3 => 'trzy',
        4 => 'cztery',
        5 => 'pięć',
        6 => 'sześć',
        7 => 'siedem',
        8 => 'osiem',
        9 => 'dziewięć'
    ];

    private static array $teens = [
        0 => 'dziesięć',
        1 => 'jedenaście',
        2 => 'dwanaście',
        3 => 'trzynaście',
        4 => 'czternaście',
        5 => 'piętnaście',
        6 => 'szesnaście',
        7 => 'siedemnaście',
        8 => 'osiemnaście',
        9 => 'dziewiętnaście'
    ];

    private static array $tens = [
        0 => '',
        1 => 'dziesięć',
        2 => 'dwadzieścia',
        3 => 'trzydzieści',
        4 => 'czterdzieści',
        5 => 'pięćdziesiąt',
        6 => 'sześćdziesiąt',
        7 => 'siedemdziesiąt',
        8 => 'osiemdziesiąt',
        9 => 'dziewięćdziesiąt'
    ];

    private static array $hundreds = [
        0 => '',
        1 => 'sto',
        2 => 'dwieście',
        3 => 'trzysta',
        4 => 'czterysta',
        5 => 'pięćset',
        6 => 'sześćset',
        7 => 'siedemset',
        8 => 'osiemset',
        9 => 'dziewięćset'
    ];

    public static array $currencyNames = [
        'ALL' => [['lek', 'leki', 'leków'], ['quindarka', 'quindarki', 'quindarek']],
        'AUD' => [
            ['dolar australijski', 'dolary australijskie', 'dolarów australijskich'],
            ['cent', 'centy', 'centów']
        ],
        'BAM' => [['marka', 'marki', 'marek'], ['fenig', 'fenigi', 'fenigów']],
        'BGN' => [['lew', 'lewy', 'lew'], ['stotinka', 'stotinki', 'stotinek']],
        'BRL' => [['real', 'reale', 'realów'], ['centavos', 'centavos', 'centavos']],
        'BYR' => [['rubel', 'ruble', 'rubli'], ['kopiejka', 'kopiejki', 'kopiejek']],
        'CAD' => [['dolar kanadyjski', 'dolary kanadyjskie', 'dolarów kanadyjskich'], ['cent', 'centy', 'centów']],
        'CHF' => [['frank szwajcarski', 'franki szwajcarskie', 'franków szwajcarskich'], ['rapp', 'rappy', 'rappów']],
        'CYP' => [['funt cypryjski', 'funty cypryjskie', 'funtów cypryjskich'], ['cent', 'centy', 'centów']],
        'CZK' => [['korona czeska', 'korony czeskie', 'koron czeskich'], ['halerz', 'halerze', 'halerzy']],
        'DKK' => [['korona duńska', 'korony duńskie', 'koron duńskich'], ['ore', 'ore', 'ore']],
        'EEK' => [['korona estońska', 'korony estońskie', 'koron estońskich'], ['senti', 'senti', 'senti']],
        'EUR' => [['euro', 'euro', 'euro'], ['eurocent', 'eurocenty', 'eurocentów']],
        'GBP' => [['funt szterling', 'funty szterlingi', 'funtów szterlingów'], ['pens', 'pensy', 'pensów']],
        'HKD' => [['dolar Hongkongu', 'dolary Hongkongu', 'dolarów Hongkongu'], ['cent', 'centy', 'centów']],
        'HRK' => [['kuna', 'kuny', 'kun'], ['lipa', 'lipy', 'lip']],
        'HUF' => [['forint', 'forinty', 'forintów'], ['filler', 'fillery', 'fillerów']],
        'ILS' => [['nowy szekel', 'nowe szekele', 'nowych szekeli'], ['agora', 'agory', 'agorot']],
        'ISK' => [['korona islandzka', 'korony islandzkie', 'koron islandzkich'], ['aurar', 'aurar', 'aurar']],
        'JPY' => [['jen', 'jeny', 'jenów'], ['sen', 'seny', 'senów']],
        'LTL' => [['lit', 'lity', 'litów'], ['cent', 'centy', 'centów']],
        'LVL' => [['łat', 'łaty', 'łatów'], ['sentim', 'sentimy', 'sentimów']],
        'MKD' => [['denar', 'denary', 'denarów'], ['deni', 'deni', 'deni']],
        'MTL' => [['lira maltańska', 'liry maltańskie', 'lir maltańskich'], ['centym', 'centymy', 'centymów']],
        'NOK' => [['korona norweska', 'korony norweskie', 'koron norweskich'], ['oere', 'oere', 'oere']],
        'PLN' => [['złoty', 'złote', 'złotych'], ['grosz', 'grosze', 'groszy']],
        'ROL' => [['lej', 'leje', 'lei'], ['bani', 'bani', 'bani']],
        'RUB' => [['rubel', 'ruble', 'rubli'], ['kopiejka', 'kopiejki', 'kopiejek']],
        'SEK' => [['korona szwedzka', 'korony szwedzkie', 'koron szweckich'], ['oere', 'oere', 'oere']],
        'SIT' => [['tolar', 'tolary', 'tolarów'], ['stotinia', 'stotinie', 'stotini']],
        'SKK' => [['korona słowacka', 'korony słowackie', 'koron słowackich'], ['halerz', 'halerze', 'halerzy']],
        'TRL' => [['lira turecka', 'liry tureckie', 'lir tureckich'], ['kurusza', 'kurysze', 'kuruszy']],
        'UAH' => [['hrywna', 'hrywna', 'hrywna'], ['cent', 'centy', 'centów']],
        'USD' => [['dolar', 'dolary', 'dolarów'], ['cent', 'centy', 'centów']],
        'YUM' => [['dinar', 'dinary', 'dinarów'], ['para', 'para', 'para']],
        'ZAR' => [['rand', 'randy', 'randów'], ['cent', 'centy', 'centów']]
    ];

    public function getMinus(): string
    {
        return 'minus';
    }

    public function getZero(): string
    {
        return 'zero';
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
        return self::$hundreds[$hundred];
    }
}
