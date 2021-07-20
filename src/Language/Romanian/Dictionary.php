<?php

namespace NumberToWords\Language\Romanian;

use NumberToWords\Grammar\Gender;

class Dictionary
{
    public const LOCALE = 'ro';
    public const LANGUAGE_NAME = 'Romanian';
    public const LANGUAGE_NAME_NATIVE = 'Română';
    public const MINUS = 'minus';

    public static int $thresholdFew = 1;
    public static int $thresholdMany = 19;

    public static array $numbers = [
        'zero', // 0
        [ // 1
            [ // masculine
                'un', // article
                'unu', // noun
            ],
            [ // feminine
                'o', // article
                'una', // noun
            ],
            'un', // neutral
            'unu', // abstract (stand-alone cardinal)
        ],
        [ //  2
            'doi', // masculine and abstract
            'două', // feminine and neutral
        ],
        'trei', //  3
        'patru', //  4
        'cinci', //  5
        'șase', //  6
        'șapte', //  7
        'opt', //  8
        'nouă', //  9
        'zece', // 10
        'unsprezece', // 11
        [ // 12
            'doisprezece', // masculine and abstract
            'douăsprezece', // feminine and abstract
        ],
        'treisprezece', // 13
        'paisprezece', // 14
        'cincisprezece', // 15
        'șaisprezece', // 16
        'șaptesprezece', // 17
        'optsprezece', // 18
        'nouăsprezece', // 19
        'douăzeci', // 20
        30 => 'treizeci', // 30
        40 => 'patruzeci', // 40
        50 => 'cincizeci', // 50
        60 => 'șaizeci', // 60
        70 => 'șaptezeci', // 70
        80 => 'optzeci', // 80
        90 => 'nouăzeci', // 90
    ];

    public static string $infinity = 'infinit';

    public static string $and = 'și';

    public static string $wordSeparator = ' ';

    public static array $currencyNames = [
        'AUD' => [
            ['dolar australian', 'dolari australieni', Gender::GENDER_MASCULINE],
            ['cent', 'cenți', Gender::GENDER_MASCULINE],
        ],
        'CAD' => [
            ['dolar canadian', 'dolari canadieni', Gender::GENDER_MASCULINE],
            ['cent', 'cenți', Gender::GENDER_MASCULINE],
        ],
        'CHF' => [
            ['franc elvețian', 'franci elvețieni', Gender::GENDER_MASCULINE],
            ['cent', 'cenți', Gender::GENDER_MASCULINE],
        ],
        'CZK' => [
            ['coroană cehă', 'coroane cehe', Gender::GENDER_FEMININE],
            ['haler', 'haleri', Gender::GENDER_MASCULINE],
        ],
        'EUR' => [
            ['euro', 'euro', Gender::GENDER_MASCULINE],
            ['cent', 'cenți', Gender::GENDER_MASCULINE],
        ],
        'GBP' => [
            ['liră sterlină', 'lire sterline', Gender::GENDER_FEMININE],
            ['penny', 'penny', Gender::GENDER_MASCULINE],
        ],
        'HUF' => [
            ['forint', 'forinți', Gender::GENDER_MASCULINE],
            ['filer', 'fileri', Gender::GENDER_MASCULINE],
        ],
        'JPY' => [
            ['yen', 'yeni', Gender::GENDER_MASCULINE],
            ['sen', 'seni', Gender::GENDER_MASCULINE],
        ],
        'PLN' => [
            ['zlot', 'zloți', Gender::GENDER_MASCULINE],
            ['gros', 'grosi', Gender::GENDER_MASCULINE],
        ],
        'ROL' => [
            ['leu', 'lei', Gender::GENDER_MASCULINE],
            ['ban', 'bani', Gender::GENDER_MASCULINE],
        ],
        'RON' => [
            ['leu', 'lei', Gender::GENDER_MASCULINE],
            ['ban', 'bani', Gender::GENDER_MASCULINE],
        ],
        'RUB' => [
            ['rublă', 'ruble', Gender::GENDER_FEMININE],
            ['copeică', 'copeici', Gender::GENDER_FEMININE],
        ],
        'SKK' => [
            ['coroană slovacă', 'coroane slovace', Gender::GENDER_FEMININE],
            ['haler', 'haleri', Gender::GENDER_MASCULINE],
        ],
        'TRL' => [
            ['liră turcească', 'lire turcești', Gender::GENDER_FEMININE],
            ['kuruș', 'kuruși', Gender::GENDER_MASCULINE],
        ],
        'USD' => [
            ['dolar american', 'dolari americani', Gender::GENDER_MASCULINE],
            ['cent', 'cenți', Gender::GENDER_MASCULINE],
        ],
    ];

    public static string $manyPart = 'de';

    public static string $minus = 'minus';

