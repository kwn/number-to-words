<?php

namespace NumberToWords\Language\French;

class BelgianDictionary
{
    const LOCALE = 'fr_BE';
    const LANGUAGE_NAME = 'French';
    const LANGUAGE_NAME_NATIVE = 'Français';

    public static $miscNumbers = [
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

    public static $digits = [
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

    public static $zero = 'zéro';
    public static $and = 'et';
    public static $wordSeparator = ' ';
    public static $dash = '-';
    public static $minus = 'moins';
    public static $pluralSuffix = 's';

    public static $exponent = [
        0   => '',
        3   => 'mille',
        6   => 'million',
        9   => 'milliard',
        12  => 'trillion',
        15  => 'quadrillion',
        18  => 'quintillion',
        21  => 'sextillion',
        24  => 'septillion',
        27  => 'octillion',
        30  => 'nonillion',
        33  => 'decillion',
        36  => 'undecillion',
        39  => 'duodecillion',
        42  => 'tredecillion',
        45  => 'quattuordecillion',
        48  => 'quindecillion',
        51  => 'sexdecillion',
        54  => 'septendecillion',
        57  => 'octodecillion',
        60  => 'novemdecillion',
        63  => 'vigintillion',
        66  => 'unvigintillion',
        69  => 'duovigintillion',
        72  => 'trevigintillion',
        75  => 'quattuorvigintillion',
        78  => 'quinvigintillion',
        81  => 'sexvigintillion',
        84  => 'septenvigintillion',
        87  => 'octovigintillion',
        90  => 'novemvigintillion',
    ];
}
