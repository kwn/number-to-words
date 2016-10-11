<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Language\Romanian\Dictionary;
use NumberToWords\Legacy\Numbers\Words;
use NumberToWords\Service\NumberToTripletsConverter;

class Ro extends Words
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
     * @param mixed $numberAtom
     * @param array $noun
     * @param bool  $asNoun
     *
     * @return string
     */
    private function getNumberInflectionForGender($numberAtom, $noun, $asNoun = false)
    {
        $numberNames = $numberAtom;

        if (!is_array($numberAtom)) {
            $numberNames = [
                $numberAtom,
                $numberAtom,
                $numberAtom,
                $numberAtom,
            ];
        } elseif (count($numberAtom) === 2) {
            $numberNames = [
                $numberAtom[0],
                $numberAtom[1],
                $numberAtom[1],
                $numberAtom[0],
            ];
        }

        $numberName = $numberNames[$noun[2]];

        if (!is_array($numberName)) {
            return $numberName;
        }

        return $numberName[(int) $asNoun];
    }

    /**
     * @param string $pluralRule
     * @param array  $noun
     *
     * @return string
     */
    private function getNounDeclensionForNumber($pluralRule, $noun)
    {
        // Nothing for abstract count
        if ($noun[2] === Words::GENDER_ABSTRACT) {
            return '';
        }

        // One
        if ($pluralRule === 'o') {
            return $noun[0];
        }

        // Few
        if ($pluralRule === 'f') {
            return $noun[1];
        }

        // Many
        return Dictionary::$manyPart . Dictionary::$wordSeparator . $noun[1];
    }

    /**
     * @param int $number
     *
     * @return string
     */
    private function getPluralRule($number)
    {
        // One
        if ($number === Dictionary::$thresholdFew) {
            return 'o';
        }

        // Zero, which behaves like few
        if ($number === 0) {
            return 'f';
        }

        $uz = $number % 100;

        // Hundreds behave like many
        if ($uz === 0) {
            return 'm';
        }

        // Many
        if ($uz > Dictionary::$thresholdMany) {
            return 'm';
        }

        // Below the many threshold, so few
        return 'f';
    }

    /**
     * @param int   $number
     * @param array $noun
     * @param bool  $forceNoun
     * @param bool  $forcePlural
     *
     * @return string
     */
    private function showDigitsGroup($number, $noun, $forceNoun = false, $forcePlural = false)
    {
        $ret = '';

        $units = $number % 10;
        $tensAndUnits = $number % 100;
        $tens = (int) ($number / 10) % 10;
        $hundreds = (int) ($number / 100) % 10;

        if ($hundreds) {
            $ret .= $this->showDigitsGroup($hundreds, Dictionary::$exponent[2]);
            if ($tensAndUnits) {
                $ret .= Dictionary::$wordSeparator;
            }
        }
        if ($tensAndUnits) {
            if (isset(Dictionary::$numbers[$tensAndUnits])) {
                $ret .= $this->getNumberInflectionForGender(Dictionary::$numbers[$tensAndUnits], $noun, !$forceNoun);
            } else {
                if ($tens) {
                    $ret .= Dictionary::$numbers[$tens * 10]; // no accord needed for tens
                    if ($units) {
                        $ret .= Dictionary::$wordSeparator . Dictionary::$and . Dictionary::$wordSeparator;
                    }
                }
                if ($units) {
                    $ret .= $this->getNumberInflectionForGender(Dictionary::$numbers[$units], $noun, !$forceNoun);
                }
            }
        }

        if ($noun[2] === Words::GENDER_ABSTRACT) {
            return $ret;
        }

        $pluralRule = $this->getPluralRule($number);

        if ($pluralRule === 'o' && $forcePlural) {
            $pluralRule = 'f';
        }

        return $ret . Dictionary::$wordSeparator . $this->getNounDeclensionForNumber($pluralRule, $noun);
    }

    /**
     * @param int   $num
     * @param array $noun
     *
     * @return string
     */
    protected function toWords($num = 0, $noun = [])
    {
        if (empty($noun)) {
            $noun = [null, null, Words::GENDER_ABSTRACT];
        }

        $ret = '';

        // check if $num is a valid non-zero number
        if (!$num || preg_match('/^-?0+$/', $num) || !preg_match('/^-?\d+$/', $num)) {
            $ret = Dictionary::$numbers[0];
            if ($noun[2] != Words::GENDER_ABSTRACT) {
                $ret .= Dictionary::$wordSeparator . $this->getNounDeclensionForNumber('f', $noun);
            }

            return $ret;
        }

        // add a minus sign
        if (substr($num, 0, 1) == '-') {
            $ret = Dictionary::$minus . Dictionary::$wordSeparator;
            $num = substr($num, 1);
        }

        // One is a special case
        if (abs($num) == 1) {
            $ret = $this->getNumberInflectionForGender(Dictionary::$numbers[1], $noun);
            if ($noun[2] != Words::GENDER_ABSTRACT) {
                $ret .= Dictionary::$wordSeparator . $this->getNounDeclensionForNumber('o', $noun);
            }

            return $ret;
        }

        $numberGroups = $this->numberToTripletsConverter->convertToTriplets($num);

        $sizeof_numgroups = count($numberGroups);
        $showed_noun = false;

        foreach ($numberGroups as $i => $number) {
            // what is the corresponding exponent for the current group
            $pow = $sizeof_numgroups - $i;

            // skip processment for empty groups
            if ($number == '000') {
                continue;
            }

            if ($i) {
                $ret .= Dictionary::$wordSeparator;
            }

            if ($pow - 1) {
                $ret .= $this->showDigitsGroup($number, Dictionary::$exponent[($pow - 1) * 3]);
            } else {
                $showed_noun = true;
                $ret .= $this->showDigitsGroup($number, $noun, false, $num != 1);
            }
        }
        if (!$showed_noun) {
            $ret .= Dictionary::$wordSeparator . $this->getNounDeclensionForNumber('m', $noun); // ALWAYS many
        }

        return rtrim($ret, Dictionary::$wordSeparator);
    }

    /**
     * @param string $currency
     * @param int    $decimal
     * @param int    $fraction
     *
     * @throws NumberToWordsException
     * @return string
     */
    public function toCurrencyWords($currency, $decimal, $fraction = null)
    {
        $currency = strtoupper($currency);

        if (!isset(Dictionary::$currencyNames[$currency])) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNouns = Dictionary::$currencyNames[$currency];
        $return = $this->toWords($decimal, $currencyNouns[0]);

        if ($fraction !== null) {
            $return .= Dictionary::$wordSeparator . Dictionary::$and;
            $return .= Dictionary::$wordSeparator . $this->toWords($fraction, $currencyNouns[1]);
        }

        return $return;
    }
}
