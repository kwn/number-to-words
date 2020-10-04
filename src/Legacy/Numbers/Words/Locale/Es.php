<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;
use NumberToWords\Exception\NumberToWordsException;

class Es extends Words
{
    const LOCALE               = 'es';
    const LANGUAGE_NAME        = 'Spanish';
    const LANGUAGE_NAME_NATIVE = 'Español';

    private $minus = 'menos';

    private static $exponent = [
        0  => ['', ''],
        3  => ['mil', 'mil'],
        6  => ['millón', 'millones'],
        12 => ['billón', 'billones'],
        18 => ['trilón', 'trillones'],
        24 => ['cuatrillón', 'cuatrillones'],
        30 => ['quintillón', 'quintillones'],
        36 => ['sextillón', 'sextillones'],
        42 => ['septillón', 'septillones'],
        48 => ['octallón', 'octallones'],
        54 => ['nonallón', 'nonallones'],
        60 => ['decallón', 'decallones'],
    ];

    private static $digits = [
        'cero',
        'uno',
        'dos',
        'tres',
        'cuatro',
        'cinco',
        'seis',
        'siete',
        'ocho',
        'nueve'
    ];

    private $wordSeparator = ' ';

    private static $currencyNames = [
        'PEN' => [['sol', 'soles'], ['centavo']],
        'ALL' => [['lek'], ['qindarka']],
        'AUD' => [['dólar australiano', 'dólares australianos'], ['centavo']],
        'ARS' => [['peso'], ['centavo']],
        'BAM' => [['convertible marka'], ['fenig']],
        'BGN' => [['lev'], ['stotinka']],
        'BRL' => [['real', 'reales'], ['centavo']],
        'BYR' => [['rublo bielorruso', 'rublos bielorrusos'], ['kopek', 'kopeks']],
        'CAD' => [['dólar canadiense', 'dólares canadienses'], ['centavo']],
        'CHF' => [['swiss franc'], ['rapp']],
        'CYP' => [['cypriot pound'], ['cent']],
        'CZK' => [['czech koruna'], ['halerz']],
        'CRC' => [['colón', 'colones'], ['centavo']],
        'DZD' => [['dinar', 'dinares'], ['céntimo']],
        'DKK' => [['danish krone'], ['ore']],
        'DOP' => [['peso dominicano', 'pesos dominicanos'], ['centavo', 'centavos']],
        'EEK' => [['kroon'], ['senti']],
        'EUR' => [['euro'], ['centavo']],
        'GBP' => [['libra'], ['peñique']],
        'HKD' => [['dólar de hong kong', 'dólares de hong kong'], ['centavo']],
        'HRK' => [['croatian kuna'], ['lipa']],
        'HUF' => [['forint'], ['filler']],
        'ILS' => [['new sheqel', 'new sheqels'], ['agora', 'agorot']],
        'ISK' => [['icelandic króna'], ['aurar']],
        'JPY' => [['yen', 'yenes'], ['sen']],
        'LTL' => [['litas'], ['cent']],
        'LVL' => [['lat'], ['sentim']],
        'LYD' => [['dinar', 'dinares'], ['céntimo']],
        'MAD' => [['dírham'], ['céntimo']],
        'MKD' => [['denar macedonio', 'denares macedonios'], ['deni']],
        'MRO' => [['ouguiya'], ['khoums']],
        'MTL' => [['lira maltesa'], ['céntimo']],
        'MXN' => [['peso'], ['centavo']],
        'NOK' => [['norwegian krone'], ['oere']],
        'PLN' => [['zloty', 'zlotys'], ['grosz']],
        'ROL' => [['romanian leu'], ['bani']],
        'RUB' => [['rublo ruso', 'rublos rusos'], ['kopek']],
        'SEK' => [['Swedish krona'], ['oere']],
        'SIT' => [['tolar'], ['stotinia']],
        'SKK' => [['slovak koruna'], []],
        'TND' => [['dinar', 'dinares'], ['céntimo']],
        'TRL' => [['lira'], ['kuruþ']],
        'UAH' => [['hryvna'], ['cent']],
        'USD' => [['dólar', 'dólares'], ['centavo']],
        'UYU' => [['peso uruguayo', 'pesos uruguayos'], ['centavo']],
        'VEB' => [['bolívar', 'bolívares'], ['céntimo']],
        'XAF' => [['franco CFA', 'francos CFA'], ['céntimo']],
        'XOF' => [['franco CFA', 'francos CFA'], ['céntimo']],
        'YUM' => [['dinar', 'dinares'], ['para']],
        'ZAR' => [['rand'], ['cent']]
    ];

