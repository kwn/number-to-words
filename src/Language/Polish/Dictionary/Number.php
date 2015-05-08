<?php

namespace Kwn\NumberToWords\Language\Polish\Dictionary;

class Number
{
    public static $zero = 'zero';

    public static $units = ['', 'jeden', 'dwa', 'trzy', 'cztery', 'pięć', 'sześć', 'siedem', 'osiem', 'dziewięć'];

    public static $teens = ['dziesięć', 'jedenaście', 'dwanaście', 'trzynaście', 'czternaście', 'piętnaście',
        'szesnaście', 'siedemnaście', 'osiemnaście', 'dziewiętnaście'];

    public static $tens = ['', 'dziesięć', 'dwadzieścia', 'trzydzieści', 'czterdzieści', 'pięćdziesiąt',
        'sześćdziesiąt', 'siedemdziesiąt', 'osiemdziesiąt', 'dziewięćdziesiąt'];

    public static $hundreds = ['', 'sto', 'dwieście', 'trzysta', 'czterysta', 'pięćset', 'sześćset',
        'siedemset', 'osiemset', 'dziewięćset'];

    public static $mega = [
        ['', '', ''],
        ['tysiąc', 'tysiące', 'tysięcy'],
        ['milion', 'miliony', 'milionów'],
        ['miliard', 'miliardy', 'miliardów'],
        ['bilion', 'biliony', 'bilionów'],
        ['biliard', 'biliardy', 'biliardów'],
        ['trylion', 'tryliony', 'trylionów'],
        ['tryliard', 'tryliardy', 'tryliardów']
    ];
}
