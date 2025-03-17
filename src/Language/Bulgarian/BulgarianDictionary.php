<?php

namespace NumberToWords\Language\Bulgarian;

use NumberToWords\Grammar\Form;
use NumberToWords\Grammar\Gender;
use NumberToWords\Language\Dictionary;
use NumberToWords\Language\GrammaticalGenderAwareInterface;

class BulgarianDictionary implements Dictionary
{
    public const LOCALE = 'bg_BG';
    public const LANGUAGE_NAME = 'Bulgarian';
    public const LANGUAGE_NAME_NATIVE = 'български';

    public const ENUMERATION_BY_VALUE = 'enumerationByValue';
    public const ENUMERATION_BY_POWERS_OF_A_THOUSAND = 'enumerationByPowersOfAThousand';

    public const CURRENCY_WHOLE = 'currencyWhole';
    public const CURRENCY_FRACTION = 'currencyFraction';

    public const ARITHMETIC_MINUS = 'минус';

    /** Token to separate words in triplets and chunks in final string */
    public const SEPARATOR = ' ';
    public const GRAMMATICAL_CONJUNCTION_AND = 'и';

    public const ENUMERATIONS = [
        self::ENUMERATION_BY_VALUE => [
            0 => 'нула',
            1 => [
                    Gender::GENDER_MASCULINE => 'един',
                    Gender::GENDER_FEMININE => 'една',
                    Gender::GENDER_NEUTER => 'едно',
                    Gender::GENDER_ABSTRACT => 'едно',
            ],
            2 => [
                Gender::GENDER_MASCULINE => 'два',
                Gender::GENDER_FEMININE => 'две',
                Gender::GENDER_NEUTER => 'две',
                Gender::GENDER_ABSTRACT => 'две',
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
                Form::SINGULAR => 'вигинтилионна',
                Form::PLURAL => 'вигинтилионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -20 => [
                Form::SINGULAR => 'новемдекалионна',
                Form::PLURAL => 'новемдекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -19 => [
                Form::SINGULAR => 'октодекалионна',
                Form::PLURAL => 'октодекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -18 => [
                Form::SINGULAR => 'септдекалионна',
                Form::PLURAL => 'септдекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -17 => [
                Form::SINGULAR => 'сексдекалионна',
                Form::PLURAL => 'сексдекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -16 => [
                Form::SINGULAR => 'квинтдекалионна',
                Form::PLURAL => 'квинтдекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -15 => [
                Form::SINGULAR => 'кватордекалионна',
                Form::PLURAL => 'кватордекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -14 => [
                Form::SINGULAR => 'тредекалионна',
                Form::PLURAL => 'тредекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -13 => [
                Form::SINGULAR => 'дуодекалионна',
                Form::PLURAL => 'дуодекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -12 => [
                Form::SINGULAR => 'ундекалионна',
                Form::PLURAL => 'ундекалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -11 => [
                Form::SINGULAR => 'декалионна',
                Form::PLURAL => 'декалионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -10 => [
                Form::SINGULAR => 'ноналионна',
                Form::PLURAL => 'ноналионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -9 => [
                Form::SINGULAR => 'октилионна',
                Form::PLURAL => 'октилионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -8 => [
                Form::SINGULAR => 'септилионна',
                Form::PLURAL => 'септилионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -7 => [
                Form::SINGULAR => 'секстилионна',
                Form::PLURAL => 'секстилионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -6 => [
                Form::SINGULAR => 'квинтилионна',
                Form::PLURAL => 'квинтилионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -5 => [
                Form::SINGULAR => 'квадрилионна',
                Form::PLURAL => 'квадрилионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -4 => [
                Form::SINGULAR => 'трилионна',
                Form::PLURAL => 'трилионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -3 => [
                Form::SINGULAR => 'милиардна',
                Form::PLURAL => 'милиардни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -2 => [
                Form::SINGULAR => 'милионна',
                Form::PLURAL => 'милионни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            -1 => [
                Form::SINGULAR => 'хилядна',
                Form::PLURAL => 'хилядни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            1 => [
                Form::SINGULAR => 'хиляда',
                Form::PLURAL => 'хиляди',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            2 => [
                Form::SINGULAR => 'милион',
                Form::PLURAL => 'милиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            3 => [
                Form::SINGULAR => 'милиард',
                Form::PLURAL => 'милиарда',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            4 => [
                Form::SINGULAR => 'трилион',
                Form::PLURAL => 'трилиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            5 => [
                Form::SINGULAR => 'квадрилион',
                Form::PLURAL => 'квадрилиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            6 => [
                Form::SINGULAR => 'квинтилион',
                Form::PLURAL => 'квинтилиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            7 => [
                Form::SINGULAR => 'секстилион',
                Form::PLURAL => 'секстилиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            8 => [
                Form::SINGULAR => 'септилион',
                Form::PLURAL => 'септилиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            9 => [
                Form::SINGULAR => 'октилион',
                Form::PLURAL => 'октилиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            10 => [
                Form::SINGULAR => 'ноналион',
                Form::PLURAL => 'ноналиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            11 => [
                Form::SINGULAR => 'декалион',
                Form::PLURAL => 'декалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            12 => [
                Form::SINGULAR => 'ундекалион',
                Form::PLURAL => 'ундекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            13 => [
                Form::SINGULAR => 'дуодекалион',
                Form::PLURAL => 'дуодекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            14 => [
                Form::SINGULAR => 'тредекалион',
                Form::PLURAL => 'тредекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            15 => [
                Form::SINGULAR => 'кватордекалион',
                Form::PLURAL => 'кватордекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            16 => [
                Form::SINGULAR => 'квинтдекалион',
                Form::PLURAL => 'квинтдекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            17 => [
                Form::SINGULAR => 'сексдекалион',
                Form::PLURAL => 'сексдекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            18 => [
                Form::SINGULAR => 'септдекалион',
                Form::PLURAL => 'септдекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            19 => [
                Form::SINGULAR => 'октодекалион',
                Form::PLURAL => 'октодекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            20 => [
                Form::SINGULAR => 'новемдекалион',
                Form::PLURAL => 'новемдекалиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            21 => [
                Form::SINGULAR => 'вигинтилион',
                Form::PLURAL => 'вигинтилиона',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
    ];

    public const CURRENCY = [
        'ALL' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'лек',
                Form::PLURAL => 'лека',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'киндарка',
                Form::PLURAL => 'киндарки',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
        ],
        'AED' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'дирхам на ОАЕ',
                Form::PLURAL => 'дирхама на ОАЕ',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'филс',
                Form::PLURAL => 'филса',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'AUD' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'австралийски долар',
                Form::PLURAL => 'австралийски долара',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'цент',
                Form::PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'BAM' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'конвертируема марка',
                Form::PLURAL => 'конвертируеми марки',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'фениг',
                Form::PLURAL => 'фенига',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'BGN' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'лев',
                Form::PLURAL => 'лева',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'стотинка',
                Form::PLURAL => 'стотинки',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
        ],
        'BRL' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'реал',
                Form::PLURAL => 'реала',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'сентаво',
                Form::PLURAL => 'сентави',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_NEUTER,
            ],
        ],
        'BYR' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'беларуска рубла',
                Form::PLURAL => 'беларуски рубли',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'копейка',
                Form::PLURAL => 'копейки',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
        ],
        'CAD' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'канадски долар',
                Form::PLURAL => 'канадски долари',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'цент',
                Form::PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'CHF' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'швейцарски франк',
                Form::PLURAL => 'швейцарски франка',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'сантим',
                Form::PLURAL => 'сантима',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'CYP' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'кипърска лира',
                Form::PLURAL => 'кипърски лири',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'цент',
                Form::PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'CZK' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'чешка крона',
                Form::PLURAL => 'чешки крони',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'халер',
                Form::PLURAL => 'халера',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'DKK' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'датска крона',
                Form::PLURAL => 'датски крони',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'йоре',
                Form::PLURAL => 'йоре',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_NEUTER,
            ],
        ],
        'DZD' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'алжирски динар',
                Form::PLURAL => 'алжирски динара',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'цент',
                Form::PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'EEK' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'естонска крона',
                Form::PLURAL => 'естонски крони',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'цент',
                Form::PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'EGP' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'египетска лира',
                Form::PLURAL => 'египетски лири',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'пиастър',
                Form::PLURAL => 'пиастъра',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'EUR' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'евро',
                Form::PLURAL => 'евро',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_NEUTER,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'цент',
                Form::PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'GBP' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'британска лира',
                Form::PLURAL => 'британски лири',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'пенс',
                Form::PLURAL => 'пенса',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'HKD' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'хонгконгски долар',
                Form::PLURAL => 'хонгконгски долара',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'цент',
                Form::PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'HRK' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'хърватска куна',
                Form::PLURAL => 'хърватски куни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'лип',
                Form::PLURAL => 'липа',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'HUF' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'форинт',
                Form::PLURAL => 'форинта',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'филер',
                Form::PLURAL => 'филера',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'ILS' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'шекел',
                Form::PLURAL => 'шекела',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'агорот',
                Form::PLURAL => 'агороти',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'ISK' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'исландска крона',
                Form::PLURAL => 'исландски крони',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'ейре',
                Form::PLURAL => 'ейре',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_NEUTER,
            ],
        ],
        'JPY' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'йена',
                Form::PLURAL => 'йени',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'сен',
                Form::PLURAL => 'сена',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'LTL' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'литас',
                Form::PLURAL => 'литаса',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'цент',
                Form::PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'LVL' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'лат',
                Form::PLURAL => 'лата',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'сантим',
                Form::PLURAL => 'сантима',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'LYD' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'либийски динар',
                Form::PLURAL => 'либийски динара',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'цент',
                Form::PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'MAD' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'марокански дирхам',
                Form::PLURAL => 'марокански дирхама',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'цент',
                Form::PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'MKD' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'македонски денар',
                Form::PLURAL => 'македонски денара',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'ден',
                Form::PLURAL => 'дени',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'MRO' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'угия',
                Form::PLURAL => 'угии',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'хумс',
                Form::PLURAL => 'хумса',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'MTL' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'малтийска лира',
                Form::PLURAL => 'малтийски лири',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'сантим',
                Form::PLURAL => 'сантима',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'NGN' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'найра',
                Form::PLURAL => 'найра',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'кобо',
                Form::PLURAL => 'кобо',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_NEUTER,
            ],
        ],
        'NOK' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'норвежка крона',
                Form::PLURAL => 'норвежки крони',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'йоре',
                Form::PLURAL => 'йоре',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_NEUTER,
            ],
        ],
        'PHP' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'филипинско песо',
                Form::PLURAL => 'филипински песа',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_NEUTER,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'сентаво',
                Form::PLURAL => 'сентави',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_NEUTER,
            ],
        ],
        'PLN' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'злота',
                Form::PLURAL => 'злоти',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'грош',
                Form::PLURAL => 'гроша',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'ROL' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'лея',
                Form::PLURAL => 'леи',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'бан',
                Form::PLURAL => 'бани',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'RUB' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'рубла',
                Form::PLURAL => 'рубли',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'копейка',
                Form::PLURAL => 'копейки',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
        ],
        'SAR' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'риал',
                Form::PLURAL => 'риала',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'халал',
                Form::PLURAL => 'халала',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'SEK' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'шведска крона',
                Form::PLURAL => 'шведски крони',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'йоре',
                Form::PLURAL => 'йоре',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_NEUTER,
            ],
        ],
        'SIT' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'толар',
                Form::PLURAL => 'толара',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'стотина',
                Form::PLURAL => 'стотини',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
        ],
        'SKK' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'словашка крона',
                Form::PLURAL => 'словашки крони',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'халиер',
                Form::PLURAL => 'халиера',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'TMT' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'туркменски манат',
                Form::PLURAL => 'туркменски маната',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'тенге',
                Form::PLURAL => 'тенги',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_NEUTER,
            ],
        ],
        'TND' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'унизийски динар',
                Form::PLURAL => 'тунизийски динара',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'милим',
                Form::PLURAL => 'милима',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'TRL' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'турска лира',
                Form::PLURAL => 'турски лири',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'куруш',
                Form::PLURAL => 'куруша',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'TRY' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'турска лира',
                Form::PLURAL => 'турски лири',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'куруш',
                Form::PLURAL => 'куруша',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'UAH' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'гривна',
                Form::PLURAL => 'гривни',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'копийка',
                Form::PLURAL => 'копийки',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'USD' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'долар',
                Form::PLURAL => 'долара',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'цент',
                Form::PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'XAF' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'CFA франк',
                Form::PLURAL => 'CFA франка',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'цент',
                Form::PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'XOF' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'CFA франк',
                Form::PLURAL => 'CFA франка',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'цент',
                Form::PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'XPF' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'CFP франк',
                Form::PLURAL => 'CFP франка',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'сантим',
                Form::PLURAL => 'сантима',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'YUM' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'югославски динар',
                Form::PLURAL => 'югославски динари',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'пара',
                Form::PLURAL => 'пари',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_FEMININE,
            ],
        ],
        'ZAR' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'ранд',
                Form::PLURAL => 'ранда',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'цент',
                Form::PLURAL => 'цента',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
        ],
        'UZS' => [
            self::CURRENCY_WHOLE => [
                Form::SINGULAR => 'сом',
                Form::PLURAL => 'сома',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
            ],
            self::CURRENCY_FRACTION => [
                Form::SINGULAR => 'тийн',
                Form::PLURAL => 'тийна',
                GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER =>
                    Gender::GENDER_MASCULINE,
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
            $result = $result[Gender::GENDER_ABSTRACT];
        }

        return $result;
    }

    public function getCorrespondingUnitForGrammaticalGender(int $unit, string $grammaticalGender): string
    {
        $result = static::ENUMERATIONS[static::ENUMERATION_BY_VALUE][$unit];

        if (is_array($result)) {
            $result = $result[$grammaticalGender];
        }

        return $result;
    }

    public function getCorrespondingTeen(int $teen): string
    {
        return static::ENUMERATIONS[static::ENUMERATION_BY_VALUE][$teen];
    }

    public function getCorrespondingTen(int $ten): string
    {
        return static::ENUMERATIONS[static::ENUMERATION_BY_VALUE][$ten];
    }

    public function getCorrespondingHundred(int $hundred): string
    {
        return static::ENUMERATIONS[static::ENUMERATION_BY_VALUE][$hundred];
    }
}
