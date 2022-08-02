<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;

class Mk extends Words
{
    const LOCALE = 'mk';
    const LANGUAGE_NAME = 'Macedonian';
    const LANGUAGE_NAME_NATIVE = 'Македонски';

    private static $miscStrings = [
        'deset' => 'десет',           // "ten"
        'eset' => 'есет',           // "ten"
        'edinaeset' => 'единаесет', // "eleven"
        'na' => 'на',                 // liaison particle for 12 to 19
        'sto' => 'сто',               // "hundred"
        'ste' => 'сте',               // suffix for 2 hundred
        'sta' => 'ста',               // suffix for 3 hundred
        'stotini' => 'стотини',         // suffix for 4 to 9 hundred
        'iljada' => 'илјада',         // plural form of "thousand"
        'iljadi' => 'илјади'         // plural form of "thousand"
    ];


    /**
     * The words for digits (except zero). Note that, there are three genders for them (neuter, masculine and feminine).
     * The words for 3 to 9 (masculine) and for 2 to 9 (feminine) are the same as neuter, so they're filled
     * in the _initDigits() method, which is invoked from the constructor.
     */
    private static $digits = [
        0 => [1 => "еден", "два", "три", "четири", "пет", "шест", "седум", "осум", "девет"], // neuter
        1 => [1 => 'еден', 'два'],                                                           // masculine
        -1 => [1 => 'една', 'две']                                                           // feminine
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

    private $singularSuffix = 'а';

    private $pluralSuffix = 'и';

    private static $exponent = [
        0 => '',
        3 => 'илјада',
        6 => 'милион',
        9 => 'милјард',
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

    public function __construct()
    {
        $this->initDigits();
    }

    private function initDigits()
    {
        if (!self::$digitsInitialized) {
            for ($i = 3; $i <= 9; $i++) {
                self::$digits[1][$i] = self::$digits[0][$i];
            }
            for ($i = 3; $i <= 9; $i++) {
                self::$digits[-1][$i] = self::$digits[0][$i];
            }
            self::$digitsInitialized = true;
        }
    }

    private function splitNumber(int $num): array
    {
        if (is_string($num)) {
            $ret = [];

            $strlen = strlen($num);
            $first = substr($num, 0, $strlen % 3);

            preg_match_all('/\d{3}/', substr($num, $strlen % 3, $strlen), $m);

            $ret = $m[0];
            if ($first) {
                array_unshift($ret, $first);
            }

            return $ret;
        }

        return explode(' ', number_format($num, 0, '', ' ')); // a faster version for integers
    }

    private function showDigitsGroup(int $num, int $gender = 0, bool $last = false): string
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
                    $ret[1] = self::$digits[-1][$s] . self::$miscStrings['ste'];
                    break;
                case 3:
                    $ret[1] = self::$digits[0][$s] . self::$miscStrings['sta'];
                    break;
                case 6:
                    $ret[1] = substr(self::$digits[0][$s], 0, 4) . self::$miscStrings['stotini'];
                    break;
                default:
                    $ret[1] = self::$digits[0][$s] . self::$miscStrings['stotini'];
            }
        }

