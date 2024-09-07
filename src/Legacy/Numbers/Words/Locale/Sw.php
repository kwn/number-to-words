<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Sw extends Words
{
    const LOCALE = 'sw';
    const LANGUAGE_NAME = 'Swahili';
    const LANGUAGE_NAME_NATIVE = 'Kiswahili';

    private static $miscNumbers = [
        10 => 'kumi',
        11 => 'kumi na moja',
        12 => 'kumi na mbili',
        13 => 'kumi na tatu',
        14 => 'kumi na nne',
        15 => 'kumi na tano',
        16 => 'kumi na sita',
        17 => 'kumi na saba',
        18 => 'kumi na nane',
        19 => 'kumi na tisa',
        20 => 'ishirini',
        30 => 'thelathini',
        40 => 'arobaini',
        50 => 'hamsini',
        60 => 'sitini',
        70 => 'sabini',
        80 => 'themanini',
        90 => 'tisini',
        100 => 'mia'
    ];

    private static $digits = [
        1 => 'moja',
        2 => 'mbili',
        3 => 'tatu',
        4 => 'nne',
        5 => 'tano',
        6 => 'sita',
        7 => 'saba',
        8 => 'nane',
        9 => 'tisa'
    ];

    private $zero = 'sifuri';

    private $and = 'na';

    private $wordSeparator = ' ';

    private $subunitSeparator = 'na';

    private $dash = '-';

    private $minus = 'kasoro';

    private $pluralSuffix = '';

    private static $exponent = [
        0 => '',
        3 => 'elfu', // 1,000
        5 => 'laki', // 100,000
        6 => 'milioni',
        9 => 'bilioni',
        12 => 'trilioni',
    ];

    private static $currencyNames = [
        'KES' => [['shilingi', 'shilingi'], ['senti']],
        'USD' => [['dola ya Marekani', 'dola za Marekani'], ['senti']],
        // Add more currencies as needed
    ];

    /**
     * Splits the number into groups of thousands.
     *
     * @param int $number
     * @return array
     */
    private function splitNumber($number)
    {
        return array_map('intval', explode(' ', number_format($number, 0, '', ' ')));
    }

    /**
     * Converts a group of digits (hundreds, tens, and ones) into words.
     *
     * @param int $num
     * @param bool $last
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
            } else {
                $return .= self::$miscNumbers[100];
            }
            $return .= $this->wordSeparator;
        }

        if ($tens) {
            if ($tens === 1) {
                $return .= self::$miscNumbers[10 + $ones];
                $ones = 0;
            } else {
                $return .= self::$miscNumbers[$tens * 10];
                if ($ones) {
                    $return .= $this->wordSeparator . $this->and . $this->wordSeparator;
                }
            }
        }

        if ($ones) {
            $return .= self::$digits[$ones];
        }

        return rtrim($return, $this->wordSeparator);
    }

    /**
     * Converts a number to its word representation in Swahili.
     *
     * @param int $number
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
                $groupWords = $this->showDigitsGroup($numb, $i + 1 === $sizeOfNumberGroups || $power > 2);

                if ($power > 1) {
                    $groupWords .= ' ' . self::$exponent[($power - 1) * 3];
                }

                $ret .= $groupWords . $this->wordSeparator;
            }
        }

        return rtrim($ret, $this->wordSeparator);
    }

    

    /**
     * Converts a currency amount into words.
     *
     * @param string $currency
     * @param int $decimal
     * @param int|null $fraction
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
        $return .= $currencyNames[0][$level] . $this->wordSeparator;

        if (null !== $fraction) {
            $return .= sprintf(
                '%1$s%2$s%1$s%3$s',
                $this->wordSeparator,
                $this->subunitSeparator,
                trim($this->toWords($fraction))
            );
            $level = $fraction === 1 ? 0 : 1;
            $return .= $currencyNames[1][$level];
        }

        return $return;
    }
}
