<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Hu extends Words
{
    const LOCALE               = 'hu';
    const LANGUAGE_NAME        = 'Hungarian';
    const LANGUAGE_NAME_NATIVE = 'Magyar';

    private $minus = 'Mínusz ';

    private static $exponent = [
        0   => [''],
        3   => ['ezer'],
        6   => ['millió'],
        9   => ['milliárd'],
        12  => ['billió'],
        15  => ['billiárd'],
        18  => ['trillió'],
        21  => ['trilliárd'],
        24  => ['kvadrillió'],
        27  => ['kvadrilliárd'],
        30  => ['kvintillió'],
        33  => ['kvintilliárd'],
        36  => ['szextillió'],
        39  => ['szextilliárd'],
        42  => ['szeptillió'],
        45  => ['szeptilliárd'],
        48  => ['oktillió'],
        51  => ['oktilliárd'],
        54  => ['nonillió'],
        57  => ['nonilliárd'],
        60  => ['decillió'],
        63  => ['decilliárd'],
        600 => ['centillió']
    ];

    private static $digits = [
        'nulla',
        'egy',
        'kettő',
        'három',
        'négy',
        'öt',
        'hat',
        'hét',
        'nyolc',
        'kilenc'
    ];

    private $wordSeparator = '';

    private $thousandSeparator = '-';

    private static $currencyNames = [
        'ALL' => [['lek'], ['qindarka']],
        'AUD' => [['Australian dollar'], ['cent']],
        'BAM' => [['convertible marka'], ['fenig']],
        'BGN' => [['lev'], ['stotinka']],
        'BRL' => [['real'], ['centavos']],
        'BYR' => [['Belarussian rouble'], ['kopiejka']],
        'CAD' => [['Canadian dollar'], ['cent']],
        'CHF' => [['Swiss franc'], ['rapp']],
        'CYP' => [['Cypriot pound'], ['cent']],
        'CZK' => [['Czech koruna'], ['halerz']],
        'DKK' => [['Danish krone'], ['ore']],
        'EEK' => [['kroon'], ['senti']],
        'EUR' => [['euro'], ['euro-cent']],
        'GBP' => [['pound', 'pounds'], ['pence', 'pence']],
        'HKD' => [['Hong Kong dollar'], ['cent']],
        'HRK' => [['Croatian kuna'], ['lipa']],
        'HUF' => [['forint'], ['filler']],
        'ILS' => [['new sheqel', 'new sheqels'], ['agora', 'agorot']],
        'ISK' => [['Icelandic króna'], ['aurar']],
        'JPY' => [['yen'], ['sen']],
        'LTL' => [['litas'], ['cent']],
        'LVL' => [['lat'], ['sentim']],
        'MKD' => [['Macedonian dinar'], ['deni']],
        'MTL' => [['Maltese lira'], ['centym']],
        'NOK' => [['Norwegian krone'], ['oere']],
        'PLN' => [['zloty', 'zlotys'], ['grosz']],
        'ROL' => [['Romanian leu'], ['bani']],
        'RUB' => [['Russian Federation rouble'], ['kopiejka']],
        'SEK' => [['Swedish krona'], ['oere']],
        'SIT' => [['Tolar'], ['stotinia']],
        'SKK' => [['Slovak koruna'], []],
        'TRL' => [['lira'], ['kuruþ']],
        'UAH' => [['hryvna'], ['cent']],
        'USD' => [['dollar'], ['cent']],
        'YUM' => [['dinars'], ['para']],
        'ZAR' => [['rand'], ['cent']]
    ];

    /**
     * @param int    $num
     * @param array  $options
     * @param int    $power
     * @param string $powsuffix
     * @param bool   $gt2000
     *
     * @return null|string
     */
    protected function _toWords($num, $options = [], $power = 0, $powsuffix = '', $gt2000 = false)
    {
        $chk_gt2000 = true;

        /**
         * Loads user options
         */
        extract($options, EXTR_IF_EXISTS);

        /**
         * Return string
         */
        $ret = '';

        // add a minus sign
        if (substr($num, 0, 1) == '-') {
            $ret = $this->wordSeparator . $this->minus;
            $num = substr($num, 1);
        }

        // strip excessive zero signs and spaces
        $num = trim($num);
        $num = preg_replace('/^0+/', '', $num);

        if ($chk_gt2000) {
            $gt2000 = $num > 2000;
        }

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

                        $ret .= $this->_toWords(
                            $snum,
                            ['chk_gt2000' => false],
                            $p,
                            $cursuffix,
                            $gt2000
                        );

                        if ($gt2000) {
                            $ret .= $this->thousandSeparator;
                        }
                    }
                    $curp = $p - 1;
                    continue;
                }
            }
            $num = substr($num, $maxp - $curp, $curp - $p + 1);
            if ($num == 0) {
                return rtrim($ret, $this->thousandSeparator);
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
            $ret .= $this->wordSeparator . self::$digits[$h] . $this->wordSeparator . 'száz';
        }

        // ten, twenty etc.
        switch ($t) {
            case 9:
            case 5:
                $ret .= $this->wordSeparator . self::$digits[$t] . 'ven';
                break;
            case 8:
            case 6:
                $ret .= $this->wordSeparator . self::$digits[$t] . 'van';
                break;
            case 7:
                $ret .= $this->wordSeparator . 'hetven';
                break;
            case 3:
                $ret .= $this->wordSeparator . 'harminc';
                break;
            case 4:
                $ret .= $this->wordSeparator . 'negyven';
                break;
            case 2:
                switch ($d) {
                    case 0:
                        $ret .= $this->wordSeparator . 'húsz';
                        break;
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                    case 5:
                    case 6:
                    case 7:
                    case 8:
                    case 9:
                        $ret .= $this->wordSeparator . 'huszon';
                        break;
                }
                break;
            case 1:
                switch ($d) {
                    case 0:
                        $ret .= $this->wordSeparator . 'tíz';
                        break;
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                    case 5:
                    case 6:
                    case 7:
                    case 8:
                    case 9:
                        $ret .= $this->wordSeparator . 'tizen';
                        break;
                }
                break;
        }

        if ($d > 0) { // add digits only in <0> and <1,inf)
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

    /**
     * @param string $currency
     * @param int    $decimal
     * @param int    $fraction
     * @param bool   $convertFraction
     *
     * @return string
     * @throws NumberToWordsException
     */
    public function toCurrencyWords($currency, $decimal, $fraction = null, $convertFraction = true)
    {
        $currency = strtoupper($currency);

        if (!array_key_exists($currency, self::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $curr_names = self::$currencyNames[$currency];

        $ret = trim($this->_toWords($decimal));
        $lev = ($decimal == 1) ? 0 : 1;
        if ($lev > 0) {
            if (count($curr_names[0]) > 1) {
                $ret .= $this->wordSeparator . $curr_names[0][$lev];
            } else {
                $ret .= $this->wordSeparator . $curr_names[0][0] . 's';
            }
        } else {
            $ret .= $this->wordSeparator . $curr_names[0][0];
        }

        if ($fraction !== null) {
            if ($convertFraction) {
                $ret .= $this->wordSeparator . trim($this->_toWords($fraction));
            } else {
                $ret .= $this->wordSeparator . $fraction;
            }
            $lev = ($fraction == 1) ? 0 : 1;
            if ($lev > 0) {
                if (count($curr_names[1]) > 1) {
                    $ret .= $this->wordSeparator . $curr_names[1][$lev];
                } else {
                    $ret .= $this->wordSeparator . $curr_names[1][0] . 's';
                }
            } else {
                $ret .= $this->wordSeparator . $curr_names[1][0];
            }
        }

        return $ret;
    }
}
