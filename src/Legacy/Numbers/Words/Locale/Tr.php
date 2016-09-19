<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Tr extends Words
{
    const LOCALE               = 'tr';
    const LANGUAGE_NAME        = 'Turkish';
    const LANGUAGE_NAME_NATIVE = 'Türkçe';

    private $minus = 'eksi';

    private static $exponent = [
        0  => [''],
        3  => ['bin'],
        6  => ['milyon'],
        12 => ['milyar'],
        18 => ['trilyon'],
        24 => ['katrilyon'],
    ];

    protected static $digits = [
        'sıfır',
        'bir',
        'iki',
        'üç',
        'dört',
        'beş',
        'altı',
        'yedi',
        'sekiz',
        'dokuz'
    ];

    private $wordSeparator = ' ';

    private static $currencyNames = [
        'ALL' => [['lek'], ['qindarka']],
        'AUD' => [['Avusturalya doları'], ['sent']],
        'BAM' => [['convertible marka'], ['fenig']],
        'BGN' => [['Bulgar levası'], ['stotinka', 'stotinki']],
        'BRL' => [['real'], ['centavos']],
        'BWP' => [['Botswana pulası'], ['thebe']],
        'BYR' => [['Belarus rublesi'], ['kopiejka']],
        'CAD' => [['Kanada doları'], ['sent']],
        'CHF' => [['İsveç frankı'], ['rapp']],
        'CNY' => [['Çin yuanı'], ['fen']],
        'CYP' => [['Kıbrıs pound\'u'], ['sent']],
        'CZK' => [['Çek kronu'], ['halerz']],
        'DKK' => [['Danmarka kronu'], ['ore']],
        'EEK' => [['kroon'], ['senti']],
        'EUR' => [['Avro'], ['Avro-sent']],
        'GBP' => [['pound', 'pound'], ['pence', 'pence']],
        'HKD' => [['Hong Kong doları'], ['sent']],
        'HRK' => [['Hırvatistan kunası'], ['lipa']],
        'HUF' => [['Macar forinti'], ['filler']],
        'ILS' => [['yeni sheqel', 'yeni sheqels'], ['agora', 'agorot']],
        'ISK' => [['Izlanda kronu'], ['aurar']],
        'JPY' => [['Japon yeni'], ['sen']],
        'LTL' => [['Litvanya litası'], ['sent']],
        'LVL' => [['Letonya latı'], ['sentim']],
        'MKD' => [['Makedonya dinarı'], ['deni']],
        'MTL' => [['Malta lirası'], ['centym']],
        'NOK' => [['Norveç kronu'], ['oere']],
        'PLN' => [['zloty', 'zlotys'], ['grosz']],
        'ROL' => [['Romanya leu'], ['bani']],
        'RUB' => [['Ruble'], ['kopiejka']],
        'SEK' => [['İsveç kronu'], ['oere']],
        'SIT' => [['Tolar'], ['stotinia']],
        'SKK' => [['Slovakya kronu'], []],
        'TRY' => [['Türk Lirası'], ['kuruş']],
        'UAH' => [['Ukrayna hryvnyası'], ['kopiyka']],
        'USD' => [['ABD Doları'], ['sent']],
        'YUM' => [['dinar'], ['para']],
        'ZAR' => [['Güney Afrika randı'], ['sent']]
    ];

    /**
     * @param int $num
     * @param int $power
     *
     * @return string
     */
    protected function toWords($num, $power = 0)
    {
        // The return string;
        $ret = '';

        // add a the word for the minus sign if necessary
        if (substr($num, 0, 1) == '-') {
            $ret = $this->wordSeparator . $this->minus;
            $num = substr($num, 1);
        }


        // strip excessive zero signs
        $num = preg_replace('/^0+/', '', $num);

        if (strlen($num) > 6) {
            $current_power = 6;
            // check for highest power
            if (isset(self::$exponent[$power])) {
                // convert the number above the first 6 digits
                // with it's corresponding $power.
                $snum = substr($num, 0, -6);
                $snum = preg_replace('/^0+/', '', $snum);
                if ($snum !== '') {
                    $ret .= $this->toWords($snum, $power + 6);
                }
            }
            $num = substr($num, -6);
            if ($num == 0) {
                return $ret;
            }
        } elseif ($num == 0 || $num == '') {
            return (' ' . self::$digits[0] . ' ');
            $current_power = strlen($num);
        } else {
            $current_power = strlen($num);
        }

        // See if we need "thousands"
        $thousands = floor($num / 1000);
        if ($thousands == 1) {
            $ret .= $this->wordSeparator . 'bin' . $this->wordSeparator;
        } elseif ($thousands > 1) {
            $ret .= $this->toWords($thousands, 3) . $this->wordSeparator;//. 'mil' . $this->wordSeparator;
        }

        // values for digits, tens and hundreds
        $h = floor(($num / 100) % 10);
        $t = floor(($num / 10) % 10);
        $d = floor($num % 10);

        if ($h) {
            $ret .= $this->wordSeparator . self::$digits[$h] . $this->wordSeparator . 'yüz';

            // in English only - add ' and' for [1-9]01..[1-9]99
            // (also for 1001..1099, 10001..10099 but it is harder)
            // for now it is switched off, maybe some language purists
            // can force me to enable it, or to remove it completely
            // if (($t + $d) > 0)
            //   $ret .= $this->wordSeparator . 'and';
        }

        // decine: venti trenta, etc...
        switch ($t) {
            case 9:
                $ret .= $this->wordSeparator . 'doksan';
                break;

            case 8:
                $ret .= $this->wordSeparator . 'seksen';
                break;

            case 7:
                $ret .= $this->wordSeparator . 'yetmiş';
                break;

            case 6:
                $ret .= $this->wordSeparator . 'altmış';
                break;

            case 5:
                $ret .= $this->wordSeparator . 'elli';
                break;

            case 4:
                $ret .= $this->wordSeparator . 'kırk';
                break;

            case 3:
                $ret .= $this->wordSeparator . 'otuz';
                break;

            case 2:
                $ret .= $this->wordSeparator . 'yirmi';
                break;

            case 2:
                $ret .= $this->wordSeparator . 'on';
                break;

                break;
        }

        if ($t > 1 && $d > 0) {
            $ret .= $this->wordSeparator . self::$digits[$d];
        }

        if ($power > 0) {
            if (isset(self::$exponent[$power])) {
                $lev = self::$exponent[$power];
            }

            if (!isset($lev) || !is_array($lev)) {
                return null;
            }

            $suffix = $lev[0];
            if ($num != 0) {
                $ret .= $this->wordSeparator . $suffix;
            }
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

        $curr_names = self::$currencyNames[$currency];
        $ret = trim($this->toWords($decimal));
        $lev = ($decimal == 1) ? 0 : 1;
        if ($lev > 0) {
            if (count($curr_names[0]) > 1) {
                $ret .= $this->wordSeparator . $curr_names[0][$lev];
            } else {
                $ret .= $this->wordSeparator . $curr_names[0][0];
            }
        } else {
            $ret .= $this->wordSeparator . $curr_names[0][0];
        }

        if ($fraction !== null) {
            if ($convertFraction) {
                $ret .= $this->wordSeparator . trim($this->toWords($fraction));
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
