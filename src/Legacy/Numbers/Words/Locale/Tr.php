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
        '',
        'bin',
        'milyon',
        'milyar',
        'trilyon',
        'katrilyon',
        'kuintrilyon',
        'seksilyon',
        'septrilyon',
        'oktrilyon',
        'nanilyon',
        'desilyon',
        'andesilyon',
        'dudesilyon',
        'tredesilyon',
        'kattırdesilyon',
        'kuindesilyon',
        'seksdesilyon',
        'septendesilyon',
        'oktadesilyon',
        'novemdesilyon',
        'vijintilyon'
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

    protected static $digits_second = [
        '',
        'on',
        'yirmi',
        'otuz',
        'kırk',
        'elli',
        'altmış',
        'yetmiş',
        'seksen',
        'doksan',
        'yüz'
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
    protected function toWords($num)
    {
        $ret = '';
        $num = strval($num);

        if ((int)$num === 0) {
            return self::$digits[0];
        }

        if (substr($num, 0, 1) == '-') {
            $ret = $this->minus . $this->wordSeparator;
            $num = substr($num, 1);
        }

        $num = preg_replace('/^0+/', '', $num);
        $num_length = strlen($num);

        if ($num_length % 3 !== 0) {
            $num = str_pad($num, $num_length + (3-($num_length%3)), '0', STR_PAD_LEFT);
        }

        $groups = str_split($num, 3);
        $g_index = count($groups) - 1;
        foreach ($groups as $i => $g) {

            if ((int)$g[0] > 1)
                $ret .= self::$digits[$g[0]] . $this->wordSeparator;

            if ((int)$g[0] > 0)
                $ret .= "yüz" . $this->wordSeparator;

            if ((int)$g[1] > 0)
                $ret .= self::$digits_second[$g[1]] . $this->wordSeparator;

            if ((int)$g[2] > 0 && (($num_length === 4 && $i === 0 && (int)$g[2] <= 1) === false))
                $ret .= self::$digits[$g[2]] . $this->wordSeparator;

            if ((int)$g > 0)
                $ret .= self::$exponent[$g_index] . $this->wordSeparator;

            $g_index--;
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
