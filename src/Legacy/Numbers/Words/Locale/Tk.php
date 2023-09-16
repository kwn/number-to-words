<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Tk extends Words
{
    const LOCALE = 'tk';
    const LANGUAGE_NAME = 'Turkmen';
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

    protected static $currencyNames = [
        'USD' => [
            'dollar',
            'sent'
        ],
        'TMT' => [
            'manat',
            'teňňe'
        ],
    ];

    private $wordSeparator = ' ';

    /**
     * @param $number
     *
     * @return string
     * @internal param int $num
     * @internal param int $power
     *
     */
    protected function toWords($number)
    {
        if ($number === 0) {
            return $this->zero;
        }

        $out = [];

        if ($number < 0) {
            $out[] = $this->minus;
            $number *= -1;
        }

        $megaSize = count(static::$mega);
        $signs = $megaSize * 3;

        // $signs equal quantity of zeros of the biggest number in self::$mega
        // + 3 additional sign (point and two zero)
        [$unit, $subunit] = explode('.', sprintf("%{$signs}.2f", (float) $number));

        // return sprintf("%{1}.2f", (float) $number);

        foreach (str_split($unit, 3) as $megaKey => $value) {
            if (!(int) $value) {
                continue;
            }

            $megaKey = $megaSize - $megaKey - 1;
            // $gender = static::$mega[$megaKey][3];
            [$i1, $i2, $i3] = array_map('intval', str_split($value, 1));
            // mega-logic
            if ($i1 > 0) {
                $out[] = static::$ten[$i1] . ' ýüz'; # 1xx-9xx
            }

            // tens
            if ($i2 > 0) {
                $out[] = static::$tens[$i2];
            }

            // ones
            if ($i3 > 0) {
                $out[] = static::$ten[$i3];
            }

            if ($megaKey > 1) {
                $out[] = static::$mega[$megaKey];
            }
        }

        return trim(preg_replace('/\s+/', ' ', implode(' ', $out)));
    }

    /**
     * @param $currency
     * @param $decimal
     * @param null $fraction
     *
     * @return string
     * @throws NumberToWordsException
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

        $return = $this->toWords($decimal) . ' ' . $currencyNames[0];

        if (null !== $fraction) {
            $return .= ' ' . $this->toWords($fraction) . ' ' . $currencyNames[1];
        }

        return $return;
    }
}
