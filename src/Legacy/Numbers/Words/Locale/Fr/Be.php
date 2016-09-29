<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale\Fr;

use NumberToWords\Legacy\Numbers\Words;

class Be extends Words
{
    const LOCALE = 'fr_BE';
    const LANGUAGE_NAME = 'French';
    const LANGUAGE_NAME_NATIVE = 'Français';

    private static $miscNumbers = [
        10  => 'dix',
        11  => 'onze',
        12  => 'douze',
        13  => 'treize',
        14  => 'quatorze',
        15  => 'quinze',
        16  => 'seize',
        20  => 'vingt',
        30  => 'trente',
        40  => 'quarante',
        50  => 'cinquante',
        60  => 'soixante',
        70  => 'septante',
        90  => 'nonante',
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
    private $dash = '-';
    private $minus = 'moins';
    private $pluralSuffix = 's';

    private static $exponent = [
        0   => '',
        3   => 'mille',
        6   => 'million',
        9   => 'milliard',
        12  => 'trillion',
        15  => 'quadrillion',
        18  => 'quintillion',
        21  => 'sextillion',
        24  => 'septillion',
        27  => 'octillion',
        30  => 'nonillion',
        33  => 'decillion',
        36  => 'undecillion',
        39  => 'duodecillion',
        42  => 'tredecillion',
        45  => 'quattuordecillion',
        48  => 'quindecillion',
        51  => 'sexdecillion',
        54  => 'septendecillion',
        57  => 'octodecillion',
        60  => 'novemdecillion',
        63  => 'vigintillion',
        66  => 'unvigintillion',
        69  => 'duovigintillion',
        72  => 'trevigintillion',
        75  => 'quattuorvigintillion',
        78  => 'quinvigintillion',
        81  => 'sexvigintillion',
        84  => 'septenvigintillion',
        87  => 'octovigintillion',
        90  => 'novemvigintillion',
    ];

    /**
     * @param int  $number
     * @param bool $last
     *
     * @return string
     */
    private function showDigitsGroup($number, $last = false)
    {
        $ret = '';

        $units = $number % 10;
        $tens = (int) ($number / 10) % 10;
        $hundreds = (int) ($number / 100) % 10;

        if ($hundreds) {
            if ($hundreds > 1) {
                $ret .= self::$digits[$hundreds] . $this->wordSeparator . self::$miscNumbers[100];
                if ($last && !$units && !$tens) {
                    $ret .= $this->pluralSuffix;
                }
            } else {
                $ret .= self::$miscNumbers[100];
            }
            $ret .= $this->wordSeparator;
        }

        if ($tens) {
            if ($tens === 1) {
                if ($units <= 6) {
                    $ret .= self::$miscNumbers[10 + $units];
                } else {
                    $ret .= self::$miscNumbers[10] . '-' . self::$digits[$units];
                }
                $units = 0;
            } elseif ($tens === 8) {
                $ret .= self::$digits[4] . $this->dash . self::$miscNumbers[20];
                $resto = $tens * 10 + $units - 80;
                if ($resto) {
                    $ret .= $this->dash;
                    $ret .= $this->showDigitsGroup($resto);
                    $units = 0;
                } else {
                    $ret .= $this->pluralSuffix;
                }
            } else {
                $ret .= self::$miscNumbers[$tens * 10];
            }
        }

        if ($units) {
            if ($tens) {
                if ($units === 1) {
                    $ret .= $this->wordSeparator . $this->and . $this->wordSeparator;
                } else {
                    $ret .= $this->dash;
                }
            }
            $ret .= self::$digits[$units];
        }

        return rtrim($ret, $this->wordSeparator);
    }

    /**
     * @param int $num
     *
     * @return string
     */
    protected function toWords($num)
    {
        $return = '';

        if ($num === 0) {
            return $this->zero;
        }

        if ($num < 0) {
            $return = $this->minus . $this->wordSeparator;
            $num *= -1;
        }

        $numberGroups = array_reverse($this->numberToTriplets($num));
        $sizeOfNumberGroups = count($numberGroups);

        foreach ($numberGroups as $i => $number) {
            // what is the corresponding exponent for the current group
            $pow = $sizeOfNumberGroups - $i;

            // skip processment for empty groups
            if ($number != '000') {
                if ($number != 1 || $pow != 2) {
                    $return .= $this->showDigitsGroup(
                        $number,
                        $i + 1 == $sizeOfNumberGroups || $pow > 2
                    ) . $this->wordSeparator;
                }
                $return .= self::$exponent[($pow - 1) * 3];
                if ($pow > 2 && $number > 1) {
                    $return .= $this->pluralSuffix;
                }
                $return .= $this->wordSeparator;
            }
        }

        return rtrim($return, $this->wordSeparator);
    }
}
