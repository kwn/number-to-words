<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale\Fr;

use NumberToWords\Language\French\BelgianDictionary;
use NumberToWords\Legacy\Numbers\Words;
use NumberToWords\Service\NumberToTripletsConverter;

class Be extends Words
{
    /**
     * @var NumberToTripletsConverter
     */
    private $numberToTripletsConverter;

    public function __construct()
    {
        $this->numberToTripletsConverter = new NumberToTripletsConverter();
    }

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
                $ret .= BelgianDictionary::$digits[$hundreds] . BelgianDictionary::$wordSeparator . BelgianDictionary::$miscNumbers[100];
                if ($last && !$units && !$tens) {
                    $ret .= BelgianDictionary::$pluralSuffix;
                }
            } else {
                $ret .= BelgianDictionary::$miscNumbers[100];
            }
            $ret .= BelgianDictionary::$wordSeparator;
        }

        if ($tens) {
            if ($tens === 1) {
                if ($units <= 6) {
                    $ret .= BelgianDictionary::$miscNumbers[10 + $units];
                } else {
                    $ret .= BelgianDictionary::$miscNumbers[10] . '-' . BelgianDictionary::$digits[$units];
                }
                $units = 0;
            } elseif ($tens === 8) {
                $ret .= BelgianDictionary::$digits[4] . BelgianDictionary::$dash . BelgianDictionary::$miscNumbers[20];
                $resto = $tens * 10 + $units - 80;
                if ($resto) {
                    $ret .= BelgianDictionary::$dash;
                    $ret .= $this->showDigitsGroup($resto);
                    $units = 0;
                } else {
                    $ret .= BelgianDictionary::$pluralSuffix;
                }
            } else {
                $ret .= BelgianDictionary::$miscNumbers[$tens * 10];
            }
        }

        if ($units) {
            if ($tens) {
                if ($units === 1) {
                    $ret .= BelgianDictionary::$wordSeparator . BelgianDictionary::$and . BelgianDictionary::$wordSeparator;
                } else {
                    $ret .= BelgianDictionary::$dash;
                }
            }
            $ret .= BelgianDictionary::$digits[$units];
        }

        return rtrim($ret, BelgianDictionary::$wordSeparator);
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
            return BelgianDictionary::$zero;
        }

        if ($num < 0) {
            $return = BelgianDictionary::$minus . BelgianDictionary::$wordSeparator;
            $num *= -1;
        }

        $numberGroups = $this->numberToTripletsConverter->convertToTriplets($num);
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
                    ) . BelgianDictionary::$wordSeparator;
                }
                $return .= BelgianDictionary::$exponent[($pow - 1) * 3];
                if ($pow > 2 && $number > 1) {
                    $return .= BelgianDictionary::$pluralSuffix;
                }
                $return .= BelgianDictionary::$wordSeparator;
            }
        }

        return rtrim($return, BelgianDictionary::$wordSeparator);
    }
}
