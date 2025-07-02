<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Fr extends Words
{
    const LOCALE = 'fr';
    const LANGUAGE_NAME = 'French';
    const LANGUAGE_NAME_NATIVE = 'Français';

    private static $miscNumbers = [
        10 => 'dix',
        11 => 'onze',
        12 => 'douze',
        13 => 'treize',
        14 => 'quatorze',
        15 => 'quinze',
        16 => 'seize',
        20 => 'vingt',
        30 => 'trente',
        40 => 'quarante',
        50 => 'cinquante',
        60 => 'soixante',
        100 => 'cent'
    ];

    private static $digits = [
        1 => 'un',
        2 => 'deux',
        3 => 'trois',
        4 => 'quatre',
        5 => 'cinq',
        6 => 'six',
        7 => 'sept',
        8 => 'huit',
        9 => 'neuf'
    ];

    private $zero = 'zéro';

    private $and = 'et';

    private $wordSeparator = ' ';

    private $subunitSeparator = 'et';

    private $dash = '-';

    private $minus = 'moins';

    private $pluralSuffix = 's';

    private static $exponent = [
        0   => '',
        3   => 'mille',
        6   => 'million',
        9   => 'milliard',
        12  => 'billion',
        15  => 'billiard',
        18  => 'trillion',
        21  => 'trilliard',
        24  => 'quadrillion',
        27  => 'quadrillard',
        30  => 'quintillion',
        33  => 'quintilliard',
        36  => 'sextillion',
        39  => 'sextilliard',
        42  => 'septillion',
        45  => 'septilliard',
        48  => 'octillion',
        51  => 'octilliard',
        54  => 'nonillion',
        57  => 'nonilliard',
        60  => 'décillion',
        63  => 'décilliard',
        66  => 'undécillion',
        69  => 'undécilliard',
        72  => 'duodécillion',
        75  => 'duodécilliard',
        78  => 'trédécillion',
        81  => 'trédéciliard',
        84  => 'quattuordécillion',
        87  => 'quattuordécilliard',
        90  => 'quindécillion',
        93  => 'quindécilliard',
        96  => 'sexdécillion',
        99  => 'sexdécilliard',
        102  => 'septendécillion',
        105  => 'septendécilliard',
        108  => 'octodécillion',
        111  => 'octodécilliard',
        114  => 'novemdécillion',
        117  => 'novemdécilliard',
        120  => 'vingtillion',
        123  => 'vingtilliard',
    ];

    private static $currencyNames = [
        'AUD' => [['dollar australien', 'dollars australiens'], ['cent']],
        'CAD' => [['dollar canadien', 'dollars canadiens'], ['cent']],
        'CHF' => [['franc suisse', 'francs suisses'], ['centime']],
        'CNY' => [['yuan'], ['fen']],
        'DZD' => [['dinar'], ['centime']],
        'EUR' => [['euro'], ['centime']],
        'GBP' => [['pound', 'pounds'], ['penny', 'pence']],
        'JPY' => [['yen'], ['sen']],
        'LYD' => [['dinar'], ['centime']],
        'MAD' => [['dirham'], ['centime']],
        'MRO' => [['ouguiya'], ['khoums']],
        'MXN' => [['peso mexicain', 'pesos mexicains'], ['centavo']],
        'TND' => [['dinar'], ['millime']],
        'USD' => [['dollar américain', 'dollars américains'], ['cent']],
        'XAF' => [['franc CFA', 'francs CFA'], ['centime']],
        'XOF' => [['franc CFA', 'francs CFA'], ['centime']],
        'XPF' => [['franc CFP', 'francs CFP'], ['centime']],
    ];

    /**
     * @param int $number
     *
     * @return array
     */
    private function splitNumber($number)
    {
        return array_map('intval', explode(' ', number_format($number, 0, '', ' ')));
    }

    /**
     * @param int $num
     * @param bool $last
     *
     * @return string
     */
    private function showDigitsGroup($num, $last = false)
    {
        $return = '';

        $ones = $num % 10;
        $tens = (int) ($num % 100 / 10);
        $hundreds = (int) ($num % 1000 / 100);

        if ($hundreds) {
            if ($hundreds > 1) {
                $return .= self::$digits[$hundreds] . $this->wordSeparator . self::$miscNumbers[100];

                if ($last && !$ones && !$tens) {
                    $return .= $this->pluralSuffix;
                }
            } else {
                $return .= self::$miscNumbers[100];
            }

            $return .= $this->wordSeparator;
        }

        if ($tens) {
            if ($tens === 1) {
                if ($ones <= 6) {
                    $return .= self::$miscNumbers[10 + $ones];
                } else {
                    $return .= self::$miscNumbers[10] . '-' . self::$digits[$ones];
                }
                $ones = 0;
            } elseif ($tens > 5) {
                if ($tens < 8) {
                    $return .= self::$miscNumbers[60];

                    $resto = $tens * 10 + $ones - 60;
                    if ($ones === 1) {
                        $return .= $this->wordSeparator . $this->and . $this->wordSeparator;
                    } elseif ($resto) {
                        $return .= $this->dash;
                    }

                    if ($resto) {
                        $return .= $this->showDigitsGroup($resto);
                    }
                    $ones = 0;
                } else {
                    $return .= self::$digits[4] . $this->dash . self::$miscNumbers[20];

                    $resto = $tens * 10 + $ones - 80;
                    if ($resto) {
                        $return .= $this->dash;
                        $return .= $this->showDigitsGroup($resto);

                        $ones = 0;
                    } else {
                        $return .= $this->pluralSuffix;
                    }
                }
            } else {
                $return .= self::$miscNumbers[$tens * 10];
            }
        }

        if ($ones) {
            if ($tens) {
                if ($ones === 1) {
                    $return .= $this->wordSeparator . $this->and . $this->wordSeparator;
                } else {
                    $return .= $this->dash;
                }
            }

            $return .= self::$digits[$ones];
        }

        return rtrim($return, $this->wordSeparator);
    }

    /**
     * @param int $number
     *
     * @return string
     */
    protected function toWords($number)
    {
        $ret = '';

        if ($number === 0) {
            return $this->zero;
        }

        if ($number < 0) {
            $ret = $this->minus . $this->wordSeparator;
        }

        $numberGroups = $this->splitNumber(abs($number));
        $sizeOfNumberGroups = count($numberGroups);

        foreach ($numberGroups as $i => $numb) {
            $power = $sizeOfNumberGroups - $i;

            if ($numb !== 0) {
                if ($numb !== 1 || $power !== 2) {
                    $ret .= $this->showDigitsGroup(
                            $numb,
                            $i + 1 === $sizeOfNumberGroups || $power > 2
                        ) . $this->wordSeparator;
                }

                $ret .= self::$exponent[($power - 1) * 3];

                if ($power > 2 && $numb > 1) {
                    $ret .= $this->pluralSuffix;
                }

                $ret .= $this->wordSeparator;
            }
        }

        return rtrim($ret, $this->wordSeparator);
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
        $currency = strtoupper($currency);

        if (!array_key_exists($currency, static::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = static::$currencyNames[$currency];

        $return = trim($this->toWords($decimal)) . $this->wordSeparator;
        $level = ($decimal === 1) ? 0 : 1;

        if ($level > 0) {
            if (count($currencyNames[0]) > 1) {
                $return .= $currencyNames[0][$level];
            } else {
                $return .= $currencyNames[0][0] . 's';
            }
        } else {
            $return .= $currencyNames[0][0];
        }

        if (null !== $fraction) {
            $return .= sprintf(
                '%1$s%2$s%1$s%3$s%1$s',
                $this->wordSeparator,
                $this->subunitSeparator,
                trim($this->toWords($fraction))
            );

            $level = $fraction === 1 ? 0 : 1;

            if ($level > 0) {
                if (count($currencyNames[1]) > 1) {
                    $return .= $currencyNames[1][$level];
                } else {
                    $return .= $currencyNames[1][0] . 's';
                }
            } else {
                $return .= $currencyNames[1][0];
            }
        }

        return $return;
    }
}
