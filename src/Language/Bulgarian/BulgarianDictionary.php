<?php

namespace NumberToWords\Language\Bulgarian;

use NumberToWords\Language\Dictionary;
use NumberToWords\Language\GrammaticalGenderAwareInterface;

class BulgarianDictionary implements Dictionary
{
    public const LOCALE = 'bg_BG';
    public const LANGUAGE_NAME = 'Bulgarian';
    public const LANGUAGE_NAME_NATIVE = 'български';

    public const GRAMMATICAL_COUNT = 'count';
    public const GRAMMATICAL_QUANTITATIVE_ADJECTIVE = 'quantitativeAdjective';

    public const GRAMMATICAL_NUMBER_SINGULAR = 'singular';
    public const GRAMMATICAL_NUMBER_PLURAL = 'plural';

    public const ENUMERATION_BY_VALUE = 'enumerationByValue';
    public const ENUMERATION_BY_POWERS_OF_A_THOUSAND = 'enumerationByPowersOfAThousand';

    public const CURRENCY_WHOLE = 'currencyWhole';
    public const CURRENCY_FRACTION = 'currencyFraction';

    public const ARITHMETIC_MINUS = 'минус';

    /** Token to separate words in triplets and chunks in final string */
    public const SEPARATOR = " ";
    public const GRAMMATICAL_CONJUNCTION_AND = 'и';

