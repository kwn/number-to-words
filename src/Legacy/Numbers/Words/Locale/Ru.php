<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Ru extends Words
{
    const LOCALE = 'ru';
    const LANGUAGE_NAME = 'Russian';
    const LANGUAGE_NAME_NATIVE = 'Русский';
    const MINUS = 'минус';

    protected static $exponent = [
        0   => '',
        6   => 'миллион',
        9   => 'миллиард',
        12  => 'триллион',
        15  => 'квадриллион',
        18  => 'квинтиллион',
        21  => 'секстиллион',
        24  => 'септиллион',
        27  => 'октиллион',
        30  => 'нониллион',
        33  => 'дециллион',
        36  => 'ундециллион',
        39  => 'дуодециллион',
        42  => 'тредециллион',
        45  => 'кватуордециллион',
        48  => 'квиндециллион',
        51  => 'сексдециллион',
        54  => 'септендециллион',
        57  => 'октодециллион',
        60  => 'новемдециллион',
        63  => 'вигинтиллион',
        66  => 'унвигинтиллион',
        69  => 'дуовигинтиллион',
        72  => 'тревигинтиллион',
        75  => 'кватуорвигинтиллион',
        78  => 'квинвигинтиллион',
        81  => 'сексвигинтиллион',
        84  => 'септенвигинтиллион',
        87  => 'октовигинтиллион',
        90  => 'новемвигинтиллион',
        93  => 'тригинтиллион',
        96  => 'унтригинтиллион',
        99  => 'дуотригинтиллион',
        102 => 'третригинтиллион',
        105 => 'кватортригинтиллион',
        108 => 'квинтригинтиллион',
        111 => 'секстригинтиллион',
        114 => 'септентригинтиллион',
        117 => 'октотригинтиллион',
        120 => 'новемтригинтиллион',
        123 => 'квадрагинтиллион',
        126 => 'унквадрагинтиллион',
        129 => 'дуоквадрагинтиллион',
        132 => 'треквадрагинтиллион',
        135 => 'кваторквадрагинтиллион',
        138 => 'квинквадрагинтиллион',
        141 => 'сексквадрагинтиллион',
        144 => 'септенквадрагинтиллион',
        147 => 'октоквадрагинтиллион',
        150 => 'новемквадрагинтиллион',
        153 => 'квинквагинтиллион',
        156 => 'унквинкагинтиллион',
        159 => 'дуоквинкагинтиллион',
    ];

    protected static $teens = [
        11 => 'одиннадцать',
        12 => 'двенадцать',
        13 => 'тринадцать',
        14 => 'четырнадцать',
        15 => 'пятнадцать',
        16 => 'шестнадцать',
        17 => 'семнадцать',
        18 => 'восемнадцать',
        19 => 'девятнадцать'
    ];

    protected static $tens = [
        2 => 'двадцать',
        3 => 'тридцать',
        4 => 'сорок',
        5 => 'пятьдесят',
        6 => 'шестьдесят',
        7 => 'семьдесят',
        8 => 'восемьдесят',
        9 => 'девяносто'
    ];

    protected static $hundreds = [
        1 => 'сто',
        2 => 'двести',
        3 => 'триста',
        4 => 'четыреста',
        5 => 'пятьсот',
        6 => 'шестьсот',
        7 => 'семьсот',
        8 => 'восемьсот',
        9 => 'девятьсот'
    ];

    protected static $digits = [
        ['ноль', 'одно', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'],
        ['ноль', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'],
        ['ноль', 'одна', 'две', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять']
    ];

    protected $wordSeparator = ' ';

    protected static $currencyNames = [
        'ALL' => [
            [1, 'лек', 'лека', 'леков'],
            [2, 'киндарка', 'киндарки', 'киндарок']
        ],
        'AUD' => [
            [1, 'австралийский доллар', 'австралийских доллара', 'австралийских долларов'],
            [1, 'цент', 'цента', 'центов']
        ],
        'BGN' => [
            [1, 'лев', 'лева', 'левов'],
            [2, 'стотинка', 'стотинки', 'стотинок']
        ],
        'BRL' => [
            [1, 'бразильский реал', 'бразильских реала', 'бразильских реалов'],
            [1, 'сентаво', 'сентаво', 'сентаво']
        ],
        'BYR' => [
            [1, 'белорусский рубль', 'белорусских рубля', 'белорусских рублей'],
            [2, 'копейка', 'копейки', 'копеек']
        ],
        'CAD' => [
            [1, 'канадский доллар', 'канадских доллара', 'канадских долларов'],
            [1, 'цент', 'цента', 'центов']
        ],
        'CHF' => [
            [1, 'швейцарский франк', 'швейцарских франка', 'швейцарских франков'],
            [1, 'сантим', 'сантима', 'сантимов']
        ],
        'CYP' => [
            [1, 'кипрский фунт', 'кипрских фунта', 'кипрских фунтов'],
            [1, 'цент', 'цента', 'центов']
        ],
        'CZK' => [
            [2, 'чешская крона', 'чешских кроны', 'чешских крон'],
            [1, 'галирж', 'галиржа', 'галиржей']
        ],
        'DKK' => [
            [2, 'датская крона', 'датских кроны', 'датских крон'],
            [1, 'эре', 'эре', 'эре']
        ],
        'EEK' => [
            [2, 'эстонская крона', 'эстонских кроны', 'эстонских крон'],
            [1, 'сенти', 'сенти', 'сенти']
        ],
        'EUR' => [
            [1, 'евро', 'евро', 'евро'],
            [1, 'евроцент', 'евроцента', 'евроцентов']
        ],
        'GBP' => [
            [1, 'фунт стерлингов', 'фунта стерлингов', 'фунтов стерлингов'],
            [1, 'пенс', 'пенса', 'пенсов']
        ],
        'HKD' => [
            [1, 'гонконгский доллар', 'гонконгских доллара', 'гонконгских долларов'],
            [1, 'цент', 'цента', 'центов']
        ],
        'HRK' => [
            [2, 'хорватская куна', 'хорватских куны', 'хорватских кун'],
            [2, 'липа', 'липы', 'лип']
        ],
        'HUF' => [
            [1, 'венгерский форинт', 'венгерских форинта', 'венгерских форинтов'],
            [1, 'филлер', 'филлера', 'филлеров']
        ],
        'ISK' => [
            [2, 'исландская крона', 'исландских кроны', 'исландских крон'],
            [1, 'эре', 'эре', 'эре']
        ],
        'JPY' => [
            [2, 'иена', 'иены', 'иен'],
            [2, 'сена', 'сены', 'сен']
        ],
        'LTL' => [
            [1, 'лит', 'лита', 'литов'],
            [1, 'цент', 'цента', 'центов']
        ],
        'LVL' => [
            [1, 'лат', 'лата', 'латов'],
            [1, 'сентим', 'сентима', 'сентимов']
        ],
        'MKD' => [
            [1, 'македонский динар', 'македонских динара', 'македонских динаров'],
            [1, 'дени', 'дени', 'дени']
        ],
        'MTL' => [
            [2, 'мальтийская лира', 'мальтийских лиры', 'мальтийских лир'],
            [1, 'сентим', 'сентима', 'сентимов']
        ],
        'NOK' => [
            [2, 'норвежская крона', 'норвежских кроны', 'норвежских крон'],
            [0, 'эре', 'эре', 'эре']
        ],
        'PLN' => [
            [1, 'злотый', 'злотых', 'злотых'],
            [1, 'грош', 'гроша', 'грошей']
        ],
        'ROL' => [
            [1, 'румынский лей', 'румынских лей', 'румынских лей'],
            [1, 'бани', 'бани', 'бани']
        ],
        'RUB' => [
            [1, 'рубль', 'рубля', 'рублей'],
            [2, 'копейка', 'копейки', 'копеек']
        ],
        'RUR' => [
            [1, 'российский рубль', 'российских рубля', 'российских рублей'],
            [2, 'копейка', 'копейки', 'копеек']
        ],
        'SEK' => [
            [2, 'шведская крона', 'шведских кроны', 'шведских крон'],
            [1, 'эре', 'эре', 'эре']
        ],
        'SIT' => [
            [1, 'словенский толар', 'словенских толара', 'словенских толаров'],
            [2, 'стотина', 'стотины', 'стотин']
        ],
        'SKK' => [
            [2, 'словацкая крона', 'словацких кроны', 'словацких крон'],
            [0, '', '', '']
        ],
        'TRL' => [
            [2, 'турецкая лира', 'турецких лиры', 'турецких лир'],
            [1, 'пиастр', 'пиастра', 'пиастров']
        ],
        'UAH' => [
            [2, 'гривна', 'гривны', 'гривен'],
            [1, 'цент', 'цента', 'центов']
        ],
        'USD' => [
            [1, 'доллар США', 'доллара США', 'долларов США'],
            [1, 'цент', 'цента', 'центов']
        ],
        'YUM' => [
            [1, 'югославский динар', 'югославских динара', 'югославских динаров'],
            [1, 'пара', 'пара', 'пара']
        ],
        'ZAR' => [
            [1, 'ранд', 'ранда', 'рандов'],
            [1, 'цент', 'цента', 'центов']
        ]
    ];

    /**
     * @param int   $number
     * @param array $options
     *
     * @return string
     */
    protected function toWords($number, $options = [])
    {
        $dummy = null;
        $gender = 1;

        extract($options, EXTR_IF_EXISTS);

        return $this->toWordsWithCase($number, $dummy, $gender);
    }

    /**
     * @param int $num
     * @param int $case
     * @param int $gender
     *
     * @return string
     */
    protected function toWordsWithCase($num, &$case, $gender = 1)
    {
        $ret = '';
        $case = 3;
        $sign = '';

        if ($num < 0) {
            $sign .= self::MINUS . $this->wordSeparator;
            $num *= -1;
        }

        while (strlen($num) % 3) {
            $num = '0' . $num;
        }

        if ($num == 0) {
            return static::$digits[$gender][0];
        }

        $power = 0;

        while ($power < strlen($num)) {
            if (!$power) {
                $groupgender = $gender;
            } elseif ($power == 3) {
                $groupgender = 2;
            } else {
                $groupgender = 1;
            }

            $group = $this->groupToWords(substr($num, -$power - 3, 3), $groupgender, $_case);
            if (!$power) {
                $case = $_case;
            }

            if ($power == 3) {
                if ($_case == 1) {
                    $group .= $this->wordSeparator . 'тысяча';
                } elseif ($_case == 2) {
                    $group .= $this->wordSeparator . 'тысячи';
                } else {
                    $group .= $this->wordSeparator . 'тысяч';
                }
            } elseif ($group && $power > 3 && isset(static::$exponent[$power])) {
                $group .= $this->wordSeparator . static::$exponent[$power];
                if ($_case == 2) {
                    $group .= 'а';
                } elseif ($_case == 3) {
                    $group .= 'ов';
                }
            }

            if ($group) {
                $ret = $group . $this->wordSeparator . $ret;
            }

            $power += 3;
        }

        return $sign . preg_replace('/\s+/', ' ', $ret);
    }

    /**
     * @param int $number
     * @param int $gender
     * @param int $case
     *
     * @return string
     */
    protected function groupToWords($number, $gender, &$case)
    {
        $return = '';
        $case = 3;

        if ((int) $number == 0) {
            $return = '';
        } elseif ($number < 10) {
            $return = static::$digits[$gender][(int) $number];
            if ($number == 1) {
                $case = 1;
            } elseif ($number < 5) {
                $case = 2;
            } else {
                $case = 3;
            }
        } else {
            $number = str_pad($number, 3, '0', STR_PAD_LEFT);

            $hundreds = (int) $number{0};
            if ($hundreds) {
                $return = static::$hundreds[$hundreds];

                if (substr($number, 1) !== '00') {
                    $return .= $this->wordSeparator;
                }

                $case = 3;
            }

            $tens = (int) $number{1};
            $ones = (int) $number{2};

            if ($tens || $ones) {
                if ($tens == 1 && $ones == 0) {
                    $return .= 'десять';
                } elseif ($tens == 1) {
                    $return .= static::$teens[$ones + 10];
                } else {
                    if ($tens > 0) {
                        $return .= static::$tens[(int) $tens];
                    }

                    if ($ones > 0) {
                        $return .= $this->wordSeparator . static::$digits[$gender][$ones];

                        if ($ones == 1) {
                            $case = 1;
                        } elseif ($ones < 5) {
                            $case = 2;
                        } else {
                            $case = 3;
                        }
                    }
                }
            }
        }

        return $return;
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

        if (!array_key_exists($currency, static::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = static::$currencyNames[$currency];

        $return = trim($this->toWordsWithCase($decimal, $case, $currencyNames[0][0]));
        $return .= $this->wordSeparator . $currencyNames[0][$case];

        if (null !== $fraction) {
            if (true === $convertFraction) {
                $return .= $this->wordSeparator . trim($this->toWordsWithCase($fraction, $case, $currencyNames[1][0]));
            } else {
                $return .= $this->wordSeparator . $fraction;
            }

            $return .= $this->wordSeparator . $currencyNames[1][$case];
        }

        return $return;
    }
}
