<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;

class Cs extends Words
{
    const LOCALE               = 'cs';
    const LANGUAGE_NAME        = 'Czech';
    const LANGUAGE_NAME_NATIVE = 'Czech';

    private $minus = 'mínus';

    private static $exponent = [
        0   => [''],
        3   => ['tisíc', 'tisíce', 'tisíc'],
        6   => ['milión', 'milióny', 'miliónů'],
        9   => ['miliarda', 'miliardy', 'miliard'],
        12  => ['bilion', 'biliony', 'bilionů'],
        15  => ['biliarda', 'biliardy', 'biliard'],
        18  => ['trilion', 'triliony', 'trilionů'],
        21  => ['triliarda', 'triliardy', 'triliard'],
        24  => ['kvadrilion', 'kvadriliony', 'kvadrilionů'],
        30  => ['kvintilion', 'kvintiliony', 'kvintilionů'],
        36  => ['sextilion', 'sextiliony', 'sextilionů'],
        42  => ['septilion', 'septiliony', 'septilionů'],
        48  => ['oktilion', 'oktiliony', 'oktilionů'],
        54  => ['nonilion', 'noniliony', 'nonilionů'],
        60  => ['decilion', 'deciliony', 'decilionů'],
        66  => ['undecilion', 'undeciliony', 'undecilionů'],
        72  => ['duodecilion', 'duodeciliony', 'duodecilionů'],
        78  => ['tredecilion', 'tredeciliony', 'tredecilionů'],
        84  => ['kvatrodecilion', 'kvatrodeciliony', 'kvatrodecilionů'],
        90  => ['kvindecilion', 'kvindeciliony', 'kvindecilionů'],
        96  => ['sexdecilion', 'sexdeciliony', 'sexdecilionů'],
        102 => ['septendecilion', 'septendeciliony', 'septendecilionů'],
        108 => ['oktodecilion', 'oktodeciliony', 'oktodecilionů'],
    ];

    private static $hundreds = [
        'sto',
        'stě',
        'sta',
        'set'
    ];

    private static $digits = [
        'nula',
        'jedna',
        'dva',
        'tři',
        'čtyři',
        'pět',
        'šest',
        'sedm',
        'osm',
        'devět'
    ];

    private $wordSeparator = ' ';

    /**
     * @param int $number
     * @param int $power
     *
     * @return string
     */
    protected function toWords($number, $power = 0)
    {
        $ret = '';

        if ($number < 0) {
            $ret .= $this->minus;
            $number *= -1;
        }

        if (strlen($number) > 3) {
            $maxp = strlen($number) - 1;
            $curp = $maxp;
            for ($p = $maxp; $p > 0; --$p) { // power

                // check for highest power
                if (isset(self::$exponent[$p])) {
                    // send substr from $curp to $p
                    $snum = substr($number, $maxp - $curp, $curp - $p + 1);
                    $snum = preg_replace('/^0+/', '', $snum);
                    if ($snum !== '') {
                        $cursuffix = self::$exponent[$power][count(self::$exponent[$power]) - 1];

                        $ret .= $this->toWords($snum, $p, $cursuffix);
                    }
                    $curp = $p - 1;
                    continue;
                }
            }
            $number = substr($number, $maxp - $curp, $curp - $p + 1);
            if ($number == 0) {
                return $ret;
            }
        } elseif ($number == 0 || $number == '') {
            return $this->wordSeparator . self::$digits[0];
        }

        $h = $t = $d = 0;

        switch (strlen($number)) {
            case 3:
                $h = (int) substr($number, -3, 1);

            case 2:
                $t = (int) substr($number, -2, 1);

            case 1:
                $d = (int) substr($number, -1, 1);
                break;

            case 0:
                return;
                break;
        }

        if ($h) {

            // inflection of the word "hundred"
            if ($h == 1) {
                $ret .= $this->wordSeparator . self::$hundreds[0];
            } elseif ($h == 2) {
                $ret .= $this->wordSeparator . "dvě" . $this->wordSeparator . self::$hundreds[1];
            } elseif (($h > 1) && ($h < 5)) {
                $ret .= $this->wordSeparator . self::$digits[$h] . $this->wordSeparator . self::$hundreds[2];
            } else {        //if ($h >= 5)
                $ret .= $this->wordSeparator . self::$digits[$h] . $this->wordSeparator . self::$hundreds[3];
            }
            // in English only - add ' and' for [1-9]01..[1-9]99
            // (also for 1001..1099, 10001..10099 but it is harder)
            // for now it is switched off, maybe some language purists
            // can force me to enable it, or to remove it completely
            // if (($t + $d) > 0)
            //   $ret .= $this->wordSeparator . 'and';
        }

        // ten, twenty etc.
        switch ($t) {
            case 2:
            case 3:
            case 4:
                $ret .= $this->wordSeparator . self::$digits[$t] . 'cet';
                break;

            case 5:
                $ret .= $this->wordSeparator . 'padesát';
                break;

            case 6:
                $ret .= $this->wordSeparator . 'šedesát';
                break;

            case 7:
                $ret .= $this->wordSeparator . 'sedmdesát';
                break;

            case 8:
                $ret .= $this->wordSeparator . 'osmdesát';
                break;

            case 9:
                $ret .= $this->wordSeparator . 'devadesát';
                break;

            case 1:
                switch ($d) {
                    case 0:
                        $ret .= $this->wordSeparator . 'deset';
                        break;

                    case 1:
                        $ret .= $this->wordSeparator . 'jedenáct';
                        break;

                    case 4:
                        $ret .= $this->wordSeparator . 'čtrnáct';
                        break;

                    case 5:
                        $ret .= $this->wordSeparator . 'patnáct';
                        break;

                    case 9:
                        $ret .= $this->wordSeparator . 'devatenáct';
                        break;

                    case 2:
                    case 3:
                    case 6:
                    case 7:
                    case 8:
                        $ret .= $this->wordSeparator . self::$digits[$d] . 'náct';
                        break;
                }
                break;
        }

        if (($t != 1) && ($d > 0) && (($power == 0) || ($number > 1))) {
            $ret .= $this->wordSeparator . self::$digits[$d];
        }

        if ($power > 0) {
            if (isset(self::$exponent[$power])) {
                $lev = self::$exponent[$power];
            }

            if (!isset($lev) || !is_array($lev)) {
                return null;
            }

            // inflection of exponental words
            if ($number == 1) {
                $idx = 0;
            } elseif ((($number > 1) && ($number < 5)) || ((intval("$t$d") > 1) && (intval("$t$d") < 5))) {
                $idx = 1;
            } else {
                $idx = 2;
            }

            $ret .= $this->wordSeparator . $lev[$idx];
        }

        return $ret;
    }
}
