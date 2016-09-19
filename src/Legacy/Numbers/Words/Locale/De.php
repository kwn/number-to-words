<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;

class De extends Words
{
    const LOCALE               = 'de';
    const LANGUAGE_NAME        = 'German';
    const LANGUAGE_NAME_NATIVE = 'Deutsch';
    const MINUS                = 'Minus';

    private $minus = 'Minus';

    private static $exponent = [
        0   => [''],
        3   => ['tausend', 'tausend'],
        6   => ['Million', 'Millionen'],
        9   => ['Milliarde', 'Milliarden'],
        12  => ['Billion', 'Billionen'],
        15  => ['Billiarde', 'Billiarden'],
        18  => ['Trillion', 'Trillionen'],
        21  => ['Trilliarde', 'Trilliarden'],
        24  => ['Quadrillion', 'Quadrillionen'],
        27  => ['Quadrilliarde', 'Quadrilliarden'],
        30  => ['Quintillion', 'Quintillionen'],
        33  => ['Quintilliarde', 'Quintilliarden'],
        36  => ['Sextillion', 'Sextillionen'],
        39  => ['Sextilliarde', 'Sextilliarden'],
        42  => ['Septillion', 'Septillionen'],
        45  => ['Septilliarde', 'Septilliarden'],
        48  => ['Oktillion', 'Oktillionen'], // oder Octillionen
        51  => ['Oktilliarde', 'Oktilliarden'],
        54  => ['Nonillion', 'Nonillionen'],
        57  => ['Nonilliarde', 'Nonilliarden'],
        60  => ['Dezillion', 'Dezillionen'],
        63  => ['Dezilliarde', 'Dezilliarden'],
        120 => ['Vigintillion', 'Vigintillionen'],
        123 => ['Vigintilliarde', 'Vigintilliarden'],
        600 => ['Zentillion', 'Zentillionen'], // oder Centillion
        603 => ['Zentilliarde', 'Zentilliarden']
    ];

    private static $digits = [
        'null',
        'ein',
        'zwei',
        'drei',
        'vier',
        'fünf',
        'sechs',
        'sieben',
        'acht',
        'neun'
    ];

    private $wordSeparator = '';

    private static $exponentSeparator = ' ';


    /**
     * @param int $num
     * @param int $power
     *
     * @return string
     */
    protected function toWords($num, $power = 0)
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

        if ($h) {
            $ret .= $this->wordSeparator . self::$digits[$h] . $this->wordSeparator . 'hundert';
        }

        if ($t != 1 && $d > 0) { // add digits only in <0>,<1,9> and <21,inf>
            if ($t > 0) {
                $ret .= self::$digits[$d] . 'und';
            } else {
                $ret .= self::$digits[$d];
                if ($d == 1) {
                    if ($power == 0) {
                        $ret .= 's'; // fuer eins
                    } else {
                        if ($power != 3) {  // tausend ausnehmen
                            $ret .= 'e'; // fuer eine
                        }
                    }
                }
            }
        }

        // ten, twenty etc.
        switch ($t) {
            case 9:
            case 8:
            case 5:
                $ret .= $this->wordSeparator . self::$digits[$t] . 'zig';
                break;

            case 7:
                $ret .= $this->wordSeparator . 'siebzig';
                break;

            case 6:
                $ret .= $this->wordSeparator . 'sechzig';
                break;

            case 4:
                $ret .= $this->wordSeparator . 'vierzig';
                break;

            case 3:
                $ret .= $this->wordSeparator . 'dreißig';
                break;

            case 2:
                $ret .= $this->wordSeparator . 'zwanzig';
                break;

            case 1:
                switch ($d) {
                    case 0:
                        $ret .= $this->wordSeparator . 'zehn';
                        break;

                    case 1:
                        $ret .= $this->wordSeparator . 'elf';
                        break;

                    case 2:
                        $ret .= $this->wordSeparator . 'zwölf';
                        break;

                    case 3:
                    case 4:
                    case 5:
                    case 8:
                    case 9:
                        $ret .= $this->wordSeparator . self::$digits[$d] . 'zehn';
                        break;

                    case 6:
                        $ret .= $this->wordSeparator . 'sechzehn';
                        break;

                    case 7:
                        $ret .= $this->wordSeparator . 'siebzehn';
                        break;
                }
                break;
        }

        if ($power > 0) {
            if (isset(self::$exponent[$power])) {
                $lev = self::$exponent[$power];
            }

            if (!isset($lev) || !is_array($lev)) {
                return null;
            }

            if ($power == 3) {
                $ret .= $this->wordSeparator . $lev[0];
            } elseif ($d == 1 && ($t + $h) == 0) {
                $ret .= self::$exponentSeparator . $lev[0] . self::$exponentSeparator;
            } else {
                $ret .= self::$exponentSeparator . $lev[1] . self::$exponentSeparator;
            }
        }

        return $ret;
    }
}
