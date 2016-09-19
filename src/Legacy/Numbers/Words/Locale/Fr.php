<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;

class Fr extends Words
{
    const LOCALE               = 'fr';
    const LANGUAGE_NAME        = 'French';
    const LANGUAGE_NAME_NATIVE = 'Français';

    private static $miscNumbers = [
        10  => 'dix',      // 10
        11  => 'onze',     // 11
        12  => 'douze',    // 12
        13  => 'treize',   // 13
        14  => 'quatorze', // 14
        15  => 'quinze',   // 15
        16  => 'seize',    // 16
        20  => 'vingt',    // 20
        30  => 'trente',   // 30
        40  => 'quarante', // 40
        50  => 'cinquante',// 50
        60  => 'soixante', // 60
        100 => 'cent'      // 100
    ];

    private static $digits = [
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

    private $zero = 'zéro';

    private $and = 'et';

    private $wordSeparator = ' ';

    private $dash = '-';

    private $minus = 'moins';

    private $pluralSuffix = 's';

    private static $exponent = [
        0   => '',
        3   => 'mille',
        6   => 'million',
        9   => 'milliard',
        12  => 'billion', // was 'trillion',
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
        93  => 'trigintillion',
        96  => 'untrigintillion',
        99  => 'duotrigintillion',
        102 => 'trestrigintillion',
        105 => 'quattuortrigintillion',
        108 => 'quintrigintillion',
        111 => 'sextrigintillion',
        114 => 'septentrigintillion',
        117 => 'octotrigintillion',
        120 => 'novemtrigintillion',
        123 => 'quadragintillion',
        126 => 'unquadragintillion',
        129 => 'duoquadragintillion',
        132 => 'trequadragintillion',
        135 => 'quattuorquadragintillion',
        138 => 'quinquadragintillion',
        141 => 'sexquadragintillion',
        144 => 'septenquadragintillion',
        147 => 'octoquadragintillion',
        150 => 'novemquadragintillion',
        153 => 'quinquagintillion',
        156 => 'unquinquagintillion',
        159 => 'duoquinquagintillion',
        162 => 'trequinquagintillion',
        165 => 'quattuorquinquagintillion',
        168 => 'quinquinquagintillion',
        171 => 'sexquinquagintillion',
        174 => 'septenquinquagintillion',
        177 => 'octoquinquagintillion',
        180 => 'novemquinquagintillion',
        183 => 'sexagintillion',
        186 => 'unsexagintillion',
        189 => 'duosexagintillion',
        192 => 'tresexagintillion',
        195 => 'quattuorsexagintillion',
        198 => 'quinsexagintillion',
        201 => 'sexsexagintillion',
        204 => 'septensexagintillion',
        207 => 'octosexagintillion',
        210 => 'novemsexagintillion',
        213 => 'septuagintillion',
        216 => 'unseptuagintillion',
        219 => 'duoseptuagintillion',
        222 => 'treseptuagintillion',
        225 => 'quattuorseptuagintillion',
        228 => 'quinseptuagintillion',
        231 => 'sexseptuagintillion',
        234 => 'septenseptuagintillion',
        237 => 'octoseptuagintillion',
        240 => 'novemseptuagintillion',
        243 => 'octogintillion',
        246 => 'unoctogintillion',
        249 => 'duooctogintillion',
        252 => 'treoctogintillion',
        255 => 'quattuoroctogintillion',
        258 => 'quinoctogintillion',
        261 => 'sexoctogintillion',
        264 => 'septoctogintillion',
        267 => 'octooctogintillion',
        270 => 'novemoctogintillion',
        273 => 'nonagintillion',
        276 => 'unnonagintillion',
        279 => 'duononagintillion',
        282 => 'trenonagintillion',
        285 => 'quattuornonagintillion',
        288 => 'quinnonagintillion',
        291 => 'sexnonagintillion',
        294 => 'septennonagintillion',
        297 => 'octononagintillion',
        300 => 'novemnonagintillion',
        303 => 'centillion'
    ];

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

        return explode(' ', number_format($num, 0, '', ' '));
    }

