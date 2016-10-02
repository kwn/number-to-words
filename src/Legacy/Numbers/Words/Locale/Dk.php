<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Dk extends Words
{
    const LOCALE               = 'dk';
    const LANGUAGE_NAME        = 'Danish';
    const LANGUAGE_NAME_NATIVE = 'Dansk';

    private $minus = 'minus';

    private static $exponent = [
        0   => [''],
        3   => ['tusind', 'tusinde'],
        6   => ['million', 'millioner'],
        9   => ['milliard', 'milliarder'],
        12  => ['billion', 'billioner'],
        15  => ['billiard', 'billiarder'],
        18  => ['trillion', 'trillioner'],
        21  => ['trilliard', 'trilliarder'],
        24  => ['quadrillion', 'quadrillioner'],
        30  => ['quintillion', 'quintillioner'],
        36  => ['sextillion', 'sextillioner'],
        42  => ['septillion', 'septillioner'],
        48  => ['octillion', 'octillioner'],
        54  => ['nonillion', 'nonillioner'],
        60  => ['decillion', 'decillioner'],
    ];

    private static $digits = [
        'nul',
        'en',
        'to',
        'tre',
        'fire',
        'fem',
        'seks',
        'syv',
        'otte',
        'ni'
    ];

    private $wordSeparator = ' ';

    private static $currencyNames = [
        'AUD' => [['australsk dollar', 'australske dollars'], ['cent']],
        'CAD' => [['canadisk dollar', 'canadisk dollars'], ['cent']],
        'CHF' => [['schweitzer franc'], ['rappen']],
        'CYP' => [['cypriotisk pund', 'cypriotiske pund'], ['cent']],
        'CZK' => [['tjekkisk koruna'], ['halerz']],
        'DKK' => [['krone', 'kroner'], ['øre']],
        'EUR' => [['euro'], ['euro-cent']],
        'GBP' => [['pund'], ['pence']],
        'HKD' => [['Hong Kong dollar', 'Hong Kong dollars'], ['cent']],
        'JPY' => [['yen'], ['sen']],
        'NOK' => [['norsk krone', 'norske kroner'], ['øre']],
        'PLN' => [['zloty', 'zlotys'], ['grosz']],
        'SEK' => [['svensk krone', 'svenske kroner'], ['öre']],
        'USD' => [['dollar', 'dollars'], ['cent']]
    ];

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
            if ($h == 1) {
                $ret .= $this->wordSeparator . 'et' . $this->wordSeparator . 'hundrede';
            } else {
                $ret .= $this->wordSeparator . self::$digits[$h] . $this->wordSeparator . 'hundrede';
            }

            //if (($t + $d) > 0)
            //  $ret .= $this->wordSeparator . 'og';
        } elseif ((isset($maxp)) && ($maxp > 3)) {
            // add 'og' in the case where there are preceding thousands but not hundreds or tens,
            // so fx. 80001 becomes 'firs tusinde og en' instead of 'firs tusinde en'
            $ret .= $this->wordSeparator . 'og';
        }


        if ($t != 1 && $d > 0) {
            $ret .= $this->wordSeparator . (($d == 1 & $power == 3 && $t == 0 && $h == 0) ? "et" :
                    self::$digits[$d]) . ($t > 1 ? $this->wordSeparator . "og" : "");
        }

        // ten, twenty etc.
        switch ($t) {
            case 9:
                $ret .= $this->wordSeparator . 'halvfems';
                break;

            case 8:
                $ret .= $this->wordSeparator . 'firs';
                break;

            case 7:
                $ret .= $this->wordSeparator . 'halvfjerds';
                break;

            case 6:
                $ret .= $this->wordSeparator . 'tres';
                break;

            case 5:
                $ret .= $this->wordSeparator . 'halvtreds';
                break;

            case 4:
                $ret .= $this->wordSeparator . 'fyrre';
                break;

            case 3:
                $ret .= $this->wordSeparator . 'tredive';
                break;

            case 2:
                $ret .= $this->wordSeparator . 'tyve';
                break;

            case 1:
                switch ($d) {
                    case 0:
                        $ret .= $this->wordSeparator . 'ti';
                        break;

                    case 1:
                        $ret .= $this->wordSeparator . 'elleve';
                        break;

                    case 2:
                        $ret .= $this->wordSeparator . 'tolv';
                        break;

                    case 3:
                        $ret .= $this->wordSeparator . 'tretten';
                        break;

                    case 4:
                        $ret .= $this->wordSeparator . 'fjorten';
                        break;

                    case 5:
                        $ret .= $this->wordSeparator . 'femten';
                        break;

                    case 6:
                        $ret .= $this->wordSeparator . 'seksten';
                        break;

                    case 7:
                        $ret .= $this->wordSeparator . 'sytten';
                        break;

                    case 8:
                        $ret .= $this->wordSeparator . 'atten';
                        break;

                    case 9:
                        $ret .= $this->wordSeparator . 'nitten';
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

            if ($d == 1 && ($t + $h) == 0) {
                $ret .= $this->wordSeparator . $lev[0];
            } else {
                $ret .= $this->wordSeparator . $lev[1];
            }
        }

        return $ret;
    }

    /**
     * @param string $currency
     * @param int    $decimal
     * @param int    $fraction
     *
     * @throws NumberToWordsException
     * @return string
     */
    public function toCurrencyWords($currency, $decimal, $fraction = null)
    {
        $return = '';
        $currency = strtoupper($currency);

        if (!array_key_exists($currency, self::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = self::$currencyNames[$currency];

        if ($decimal != '' && $decimal != 0) {
            $return = trim($this->toWords($decimal));
            $lev = ($decimal == 1) ? 0 : 1;

            if ($lev > 0) {
                if (count($currencyNames[0]) > 1) {
                    $return .= $this->wordSeparator . $currencyNames[0][$lev];
                } else {
                    $return .= $this->wordSeparator . $currencyNames[0][0];
                }
            } else {
                $return .= $this->wordSeparator . $currencyNames[0][0];
            }

            if (null !== $fraction) {
                $return .= $this->wordSeparator . 'og';
            }
        }

        if (null !== $fraction) {
            $return .= $this->wordSeparator . trim($this->toWords($fraction));
            $lev = ($fraction == 1) ? 0 : 1;

            if ($lev > 0) {
                if (count($currencyNames[1]) > 1) {
                    $return .= $this->wordSeparator . $currencyNames[1][$lev];
                } else {
                    $return .= $this->wordSeparator . $currencyNames[1][0];
                }
            } else {
                $return .= $this->wordSeparator . $currencyNames[1][0];
            }
        }

        return $return;
    }
}
