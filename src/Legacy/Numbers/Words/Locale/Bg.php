<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Bg extends Words
{
    const LOCALE = 'bg';
    const LANGUAGE_NAME = 'Bulgarian';
    const LANGUAGE_NAME_NATIVE = 'Български';

    const MALE = 0;
    const FEMALE = 1;
    const NEUTER = 2;

    private static $miscStrings = [
        'deset' => 'десет',           // "ten"
        'edinadeset' => 'единадесет', // "eleven"
        'na' => 'на',                 // liaison particle for 12 to 19
        'sto' => 'сто',               // "hundred"
        'sta' => 'ста',               // suffix for 2 and 3 hundred
        'stotin' => 'стотин',         // suffix for 4 to 9 hundred
        'hiliadi' => 'хиляди'         // plural form of "thousand"
    ];


    /**
     * The words for digits (except zero). Note that, there are three genders for them (neuter, masculine and feminine).
     * The words for 3 to 9 (masculine) and for 2 to 9 (feminine) are the same as neuter, so they're filled
     * in the _initDigits() method, which is invoked from the constructor.
     */
    private static $digits = [
        0 => [1 => "едно", "две", "три", "четири", "пет", "шест", "седем", "осем", "девет"], // neuter
        1 => [1 => 'един', 'два'],                                                           // masculine
        -1 => [1 => 'една']                                                                   // feminine
    ];

    protected static $hundred = [
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

    protected static $ten = [
        ['', 'едно', 'два', 'три', 'четири', 'пет', 'шест', 'седем', 'осем', 'девет'],
        ['', 'един', 'две', 'три', 'четири', 'пет', 'шест', 'седем', 'осем', 'девет'],
        ['', 'една', 'две', 'три', 'четири', 'пет', 'шест', 'седем', 'осем', 'девет'],
    ];

    protected static $teens = [
        'десет',
        'единадесет',
        'дванадесет',
        'тринадесет',
        'четиринадесет',
        'петнадесет',
        'шестнадесет',
        'седемнадесет',
        'осемнадесет',
        'деветнадесет'
    ];

    protected static $tens = [
        2 => 'двадесет',
        'тридесет',
        'четиридесет',
        'петдесет',
        'шестдесет',
        'седемдесет',
        'осемдесет',
        'деветдесет'
    ];

    protected static $mega = [
        [3 => self::FEMALE],
        [3 => self::MALE],
        ['хиляда', 'хиляди', 'хиляди', self::FEMALE],
        ['милион', 'милионa', 'милионa', self::MALE],
        ['милиард', 'милиардa', 'милиардa', self::MALE],
        ['трилион', 'трилионa', 'трилионa', self::MALE],
        ['квадрилион', 'квадрилионa', 'квадрилионa', self::MALE],
        ['секстилион', 'секстилионa', 'секстилионa', self::MALE],
    ];

    private static $digitsInitialized = false;

    /**
     * A flag, that determines if the "and" word is placed already before the last non-empty group of digits.
     */
    private $lastAnd = false;

    private $zero = 'нула';

    private $and = 'и';

    private $wordSeparator = ' ';

    private $minus = 'минус';

    private $pluralSuffix = 'а';

    private static $exponent = [
        0 => '',
        3 => 'хиляда',
        6 => 'милион',
        9 => 'милиард',
        12 => 'трилион',
        15 => 'квадрилион',
        18 => 'квинтилион',
        21 => 'секстилион',
        24 => 'септилион',
        27 => 'октилион',
        30 => 'ноналион',
        33 => 'декалион',
        36 => 'ундекалион',
        39 => 'дуодекалион',
        42 => 'тредекалион',
        45 => 'кватордекалион',
        48 => 'квинтдекалион',
        51 => 'сексдекалион',
        54 => 'септдекалион',
        57 => 'октодекалион',
        60 => 'новемдекалион',
        63 => 'вигинтилион',
        66 => 'унвигинтилион',
        69 => 'дуовигинтилион',
        72 => 'тревигинтилион',
        75 => 'кваторвигинтилион',
        78 => 'квинвигинтилион',
        81 => 'сексвигинтилион',
        84 => 'септенвигинтилион',
        87 => 'октовигинтилион',
        90 => 'новемвигинтилион',
        93 => 'тригинтилион',
        96 => 'унтригинтилион',
        99 => 'дуотригинтилион',
        102 => 'третригинтилион',
        105 => 'кватортригинтилион',
        108 => 'квинтригинтилион',
        111 => 'секстригинтилион',
        114 => 'септентригинтилион',
        117 => 'октотригинтилион',
        120 => 'новемтригинтилион',
        123 => 'квадрагинтилион',
        126 => 'унквадрагинтилион',
        129 => 'дуоквадрагинтилион',
        132 => 'треквадрагинтилион',
        135 => 'кваторквадрагинтилион',
        138 => 'квинквадрагинтилион',
        141 => 'сексквадрагинтилион',
        144 => 'септенквадрагинтилион',
        147 => 'октоквадрагинтилион',
        150 => 'новемквадрагинтилион',
        153 => 'квинквагинтилион',
        156 => 'унквинкагинтилион',
        159 => 'дуоквинкагинтилион',
        162 => 'треквинкагинтилион',
        165 => 'кваторквинкагинтилион',
        168 => 'квинквинкагинтилион',
        171 => 'сексквинкагинтилион',
        174 => 'септенквинкагинтилион',
        177 => 'октоквинкагинтилион',
        180 => 'новемквинкагинтилион',
        183 => 'сексагинтилион',
        186 => 'унсексагинтилион',
        189 => 'дуосексагинтилион',
        192 => 'тресексагинтилион',
        195 => 'кваторсексагинтилион',
        198 => 'квинсексагинтилион',
        201 => 'секссексагинтилион',
        204 => 'септенсексагинтилион',
        207 => 'октосексагинтилион',
        210 => 'новемсексагинтилион',
        213 => 'септагинтилион',
        216 => 'унсептагинтилион',
        219 => 'дуосептагинтилион',
        222 => 'тресептагинтилион',
        225 => 'кваторсептагинтилион',
        228 => 'квинсептагинтилион',
        231 => 'секссептагинтилион',
        234 => 'септенсептагинтилион',
        237 => 'октосептагинтилион',
        240 => 'новемсептагинтилион',
        243 => 'октогинтилион',
        246 => 'уноктогинтилион',
        249 => 'дуооктогинтилион',
        252 => 'треоктогинтилион',
        255 => 'кватороктогинтилион',
        258 => 'квиноктогинтилион',
        261 => 'сексоктогинтилион',
        264 => 'септоктогинтилион',
        267 => 'октооктогинтилион',
        270 => 'новемоктогинтилион',
        273 => 'нонагинтилион',
        276 => 'уннонагинтилион',
        279 => 'дуононагинтилион',
        282 => 'тренонагинтилион',
        285 => 'кваторнонагинтилион',
        288 => 'квиннонагинтилион',
        291 => 'секснонагинтилион',
        294 => 'септеннонагинтилион',
        297 => 'октононагинтилион',
        300 => 'новемнонагинтилион',
        303 => 'центилион'
    ];

//    public function __construct()
//    {
//        $this->initDigits();
//    }
//
//    private function initDigits()
//    {
//        if (!self::$digitsInitialized) {
//            for ($i = 3; $i <= 9; $i++) {
//                self::$digits[1][$i] =& self::$digits[0][$i];
//            }
//            for ($i = 2; $i <= 9; $i++) {
//                self::$digits[-1][$i] =& self::$digits[0][$i];
//            }
//            self::$digitsInitialized = true;
//        }
//    }

    /**
     * @param int $num
     *
     * @return array
     */
    private function splitNumber($num)
    {
        if (is_string($num)) {
            $ret = [];

            $strlen = strlen($num);
            $first = substr($num, 0, $strlen % 3);

            preg_match_all('/\d{3}/', substr($num, $strlen % 3, $strlen), $m);

            $ret =& $m[0];
            if ($first) {
                array_unshift($ret, $first);
            }

            return $ret;
        }

        return explode(' ', number_format($num, 0, '', ' ')); // a faster version for integers
    }

    /**
     * @param int $num
     * @param int $gender
     * @param bool $last
     *
     * @return string
     */
    private function showDigitsGroup($num, $gender = 0, $last = false)
    {
        /* A storage array for the return string.
             Positions 1, 3, 5 are intended for digit words
             and everything else (0, 2, 4) for "and" words.
             Both of the above types are optional, so the size of
             the array may vary.
        */
        $ret = [];

        // extract the value of each digit from the three-digit number
        $e = $num % 10;                  // ones
        $d = ($num - $e) % 100 / 10;         // tens
        $s = ($num - $d * 10 - $e) % 1000 / 100; // hundreds

        // process the "hundreds" digit.
        if ($s) {
            switch ($s) {
                case 1:
                    $ret[1] = self::$miscStrings['sto'];
                    break;
                case 2:
                case 3:
                    $ret[1] = self::$digits[0][$s] . self::$miscStrings['sta'];
                    break;
                default:
                    $ret[1] = self::$digits[0][$s] . self::$miscStrings['stotin'];
            }
        }

        // process the "tens" digit, and optionally the "ones" digit.
        if ($d) {
            // in the case of 1, the "ones" digit also must be processed
            if ($d == 1) {
                if (!$e) {
                    $ret[3] = self::$miscStrings['deset']; // ten
                } else {
                    if ($e == 1) {
                        $ret[3] = self::$miscStrings['edinadeset']; // eleven
                    } else {
                        $ret[3] = self::$digits[1][$e] . self::$miscStrings['na'] . self::$miscStrings['deset']; // twelve - nineteen
                    }
                    // the "ones" digit is alredy processed, so skip a second processment
                    $e = 0;
                }
            } else {
                $ret[3] = self::$digits[1][$d] . self::$miscStrings['deset']; // twenty - ninety
            }
        }

        // process the "ones" digit
        if ($e) {
            $ret[5] = self::$digits[$gender][$e];
        }

        // put "and" where needed
        if (count($ret) > 1) {
            if ($e) {
                $ret[4] = $this->and;
            } else {
                $ret[2] = $this->and;
            }
        }

        // put "and" optionally in the case this is the last non-empty group
        if ($last) {
            if (!$s || count($ret) == 1) {
                $ret[0] = $this->and;
            }
            $this->lastAnd = true;
        }

        // sort the return array so that "and" constructs go to theirs appropriate places
        ksort($ret);

        return implode($this->wordSeparator, $ret);
    }

    /**
     * @param int $num
     *
     * @return string
     */
    protected function toWords($number, $currencyGender = -1)
    {
        if ($number === 0) {
            return $this->zero;
        }

        $out = [];

        if ($number < 0) {
            $out[] = static::MINUS;
            $number *= -1;
        }

        $megaSize = count(static::$mega);
        $signs = $megaSize * 3;

        // $signs equal quantity of zeros of the biggest number in self::$mega
        // + 3 additional sign (point and two zero)
        [$unit, $subunit] = explode('.', sprintf("%{$signs}.2F", (float) $number));

        foreach (str_split($unit, 3) as $megaKey => $value) {
            if (!(int) $value) {
                continue;
            }

            $megaKey = $megaSize - $megaKey - 1;
            $gender = $megaKey === 1 && $currencyGender !== -1 ? $currencyGender : static::$mega[$megaKey][3];
            [$i1, $i2, $i3] = array_map('intval', str_split($value, 1));
            // mega-logic
            $out[] = static::$hundred[$i1]; # 1xx-9xx

            if ($i2 > 1) { # 20-99
                $out[] = static::$tens[$i2] . ' ' . static::$ten[$gender][$i3];
            } else { # 10-19 | 1-9
                $out[] = ($i2 > 0) ? static::$teens[$i3] : static::$ten[$gender][$i3];
            }

            if ($megaKey > 1) {
                $out[] = $this->morph(
                    $value,
                    static::$mega[$megaKey][0],
                    static::$mega[$megaKey][1],
                    static::$mega[$megaKey][2]
                );
            }
        }

        return trim(preg_replace('/\s+/', ' ', implode(' ', $out)));
    }


    public function morph($n, $f1, $f2, $f5)
    {
        $n = abs((int) $n) % 100;
        if ($n > 10 && $n < 20) {
            return $f5;
        }
        $n = $n % 10;
        if ($n > 1 && $n < 5) {
            return $f2;
        }
        if ($n == 1) {
            return $f1;
        }

        return $f5;
    }

    protected static $currencyNames = [
        'ALL' => [
            [1, 'лек', 'лека', 'лека'],
            [2, 'киндарка', 'киндарки', 'киндарки']
        ],
        'AUD' => [
            [1, 'aвстралийски долар', 'aвстралийски долари', 'aвстралийски долари'],
            [1, 'цент', 'цента', 'цента']
        ],
        'BGN' => [
            [1, 'лев', 'лева', 'лева'],
            [2, 'стотинка', 'стотинки', 'стотинки']
        ],
        'BRL' => [
            [1, 'бразилски реал', 'бразилски реали', 'бразилски реали'],
            [1, 'сентаво', 'сентаво', 'сентаво']
        ],
        'BYN' => [
            [1, 'беларуска рубла', 'беларуски рубли', 'беларуски рубли'],
            [2, 'копейка', 'копейки', 'копейки']
        ],
        'BYR' => [
            [1, 'беларуска рубла', 'беларуски рубли', 'беларуски рубли'],
            [2, 'копейка', 'копейки', 'копейки']
        ],
        'CAD' => [
            [1, 'канадски долар', 'канадски долари', 'канадски долари'],
            [1, 'цент', 'цента', 'цента']
        ],
        'CHF' => [
            [1, 'швейцарски франк', 'швейцарски франкове', 'швейцарски франкове'],
            [1, 'сантим', 'сантима', 'сантима']
        ],
        'CNY' => [
            [1, 'китайски юан', 'китайски юани', 'китайски юани'],
            [1, 'фин', 'фини', 'фини']
        ],
        'CYP' => [
            [1, 'евро', 'евро', 'евро'],
            [1, 'цент', 'цента', 'цента']
        ],
        'CZK' => [
            [2, 'чешка крона', 'чешки крони', 'чешки крони'],
            [1, 'халер', 'халери', 'халери']
        ],
        'DKK' => [
            [2, 'датска крона', 'датски крони', 'датски крони'],
            [1, 'йоре', 'йоре', 'йоре']
        ],
        'EEK' => [
            [2, 'естонска крона', 'естонски крони', 'естонски крони'],
            [1, 'сантим', 'сантим', 'сантим']
        ],
        'EUR' => [
            [1, 'евро', 'евро', 'евро'],
            [1, 'цент', 'цента', 'цента']
        ],
        'GBP' => [
            [1, 'паунд', 'паунда', 'паунда'],
            [1, 'пенс', 'пенса', 'пенса']
        ],
        'HKD' => [
            [1, 'хонконгски долар', 'Хонконгски долари', 'Хонконгски долари'],
            [1, 'цент', 'цента', 'цента']
        ],
        'HRK' => [
            [2, 'евро', 'евро', 'евро'],
            [2, 'цент', 'цента', 'цента']
        ],
        'HUF' => [
            [1, 'форинт', 'форинта', 'форинта'],
            [1, 'филер', 'филера', 'филера']
        ],
        'IRR' => [
            [1, 'ирански риал', 'ирански риали', 'ирански риали'],
            [1, 'динар', 'динара', 'динара']
        ],
        'ISK' => [
            [2, 'исландска крона', 'исландски крони', 'исландски крони'],
            [1, 'эре', 'эре', 'эре']
        ],
        'JPY' => [
            [2, 'японска йена', 'японски йени', 'японски йени'],
            [2, 'сен', 'сена', 'сена']
        ],
        'KGS' => [
            [1, 'киргизстански сом', 'киргизки сом', 'киргизки сом'],
            [1, 'тийн', 'тийна', 'тийна']
        ],
        'KZT' => [
            [0, 'тенге', 'тенге', 'тенге'],
            [1, 'тийн', 'тийна', 'тийна']
        ],
        'KWD' => [
            [1, 'кувейтски динар', 'кувейтски динари', 'кувейтски динари'],
            [1, 'филс', 'филса', 'филса']
        ],
        'LTL' => [
            [1, 'евро', 'евро', 'евро'],
            [1, 'цент', 'цента', 'цента']
        ],
        'LVL' => [
            [1, 'евро', 'евро', 'евро'],
            [1, 'цент', 'цента', 'цента']
        ],
        'MDL' => [
            [1, 'молдовска лея', 'молдовски леи', 'молдовски леи'],
            [1, 'бан', 'бани', 'бани']
        ],
        'MKD' => [
            [1, 'македонски денар', 'македонски денари', 'македонски денари'],
            [1, 'ден', 'дени', 'дени']
        ],
        'MTL' => [
            [2, 'евро', 'евро', 'евро'],
            [1, 'цент', 'цента', 'цента']
        ],
        'NOK' => [
            [2, 'норвежка крона', 'норвежки крони', 'норвежки крони'],
            [0, 'йоре', 'йори', 'йори']
        ],
        'NZD' => [
            [1, 'новозеландски долар', 'новозеландски долари', 'новозеландски долари'],
            [1, 'цент', 'цента', 'цента']
        ],
        'PLN' => [
            [1, 'злота', 'злоти', 'злоти'],
            [1, 'грош', 'гроша', 'гроша']
        ],
        'ROL' => [
            [1, 'румънска лея', 'румънски леи', 'румънски леи'],
            [1, 'бани', 'бани', 'бани']
        ],
        'RUB' => [
            [1, 'рубла', 'рубли', 'рубли'],
            [2, 'копейка', 'копейки', 'копейки']
        ],
        'RUR' => [
            [1, 'рубла', 'рубли', 'рубли'],
            [2, 'копейка', 'копейки' , 'копейки']
        ],
        'SEK' => [
            [2, 'шведска крона', 'шведска крони', 'шведска крони'],
            [1, 'йоре', 'йоре', 'йоре']
        ],
        'SGD' => [
            [1, 'сингапурски долар', 'сингапурски долари', 'сингапурски долари'],
            [1, 'цент', 'цента', 'цента']
        ],
        'SIT' => [
            [1, 'евро', 'евро', 'евро'],
            [2, 'цент', 'цента', 'цента']
        ],
        'SKK' => [
            [2, 'евро', 'евро', 'евро'],
            [0, 'цент', 'цента', 'цента']
        ],
        'TRL' => [
            [2, 'турска лира', 'турски лири', 'турски лири'],
            [1, 'куруш', 'куруши', 'куруши']
        ],
        'TRY' => [
            [2, 'турска лира', 'турски лири', 'турски лири'],
            [1, 'куруш', 'куруши', 'куруши']
        ],
        'TMT' => [
            [1, 'манат', 'маната', 'маната'],
            [1, 'тенге', 'тенге', 'тенге']
        ],
        'UAH' => [
            [2, 'гривня', 'гривни', 'гривни'],
            [2, 'копийка', 'копийки', 'копийки'],
        ],
        'USD' => [
            [1, 'американски долар', 'американски долари', 'американски долари'],
            [1, 'цент', 'цента', 'цента']
        ],
        'UZS' => [
            [1, 'сом', 'сома', 'сома'],
            [1, 'тийн', 'тийна', 'тийна'],
        ],
        'ZAR' => [
            [1, 'ранд', 'ранда', 'ранда'],
            [1, 'цент', 'цента', 'цента']
        ]
    ];

    public function toCurrencyWords($currency, $decimal, $fraction = null)
    {
        $currency = strtoupper($currency);

        if (!array_key_exists($currency, static::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = static::$currencyNames[$currency];
        $return = '';

        if ($decimal === 0 && !$fraction) {
            $return .= $this->toWords($decimal) . ' ' . $this->morph(
                    $decimal,
                    $currencyNames[0][1],
                    $currencyNames[0][2],
                    $currencyNames[0][3]
                );

            return $return;
        }

        if ($decimal || (0 === $decimal && $this->options->isShowDecimalIfZero())) {
            $return .= $this->toWords($decimal, $currencyNames[0][0] - 1) . ' ' . $this->morph(
                    $decimal,
                    $currencyNames[0][1],
                    $currencyNames[0][2],
                    $currencyNames[0][3]
                );
        }

        if (null !== $fraction) {
            if ($this->options->isConvertFraction()) {
                $return .= ' ' . $this->and . ' ' . $this->toWords($fraction, $currencyNames[1][0] - 1) . ' ' . $this->morph(
                        $fraction,
                        $currencyNames[1][1],
                        $currencyNames[1][2],
                        $currencyNames[1][3]
                    );
            } else {
                $return .= ' ' . $this->and . ' ' . $fraction . ' ' . $this->morph(
                        $fraction,
                        $currencyNames[1][1],
                        $currencyNames[1][2],
                        $currencyNames[1][3]
                    );
            }
        }

        if (null === $fraction && $this->options->isShowFractionIfZero()) {
            if ($this->options->isConvertFractionIfZero()) {
                $return .= ' ' . $this->and . ' ' . $this->zero . ' ' . $this->morph(
                        $fraction,
                        $currencyNames[1][1],
                        $currencyNames[1][2],
                        $currencyNames[1][3]
                    );
            } else {
                $return .=  ' ' . $this->and . ' 00 ' . $this->morph(
                        $fraction,
                        $currencyNames[1][1],
                        $currencyNames[1][2],
                        $currencyNames[1][3]
                    );
            }
        }

        return $return;
    }
}
