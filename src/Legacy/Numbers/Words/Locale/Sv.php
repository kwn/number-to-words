<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;

class Sv extends Words
{
    const LOCALE = 'sv';
    const LANGUAGE_NAME = 'Swedish';
    const LANGUAGE_NAME_NATIVE = 'Svenska';

    private $minus = 'Minus';

    private static $exponent = [
        0 => [''],
        3 => ['tusen', 'tusen'],
        6 => ['miljon', 'miljoner'],
        9 => ['miljard', 'miljarder'],
        12 => ['biljon', 'biljoner'],
        15 => ['biljard', 'biljarder'],
        18 => ['triljon', 'triljoner'],
        21 => ['triljard', 'triljarder'],
        24 => ['kvadriljon', 'kvadriljoner'],
        27 => ['kvadriljard', 'kvadriljarder'],
        30 => ['kvintiljon', 'kvintiljoner'],
        33 => ['kvintiljard', 'kvintiljarder'],
        36 => ['sextiljon', 'sextiljoner'],
        39 => ['sextiljard', 'sextiljarder'],
        42 => ['septiljon', 'septiljoner'],
        45 => ['septiljard', 'septiljarder'],
        48 => ['oktiljon', 'oktiljoner'],
        51 => ['oktiljard', 'oktiljarder'],
        54 => ['noniljon', 'noniljoner'],
        57 => ['noniljard', 'noniljarder'],
        60 => ['dekiljon', 'dekiljoner'],
        63 => ['dekiljard', 'dekiljarder'],
    ];

    private static $digits = [
        'noll',
        'en',
        'två',
        'tre',
        'fyra',
        'fem',
        'sex',
        'sju',
        'åtta',
        'nio'
    ];

    private $wordSeparator = ' ';

    private $exponentWordSeparator = '-';


    /**
     * @param int $num
     * @param int $power
     * @param string $powsuffix
     *
     * @return string
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

        if ($h) {
            $ret .= $this->wordSeparator . self::$digits[$h] . $this->wordSeparator . 'hundra';
        }

        // ten, twenty etc.
        switch ($t) {
            case 5:
            case 6:
            case 7:
                $ret .= $this->wordSeparator . self::$digits[$t] . 'tio';
                break;

            case 9:
                $ret .= $this->wordSeparator . 'nittio';
                break;

            case 8:
                $ret .= $this->wordSeparator . 'åttio';
                break;

            case 4:
                $ret .= $this->wordSeparator . 'fyrtio';
                break;

            case 3:
                $ret .= $this->wordSeparator . 'trettio';
                break;

            case 2:
                $ret .= $this->wordSeparator . 'tjugo';
                break;

            case 1:
                switch ($d) {
                    case 0:
                        $ret .= $this->wordSeparator . 'tio';
                        break;

                    case 1:
                        $ret .= $this->wordSeparator . 'elva';
                        break;

                    case 2:
                        $ret .= $this->wordSeparator . 'tolv';
                        break;

                    case 3:
                        $ret .= $this->wordSeparator . 'tretton';
                        break;

                    case 4:
                        $ret .= $this->wordSeparator . 'fjorton';
                        break;

                    case 5:
                    case 6:
                        $ret .= $this->wordSeparator . self::$digits[$d] . 'ton';
                        break;

                    case 7:
                        $ret .= $this->wordSeparator . 'sjutton';
                        break;

                    case 8:
                        $ret .= $this->wordSeparator . 'arton';
                        break;
                    case 9:
                        $ret .= $this->wordSeparator . 'nitton';
                }
                break;
        }

        if ($t != 1 && $d > 0) { // add digits only in <0>,<1,9> and <21,inf>
            // add minus sign between [2-9] and digit
            $ret .= $this->wordSeparator . self::$digits[$d];
        }

        if ($power > 0) {
            if (isset(self::$exponent[$power])) {
                $lev = self::$exponent[$power];
            }

            if (!isset($lev) || !is_array($lev)) {
                return null;
            }

            $ret .= $this->wordSeparator . $lev[0];
        }

        if ($powsuffix != '') {
            $ret .= $this->wordSeparator . $powsuffix;
        }

        return $ret;
    }
}
