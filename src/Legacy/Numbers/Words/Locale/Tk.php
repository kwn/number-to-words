<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Tk extends Words
{
    const LOCALE               = 'tk';
    const LANGUAGE_NAME        = 'Turkmen';
    const LANGUAGE_NAME_NATIVE = 'Türkmen';

    private $minus = 'minus';

    protected $zero = 'nol';

    protected static $ten = ['', 'bir', 'iki', 'üç', 'dört', 'bäş', 'alty', 'ýedi', 'sekiz', 'dokuz'];

    protected static $tens = [
        1 => 'on',
        'ýigrimi',
        'otuz',
        'kyrk',
        'elli',
        'altmyş',
        'ýetmiş',
        'segsen',
        'togsan',
    ];

    protected static $mega = [
        '',
        '',
        'müň',
        'million',
        'milliard',
        'trillion',
        'kwadrillion',
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
    protected function toWords($number)
    {
        if ($number === 0) {
            return $this->zero;
        }

        $out = [];

        if ($number < 0) {
            $out[] = static::MINUS;
            $number *= -1;
        }

        $megaSize = count(static::$mega);
        $signs = $megaSize * 3;

        // $signs equal quantity of zeros of the biggest number in self::$mega
        // + 3 additional sign (point and two zero)
        list ($unit, $subunit) = explode('.', sprintf("%{$signs}.2f", (float) $number));

        foreach (str_split($unit, 3) as $megaKey => $value) {
            if (!(int) $value) {
                continue;
            }

            // $megaKey = $megaSize - $megaKey - 1;
            // $gender = static::$mega[$megaKey][3];
            list ($i1, $i2, $i3) = array_map('intval', str_split($value, 1));
            // mega-logic
            $out[] = static::$ten[$i1] . ' ýüz'; # 1xx-9xx
            
            // tens
            $out[] = static::$tens[$i2];

            // ones
            $out[] = static::$ten[$i2];

            if ($megaKey > 1) {
                $out[] = static::$mega[$megaKey];
            }
        }

        return trim(preg_replace('/\s+/', ' ', implode(' ', $out)));
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
