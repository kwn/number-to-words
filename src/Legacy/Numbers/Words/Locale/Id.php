<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;

class Id extends Words
{
    const LOCALE = 'id';
    const LANGUAGE_NAME = 'Indonesia Language';
    const LANGUAGE_NAME_NATIVE = 'Bahasa Indonesia';

    private $minus = 'minus';

    private static $exponent = [
        0   => [''],
        3   => ['ribu'],
        6   => ['juta'],
        9   => ['milyar'],
        12  => ['trilyun'],
        24  => ['quadrillion'],
        30  => ['quintillion'],
        36  => ['sextillion'],
        42  => ['septillion'],
        48  => ['octillion'],
        54  => ['nonillion'],
        60  => ['decillion'],
        66  => ['undecillion'],
    ];

    private static $digits = [
        'nol',
        'satu',
        'dua',
        'tiga',
        'empat',
        'lima',
        'enam',
        'tujuh',
        'delapan',
        'sembilan'
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
        $return = '';

        if ($number < 0) {
            $return .= $this->minus;
            $number *= -1;
        }

        if (strlen($number) > 4) {
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

        $h = $t = $d = $th = 0;

        switch (strlen($number)) {
            case 4:
                $th = (int) substr($number, -4, 1);

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

        if ($th) {
            if ($th == 1) {
                $return .= $this->wordSeparator . 'seribu';
            } else {
                $return .= $this->wordSeparator . self::$digits[$th] . $this->wordSeparator . 'ribu';
            }
        }

        if ($h) {
            if ($h == 1) {
                $return .= $this->wordSeparator . 'seratus';
            } else {
                $return .= $this->wordSeparator . self::$digits[$h] . $this->wordSeparator . 'ratus';
            }
        }

        // ten, twenty etc.
        switch ($t) {
            case 9:
            case 8:
            case 7:
            case 6:
            case 5:
            case 4:
            case 3:
            case 2:
                $return .= $this->wordSeparator . self::$digits[$t] . ' puluh';
                break;

            case 1:
                switch ($d) {
                    case 0:
                        $return .= $this->wordSeparator . 'sepuluh';
                        break;

                    case 1:
                        $return .= $this->wordSeparator . 'sebelas';
                        break;

                    case 2:
                    case 3:
                    case 4:
                    case 5:
                    case 6:
                    case 7:
                    case 8:
                    case 9:
                        $return .= $this->wordSeparator . self::$digits[$d] . ' belas';
                        break;
                }
                break;
        }

        if ($t != 1 && $d > 0) { // add digits only in <0>,<1,9> and <21,inf>
            // add minus sign between [2-9] and digit
            if ($t > 1) {
                $return .= ' ' . self::$digits[$d];
            } else {
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

            $return .= $this->wordSeparator . $lev[0];
        }

        return $return;
    }
}