    public static array $exponent = [
        0 => '',
        2 => ['sută', 'sute', Gender::GENDER_FEMININE],
        3 => ['mie', 'mii', Gender::GENDER_FEMININE],
        6   => ['milion', 'milioane', Gender::GENDER_NEUTER],
        9   => ['miliard', 'miliarde', Gender::GENDER_NEUTER],
        12  => ['trilion', 'trilioane', Gender::GENDER_NEUTER],
        15  => ['cvadrilion', 'cvadrilioane', Gender::GENDER_NEUTER],
        18  => ['cvintilion', 'cvintilioane', Gender::GENDER_NEUTER],
        21  => ['sextilion', 'sextilioane', Gender::GENDER_NEUTER],
        24  => ['septilion', 'septilioane', Gender::GENDER_NEUTER],
        27  => ['octilion', 'octilioane', Gender::GENDER_NEUTER],
        30  => ['nonilion', 'nonilioane', Gender::GENDER_NEUTER],
        33  => ['decilion', 'decilioane', Gender::GENDER_NEUTER],
        36  => ['undecilion', 'undecilioane', Gender::GENDER_NEUTER],
        39  => ['dodecilion', 'dodecilioane', Gender::GENDER_NEUTER],
        42  => ['tredecilion', 'tredecilioane', Gender::GENDER_NEUTER],
        45  => ['cvadrodecilion', 'cvadrodecilioane', Gender::GENDER_NEUTER],
        48  => ['cvindecilion', 'cvindecilioane', Gender::GENDER_NEUTER],
        51  => ['sexdecilion', 'sexdecilioane', Gender::GENDER_NEUTER],
        54  => ['septdecilion', 'septdecilioane', Gender::GENDER_NEUTER],
        57  => ['octodecilion', 'octodecilioane', Gender::GENDER_NEUTER],
        60  => ['novemdecilion', 'novemdecilioane', Gender::GENDER_NEUTER],
        63  => ['vigintilion', 'vigintilioane', Gender::GENDER_NEUTER],
        66  => ['unvigintilion', 'unvigintilioane', Gender::GENDER_NEUTER],
        69  => ['dovigintilion', 'dovigintilioane', Gender::GENDER_NEUTER],
        72  => ['trevigintilion', 'trevigintilioane', Gender::GENDER_NEUTER],
        75  => ['cvadrovigintilion', 'cvadrovigintilioane', Gender::GENDER_NEUTER],
        78  => ['cvinvigintilion', 'cvinvigintilioane', Gender::GENDER_NEUTER],
        81  => ['sexvigintilion', 'sexvigintilioane', Gender::GENDER_NEUTER],
        84  => ['septvigintilion', 'septvigintilioane', Gender::GENDER_NEUTER],
        87  => ['octvigintilion', 'octvigintilioane', Gender::GENDER_NEUTER],
        90  => ['novemvigintilion', 'novemvigintilioane', Gender::GENDER_NEUTER],
        93  => ['trigintilion', 'trigintilioane', Gender::GENDER_NEUTER],
        96  => ['untrigintilion', 'untrigintilioane', Gender::GENDER_NEUTER],
        99  => ['dotrigintilion', 'dotrigintilioane', Gender::GENDER_NEUTER],
        102 => ['trestrigintilion', 'trestrigintilioane', Gender::GENDER_NEUTER],
        105 => ['cvadrotrigintilion', 'cvadrotrigintilioane', Gender::GENDER_NEUTER],
        108 => ['cvintrigintilion', 'cvintrigintilioane', Gender::GENDER_NEUTER],
        111 => ['sextrigintilion', 'sextrigintilioane', Gender::GENDER_NEUTER],
        114 => ['septentrigintilion', 'septentrigintilioane', Gender::GENDER_NEUTER],
        117 => ['octotrigintilion', 'octotrigintilioane', Gender::GENDER_NEUTER],
        120 => ['novemtrigintilion', 'novemtrigintilioane', Gender::GENDER_NEUTER],
        123 => ['cvadragintilion', 'cvadragintilioane', Gender::GENDER_NEUTER],
        126 => ['uncvadragintilion', 'uncvadragintilioane', Gender::GENDER_NEUTER],
        129 => ['docvadragintilion', 'docvadragintilioane', Gender::GENDER_NEUTER],
        132 => ['trecvadragintilion', 'trecvadragintilioane', Gender::GENDER_NEUTER],
        135 => ['cvadrocvadragintilion', 'cvadrocvadragintilioane', Gender::GENDER_NEUTER],
        138 => ['cvincvadragintilion', 'cvincvadragintilioane', Gender::GENDER_NEUTER],
        141 => ['sexcvadragintilion', 'sexcvadragintilioane', Gender::GENDER_NEUTER],
        144 => ['septencvadragintilion', 'septencvadragintilioane', Gender::GENDER_NEUTER],
        147 => ['octocvadragintilion', 'octocvadragintilioane', Gender::GENDER_NEUTER],
        150 => ['novemcvadragintilion', 'novemcvadragintilioane', Gender::GENDER_NEUTER],
    ];
}
