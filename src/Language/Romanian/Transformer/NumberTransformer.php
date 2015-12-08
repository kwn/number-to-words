<?php

namespace Kwn\NumberToWords\Language\Romanian\Transformer;

use Kwn\NumberToWords\Grammar\Gender;
use Kwn\NumberToWords\Language\Romanian\Dictionary\Number as NumberDictionary;
use Kwn\NumberToWords\Model\Number;
use Kwn\NumberToWords\Transformer\NumberTransformer as NumberTransformerInterface;

class NumberTransformer implements NumberTransformerInterface
{
    /**
     * Anything higher than this is few or many
     *
     * @var integer
     */
    private $threshFew = 1;

    /**
     * Anything higher than this is many
     *
     * @var integer
     */
    private $threshMany = 19;

    /**
     * The word for infinity.
     *
     * @var string
     */
    private $infinity = 'infinit';

    /**
     * The word for the "and" language construct.
     *
     * @var string
     */
    private $and = 'și';

    /**
     * The word separator.
     *
     * @var string
     */
    private $sep = ' ';

    /**
     * The default currency name
     *
     * @var string
     */
    public $defCurrency = 'RON';

    /**
     * The particle added for many items (>=20)
     */
    private $manyPart = 'de';

    /**
     * The word for the minus sign.
     *
     * @var string
     */
    private $minus = 'minus';

    /**
     * @var string
     */
    private $decimalPoint = '.';

    /**
     * Split a number to groups of three-digit numbers.
     *
     * @param mixed $num An integer or its string representation
     *                   that need to be split
     *
     * @return array  Groups of three-digit numbers.
     * @author Kouber Saparev <kouber@php.net>
     */
    private function splitNumber($num)
    {
        if (is_string($num)) {
            $strlen = strlen($num);
            $first = substr($num, 0, $strlen % 3);

            preg_match_all('/\d{3}/', substr($num, $strlen % 3, $strlen), $m);
            $ret =& $m[0];

            if ($first) {
                array_unshift($ret, $first);
            }

            return $ret;
        }

        return explode(' ', number_format($num, 0, '', ' ')); // a faster version for integers
    }

    /**
     * Returns the inflected form of the cardinal according to the noun's gender.
     *
     * @param mixed   $numberAtom  A number atom, per {@link $_numbers}
     * @param array   $noun        A noun, per {@link _toWords()}
     * @param boolean $asNoun      A flag indicating whether the inflected form should
     *                             behave as a noun (true, "unu") or as an article (false, "un")
     *
     * @return string            The inflected form of the number
     * @author Bogdan Stăncescu <bogdan@moongate.ro>
     */
    private function getNumberInflectionForGender($numberAtom, $noun, $asNoun = false)
    {
        if (!is_array($numberAtom)) {
            $numNames = [
                $numberAtom,
                $numberAtom,
                $numberAtom,
                $numberAtom,
            ];
        } elseif (count($numberAtom) == 2) {
            $numNames = [
                $numberAtom[0],
                $numberAtom[1],
                $numberAtom[1],
                $numberAtom[0],
            ];
        } else {
            $numNames = $numberAtom;
        }

        $numName = $numNames[$noun[2]];
        if (!is_array($numName)) {
            return $numName;
        }

        return $numName[(int) $asNoun];
    }

    /**
     * Returns the noun's declension according to the cardinal's number.
     *
     * @param string $pluralRule The plural rule to use, per {@link _get_plural_rule()}
     * @param array  $noun       A noun, per {@link _toWords()}
     *
     * @return string            The inflected form of the noun
     * @author Bogdan Stăncescu <bogdan@moongate.ro>
     */
    private function getNounDeclensionForNumber($pluralRule, $noun)
    {
        if ($noun[2] == Gender::FEATURELESS) {
            // Nothing for abstract count
            return '';
        }

        if ($pluralRule == 'o') {
            // One
            return $noun[0];
        }

        if ($pluralRule == 'f') {
            // Few
            return $noun[1];
        }

        // Many
        return $this->manyPart . $this->sep . $noun[1];
    }

    /**
     * Returns the plural rule to use for a specific number.
     *
     * Romanian uses three plural rules (see http://cldr.unicode.org/index/cldr-spec/plural-rules),
     * namely one ("un om"), few ("doi oameni") and many ("o sută de oameni").
     * We use the following notation consistently throughout this class for the three rules:
     * 'o' for one, 'f' for few, and 'm' for many. These three rules are applied depending
     * on the number of items; see
     * http://unicode.org/repos/cldr-tmp/trunk/diff/supplemental/language_plural_rules.html#ro
     */
    private function getPluralRule($number)
    {
        if ($number == $this->threshFew) {
            // One
            return 'o';
        }

        if ($number == 0) {
            // Zero, which behaves like few
            return 'f';
        }

        $uz = $number % 100;

        if ($uz == 0) {
            // Hundreds behave like many
            return 'm';
        }

        if ($uz > $this->threshMany) {
            // Many
            return 'm';
        }

        // Below the many threshold, so few
        return 'f';
    }

