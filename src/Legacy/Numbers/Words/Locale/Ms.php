<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;

class Ms extends Words
{
    const LOCALE = 'ms';
    const LANGUAGE_NAME = 'Malay Language';
    const LANGUAGE_NAME_NATIVE = 'Bahasa Melayu';

    private $minus = 'negatif';

    private static $exponent = [
        0 => [''],
        3 => ['ribu'],
        6 => ['juta'],
        9 => ['bilion'],
        12 => ['trilion'],
        24 => ['quadrillion'],
        30 => ['quintillion'],
        36 => ['sextillion'],
        42 => ['septillion'],
        48 => ['octillion'],
        54 => ['nonillion'],
        60 => ['decillion'],
        66 => ['undecillion'],
    ];

    private static $digits = [
        'kosong',
        'satu',
        'dua',
        'tiga',
        'empat',
        'lima',
        'enam',
        'tujuh',
        'lapan',
        'sembilan'
    ];

    private $wordSeparator = ' ';

    public static $currencyNames = [
        'ALL' => [['lek'], ['qindarka']],
        'AUD' => [['dolar Australia'], ['sen']],
        'BAM' => [['convertible marka'], ['fenig']],
        'BGN' => [['lev'], ['stotinka']],
        'BRL' => [['real'], ['senavos']],
        'BYR' => [['Belarus rouble'], ['kopiejka']],
        'CAD' => [['dolar Kanada'], ['sen']],
        'CHF' => [['Swiss franc'], ['rapp']],
        'CYP' => [['Cypriot pound'], ['sen']],
        'CZK' => [['Czech koruna'], ['halerz']],
        'DKK' => [['Danish krone'], ['ore']],
        'DZD' => [['dinar'], ['sen']],
        'EEK' => [['kroon'], ['senti']],
        'EUR' => [['euro'], ['sen euro']],
        'GBP' => [['pound', 'pounds'], ['pence', 'pence']],
        'HKD' => [['dolar Hong Kong'], ['sen']],
        'HRK' => [['Croatian kuna'], ['lipa']],
        'HUF' => [['forint'], ['filler']],
        'IDR' => [['rupiah'], ['sen']],
        'ILS' => [['new sheqel', 'new sheqels'], ['agora', 'agorot']],
        'ISK' => [['Icelandic króna'], ['aurar']],
        'JPY' => [['yen'], ['sen']],
        'LTL' => [['litas'], ['sen']],
        'LVL' => [['lat'], ['sentim']],
        'LYD' => [['dinar'], ['sen']],
        'MAD' => [['dirham'], ['sen']],
        'MKD' => [['dinar Macedonia'], ['deni']],
        'MRO' => [['ouguiya'], ['khoums']],
        'MTL' => [['Maltese lira'], ['senym']],
        'MYR' => [['ringgit'], ['sen']],
        'NGN' => [['Naira'], ['kobo']],
        'NOK' => [['Norwegian krone'], ['oere']],
        'PHP' => [['peso'], ['senavo']],
        'PLN' => [['zloty'], ['grosz']],
        'ROL' => [['Romanian leu'], ['bani']],
        'RUB' => [['Russian Federation rouble'], ['kopiejka']],
        'SEK' => [['Swedish krona'], ['oere']],
        'SIT' => [['Tolar'], ['stotinia']],
        'SKK' => [['Slovak koruna'], []],
        'TMT' => [['manat'], ['tenge']],
        'TND' => [['dinar'], ['millim']],
        'TRL' => [['lira'], ['kuruş']],
        'TRY' => [['lira'], ['kuruş']],
        'UAH' => [['hryvna'], ['sen']],
        'USD' => [['dolar'], ['sen']],
        'XAF' => [['franc CFA'], ['sen']],
        'XOF' => [['franc CFA'], ['sen']],
        'XPF' => [['franc CFP'], ['sen']],
        'YUM' => [['dinar'], ['para']],
        'ZAR' => [['rand'], ['sen']],
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

    /**
     * @param int $currency
     * @param int $decimal
     * @param null $fraction
     *
     * @return string
     */
    public function toCurrencyWords($currency, $decimal, $fraction = null)
    {
        $currency = strtoupper($currency);

        if (!array_key_exists($currency, static::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf(
                    'Currency "%s" is not available for "%s" language',
                    $currency,
                    get_class($this)
                )
            );
        }

        $actual = $this->toWords($decimal);

        $word = $actual . " " . self::$currencyNames[$currency][0][0];

        if ($fraction) {
            $decimal = $this->toWords($fraction);
            $word .= $decimal . " " . self::$currencyNames[$currency][1][0];
        }

        return $word;
    }
}
