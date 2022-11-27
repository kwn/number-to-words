<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;

class Nl extends Words
{
    const LOCALE = 'nl';
    const LANGUAGE_NAME = 'Dutch';
    const LANGUAGE_NAME_NATIVE = 'Nederlands';

    private $minus = 'minus';

    private static $exponent = [
        0 => [''],
        3 => ['duizend', 'duizend'],
        6 => ['miljoen', 'miljoen'],
        9 => ['miljard', 'miljard'],
        12 => ['biljoen', 'biljoen'],
        15 => ['biljard', 'biljard'],
        18 => ['triljoen', 'triljoen'],
        21 => ['triljard', 'triljard'],
        24 => ['quadriljoen', 'quadriljoen'],
        27 => ['quadriljard', 'quadriljard'],
        30 => ['quintiljoen', 'quintiljoen'],
        33 => ['quintiljard', 'quintiljard'],
        36 => ['sextiljoen', 'sextiljoen'],
        39 => ['sextiljard', 'sextiljard'],
        42 => ['septiljoen', 'septiljoen'],
        45 => ['septiljard', 'septiljard'],
        48 => ['octiljoen', 'octiljoen'],
        51 => ['octiljard', 'octiljard'],
        54 => ['noniljoen', 'noniljoen'],
        57 => ['noniljard', 'noniljard'],
        60 => ['deciljoen', 'deciljoen'],
        63 => ['deciljard', 'deciljard'],
        66 => ['Undeciljoen', 'Undeciljoen'],
        69 => ['Undeciljard', 'Undeciljard'],
        72 => ['duodeciljoen', 'duodeciljoen'],
        75 => ['duodeciljard', 'duodeciljard'],
        78 => ['tredeciljoen', 'tredeciljoen'],
        81 => ['tredeciljard', 'tredeciljard'],
        120 => ['vigintiljoen', 'vigintiljoen'],
        123 => ['vigintiljard', 'vigintiljard'],
        600 => ['zentiljoen', 'zentiljoen'], // oder Centillion
        603 => ['zentiljardn', 'zentiljard']
    ];

    private static $digits = [
        'nul',
        'één',
        'twee',
        'drie',
        'vier',
        'vijf',
        'zes',
        'zeven',
        'acht',
        'negen'
    ];

    private $wordSeparator = '';

    private static $exponentWordSeparator = ' ';

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
        'ISK' => [['Icelandic kr\F3na'], ['aurar']],
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
        'TRL' => [['lira'], ['kuru\FE']],
        'TRY' => [['lira'], ['kuru\FE']],
        'UAH' => [['hryvna'], ['cent']],
        'USD' => [['dollar'], ['cent']],
        'YUM' => [['dinars'], ['para']],
        'ZAR' => [['rand'], ['cent']]
    ];

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
        $hasPower = false;;

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
                        $hasPower = true;
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
            $ret .= $this->wordSeparator . ($h == 1 ? '' : self::$digits[$h]) . $this->wordSeparator . 'honderd';
        }
        // an number under 12 with wants en if it is substituted
        if ($hasPower && $num <= 12 && $num > 0) {
            $ret .= 'en ';
        }
        // add digits only in <0>,<1,9> and <21,inf>
        if ($d > 0) {
            if ($t != 1 && $t > 0) {
                $ret .= self::$digits[$d] . 'en';
            } else {
                // 100 en 9 of 100 en 12 maar honderddertien
                if ($h > 0 && ($t == 0 || ($t == 1 && ($d == 1 || $d == 2)))) {
                    $ret .= ' en ';
                }
                if ($t != 1 && !($d == 1 && $power == 3)) {
                    $ret .= self::$digits[$d];
                }
            }
        }

        // ten, twenty etc.
        switch ($t) {
            case 8:
                $ret .= $this->wordSeparator . 't' . self::$digits[$t] . 'ig';
                break;
            case 9:
            case 7:
            case 6:
            case 5:
                $ret .= $this->wordSeparator . self::$digits[$t] . 'tig';
                break;
            case 4:
                $ret .= $this->wordSeparator . 'veertig';
                break;

            case 3:
                $ret .= $this->wordSeparator . 'dertig';
                break;

            case 2:
                $ret .= $this->wordSeparator . 'twintig';
                break;

            case 1:
                switch ($d) {
                    case 0:
                        $ret .= $this->wordSeparator . 'tien';
                        break;

                    case 1:
                        $ret .= $this->wordSeparator . 'elf';
                        break;

                    case 2:
                        $ret .= $this->wordSeparator . 'twaalf';
                        break;

                    case 3:
                        $ret .= $this->wordSeparator . 'dertien';
                        break;

                    case 4:
                        $ret .= $this->wordSeparator . 'veertien';
                        break;

                    case 5:
                    case 6:
                    case 7:
                    case 8:
                    case 9:
                        $ret .= $this->wordSeparator . self::$digits[$d] . 'tien';
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
                $ret .= $this->wordSeparator . $lev[0] . self::$exponentWordSeparator;
            } elseif ($d == 1 && ($t + $h) == 0) {
                $ret .= self::$exponentWordSeparator . $lev[0] . self::$exponentWordSeparator;
            } else {
                $ret .= self::$exponentWordSeparator . $lev[1] . self::$exponentWordSeparator;
            }
        }

        if ($powsuffix != '') {
            $ret .= $this->wordSeparator . $powsuffix;
        }

        return $ret;
    }
}