    /**
     * Converts a three-digit number to its word representation in Romanian.
     *
     * @param integer $num          An integer between 1 and 999 inclusive.
     * @param array   $noun         The noun representing the items being counted, per {@link _toWords()}
     * @param boolean $forceNoun    A flag indicating whether the numeral's inflection should force it behave like a
     *                              noun
     * @param boolean $forcePlural  A flag indicating whether we want to override the plural form (we can't tell if
     *                              we're processing 1 dollar or 1001 dollars from within this method)
     *
     * @return string   The words for the given number and the given noun.
     * @author Bogdan Stăncescu <bogdan@moongate.ro>
     */
    private function showDigitsGroup($num, $noun, $forceNoun = false, $forcePlural = false)
    {
        $ret = '';

        // extract the value of each digit from the three-digit number
        $u = $num % 10;                  // ones
        $uz = $num % 100;                // ones+tens
        $z = ($num - $u) % 100 / 10;         // tens
        $s = ($num - $z * 10 - $u) % 1000 / 100; // hundreds

        if ($s) {
            $ret .= $this->showDigitsGroup($s, NumberDictionary::getExponents()[2]);
            if ($uz) {
                $ret .= $this->sep;
            }
        }

        if ($uz) {
            if (isset(NumberDictionary::getNumbers()[$uz])) {
                $ret .= $this->getNumberInflectionForGender(
                    NumberDictionary::getNumbers()[$uz],
                    $noun,
                    !$forceNoun
                );
            } else {
                if ($z) {
                    $ret .= NumberDictionary::getNumbers()[$z * 10]; // no accord needed for tens
                    if ($u) {
                        $ret .= $this->sep . $this->and . $this->sep;
                    }
                }
                if ($u) {
                    $ret .= $this->getNumberInflectionForGender(
                        NumberDictionary::getNumbers()[$u],
                        $noun,
                        !$forceNoun
                    );
                }
            }
        }

        if ($noun[2] == Gender::FEATURELESS) {
            return $ret;
        }

        $pluralRule = $this->getPluralRule($num);
        if ($pluralRule == 'o' && $forcePlural) {
            $pluralRule = 'f';
        }

        return $ret . $this->sep . $this->getNounDeclensionForNumber($pluralRule, $noun);
    }

    /**
     * Converts a number to its word representation in Romanian
     *
     * Romanian uses a complex set of rules for numerals, and a lot of inflections are
     * interdependent. As such, this class implements an easy means for authors to
     * count either abstract numbers (in which case the second parameter should be
     * omitted), or actual nouns. In the latter case, a noun must be provided as an
     * indexed array containing three values:
     * 0 => the singular form
     * 1 => the plural form
     * 2 => the noun's gender, as one of the following constants:
     *      - Gender::MALE for masculine nouns
     *      - Gender::FEMALE for feminine nouns
     *      - Gender::NEUTER for neuter nouns
     *
     * @param mixed $number
     * @param array $noun Optionally you can also provide a noun to be formatted accordingly
     *
     * @return string  The corresponding word representation
     */
    public function toWords($number, $noun = [])
    {
        $number = new Number($number);
        $num = $number->getValue();

        if (empty($noun)) {
            $noun = [null, null, Gender::FEATURELESS];
        }

        $ret = '';

        // check if $num is a valid non-zero number
        if (!$num || preg_match('/^-?0+$/', $num) || !preg_match('/^-?\d+$/', $num)) {
            $ret = NumberDictionary::getNumbers()[0];
            if ($noun[2] != Gender::FEATURELESS) {
                $ret .= $this->sep . $this->getNounDeclensionForNumber('f', $noun);
            }

            return $ret;
        }

        // add a minus sign
        if (substr($num, 0, 1) == '-') {
            $ret = $this->minus . $this->sep;
            $num = substr($num, 1);
        }

        // One is a special case
        if (abs($num) == 1) {
            $ret = $this->getNumberInflectionForGender(NumberDictionary::getNumbers()[1], $noun);
            if ($noun[2] != Gender::FEATURELESS) {
                $ret .= $this->sep . $this->getNounDeclensionForNumber('o', $noun);
            }

            return $ret;
        }

        // if the absolute value is greater than 9.99*10^302, return infinity
        if (strlen($num) > 306) {
            return $ret . $this->infinity;
        }

        // strip excessive zero signs
        $num = ltrim($num, '0');

        // split $num to groups of three-digit numbers
        $numGroups = $this->splitNumber($num);

        $sizeofNumgroups = count($numGroups);
        $showedNoun = false;
        foreach ($numGroups as $i => $number) {
            // what is the corresponding exponent for the current group
            $pow = $sizeofNumgroups - $i;

            // skip processment for empty groups
            if ($number == '000') {
                continue;
            }

            if ($i) {
                $ret .= $this->sep;
            }

            if ($pow - 1) {
                $ret .= $this->showDigitsGroup($number, NumberDictionary::getExponents()[($pow - 1) * 3]);
            } else {
                $showedNoun = true;
                $ret .= $this->showDigitsGroup($number, $noun, false, $num != 1);
            }
        }
        if (!$showedNoun) {
            $ret .= $this->sep . $this->getNounDeclensionForNumber('m', $noun); // ALWAYS many
        }

        return rtrim($ret, $this->sep);
    }
}
