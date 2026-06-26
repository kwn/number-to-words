<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Dk extends Words
{
    const LOCALE = 'dk';
    const LANGUAGE_NAME = 'Danish';
    const LANGUAGE_NAME_NATIVE = 'Dansk';

    private $minus = 'minus';

    private static $exponent = [
        0 => [''],
        3 => ['tusind', 'tusinde'],
        6 => ['million', 'millioner'],
        9 => ['milliard', 'milliarder'],
        12 => ['billion', 'billioner'],
        15 => ['billiard', 'billiarder'],
        18 => ['trillion', 'trillioner'],
        21 => ['trilliard', 'trilliarder'],
        24 => ['quadrillion', 'quadrillioner'],
        30 => ['quintillion', 'quintillioner'],
        36 => ['sextillion', 'sextillioner'],
        42 => ['septillion', 'septillioner'],
        48 => ['octillion', 'octillioner'],
        54 => ['nonillion', 'nonillioner'],
        60 => ['decillion', 'decillioner'],
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
        'AED' => [['emiratisk dirham'], ['fils']],
        'ALL' => [['albansk lek', 'albanske lek'], ['qindarka']],
        'AUD' => [['australsk dollar', 'australske dollars'], ['cent']],
        'BAM' => [['bosnisk konvertibel mark', 'bosniske konvertible mark'], ['fening']],
        'BGN' => [['bulgarsk lev', 'bulgarske lev'], ['stotinka']],
        'BRL' => [['brasiliansk real', 'brasilianske real'], ['centavo']],
        'BYR' => [['hviderussisk rubel', 'hviderussiske rubel'], ['kopek']],
        'CAD' => [['canadisk dollar', 'canadisk dollars'], ['cent']],
        'CHF' => [['schweitzer franc'], ['rappen']],
        'CNY' => [['kinesisk yuan', 'kinesiske yuan'], ['fen']],
        'CYP' => [['cypriotisk pund', 'cypriotiske pund'], ['cent']],
        'CZK' => [['tjekkisk koruna'], ['halerz']],
        'DKK' => [['krone', 'kroner'], ['øre']],
        'DZD' => [['algerisk dinar', 'algeriske dinar'], ['santim']],
        'EEK' => [['estisk kroon', 'estiske kroon'], ['sent']],
        'EGP' => [['egyptisk pund', 'egyptiske pund'], ['piastre']],
        'EUR' => [['euro'], ['euro-cent']],
        'GBP' => [['pund'], ['pence']],
        'HKD' => [['Hong Kong dollar', 'Hong Kong dollars'], ['cent']],
        'HRK' => [['kroatisk kuna', 'kroatiske kuna'], ['lipa']],
        'HUF' => [['ungarsk forint', 'ungarske forint'], ['filler']],
        'IDR' => [['indonesisk rupiah', 'indonesiske rupiah'], ['sen']],
        'ILS' => [['israelsk shekel', 'israelske shekel'], ['agora']],
        'ISK' => [['islandsk krone', 'islandske kroner'], ['eyrir']],
        'JPY' => [['yen'], ['sen']],
        'LTL' => [['litauisk litas', 'litauiske litas'], ['sent']],
        'LVL' => [['lettisk lats', 'lettiske lats'], ['santim']],
        'LYD' => [['libysk dinar', 'libyske dinar'], ['dirham']],
        'MAD' => [['marokkansk dirham', 'marokkanske dirham'], ['santim']],
        'MKD' => [['makedonsk denar', 'makedonske denar'], ['deni']],
        'MXN' => [['mexicansk peso', 'mexicanske pesos'], ['centavo']],
        'MRO' => [['mauritansk ouguiya', 'mauritanske ouguiya'], ['khoums']],
        'MTL' => [['maltesisk lira', 'maltesiske lira'], ['sent']],
        'MYR' => [['malaysisk ringgit', 'malaysiske ringgit'], ['sen']],
        'NGN' => [['nigeriansk naira', 'nigerianske naira'], ['kobo']],
        'NOK' => [['norsk krone', 'norske kroner'], ['øre']],
        'PHP' => [['filippinsk peso', 'filippinske peso'], ['sentavo']],
        'PLN' => [['zloty', 'zlotys'], ['grosz']],
        'RON' => [['rumænsk leu', 'rumænske leu'], ['ban']],
        'RUB' => [['russisk rubel', 'russiske rubel'], ['kopek']],
        'SAR' => [['saudiarabisk riyal', 'saudiarabiske riyal'], ['halala']],
        'SEK' => [['svensk krone', 'svenske kroner'], ['öre']],
        'SIT' => [['slovensk tolar', 'slovenske tolar'], ['stotin']],
        'SKK' => [['slovakisk krone', 'slovakiske kroner'], ['haler']],
        'TMT' => [['turkmensk manat', 'turkmenske manat'], ['tenge']],
        'TND' => [['tunesisk dinar', 'tunesiske dinar'], ['millim']],
        'TRL' => [['tyrkisk lira', 'tyrkiske lira'], ['kuruş']],
        'TRY' => [['tyrkisk lira', 'tyrkiske lira'], ['kuruş']],
        'UAH' => [['ukrainsk hryvnia', 'ukrainske hryvnia'], ['kopek']],
        'USD' => [['dollar', 'dollars'], ['cent']],
        'UZS' => [['usbekisk som', 'usbekiske som'], ['tiyin']],
        'XAF' => [['CFA franc'], ['santim']],
        'XOF' => [['CFA franc'], ['santim']],
        'XPF' => [['CFP franc'], ['santim']],
        'YUM' => [['jugoslavisk dinar', 'jugoslaviske dinar'], ['para']],
        'ZAR' => [['sydafrikansk rand', 'sydafrikanske rand'], ['sent']],
    ];

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

        if (strlen($number) > 3 && ($number < 1100 || $number >= 2000)) {
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

        $ts = $h = $t = $d = 0;

        switch (strlen($number)) {
            case 4:
                $ts = (int) substr($number, -4, 2);
                goto lbl_2;

            case 3:
                $h = (int) substr($number, -3, 1);

            lbl_2:
            case 2:
                $t = (int) substr($number, -2, 1);

            case 1:
                $d = (int) substr($number, -1, 1);
                break;

            case 0:
                return;
                break;
        }

        if ($ts) {
            $return .= $this->toWords($ts) . $this->wordSeparator . 'hundrede';
        } elseif ($h) {
            if ($h == 1) {
                $return .= $this->wordSeparator . 'et' . $this->wordSeparator . 'hundrede';
            } else {
                $return .= $this->wordSeparator . self::$digits[$h] . $this->wordSeparator . 'hundrede';
            }
        } elseif ((isset($maxp)) && ($maxp > 3)) {
            // add 'og' in the case where there are preceding thousands but not hundreds or tens,
            // so fx. 80001 becomes 'firs tusinde og en' instead of 'firs tusinde en'
            $return .= $this->wordSeparator . 'og';
        }


        if ($t != 1 && $d > 0) {
            $return .= $this->wordSeparator . (($d == 1 & $power == 3 && $t == 0 && $h == 0) ? "et" :
                    self::$digits[$d]) . ($t > 1 ? $this->wordSeparator . "og" : "");
        }

        // ten, twenty etc.
        switch ($t) {
            case 9:
                $return .= $this->wordSeparator . 'halvfems';
                break;

            case 8:
                $return .= $this->wordSeparator . 'firs';
                break;

            case 7:
                $return .= $this->wordSeparator . 'halvfjerds';
                break;

            case 6:
                $return .= $this->wordSeparator . 'tres';
                break;

            case 5:
                $return .= $this->wordSeparator . 'halvtreds';
                break;

            case 4:
                $return .= $this->wordSeparator . 'fyrre';
                break;

            case 3:
                $return .= $this->wordSeparator . 'tredive';
                break;

            case 2:
                $return .= $this->wordSeparator . 'tyve';
                break;

            case 1:
                switch ($d) {
                    case 0:
                        $return .= $this->wordSeparator . 'ti';
                        break;

                    case 1:
                        $return .= $this->wordSeparator . 'elleve';
                        break;

                    case 2:
                        $return .= $this->wordSeparator . 'tolv';
                        break;

                    case 3:
                        $return .= $this->wordSeparator . 'tretten';
                        break;

                    case 4:
                        $return .= $this->wordSeparator . 'fjorten';
                        break;

                    case 5:
                        $return .= $this->wordSeparator . 'femten';
                        break;

                    case 6:
                        $return .= $this->wordSeparator . 'seksten';
                        break;

                    case 7:
                        $return .= $this->wordSeparator . 'sytten';
                        break;

                    case 8:
                        $return .= $this->wordSeparator . 'atten';
                        break;

                    case 9:
                        $return .= $this->wordSeparator . 'nitten';
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
                $return .= $this->wordSeparator . $lev[0];
            } else {
                $return .= $this->wordSeparator . $lev[1];
            }
        }

        return $return;
    }

    /**
     * @param string $currency
     * @param int $decimal
     * @param int $fraction
     *
     * @return string
     * @throws NumberToWordsException
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