    /**
     * @param int $number
     * @param int $power
     *
     * @return string
     */
    protected function toWords($number, $power = 0)
    {
        $ret = '';

        if ($number === 0) {
            return self::$digits[0];
        }

        if ($number < 0) {
            $ret = $this->minus;
            $number *= -1;
        }

        if (strlen($number) > 6) {
            // check for highest power
            if (isset(self::$exponent[$power])) {
                // convert the number above the first 6 digits
                // with it's corresponding $power.
                $snum = substr($number, 0, -6);
                $snum = preg_replace('/^0+/', '', $snum);
                if ($snum !== '') {
                    $ret .= $this->toWords($snum, $power + 6);
                }
            }
            $number = substr($number, -6);
        }

        // See if we need "thousands"
        $thousands = floor($number / 1000);
        if ($thousands == 1) {
            $ret .= $this->wordSeparator . 'mil';
        } elseif ($thousands > 1) {
            $ret .= $this->toWords($thousands, 3);
        }

        $d = $number % 10;
        $t = (int) ($number / 10) % 10;
        $h = (int) ($number / 100) % 10;

        // cientos: doscientos, trescientos, etc...
        switch ($h) {
            case 1:
                if (($d == 0) and ($t == 0)) { // is it's '100' use 'cien'
                    $ret .= $this->wordSeparator . 'cien';
                } else {
                    $ret .= $this->wordSeparator . 'ciento';
                }
                break;
            case 2:
            case 3:
            case 4:
            case 6:
            case 8:
                $ret .= $this->wordSeparator . self::$digits[$h] . 'cientos';
                break;
            case 5:
                $ret .= $this->wordSeparator . 'quinientos';
                break;
            case 7:
                $ret .= $this->wordSeparator . 'setecientos';
                break;
            case 9:
                $ret .= $this->wordSeparator . 'novecientos';
                break;
        }

        // decenas: veinte, treinta, etc...
        switch ($t) {
            case 9:
                $ret .= $this->wordSeparator . 'noventa';
                break;

            case 8:
                $ret .= $this->wordSeparator . 'ochenta';
                break;

            case 7:
                $ret .= $this->wordSeparator . 'setenta';
                break;

            case 6:
                $ret .= $this->wordSeparator . 'sesenta';
                break;

            case 5:
                $ret .= $this->wordSeparator . 'cincuenta';
                break;

            case 4:
                $ret .= $this->wordSeparator . 'cuarenta';
                break;

            case 3:
                $ret .= $this->wordSeparator . 'treinta';
                break;

            case 2:
                if ($d == 0) {
                    $ret .= $this->wordSeparator . 'veinte';
                } else {
                    if (($power > 0) and ($d == 1)) {
                        $ret .= $this->wordSeparator . 'veintiún';
                    } else {
                        $ret .= $this->wordSeparator . 'veinti' . self::$digits[$d];
                    }
                }
                break;

            case 1:
                switch ($d) {
                    case 0:
                        $ret .= $this->wordSeparator . 'diez';
                        break;

                    case 1:
                        $ret .= $this->wordSeparator . 'once';
                        break;

                    case 2:
                        $ret .= $this->wordSeparator . 'doce';
                        break;

                    case 3:
                        $ret .= $this->wordSeparator . 'trece';
                        break;

                    case 4:
                        $ret .= $this->wordSeparator . 'catorce';
                        break;

                    case 5:
                        $ret .= $this->wordSeparator . 'quince';
                        break;

                    case 6:
                    case 7:
                    case 9:
                    case 8:
                        $ret .= $this->wordSeparator . 'dieci' . self::$digits[$d];
                        break;
                }
                break;
        }

        // add digits only if it is a multiple of 10 and not 1x or 2x
        if (($t != 1) and ($t != 2) and ($d > 0)) {
            // don't add 'y' for numbers below 10
            if ($t != 0) {
                // use 'un' instead of 'uno' when there is a suffix ('mil', 'millones', etc...)
                if (($power > 0) and ($d == 1)) {
                    $ret .= $this->wordSeparator . ' y un';
                } else {
                    $ret .= $this->wordSeparator . 'y ' . self::$digits[$d];
                }
            } else {
                if (($power > 0) and ($d == 1)) {
                    $ret .= $this->wordSeparator . 'un';
                } else {
                    $ret .= $this->wordSeparator . self::$digits[$d];
                }
            }
        }

        if ($power > 0) {
            if (isset(self::$exponent[$power])) {
                $lev = self::$exponent[$power];
            }

            if (!isset($lev) || !is_array($lev)) {
                return null;
            }

            // if it's only one use the singular suffix
            if ($d == 1 && $t == 0 && $h == 0) {
                $suffix = $lev[0];
            } else {
                $suffix = $lev[1];
            }

            if ($number != 0) {
                $ret .= $this->wordSeparator . $suffix;
            }
        }

        return $ret;
    }

    /**
     * @param int  $currency
     * @param int  $decimal
     * @param null $fraction
     *
     * @return string
     */
    public function toCurrencyWords($currency, $decimal, $fraction = null)
    {
        $currency = strtoupper($currency);

        if (!array_key_exists($currency, static::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = static::$currencyNames[$currency];

        $level = ($decimal == 1) ? 0 : 1;

        if ($level > 0) {
            $currencyNames = self::$currencyNames[$currency];
            if (count($currencyNames[0]) > 1) {
                $ret = $currencyNames[0][$level];
            } else {
                $ret = $currencyNames[0][0] . 's';
            }
        } else {
            $ret = $currencyNames[0][0];
        }

        $ret = $this->wordSeparator . trim($this->toWords($decimal) . ' ' . $ret);

        if (null !== $fraction) {
            $ret .= $this->wordSeparator . 'con' . $this->wordSeparator . trim($this->toWords($fraction));

            $level = ($fraction == 1) ? 0 : 1;

            if ($level > 0) {
                if (count($currencyNames[1]) > 1) {
                    $ret .= $this->wordSeparator . $currencyNames[1][$level];
                } else {
                    $ret .= $this->wordSeparator . $currencyNames[1][0] . 's';
                }
            } else {
                $ret .= $this->wordSeparator . $currencyNames[1][0];
            }
        }

        return $ret;
    }
}
