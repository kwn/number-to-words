<?php

namespace Kwn\NumberToWords\Language\Ukrainian\Dictionary;

use Kwn\NumberToWords\Grammar\Slavonic\Dictionary\Number as SlavonicNumber;
use Kwn\NumberToWords\Grammar\Gender;

class Number extends SlavonicNumber
{
    protected $zero = 'нуль';

    protected $ten = [
        ['', 'один', 'два', 'три', 'чотири', 'п\'ять', 'шість', 'сім', 'вісім', 'дев\'ять'],
        ['', 'одна', 'дві', 'три', 'чотири', 'п\'ять', 'шість', 'сім', 'вісім', 'дев\'ять'],
    ];

    protected $teens = [
        'десять',
        'одинадцять',
        'дванадцять',
        'тринадцять',
        'чотирнадцять',
        'п\'ятнадцять',
        'шістнадцять',
        'сімнадцять',
        'вісімнадцять',
        'дев\'ятнадцять',
    ];

    protected $tens = [
        2 => 'двадцять',
        'тридцять',
        'сорок',
        'п\'ятдесят',
        'шістдесят',
        'сімдесят',
        'вісімдесят',
        'дев\'яносто',
    ];

    protected $hundred = [
        '',
        'сто',
        'двісті',
        'триста',
        'чотириста',
        'п\'ятсот',
        'шістсот',
        'сімсот',
        'вісімсот',
        'дев\'ятсот',
    ];

    protected $mega = [
        [3 => Gender::FEMALE],
        [3 => Gender::MALE],
        ['тисяча', 'тисячі', 'тисяч', Gender::FEMALE],
        ['мільйон', 'мільйони', 'мільйонів', Gender::MALE],
        ['мільярд', 'мільярди', 'мільярдів', Gender::MALE],
        ['трильйон', 'трильйони', 'трильйонів', Gender::MALE],
        ['квадрильйон', 'квадрильйони', 'квадрильйонів', Gender::MALE],
        ['секстильйон', 'секстильйони', 'секстильйонів', Gender::MALE],
    ];
}
