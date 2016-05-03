<?php
namespace Kwn\NumberToWords\Language\Russian\Dictionary;

use Kwn\NumberToWords\Grammar\Slavonic\Dictionary\Number as SlavonicNumber;
use Kwn\NumberToWords\Grammar\Gender;

class Number extends SlavonicNumber
{
    protected $zero = 'ноль';

    protected $ten = [
        ['', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'],
        ['', 'одна', 'две', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'],
    ];

    protected $teens = [
        'десять',
        'одиннадцать',
        'двенадцать',
        'тринадцать',
        'четырнадцать',
        'пятнадцать',
        'шестнадцать',
        'семнадцать',
        'восемнадцать',
        'девятнадцать',
    ];

    protected $tens = [
        2 => 'двадцать',
        'тридцать',
        'сорок',
        'пятьдесят',
        'шестьдесят',
        'семьдесят',
        'восемьдесят',
        'девяносто',
    ];

    protected $hundred = [
        '',
        'сто',
        'двести',
        'триста',
        'четыреста',
        'пятьсот',
        'шестьсот',
        'семьсот',
        'восемьсот',
        'девятьсот',
    ];

    protected $mega = [
        [3 => Gender::FEMALE],
        [3 => Gender::MALE],
        ['тысяча', 'тысячи', 'тысяч', Gender::FEMALE],
        ['миллион', 'миллиона', 'миллионов', Gender::MALE],
        ['миллиард', 'милиарда', 'миллиардов', Gender::MALE],
        ['триллион', 'триллионы', 'триллионов', Gender::MALE],
        ['квадриллион', 'квадриллиона', 'квадриллионов', Gender::MALE],
        ['секстиллион', 'секстильоны', 'секстиллионов', Gender::MALE],
    ];
}
