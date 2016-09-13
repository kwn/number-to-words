<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale\En;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Us extends Words
{
    const LOCALE = 'en_US';
    const LANGUAGE_NAME = 'American English';
    const LANGUAGE_NAME_NATIVE = 'American English';
    const MINUS = 'minus';

    private static $exponent = [
        0   => [''],
        3   => ['thousand'],
        6   => ['million'],
        9   => ['billion'],
        12  => ['trillion'],
        15  => ['quadrillion'],
        18  => ['quintillion'],
        21  => ['sextillion'],
        24  => ['septillion'],
        27  => ['octillion'],
        30  => ['nonillion'],
        33  => ['decillion'],
        36  => ['undecillion'],
        39  => ['duodecillion'],
        42  => ['tredecillion'],
        45  => ['quattuordecillion'],
        48  => ['quindecillion'],
        51  => ['sexdecillion'],
        54  => ['septendecillion'],
        57  => ['octodecillion'],
        60  => ['novemdecillion'],
        63  => ['vigintillion'],
        66  => ['unvigintillion'],
        69  => ['duovigintillion'],
        72  => ['trevigintillion'],
        75  => ['quattuorvigintillion'],
        78  => ['quinvigintillion'],
        81  => ['sexvigintillion'],
        84  => ['septenvigintillion'],
        87  => ['octovigintillion'],
        90  => ['novemvigintillion'],
        93  => ['trigintillion'],
        96  => ['untrigintillion'],
        99  => ['duotrigintillion'],
        100 => ['googol'],
        102 => ['trestrigintillion'],
        105 => ['quattuortrigintillion'],
        108 => ['quintrigintillion'],
        111 => ['sextrigintillion'],
        114 => ['septentrigintillion'],
        117 => ['octotrigintillion'],
        120 => ['novemtrigintillion'],
        123 => ['quadragintillion'],
        126 => ['unquadragintillion'],
        129 => ['duoquadragintillion'],
        132 => ['trequadragintillion'],
        135 => ['quattuorquadragintillion'],
        138 => ['quinquadragintillion'],
        141 => ['sexquadragintillion'],
        144 => ['septenquadragintillion'],
        147 => ['octoquadragintillion'],
        150 => ['novemquadragintillion'],
        153 => ['quinquagintillion'],
        156 => ['unquinquagintillion'],
        159 => ['duoquinquagintillion'],
        162 => ['trequinquagintillion'],
        165 => ['quattuorquinquagintillion'],
        168 => ['quinquinquagintillion'],
        171 => ['sexquinquagintillion'],
        174 => ['septenquinquagintillion'],
        177 => ['octoquinquagintillion'],
        180 => ['novemquinquagintillion'],
        183 => ['sexagintillion'],
        186 => ['unsexagintillion'],
        189 => ['duosexagintillion'],
        192 => ['tresexagintillion'],
        195 => ['quattuorsexagintillion'],
        198 => ['quinsexagintillion'],
        201 => ['sexsexagintillion'],
        204 => ['septensexagintillion'],
        207 => ['octosexagintillion'],
        210 => ['novemsexagintillion'],
        213 => ['septuagintillion'],
        216 => ['unseptuagintillion'],
        219 => ['duoseptuagintillion'],
        222 => ['treseptuagintillion'],
        225 => ['quattuorseptuagintillion'],
        228 => ['quinseptuagintillion'],
        231 => ['sexseptuagintillion'],
        234 => ['septenseptuagintillion'],
        237 => ['octoseptuagintillion'],
        240 => ['novemseptuagintillion'],
        243 => ['octogintillion'],
        246 => ['unoctogintillion'],
        249 => ['duooctogintillion'],
        252 => ['treoctogintillion'],
        255 => ['quattuoroctogintillion'],
        258 => ['quinoctogintillion'],
        261 => ['sexoctogintillion'],
        264 => ['septoctogintillion'],
        267 => ['octooctogintillion'],
        270 => ['novemoctogintillion'],
        273 => ['nonagintillion'],
        276 => ['unnonagintillion'],
        279 => ['duononagintillion'],
        282 => ['trenonagintillion'],
        285 => ['quattuornonagintillion'],
        288 => ['quinnonagintillion'],
        291 => ['sexnonagintillion'],
        294 => ['septennonagintillion'],
        297 => ['octononagintillion'],
        300 => ['novemnonagintillion'],
        303 => ['centillion'],
        309 => ['duocentillion'],
        312 => ['trecentillion'],
        366 => ['primo-vigesimo-centillion'],
        402 => ['trestrigintacentillion'],
        603 => ['ducentillion'],
        624 => ['septenducentillion'],
    ];

    private static $digits = [
        'zero',
        'one',
        'two',
        'three',
        'four',
        'five',
        'six',
        'seven',
        'eight',
        'nine'
    ];

    private $wordSeparator = ' ';

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
        'TRL' => [['lira'], ['kuruş']],
        'UAH' => [['hryvna'], ['cent']],
        'USD' => [['dollar'], ['cent']],
        'YUM' => [['dinars'], ['para']],
        'ZAR' => [['rand'], ['cent']]
    ];

    /**
     * @param int $num
     * @param int $power
     *
     * @return string
     */
    protected function _toWords($num, $power = 0)
    {
        $ret = '';

        // add a minus sign
        if (substr($num, 0, 1) == '-') {
            $ret = $this->wordSeparator . self::MINUS;
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

                        $ret .= $this->_toWords($snum, $p);
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
            $ret .= $this->wordSeparator . self::$digits[$h] . $this->wordSeparator . 'hundred';

            // in English only - add ' and' for [1-9]01..[1-9]99
            // (also for 1001..1099, 10001..10099 but it is harder)
            // for now it is switched off, maybe some language purists
            // can force me to enable it, or to remove it completely
            // if (($t + $d) > 0)
            //   $ret .= $this->wordSeparator . 'and';
        }

        // ten, twenty etc.
        switch ($t) {
            case 9:
            case 7:
            case 6:
                $ret .= $this->wordSeparator . self::$digits[$t] . 'ty';
                break;

            case 8:
                $ret .= $this->wordSeparator . 'eighty';
                break;

            case 5:
                $ret .= $this->wordSeparator . 'fifty';
                break;

            case 4:
                $ret .= $this->wordSeparator . 'forty';
                break;

            case 3:
                $ret .= $this->wordSeparator . 'thirty';
                break;

            case 2:
                $ret .= $this->wordSeparator . 'twenty';
                break;

            case 1:
                switch ($d) {
                    case 0:
                        $ret .= $this->wordSeparator . 'ten';
                        break;

                    case 1:
                        $ret .= $this->wordSeparator . 'eleven';
                        break;

                    case 2:
                        $ret .= $this->wordSeparator . 'twelve';
                        break;

                    case 3:
                        $ret .= $this->wordSeparator . 'thirteen';
                        break;

                    case 4:
                    case 6:
                    case 7:
                    case 9:
                        $ret .= $this->wordSeparator . self::$digits[$d] . 'teen';
                        break;

                    case 5:
                        $ret .= $this->wordSeparator . 'fifteen';
                        break;

                    case 8:
                        $ret .= $this->wordSeparator . 'eighteen';
                        break;
                }
                break;
        }

        if ($t != 1 && $d > 0) { // add digits only in <0>,<1,9> and <21,inf>
            // add minus sign between [2-9] and digit
            if ($t > 1) {
                $ret .= '-' . self::$digits[$d];
            } else {
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

            $ret .= $this->wordSeparator . $lev[0];
        }

        return $ret;
    }

    /**
     * @param string $currency
     * @param int    $decimal
     * @param int    $fraction
     * @param bool   $convertFraction
     *
     * @throws NumberToWordsException
     * @return string
     */
    public function toCurrencyWords($currency, $decimal, $fraction = null, $convertFraction = true)
    {
        $currency = strtoupper($currency);

        if (!array_key_exists($currency, self::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = self::$currencyNames[$currency];

        $return = trim($this->_toWords($decimal));
        $level = ($decimal == 1) ? 0 : 1;

        if ($level > 0) {
            if (count($currencyNames[0]) > 1) {
                $return .= $this->wordSeparator . $currencyNames[0][$level];
            } else {
                $return .= $this->wordSeparator . $currencyNames[0][0] . 's';
            }
        } else {
            $return .= $this->wordSeparator . $currencyNames[0][0];
        }

        if (null !== $fraction) {
            if (true === $convertFraction) {
                $return .= $this->wordSeparator . trim($this->_toWords($fraction));
            } else {
                $return .= $this->wordSeparator . $fraction;
            }

            $level = ($fraction == 1) ? 0 : 1;

            if ($level > 0) {
                if (count($currencyNames[1]) > 1) {
                    $return .= $this->wordSeparator . $currencyNames[1][$level];
                } else {
                    $return .= $this->wordSeparator . $currencyNames[1][0] . 's';
                }
            } else {
                $return .= $this->wordSeparator . $currencyNames[1][0];
            }
        }

        return $return;
    }
}