    /**
     * @param int  $num
     * @param bool $last
     *
     * @return string
     */
    private function showDigitsGroup($num, $last = false)
    {
        $ret = '';

        // extract the value of each digit from the three-digit number
        $e = $num % 10;                  // ones
        $d = ($num - $e) % 100 / 10;         // tens
        $s = ($num - $d * 10 - $e) % 1000 / 100; // hundreds

        // process the "hundreds" digit.
        if ($s) {
            if ($s > 1) {
                $ret .= self::$digits[$s] . $this->wordSeparator . self::$miscNumbers[100];
                if ($last && !$e && !$d) {
                    $ret .= $this->pluralSuffix;
                }
            } else {
                $ret .= self::$miscNumbers[100];
            }
            $ret .= $this->wordSeparator;
        }

        // process the "tens" digit, and optionally the "ones" digit.
        if ($d) {
            // in the case of 1, the "ones" digit also must be processed
            if ($d == 1) {
                if ($e <= 6) {
                    $ret .= self::$miscNumbers[10 + $e];
                } else {
                    $ret .= self::$miscNumbers[10] . '-' . self::$digits[$e];
                }
                $e = 0;
            } elseif ($d > 5) {
                if ($d < 8) {
                    $ret .= self::$miscNumbers[60];

                    $resto = $d * 10 + $e - 60;
                    if ($e == 1) {
                        $ret .= $this->wordSeparator . $this->and . $this->wordSeparator;
                    } elseif ($resto) {
                        $ret .= $this->dash;
                    }

                    if ($resto) {
                        $ret .= $this->showDigitsGroup($resto);
                    }
                    $e = 0;
                } else {
                    $ret .= self::$digits[4] . $this->dash . self::$miscNumbers[20];

                    $resto = $d * 10 + $e - 80;
                    if ($resto) {
                        $ret .= $this->dash;
                        $ret .= $this->showDigitsGroup($resto);

                        $e = 0;
                    } else {
                        $ret .= $this->pluralSuffix;
                    }
                }
            } else {
                $ret .= self::$miscNumbers[$d * 10];
            }
        }

        // process the "ones" digit
        if ($e) {
            if ($d) {
                if ($e == 1) {
                    $ret .= $this->wordSeparator . $this->and . $this->wordSeparator;
                } else {
                    $ret .= $this->dash;
                }
            }
            $ret .= self::$digits[$e];
        }

        // strip excessive separators
        $ret = rtrim($ret, $this->wordSeparator);

        return $ret;
    }

    /**
     * @param int $num
     *
     * @return string
     */
    protected function toWords($num = 0)
    {
        $ret = '';

        // check if $num is a valid non-zero number
        if (!$num || preg_match('/^-?0+$/', $num) || !preg_match('/^-?\d+$/', $num)) {
            return $this->zero;
        }

        // add a minus sign
        if (substr($num, 0, 1) == '-') {
            $ret = $this->minus . $this->wordSeparator;
            $num = substr($num, 1);
        }

        // strip excessive zero signs
        $num = ltrim($num, '0');

        // split $num to groups of three-digit numbers
        $num_groups = $this->splitNumber($num);

        $sizeof_numgroups = count($num_groups);

        foreach ($num_groups as $i => $number) {
            // what is the corresponding exponent for the current group
            $pow = $sizeof_numgroups - $i;

            // skip processment for empty groups
            if ($number != '000') {
                if ($number != 1 || $pow != 2) {
                    $ret .= $this->showDigitsGroup(
                        $number,
                        $i + 1 == $sizeof_numgroups || $pow > 2
                    ) . $this->wordSeparator;
                }
                $ret .= self::$exponent[($pow - 1) * 3];
                if ($pow > 2 && $number > 1) {
                    $ret .= $this->pluralSuffix;
                }
                $ret .= $this->wordSeparator;
            }
        }

        return rtrim($ret, $this->wordSeparator);
    }
}
