<?php

namespace NumberToWords\Language\French;

class BelgianDictionary
{
    public const LOCALE = 'fr_BE';
    public const LANGUAGE_NAME = 'French';
    public const LANGUAGE_NAME_NATIVE = 'Français';

    public static array $miscNumbers = [
        10  => 'dix',
        11  => 'onze',
        12  => 'douze',
        13  => 'treize',
        14  => 'quatorze',
        15  => 'quinze',
        16  => 'seize',
        20  => 'vingt',
        30  => 'trente',
        40  => 'quarante',
        50  => 'cinquante',
        60  => 'soixante',
        70  => 'septante',
        90  => 'nonante',
        100 => 'cent'
    ];

    public static array $digits = [
        1 => 'un',
        2 => 'deux',
        3 => 'trois',
        4 => 'quatre',
        5 => 'cinq',
        6 => 'six',
        7 => 'sept',
        8 => 'huit',
        9 => 'neuf'
    ];

    public static string $zero = 'zéro';
    public static string $and = 'et';
    public static string $wordSeparator = ' ';
    public static string $dash = '-';
    public static string $minus = 'moins';
    public static string $pluralSuffix = 's';

    public static array $exponent = [
        0   => '',
        3   => 'mille',
        6   => 'million',
        9   => 'milliard',
        12  => 'billion',
        15  => 'billiard',
        18  => 'trillion',
        21  => 'trilliard',
        24  => 'quadrillion',
        27  => 'quadrillard',
        30  => 'quintillion',
        33  => 'quintilliard',
        36  => 'sextillion',
        39  => 'sextilliard',
        42  => 'septillion',
        45  => 'septilliard',
        48  => 'octillion',
        51  => 'octilliard',
        54  => 'nonillion',
        57  => 'nonilliard',
        60  => 'décillion',
        63  => 'décilliard',
        66  => 'undécillion',
        69  => 'undécilliard',
        72  => 'duodécillion',
        75  => 'duodécilliard',
        78  => 'trédécillion',
        81  => 'trédéciliard',
        84  => 'quattuordécillion',
        87  => 'quattuordécilliard',
        90  => 'quindécillion',
        93  => 'quindécilliard',
        96  => 'sexdécillion',
        99  => 'sexdécilliard',
        102  => 'septendécillion',
        105  => 'septendécilliard',
        108  => 'octodécillion',
        111  => 'octodécilliard',
        114  => 'novemdécillion',
        117  => 'novemdécilliard',
        120  => 'vingtillion',
        123  => 'vingtilliard',
    ];
}