        // process the "tens" digit, and optionally the "ones" digit.
        if ($d) {
            // in the case of 1, the "ones" digit also must be processed
            if ($d == 1) {
                if (!$e) {
                    $ret[3] = self::$miscStrings['deset']; // ten
                } else {
                    switch ($e) {
                        case 1:
                            $ret[3] = self::$miscStrings['edinaeset']; // eleven
                            break;
                        case 6:
                            $ret[3] = substr(self::$digits[1][$e], 0, 6) . self::$miscStrings['na'] . self::$miscStrings['eset']; // sixteen
                            break;
                        default:
                            $ret[3] = self::$digits[1][$e] . self::$miscStrings['na'] . self::$miscStrings['eset']; // twelve - nineteen
                    }
                    // the "ones" digit is alredy processed, so skip a second processment
                    $e = 0;
                }
            } else {
                switch ($d) {
                    case 2:
                    case 3:
                    case 4:
                        $ret[3] = self::$digits[1][$d] . self::$miscStrings['eset'];
                        break;
                    case 6:
                        $ret[3] = substr(self::$digits[0][$d], 0, 4) . self::$miscStrings['eset'];
                        break;
                    case 5:
                    case 9:
                        $ret[3] = substr(self::$digits[0][$d], 0, -2) . self::$miscStrings['deset'];
                        break;
                    default:
                        $ret[3] = self::$digits[1][$d] . self::$miscStrings['deset'];
                }
                 // twenty - ninety
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

    protected function toWords(int $num = 0): string
    {
        $ret = [];

        $retMinus = '';

        // check if $num is a valid non-zero number
        if (!$num || preg_match('/^-?0+$/', $num) || !preg_match('/^-?\d+$/', $num)) {
            return $this->zero;
        }

        // add a minus sign
        if (substr($num, 0, 1) == '-') {
            $retMinus = $this->minus . $this->wordSeparator;

            $num = substr($num, 1);
        }

        // strip excessive zero signs
        $num = ltrim($num, '0');

        // split $num to groups of three-digit numbers
        $numGroups = $this->splitNumber($num);

        $sizeofNumgroups = count($numGroups);

        // go through the groups in reverse order, so that the last group could be determined
        for ($i = $sizeofNumgroups - 1, $j = 1; $i >= 0; $i--, $j++) {
            if (!isset($ret[$j])) {
                $ret[$j] = '';
            }

            // what is the corresponding exponent for the current group
            $pow = $sizeofNumgroups - $i;

            // skip processment for empty groups
            if ($numGroups[$i] != '000') {
                if ($numGroups[$i] > 1) {
                    if ($pow == 1) {
                        $ret[$j] .= $this->showDigitsGroup(
                                $numGroups[$i],
                                0,
                                !$this->lastAnd && $i
                            ) . $this->wordSeparator;
                        $ret[$j] .= self::$exponent[($pow - 1) * 3];
                    } elseif ($pow == 2) {
                        $ret[$j] .= $this->showDigitsGroup(
                                $numGroups[$i],
                                -1,
                                !$this->lastAnd && $i
                            ) . $this->wordSeparator;
                        $thousandsMiscString = (int)substr($numGroups[$i], -1) === 1 ? self::$miscStrings['iljada'] : self::$miscStrings['iljadi'];
                        $ret[$j] .= $thousandsMiscString . $this->wordSeparator;
                    } elseif ($pow == 4) {
                        $ret[$j] .= $this->showDigitsGroup(
                                $numGroups[$i],
                                -1,
                                !$this->lastAnd && $i
                            ) . $this->wordSeparator;
                        $ret[$j] .= self::$exponent[($pow - 1) * 3];
                        $ret[$j] .= strlen($numGroups[$i]) > 1 && (int)substr($numGroups[$i], -1) !== 1 ? $this->pluralSuffix : $this->singularSuffix;
                        $ret[$j] .= $this->wordSeparator;
                    }  else {
                        $ret[$j] .= $this->showDigitsGroup(
                                $numGroups[$i],
                                1,
                                !$this->lastAnd && $i
                            ) . $this->wordSeparator;
                        $ret[$j] .= self::$exponent[($pow - 1) * 3];
                        $ret[$j] .= strlen($numGroups[$i]) > 1 && (int)substr($numGroups[$i], -1) !== 1 ? $this->pluralSuffix : '';
                        $ret[$j] .= $this->wordSeparator;
                    }
                } else {
                    if ($pow == 1) {
                        $ret[$j] .= $this->showDigitsGroup(
                                $numGroups[$i],
                                0,
                                !$this->lastAnd && $i
                            ) . $this->wordSeparator;
                    } elseif ($pow == 2) {
                        $ret[$j] .= self::$exponent[($pow - 1) * 3] . $this->wordSeparator;
                    } elseif ($pow == 4) {
                        $ret[$j] .= self::$digits[-1][1] . $this->wordSeparator . self::$exponent[($pow - 1) * 3] . $this->singularSuffix . $this->wordSeparator;
                    } else {
                        $ret[$j] .= self::$digits[1][1] . $this->wordSeparator . self::$exponent[($pow - 1) * 3] . $this->wordSeparator;
                    }
                }
            }
        }

        return $retMinus . rtrim(implode('', array_reverse($ret)), $this->wordSeparator);
    }
}