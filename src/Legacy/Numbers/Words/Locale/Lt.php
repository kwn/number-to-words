<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;

class Lt extends Words
{
    const LOCALE = 'lt';
    const LANGUAGE_NAME = 'Lithuanian';
    const LANGUAGE_NAME_NATIVE = 'lietuviškai';
    const MINUS = 'minus';

    private $minus = 'minus';

    private static $exponent = [
        0  => [''],
        3  => ['tūkstantis', 'tūkstančiai', 'tūkstančių'],
        6  => ['milijonas', 'milijonai', 'milijonų'],
        9  => ['bilijonas', 'bilijonai', 'bilijonų'],
        12 => ['trilijonas', 'trilijonai', 'trilijonų'],
        15 => ['kvadrilijonas', 'kvadrilijonai', 'kvadrilijonų'],
        18 => ['kvintilijonas', 'kvintilijonai', 'kvintilijonų']
    ];

    private static $digits = [
        'nulis',
        'vienas',
        'du',
        'trys',
        'keturi',
        'penki',
        'šeši',
        'septyni',
        'aštuoni',
        'devyni'
    ];

    private $wordSeparator = ' ';

    /**
     * @param int    $number
     * @param int    $power
     * @param string $powsuffix
     *
     * @return string
     */
    protected function toWords($number, $power = 0, $powsuffix = '')
    {
        $return = '';

        // add a minus sign
        if (substr($number, 0, 1) == '-') {
            $return = $this->wordSeparator . $this->minus;
            $number = substr($number, 1);
        }

        // strip excessive zero signs and spaces
        $number = trim($number);
        $number = preg_replace('/^0+/', '', $number);

        if (strlen($number) > 3) {
            $maxp = strlen($number) - 1;
            $curp = $maxp;
            for ($p = $maxp; $p > 0; --$p) {
                // check for highest power
                if (isset(self::$exponent[$p])) {
                    // send substr from $curp to $p
                    $snum = substr($number, $maxp - $curp, $curp - $p + 1);
                    $snum = preg_replace('/^0+/', '', $snum);
                    if ($snum !== '') {
                        $cursuffix = self::$exponent[$power][count(self::$exponent[$power]) - 1];
                        if ($powsuffix != '') {
                            $cursuffix .= $this->wordSeparator . $powsuffix;
                        }

                        $return .= $this->toWords($snum, $p, $cursuffix);
                    }
                    $curp = $p - 1;
                    continue;
                }
            }
            $number = substr($number, $maxp - $curp, $curp - $p + 1);
            if ($number == 0) {
                return $return;
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

        if ($h > 1) {
            $return .= $this->wordSeparator . self::$digits[$h] . $this->wordSeparator . 'šimtai';
        } elseif ($h) {
            $return .= $this->wordSeparator . 'šimtas';
        }

        // ten, twenty etc.
        switch ($t) {
            case 9:
                $return .= $this->wordSeparator . 'devyniasdešimt';
                break;

            case 8:
                $return .= $this->wordSeparator . 'aštuoniasdešimt';
                break;

            case 7:
                $return .= $this->wordSeparator . 'septyniasdešimt';
                break;

            case 6:
                $return .= $this->wordSeparator . 'šešiasdešimt';
                break;

            case 5:
                $return .= $this->wordSeparator . 'penkiasdešimt';
                break;

            case 4:
                $return .= $this->wordSeparator . 'keturiasdešimt';
                break;

            case 3:
                $return .= $this->wordSeparator . 'trisdešimt';
                break;

            case 2:
                $return .= $this->wordSeparator . 'dvidešimt';
                break;

            case 1:
                switch ($d) {
                    case 0:
                        $return .= $this->wordSeparator . 'dešimt';
                        break;

                    case 1:
                        $return .= $this->wordSeparator . 'vienuolika';
                        break;

                    case 2:
                        $return .= $this->wordSeparator . 'dvylika';
                        break;

                    case 3:
                        $return .= $this->wordSeparator . 'trylika';
                        break;

                    case 4:
                        $return .= $this->wordSeparator . 'keturiolika';
                        break;

                    case 5:
                        $return .= $this->wordSeparator . 'penkiolika';
                        break;

                    case 6:
                        $return .= $this->wordSeparator . 'šešiolika';
                        break;

                    case 7:
                        $return .= $this->wordSeparator . 'septyniolika';
                        break;

                    case 8:
                        $return .= $this->wordSeparator . 'aštuoniolika';
                        break;

                    case 9:
                        $return .= $this->wordSeparator . 'devyniolika';
                        break;
                }
                break;
        }

        // add digits only in <0>,<1,9> and <21,inf>
        if ($t != 1 && $d > 0) {
            if ($d > 1 || !$power || $t) {
                $return .= $this->wordSeparator . self::$digits[$d];
            }
        }

        if ($power > 0) {
            if (isset(self::$exponent[$power])) {
                $lev = self::$exponent[$power];
            }

            if (!isset($lev) || !is_array($lev)) {
                return null;
            }

            //echo " $t $d  <br>";

            if ($t == 1 || ($t > 0 && $d == 0)) {
                $return .= $this->wordSeparator . $lev[2];
            } elseif ($d > 1) {
                $return .= $this->wordSeparator . $lev[1];
            } else {
                $return .= $this->wordSeparator . $lev[0];
            }
        }

        if ($powsuffix != '') {
            $return .= $this->wordSeparator . $powsuffix;
        }

        return $return;
    }
}
