<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;

class It extends Words
{
    const LOCALE = 'it';
    const LANGUAGE_NAME = 'Italian';
    const LANGUAGE_NAME_NATIVE = 'Italiano';
    const MINUS = 'minus';

    private $minus = 'meno ';

    private static $exponent = [
        0  => ['', ''],
        3  => ['mille', 'mila'],
        6  => ['milione', 'miloni'],
        12 => ['miliardo', 'miliardi'],
        18 => ['trillone', 'trilloni'],
        24 => ['quadrilione', 'quadrilioni'],
    ];

    private static $digits = [
        'zero',
        'uno',
        'due',
        'tre',
        'quattro',
        'cinque',
        'sei',
        'sette',
        'otto',
        'nove'
    ];

    private $wordSeparator = '';

    /**
     * @param int $number
     * @param int $power
     *
     * @return string
     */
    protected function toWords($number, $power = 0)
    {
        $ret = '';

        // add a the word for the minus sign if necessary
        if (substr($number, 0, 1) == '-') {
            $ret = $this->wordSeparator . $this->minus;
            $number = substr($number, 1);
        }

        $number = preg_replace('/^0+/', '', $number);

        if (strlen($number) > 6) {
            $current_power = 6;
            // check for highest power
            if (isset(self::$exponent[$power])) {
                // convert the number above the first 6 digits
                // with it's corresponding $power.
                $snum = substr($number, 0, -6);
                $snum = preg_replace('/^0+/', '', $snum);
                if ($snum !== '') {
                    $ret .= $this->toWords($snum, $power + 6);
                }
            }
            $number = substr($number, -6);
            if ($number == 0) {
                return $ret;
            }
        } elseif ($number == 0 || $number == '') {
            return (' ' . self::$digits[0] . ' ');
            $current_power = strlen($number);
        } else {
            $current_power = strlen($number);
        }

        // See if we need "thousands"
        $thousands = floor($number / 1000);
        if ($thousands == 1) {
            $ret .= $this->wordSeparator . 'mille' . $this->wordSeparator;
        } elseif ($thousands > 1) {
            $ret .= $this->toWords($thousands, 3) . $this->wordSeparator;//. 'mil' . $this->wordSeparator;
        }

        // values for digits, tens and hundreds
        $h = floor(($number / 100) % 10);
        $t = floor(($number / 10) % 10);
        $d = floor($number % 10);

        // centinaia: duecento, trecento, etc...
        switch ($h) {
            case 1:
                if (($d == 0) and ($t == 0)) { // is it's '100' use 'cien'
                    $ret .= $this->wordSeparator . 'cento';
                } else {
                    $ret .= $this->wordSeparator . 'cento';
                }
                break;
            case 2:
            case 3:
            case 4:
            case 6:
            case 8:
                $ret .= $this->wordSeparator . self::$digits[$h] . 'cento';
                break;
            case 5:
                $ret .= $this->wordSeparator . 'cinquecento';
                break;
            case 7:
                $ret .= $this->wordSeparator . 'settecento';
                break;
            case 9:
                $ret .= $this->wordSeparator . 'novecento';
                break;
        }

        // decine: venti trenta, etc...
        switch ($t) {
            case 9:
                switch ($d) {
                    case 1:
                    case 8:
                        $ret .= $this->wordSeparator . 'novant';
                        break;
                    default:
                        $ret .= $this->wordSeparator . 'novanta';
                        break;
                }

                break;
            case 8:
                switch ($d) {
                    case 1:
                    case 8:
                        $ret .= $this->wordSeparator . 'ottant';
                        break;
                    default:
                        $ret .= $this->wordSeparator . 'ottanta';
                        break;
                }

                break;
            case 7:
                switch ($d) {
                    case 1:
                    case 8:
                        $ret .= $this->wordSeparator . 'settant';
                        break;
                    default:
                        $ret .= $this->wordSeparator . 'settanta';
                        break;
                }
                break;
            case 6:
                switch ($d) {
                    case 1:
                    case 8:
                        $ret .= $this->wordSeparator . 'sessant';
                        break;
                    default:
                        $ret .= $this->wordSeparator . 'sessanta';
                        break;
                }
                break;
            case 5:
                switch ($d) {
                    case 1:
                    case 8:
                        $ret .= $this->wordSeparator . 'cinquant';
                        break;
                    default:
                        $ret .= $this->wordSeparator . 'cinquanta';
                        break;
                }
                break;
            case 4:
                switch ($d) {
                    case 1:
                    case 8:
                        $ret .= $this->wordSeparator . 'quarant';
                        break;
                    default:
                        $ret .= $this->wordSeparator . 'quaranta';
                        break;
                }
                break;
            case 3:
                switch ($d) {
                    case 1:
                    case 8:
                        $ret .= $this->wordSeparator . 'trent';
                        break;
                    default:
                        $ret .= $this->wordSeparator . 'trenta';
                        break;
                }
                break;
            case 2:
                switch ($d) {
                    case 0:
                        $ret .= $this->wordSeparator . 'venti';
                        break;
                    case 1:
                    case 8:
                        $ret .= $this->wordSeparator . 'vent' . self::$digits[$d];
                        break;
                    default:
                        $ret .= $this->wordSeparator . 'venti' . self::$digits[$d];
                        break;
                }
                break;

            case 1:
                switch ($d) {
                    case 0:
                        $ret .= $this->wordSeparator . 'dieci';
                        break;

                    case 1:
                        $ret .= $this->wordSeparator . 'undici';
                        break;

                    case 2:
                        $ret .= $this->wordSeparator . 'dodici';
                        break;

                    case 3:
                        $ret .= $this->wordSeparator . 'tredici';
                        break;

                    case 4:
                        $ret .= $this->wordSeparator . 'quattordici';
                        break;

                    case 5:
                        $ret .= $this->wordSeparator . 'quindici';
                        break;

                    case 6:
                        $ret .= $this->wordSeparator . 'sedici';
                        break;

                    case 7:
                        $ret .= $this->wordSeparator . 'diciassette';
                        break;

                    case 8:
                        $ret .= $this->wordSeparator . 'diciotto';
                        break;

                    case 9:
                        $ret .= $this->wordSeparator . 'diciannove';
                        break;
                }
                break;
        }

        // add digits only if it is a multiple of 10 and not 1x or 2x
        if (($t != 1) and ($t != 2) and ($d > 0)) {
            // don't add 'e' for numbers below 10
            if ($t != 0) {
                // use 'un' instead of 'uno' when there is a suffix ('mila', 'milloni', etc...)
                if (($power > 0) and ($d == 1)) {
                    $ret .= $this->wordSeparator . ' e un';
                } else {
                    $ret .= $this->wordSeparator . '' . self::$digits[$d];
                }
            } else {
                if (($power > 0) and ($d == 1)) {
                    $ret .= $this->wordSeparator . 'un ';
                } else {
                    $ret .= $this->wordSeparator . self::$digits[$d];
                }
            }
        }

        if ($power > 0) {
            if (isset(self::$exponent[$power])) {
                $lev = self::$exponent[$power];
            }

            if (!isset($lev) || !is_array($lev)) {
                return null;
            }

            // if it's only one use the singular suffix
            if (($d == 1) and ($t == 0) and ($h == 0)) {
                $suffix = $lev[0];
            } else {
                $suffix = $lev[1];
            }
            if ($number != 0) {
                $ret .= $this->wordSeparator . $suffix;
            }
        }

        return $ret;
    }
}
