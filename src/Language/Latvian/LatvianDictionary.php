<?php

namespace NumberToWords\Language\Latvian;

use NumberToWords\Language\Dictionary;

class LatvianDictionary implements Dictionary
{
    public const LOCALE = 'lv';
    public const LANGUAGE_NAME = 'Latvian';
    public const LANGUAGE_NAME_NATIVE = 'latviešu';

    private static array $units = [
        0 => '',
        1 => 'viens',
        2 => 'divi',
        3 => 'trīs',
        4 => 'četri',
        5 => 'pieci',
        6 => 'seši',
        7 => 'septiņi',
        8 => 'astoņi',
        9 => 'deviņi'
    ];

    private static array $teens = [
        0 => 'desmit',
        1 => 'vienpadsmit',
        2 => 'divpadsmit',
        3 => 'trīspadsmit',
        4 => 'četrpadsmit',
        5 => 'piecpadsmit',
        6 => 'sešpadsmit',
        7 => 'septiņpadsmit',
        8 => 'astoņpadsmit',
        9 => 'deviņpadsmit'
    ];

    private static array $tens = [
        0 => '',
        1 => 'desmit',
        2 => 'divdesmit',
        3 => 'trīsdesmit',
        4 => 'četrdesmit',
        5 => 'piecdesmit',
        6 => 'sešdesmit',
        7 => 'septiņdesmit',
        8 => 'astoņdesmit',
        9 => 'deviņdesmit'
    ];

