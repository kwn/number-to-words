<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;

class Lv extends Words
{
    const LOCALE               = 'lv';
    const LANGUAGE_NAME        = 'Latvian';
    const LANGUAGE_NAME_NATIVE = 'latviešu';

    private $minus = 'minus';

    private static $exponent = [
        0  => [''],
        3  => ['tūkstotis', 'tūkstoši', 'tūkstoši'],
        6  => ['miljons', 'miljoni', 'miljons'],
        9  => ['miljards', 'miljardi', 'miljardi'],
        12 => ['triljons', 'triljoni', 'triljoni'],
        15 => ['kvadriljons', 'kvadriljoni', 'kvadriljoni'],
        18 => ['kvintiljons', 'kvintiljoni', 'kvintiljoni']
    ];

    private static $digits = [
        'nulle',
        'viens',
        'divi',
        'trīs',
        'četri',
        'pieci',
        'seši',
        'septiņi',
        'astoņi',
        'deviņi'
    ];

    private $wordSeparator = ' ';

    /**
     * @param int    $num
     * @param int    $power
     * @param string $powsuffix
     *
     * @return null|string
     */
    protected function toWords($num, $power = 0, $powsuffix = '')
    {
        $ret = '';

        // add a minus sign
        if (substr($num, 0, 1) == '-') {
            $ret = $this->wordSeparator . $this->minus;
            $num = substr($num, 1);
        }

        // strip excessive zero signs and spaces
        $num = trim($num);
        $num = preg_replace('/^0+/', '', $num);

        if (strlen($num) > 3) {
            $maxp = strlen($num) - 1;
            $curp = $maxp;
            for ($p = $maxp; $p > 0; --$p) { // power

                // check for highest power
                if (isset(self::$exponent[$p])) {
                    // send substr from $curp to $p
                    $snum = substr($num, $maxp - $curp, $curp - $p + 1);
                    $snum = preg_replace('/^0+/', '', $snum);
                    if ($snum !== '') {
                        $cursuffix = self::$exponent[$power][count(self::$exponent[$power]) - 1];
                        if ($powsuffix != '') {
                            $cursuffix .= $this->wordSeparator . $powsuffix;
                        }

                        $ret .= $this->toWords($snum, $p, $cursuffix);
                    }
                    $curp = $p - 1;
                    continue;
                }
            }
            $num = substr($num, $maxp - $curp, $curp - $p + 1);
            if ($num == 0) {
                return $ret;
            }
        } elseif ($num == 0 || $num == '') {
            return $this->wordSeparator . self::$digits[0];
        }

        $h = $t = $d = 0;

        switch (strlen($num)) {
            case 3:
                $h = (int) substr($num, -3, 1);

            case 2:
                $t = (int) substr($num, -2, 1);

            case 1:
                $d = (int) substr($num, -1, 1);
                break;

            case 0:
                return;
                break;
        }

        if ($h > 1) {
            $ret .= $this->wordSeparator . self::$digits[$h] . $this->wordSeparator . 'simti';
        } elseif ($h) {
            $ret .= $this->wordSeparator . 'simts';
        }

        // ten, twenty etc.
        switch ($t) {
            case 9:
                $ret .= $this->wordSeparator . 'deviņdesmit';
                break;

            case 8:
                $ret .= $this->wordSeparator . 'astoņdesmit';
                break;

            case 7:
                $ret .= $this->wordSeparator . 'septiņdesmit';
                break;

            case 6:
                $ret .= $this->wordSeparator . 'sešdesmit';
                break;

            case 5:
                $ret .= $this->wordSeparator . 'piecdesmit';
                break;

            case 4:
                $ret .= $this->wordSeparator . 'četrdesmit';
                break;

            case 3:
                $ret .= $this->wordSeparator . 'trīsdesmit';
                break;

            case 2:
                $ret .= $this->wordSeparator . 'divdesmit';
                break;

            case 1:
                switch ($d) {
                    case 0:
                        $ret .= $this->wordSeparator . 'desmit';
                        break;

                    case 1:
                        $ret .= $this->wordSeparator . 'vienpadsmit';
                        break;

                    case 2:
                        $ret .= $this->wordSeparator . 'divpadsmit';
                        break;

                    case 3:
                        $ret .= $this->wordSeparator . 'trīspadsmit';
                        break;

                    case 4:
                        $ret .= $this->wordSeparator . 'četrpadsmit';
                        break;

                    case 5:
                        $ret .= $this->wordSeparator . 'piecpadsmit';
                        break;

                    case 6:
                        $ret .= $this->wordSeparator . 'sešpadsmit';
                        break;

                    case 7:
                        $ret .= $this->wordSeparator . 'septiņpadsmit';
                        break;

                    case 8:
                        $ret .= $this->wordSeparator . 'astoņpadsmit';
                        break;

                    case 9:
                        $ret .= $this->wordSeparator . 'deviņpadsmit';
                        break;
                }
                break;
        }

        // add digits only in <0>,<1,9> and <21,inf>
        if ($t != 1 && $d > 0) {
            if ($d > 1 || !$power || $t) {
                $ret .= $this->wordSeparator . self::$digits[$d];
            }
        }

        if ($power > 0) {
            if (isset(self::$exponent[$power])) {
                $lev = self::$exponent[$power];
            }

            if (!isset($lev) || !is_array($lev)) {
                return null;
            }

            if ($t == 1 || ($t > 0 && $d == 0)) {
                $ret .= $this->wordSeparator . $lev[2];
            } elseif ($d > 1) {
                $ret .= $this->wordSeparator . $lev[1];
            } else {
                $ret .= $this->wordSeparator . $lev[0];
            }
        }

        if ($powsuffix != '') {
            $ret .= $this->wordSeparator . $powsuffix;
        }

        return $ret;
    }
}