    public const ENUMERATIONS = [
        self::ENUMERATION_BY_VALUE => [
            0 => 'нула',
            1 => [
                self::GRAMMATICAL_COUNT => 'едно',
                self::GRAMMATICAL_QUANTITATIVE_ADJECTIVE => [
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE => 'един',
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE => 'една',
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_NEUTER => 'едно',
                ],
            ],
            2 => [
                self::GRAMMATICAL_COUNT => 'две',
                self::GRAMMATICAL_QUANTITATIVE_ADJECTIVE => [
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE => 'два',
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE => 'две',
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_NEUTER => 'две',
                ],
            ],
            3 => 'три',
            4 => 'четири',
            5 => 'пет',
            6 => 'шест',
            7 => 'седем',
            8 => 'осем',
            9 => 'девет',

            10 => 'десет',
            11 => 'единадесет',
            12 => 'дванадесет',
            13 => 'тринадесет',
            14 => 'четиринадесет',
            15 => 'петнадесет',
            16 => 'шестнадесет',
            17 => 'седемнадесет',
            18 => 'осемнадесет',
            19 => 'деветнадесет',

            20 => 'двадесет',
            30 => 'тридесет',
            40 => 'четиридесет',
            50 => 'петдесет',
            60 => 'шестдесет',
            70 => 'седемдесет',
            80 => 'осемдесет',
            90 => 'деветдесет',

            100 => 'сто',
            200 => 'двеста',
            300 => 'триста',
            400 => 'четиристотин',
            500 => 'петстотин',
            600 => 'шестстотин',
            700 => 'седемстотин',
            800 => 'осемстотин',
            900 => 'деветстотин',
        ],
        self::ENUMERATION_BY_POWERS_OF_A_THOUSAND => [
            -21 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'вигинтилионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'вигинтилионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -20 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'новемдекалионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'новемдекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -19 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'октодекалионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'октодекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -18 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'септдекалионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'септдекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -17 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'сексдекалионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'сексдекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -16 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'квинтдекалионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'квинтдекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -15 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'кватордекалионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'кватордекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -14 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'тредекалионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'тредекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -13 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'дуодекалионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'дуодекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -12 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'ундекалионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'ундекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -11 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'декалионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'декалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -10 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'ноналионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'ноналионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -9 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'октилионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'октилионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -8 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'септилионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'септилионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -7 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'секстилионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'секстилионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -6 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'квинтилионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'квинтилионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -5 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'квадрилионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'квадрилионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -4 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'трилионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'трилионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -3 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'милиардна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'милиардни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -2 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'милионна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'милионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            -1 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'хилядна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'хилядни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            1 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'хиляда',
                self::GRAMMATICAL_NUMBER_PLURAL => 'хиляди',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            2 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'милион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'милиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            3 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'милиард',
                self::GRAMMATICAL_NUMBER_PLURAL => 'милиарда',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            4 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'трилион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'трилиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            5 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'квадрилион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'квадрилиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            6 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'квинтилион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'квинтилиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            7 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'секстилион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'секстилиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            8 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'септилион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'септилиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            9 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'октилион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'октилиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            10 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'ноналион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'ноналиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            11 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'декалион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'декалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            12 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'ундекалион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'ундекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            13 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'дуодекалион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'дуодекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            14 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'тредекалион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'тредекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            15 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'кватордекалион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'кватордекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            16 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'квинтдекалион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'квинтдекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            17 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'сексдекалион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'сексдекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            18 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'септдекалион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'септдекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            19 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'октодекалион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'октодекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            20 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'новемдекалион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'новемдекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            21 => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'вигинтилион',
                self::GRAMMATICAL_NUMBER_PLURAL => 'вигинтилиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
    ];

    public const CURRENCY = [
        'ALL' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'лек',
                self::GRAMMATICAL_NUMBER_PLURAL => 'лека',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'киндарка',
                self::GRAMMATICAL_NUMBER_PLURAL => 'киндарки',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
        ],
        'AED' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'дирхам на ОАЕ',
                self::GRAMMATICAL_NUMBER_PLURAL => 'дирхама на ОАЕ',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'филс',
                self::GRAMMATICAL_NUMBER_PLURAL => 'филса',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'AUD' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'австралийски долар',
                self::GRAMMATICAL_NUMBER_PLURAL => 'австралийски долара',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'цент',
                self::GRAMMATICAL_NUMBER_PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'BAM' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'конвертируема марка',
                self::GRAMMATICAL_NUMBER_PLURAL => 'конвертируеми марки',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'фениг',
                self::GRAMMATICAL_NUMBER_PLURAL => 'фенига',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'BGN' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'лев',
                self::GRAMMATICAL_NUMBER_PLURAL => 'лева',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'стотинка',
                self::GRAMMATICAL_NUMBER_PLURAL => 'стотинки',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
        ],
        'BRL' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'реал',
                self::GRAMMATICAL_NUMBER_PLURAL => 'реала',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'сентаво',
                self::GRAMMATICAL_NUMBER_PLURAL => 'сентави',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_NEUTER,
            ],
        ],
        'BYR' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'беларуска рубла',
                self::GRAMMATICAL_NUMBER_PLURAL => 'беларуски рубли',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'копейка',
                self::GRAMMATICAL_NUMBER_PLURAL => 'копейки',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
        ],
        'CAD' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'канадски долар',
                self::GRAMMATICAL_NUMBER_PLURAL => 'канадски долари',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'цент',
                self::GRAMMATICAL_NUMBER_PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'CHF' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'швейцарски франк',
                self::GRAMMATICAL_NUMBER_PLURAL => 'швейцарски франка',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'сантим',
                self::GRAMMATICAL_NUMBER_PLURAL => 'сантима',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'CYP' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'кипърска лира',
                self::GRAMMATICAL_NUMBER_PLURAL => 'кипърски лири',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'цент',
                self::GRAMMATICAL_NUMBER_PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'CZK' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'чешка крона',
                self::GRAMMATICAL_NUMBER_PLURAL => 'чешки крони',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'халер',
                self::GRAMMATICAL_NUMBER_PLURAL => 'халера',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'DKK' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'датска крона',
                self::GRAMMATICAL_NUMBER_PLURAL => 'датски крони',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'йоре',
                self::GRAMMATICAL_NUMBER_PLURAL => 'йоре',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_NEUTER,
            ],
        ],
        'DZD' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'алжирски динар',
                self::GRAMMATICAL_NUMBER_PLURAL => 'алжирски динара',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'цент',
                self::GRAMMATICAL_NUMBER_PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'EEK' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'естонска крона',
                self::GRAMMATICAL_NUMBER_PLURAL => 'естонски крони',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'цент',
                self::GRAMMATICAL_NUMBER_PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'EGP' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'египетска лира',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'пиастър',
                self::GRAMMATICAL_NUMBER_PLURAL => 'пиастъра',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'EUR' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'евро',
                self::GRAMMATICAL_NUMBER_PLURAL => 'евро',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_NEUTER,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'цент',
                self::GRAMMATICAL_NUMBER_PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'GBP' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'британска лира',
                self::GRAMMATICAL_NUMBER_PLURAL => 'британски лири',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'пенс',
                self::GRAMMATICAL_NUMBER_PLURAL => 'пенса',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'HKD' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'хонгконгски долар',
                self::GRAMMATICAL_NUMBER_PLURAL => 'хонгконгски долара',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'цент',
                self::GRAMMATICAL_NUMBER_PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'HRK' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'хърватска куна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'хърватски куни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'лип',
                self::GRAMMATICAL_NUMBER_PLURAL => 'липа',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'HUF' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'форинт',
                self::GRAMMATICAL_NUMBER_PLURAL => 'форинта',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'филер',
                self::GRAMMATICAL_NUMBER_PLURAL => 'филера',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'ILS' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'шекел',
                self::GRAMMATICAL_NUMBER_PLURAL => 'шекела',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'агорот',
                self::GRAMMATICAL_NUMBER_PLURAL => 'агороти',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'ISK' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'исландска крона',
                self::GRAMMATICAL_NUMBER_PLURAL => 'исландски крони',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'ейре',
                self::GRAMMATICAL_NUMBER_PLURAL => 'ейре',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_NEUTER,
            ],
        ],
        'JPY' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'йена',
                self::GRAMMATICAL_NUMBER_PLURAL => 'йени',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'сен',
                self::GRAMMATICAL_NUMBER_PLURAL => 'сена',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'LTL' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'литас',
                self::GRAMMATICAL_NUMBER_PLURAL => 'литаса',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'цент',
                self::GRAMMATICAL_NUMBER_PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'LVL' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'лат',
                self::GRAMMATICAL_NUMBER_PLURAL => 'лата',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'сантим',
                self::GRAMMATICAL_NUMBER_PLURAL => 'сантима',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'LYD' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'либийски динар',
                self::GRAMMATICAL_NUMBER_PLURAL => 'либийски динара',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'цент',
                self::GRAMMATICAL_NUMBER_PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'MAD' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'марокански дирхам',
                self::GRAMMATICAL_NUMBER_PLURAL => 'марокански дирхама',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'цент',
                self::GRAMMATICAL_NUMBER_PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'MKD' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'македонски денар',
                self::GRAMMATICAL_NUMBER_PLURAL => 'македонски денара',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'ден',
                self::GRAMMATICAL_NUMBER_PLURAL => 'дени',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'MRO' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'угия',
                self::GRAMMATICAL_NUMBER_PLURAL => 'угии',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'хумс',
                self::GRAMMATICAL_NUMBER_PLURAL => 'хумса',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'MTL' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'малтийска лира',
                self::GRAMMATICAL_NUMBER_PLURAL => 'малтийски лири',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'сантим',
                self::GRAMMATICAL_NUMBER_PLURAL => 'сантима',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'NGN' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'найра',
                self::GRAMMATICAL_NUMBER_PLURAL => 'найра',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'кобо',
                self::GRAMMATICAL_NUMBER_PLURAL => 'кобо',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_NEUTER,
            ],
        ],
        'NOK' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'норвежка крона',
                self::GRAMMATICAL_NUMBER_PLURAL => 'норвежки крони',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'йоре',
                self::GRAMMATICAL_NUMBER_PLURAL => 'йоре',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_NEUTER,
            ],
        ],
        'PHP' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'филипинско песо',
                self::GRAMMATICAL_NUMBER_PLURAL => 'филипински песа',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_NEUTER,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'сентаво',
                self::GRAMMATICAL_NUMBER_PLURAL => 'сентави',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_NEUTER,
            ],
        ],
        'PLN' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'злота',
                self::GRAMMATICAL_NUMBER_PLURAL => 'злоти',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'грош',
                self::GRAMMATICAL_NUMBER_PLURAL => 'гроша',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'ROL' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'лея',
                self::GRAMMATICAL_NUMBER_PLURAL => 'леи',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'бан',
                self::GRAMMATICAL_NUMBER_PLURAL => 'бани',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'RUB' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'рубла',
                self::GRAMMATICAL_NUMBER_PLURAL => 'рубли',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'копейка',
                self::GRAMMATICAL_NUMBER_PLURAL => 'копейки',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
        ],
        'SAR' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'риал',
                self::GRAMMATICAL_NUMBER_PLURAL => 'риала',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'халал',
                self::GRAMMATICAL_NUMBER_PLURAL => 'халала',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'SEK' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'шведска крона',
                self::GRAMMATICAL_NUMBER_PLURAL => 'шведски крони',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'йоре',
                self::GRAMMATICAL_NUMBER_PLURAL => 'йоре',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_NEUTER,
            ],
        ],
        'SIT' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'толар',
                self::GRAMMATICAL_NUMBER_PLURAL => 'толара',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'стотина',
                self::GRAMMATICAL_NUMBER_PLURAL => 'стотини',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
        ],
        'SKK' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'словашка крона',
                self::GRAMMATICAL_NUMBER_PLURAL => 'словашки крони',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'халиер',
                self::GRAMMATICAL_NUMBER_PLURAL => 'халиера',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'TMT' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'туркменски манат',
                self::GRAMMATICAL_NUMBER_PLURAL => 'туркменски маната',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'тенге',
                self::GRAMMATICAL_NUMBER_PLURAL => 'тенги',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_NEUTER,
            ],
        ],
        'TND' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'унизийски динар',
                self::GRAMMATICAL_NUMBER_PLURAL => 'тунизийски динара',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'милим',
                self::GRAMMATICAL_NUMBER_PLURAL => 'милима',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'TRL' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'турска лира',
                self::GRAMMATICAL_NUMBER_PLURAL => 'турски лири',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'куруш',
                self::GRAMMATICAL_NUMBER_PLURAL => 'куруша',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'TRY' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'турска лира',
                self::GRAMMATICAL_NUMBER_PLURAL => 'турски лири',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'куруш',
                self::GRAMMATICAL_NUMBER_PLURAL => 'куруша',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'UAH' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'гривна',
                self::GRAMMATICAL_NUMBER_PLURAL => 'гривни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'копийка',
                self::GRAMMATICAL_NUMBER_PLURAL => 'копийки',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'USD' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'долар',
                self::GRAMMATICAL_NUMBER_PLURAL => 'долара',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'цент',
                self::GRAMMATICAL_NUMBER_PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'XAF' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'CFA франк',
                self::GRAMMATICAL_NUMBER_PLURAL => 'CFA франка',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'цент',
                self::GRAMMATICAL_NUMBER_PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'XOF' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'CFA франк',
                self::GRAMMATICAL_NUMBER_PLURAL => 'CFA франка',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'цент',
                self::GRAMMATICAL_NUMBER_PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'XPF' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'CFP франк',
                self::GRAMMATICAL_NUMBER_PLURAL => 'CFP франка',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'сантим',
                self::GRAMMATICAL_NUMBER_PLURAL => 'сантима',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'YUM' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'югославски динар',
                self::GRAMMATICAL_NUMBER_PLURAL => 'югославски динари',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'пара',
                self::GRAMMATICAL_NUMBER_PLURAL => 'пари',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_FEMININE,
            ],
        ],
        'ZAR' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'ранд',
                self::GRAMMATICAL_NUMBER_PLURAL => 'ранда',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'цент',
                self::GRAMMATICAL_NUMBER_PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
        'UZS' => [
            self::CURRENCY_WHOLE => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'сом',
                self::GRAMMATICAL_NUMBER_PLURAL => 'сома',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                self::GRAMMATICAL_NUMBER_SINGULAR => 'тийн',
                self::GRAMMATICAL_NUMBER_PLURAL => 'тийна',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER_MASCULINE,
            ],
        ],
    ];

    public function getSeparator(): string
    {
        return static::SEPARATOR;
    }

    public function getZero(): string
    {
        return static::ENUMERATIONS[static::ENUMERATION_BY_VALUE][0];
    }

    public function getMinus(): string
    {
        return static::ARITHMETIC_MINUS;
    }

    public function getCorrespondingUnit(int $unit): string
    {
        $result = static::ENUMERATIONS[static::ENUMERATION_BY_VALUE][$unit];

        if (is_array($result)) {
            $result = $result[self::GRAMMATICAL_COUNT];
        }

        return $result;
    }

    public function getCorrespondingUnitForGrammaticalGender(int $unit, string $grammaticalGender): string
    {
        $result = static::ENUMERATIONS[static::ENUMERATION_BY_VALUE][$unit];

        if (is_array($result)) {
            $result = $result[self::GRAMMATICAL_QUANTITATIVE_ADJECTIVE][$grammaticalGender];
        }

        return $result;
    }

    public function getCorrespondingTeen(int $teen): string
    {
        $result = static::ENUMERATIONS[static::ENUMERATION_BY_VALUE][$teen];

        if (is_array($result)) {
            $result = $result[self::GRAMMATICAL_COUNT];
        }

        return $result;
    }

    public function getCorrespondingTen(int $ten): string
    {
        $result = static::ENUMERATIONS[static::ENUMERATION_BY_VALUE][$ten];

        if (is_array($result)) {
            $result = $result[self::GRAMMATICAL_COUNT];
        }

        return $result;
    }

    public function getCorrespondingHundred(int $hundred): string
    {
        $result = static::ENUMERATIONS[static::ENUMERATION_BY_VALUE][$hundred];

        if (is_array($result)) {
            $result = $result[self::GRAMMATICAL_COUNT];
        }

        return $result;
    }
}