    public static array $currencyNames = [
        'EUR' => [['eiro', 'eiro', 'eiro'], ['cents', 'centi', 'centi']],
        'USD' => [['dolārs', 'dolāri', 'dolāri'], ['cents', 'centi', 'centi']],
        'ALL' => [['albāņu leks', 'albāņu leki', 'albāņu leki'], ['qindarka', 'qindarka', 'qindarka']],
        'AED' => [['AAE dirhāms', 'AAE dirhāmi', 'AAE dirhāmi'], ['fils', 'fils', 'fils']],
        'AUD' => [['Austrālijas dolārs', 'Austrālijas dolāri', 'Austrālijas dolāri'], ['cents', 'centi', 'centi']],
        'BAM' => [['Bosnijas marka', 'Bosnijas markas', 'Bosnijas markas'], ['feniņš', 'feniņi', 'feniņi']],
        'BGN' => [['Bulgārijas leva', 'Bulgārijas levas', 'Bulgārijas levas'], ['stotinka', 'stotinkas', 'stotinkas']],
        'BRL' => [['Brazīlijas reāls', 'Brazīlijas reāli', 'Brazīlijas reāli'], ['centavo', 'centavo', 'centavo']],
        'BYR' => [
            ['Baltkrievijas rublis', 'Baltkrievijas rubļi', 'Baltkrievijas rubļi'],
            ['kapeikas', 'kapeikas', 'kapeikas'],
        ],
        'CAD' => [['Kanādas dolārs', 'Kanādas dolāri', 'Kanādas dolāri'], ['cents', 'centi', 'centi']],
        'CHF' => [['Šveices franks', 'Šveices franki', 'Šveices franki'], ['raps', 'rapi', 'rapi']],
        'CNY' => [['Ķīnas juāns', 'Ķīnas juāni', 'Ķīnas juāni'], ['fens', 'feni', 'feni']],
        'CYP' => [['Kipras mārciņa', 'Kipras mārciņas', 'Kipras mārciņas'], ['cents', 'centi', 'centi']],
        'CZK' => [['Čehijas krona', 'Čehijas kronas', 'Čehijas kronas'], ['halērs', 'halēri', 'halēri']],
        'DKK' => [['Dānijas krona', 'Dānijas kronas', 'Dānijas kronas'], ['ēre', 'ēres', 'ēres']],
        'DZD' => [['Alžīrijas dinārs', 'Alžīrijas dināri', 'Alžīrijas dināri'], ['santīms', 'santīmi', 'santīmi']],
        'EEK' => [['Igaunijas krona', 'Igaunijas kronas', 'Igaunijas kronas'], ['sents', 'senti', 'senti']],
        'EGP' => [['Ēģiptes mārciņa', 'Ēģiptes mārciņas', 'Ēģiptes mārciņas'], ['piastrs', 'piastri', 'piastri']],
        'GBP' => [['sterliņu mārciņa', 'sterliņu mārciņas', 'sterliņu mārciņas'], ['penss', 'pensi', 'pensi']],
        'HKD' => [['Honkongas dolārs', 'Honkongas dolāri', 'Honkongas dolāri'], ['cents', 'centi', 'centi']],
        'HRK' => [['Horvātijas kuna', 'Horvātijas kunas', 'Horvātijas kunas'], ['lipa', 'lipas', 'lipas']],
        'HUF' => [['Ungārijas forints', 'Ungārijas forinti', 'Ungārijas forinti'], ['filērs', 'filēri', 'filēri']],
        'IDR' => [['Indonēzijas rūpija', 'Indonēzijas rūpijas', 'Indonēzijas rūpijas'], ['sens', 'seni', 'seni']],
        'ILS' => [['Izraēlas šekelis', 'Izraēlas šekeļi', 'Izraēlas šekeļi'], ['agora', 'agoras', 'agoras']],
        'ISK' => [['Islandes krona', 'Islandes kronas', 'Islandes kronas'], ['ēyrir', 'ēyrir', 'ēyrir']],
        'JPY' => [['Japānas jēna', 'Japānas jēnas', 'Japānas jēnas'], ['sens', 'seni', 'seni']],
        'LTL' => [['Lietuvas lits', 'Lietuvas liti', 'Lietuvas liti'], ['cents', 'centi', 'centi']],
        'LVL' => [['Latvijas lats', 'Latvijas lati', 'Latvijas lati'], ['santīms', 'santīmi', 'santīmi']],
        'LYD' => [['Lībijas dinārs', 'Lībijas dināri', 'Lībijas dināri'], ['dirhams', 'dirhami', 'dirhami']],
        'MAD' => [['Marokas dirhāms', 'Marokas dirhāmi', 'Marokas dirhāmi'], ['santīms', 'santīmi', 'santīmi']],
        'MKD' => [['Maķedonijas denārs', 'Maķedonijas denāri', 'Maķedonijas denāri'], ['denis', 'deni', 'deni']],
        'MRO' => [['Mauritānijas ugija', 'Mauritānijas ugijas', 'Mauritānijas ugijas'], ['kūms', 'kūmi', 'kūmi']],
        'MTL' => [['Maltas lira', 'Maltas liras', 'Maltas liras'], ['cents', 'centi', 'centi']],
        'MXN' => [['Meksikas peso', 'Meksikas peso', 'Meksikas peso'], ['sentavo', 'sentavo', 'sentavo']],
        'MYR' => [['Malaizijas ringits', 'Malaizijas ringiti', 'Malaizijas ringiti'], ['sens', 'seni', 'seni']],
        'NGN' => [['Nigērijas naira', 'Nigērijas nairas', 'Nigērijas nairas'], ['kobo', 'kobo', 'kobo']],
        'NOK' => [['Norvēģijas krona', 'Norvēģijas kronas', 'Norvēģijas kronas'], ['ēre', 'ēres', 'ēres']],
        'PHP' => [['Filipīnu peso', 'Filipīnu peso', 'Filipīnu peso'], ['sentavo', 'sentavo', 'sentavo']],
        'PLN' => [['Polijas zlots', 'Polijas zloti', 'Polijas zloti'], ['grošs', 'groši', 'groši']],
        'RON' => [['Rumānijas leja', 'Rumānijas lejas', 'Rumānijas lejas'], ['bans', 'bani', 'bani']],
        'RUB' => [['Krievijas rublis', 'Krievijas rubļi', 'Krievijas rubļi'], ['kapeikas', 'kapeikas', 'kapeikas']],
        'SAR' => [
            ['Saūda Arābijas riyāls', 'Saūda Arābijas riyāli', 'Saūda Arābijas riyāli'],
            ['hallāls', 'hallāli', 'hallāli'],
        ],
        'SEK' => [['Zviedrijas krona', 'Zviedrijas kronas', 'Zviedrijas kronas'], ['ēre', 'ēres', 'ēres']],
        'SIT' => [['Slovēnijas tolārs', 'Slovēnijas tolāri', 'Slovēnijas tolāri'], ['stotins', 'stotini', 'stotini']],
        'SKK' => [['Slovākijas krona', 'Slovākijas kronas', 'Slovākijas kronas'], ['halērs', 'halēri', 'halēri']],
        'TMT' => [
            ['Turkmenistānas manāts', 'Turkmenistānas manāti', 'Turkmenistānas manāti'],
            ['teņģe', 'teņģes', 'teņģes'],
        ],
        'TND' => [['Tunisijas dinārs', 'Tunisijas dināri', 'Tunisijas dināri'], ['millīms', 'millīmi', 'millīmi']],
        'TRL' => [['Turcijas lira', 'Turcijas liras', 'Turcijas liras'], ['kuruš', 'kuruši', 'kuruši']],
        'TRY' => [['Turcijas lira', 'Turcijas liras', 'Turcijas liras'], ['kuruš', 'kuruši', 'kuruši']],
        'UAH' => [['Ukrainas grivna', 'Ukrainas grivnas', 'Ukrainas grivnas'], ['kapeikas', 'kapeikas', 'kapeikas']],
        'UZS' => [['Uzbekistānas soms', 'Uzbekistānas somi', 'Uzbekistānas somi'], ['tiyins', 'tiyini', 'tiyini']],
        'XAF' => [['CFA franks', 'CFA franki', 'CFA franki'], ['santīms', 'santīmi', 'santīmi']],
        'XOF' => [['CFA franks', 'CFA franki', 'CFA franki'], ['santīms', 'santīmi', 'santīmi']],
        'XPF' => [['CFP franks', 'CFP franki', 'CFP franki'], ['santīms', 'santīmi', 'santīmi']],
        'YUM' => [
            ['Dienvidslāvijas dinārs', 'Dienvidslāvijas dināri', 'Dienvidslāvijas dināri'],
            ['para', 'paras', 'paras'],
        ],
        'ZAR' => [
            ['Dienvidāfrikas rends', 'Dienvidāfrikas rendi', 'Dienvidāfrikas rendi'],
            ['cents', 'centi', 'centi'],
        ],
    ];

    public function getAnd(): string
    {
        return 'un';
    }

    public function getZero(): string
    {
        return 'nulle';
    }

    public function getMinus(): string
    {
        return 'mīnus';
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
        if ($hundred === 1) {
            return 'viens simts';
        }

        return self::$units[$hundred] . ' simti';
    }
}
