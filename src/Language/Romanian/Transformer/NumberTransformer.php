<?php

namespace Kwn\NumberToWords\Language\Romanian\Transformer;

use Kwn\NumberToWords\Grammar\Gender;
use Kwn\NumberToWords\Language\Romanian\Dictionary\Number as NumberDictionary;
use Kwn\NumberToWords\Model\Number;

class NumberTransformer extends AbstractTransformer
{
    /**
     * Anything higher than this is few or many
     * @var integer
     * @access private
     */
    private $_thresh_few=1;

    /**
     * Anything higher than this is many
     * @var integer
     * @access private
     */
    private $_thresh_many=19;

    /**
     * The word for infinity.
     * @var string
     * @access private
     */
    private $_infinity = 'infinit';

    /**
     * The word for the "and" language construct.
     * @var string
     * @access private
     */
    private $_and = 'și';
    
    /**
     * The word separator.
     * @var string
     * @access private
     */
    private $_sep = ' ';

    /**
     * The default currency name
     * @var string
     * @access public
     */
    public $def_currency = 'RON'; // Romanian leu

    /**
     * The particle added for many items (>=20)
     */
    private $_many_part='de';

    /**
     * The word for the minus sign.
     * @var string
     * @access private
     */
    private $_minus = 'minus'; // minus sign

    /**
     * @var string
     */
    private $decimalPoint = '.';

    // }}}

    // {{{ _splitNumber()

    /**
     * Split a number to groups of three-digit numbers.
     *
     * @param mixed $num An integer or its string representation
     *                   that need to be split
     *
     * @return array  Groups of three-digit numbers.
     * @access private
     * @author Kouber Saparev <kouber@php.net>
     * @since  PHP 4.2.3
     */
    private function _splitNumber($num)
    {
        if (is_string($num)) {
            $ret    = array();
            $strlen = strlen($num);
            $first  = substr($num, 0, $strlen%3);

            preg_match_all('/\d{3}/', substr($num, $strlen%3, $strlen), $m);
            $ret =& $m[0];

            if ($first) {
                array_unshift($ret, $first);
            }

            return $ret;
        }
        return explode(' ', number_format($num, 0, '', ' ')); // a faster version for integers
    }
    // }}}

    // {{{ _get_number_inflection_for_gender()
    /**
     * Returns the inflected form of the cardinal according to the noun's gender.
     *
     * @param mixed $number_atom A number atom, per {@link $_numbers}
     * @param array $noun        A noun, per {@link _toWords()}
     * @param boolean $as_noun   A flag indicating whether the inflected form should
     *                           behave as a noun (true, "unu") or as an article (false, "un")
     * @return string            The inflected form of the number
     * @access private
     * @author Bogdan Stăncescu <bogdan@moongate.ro>
     */
    private function _get_number_inflection_for_gender($number_atom, $noun, $as_noun=false)
    {
        if (!is_array($number_atom)) {
            $num_names=array(
                $number_atom,
                $number_atom,
                $number_atom,
                $number_atom,
            );
        } elseif (count($number_atom)==2) {
            $num_names=array(
                $number_atom[0],
                $number_atom[1],
                $number_atom[1],
                $number_atom[0],
            );
        } else {
            $num_names=$number_atom;
        }

        $num_name=$num_names[$noun[2]];
        if (!is_array($num_name)) {
            return $num_name;
        }

        return $num_name[(int) $as_noun];
    }
    // }}}

    // {{{ _get_noun_declension_for_number
    /**
     * Returns the noun's declension according to the cardinal's number.
     *
     * @param string $plural_rule The plural rule to use, per {@link _get_plural_rule()}
     * @param array $noun        A noun, per {@link _toWords()}
     * @return string            The inflected form of the noun
     * @access private
     * @author Bogdan Stăncescu <bogdan@moongate.ro>
     */
    private function _get_noun_declension_for_number($plural_rule, $noun)
    {
        if ($noun[2]==Gender::FEATURELESS) {
            // Nothing for abstract count
            return "";
        }

        if ($plural_rule=='o') {
            // One
            return $noun[0];
        }

        if ($plural_rule=='f') {
            // Few
            return $noun[1];
        }

        // Many
        return $this->_many_part.$this->_sep.$noun[1];
    }
    // }}}

    // {{{ _get_plural_rule()
    /**
     * Returns the plural rule to use for a specific number.
     *
     * Romanian uses three plural rules (see http://cldr.unicode.org/index/cldr-spec/plural-rules),
     * namely one ("un om"), few ("doi oameni") and many ("o sută de oameni").
     * We use the following notation consistently throughout this class for the three rules:
     * 'o' for one, 'f' for few, and 'm' for many. These three rules are applied depending
     * on the number of items; see
     * http://unicode.org/repos/cldr-tmp/trunk/diff/supplemental/language_plural_rules.html#ro
     *
     */
    private function _get_plural_rule($number)
    {
        if ($number==$this->_thresh_few) {
            // One
            return 'o';
        }

        if ($number==0) {
            // Zero, which behaves like few
            return 'f';
        }

        $uz=$number%100;

        if ($uz==0) {
           // Hundreds behave like many
           return 'm';
        }

        if ($uz>$this->_thresh_many) {
            // Many
            return 'm';
        }

        // Below the many threshold, so few
        return 'f';
    }
    // }}}

    // {{{ _showDigitsGroup()
    /**
     * Converts a three-digit number to its word representation in Romanian.
     *
     * @param integer $num  An integer between 1 and 999 inclusive.
     * @param array $noun The noun representing the items being counted, per {@link _toWords()}
     * @param boolean $force_noun A flag indicating whether the numeral's inflection should force it behave like a noun
     * @param boolean $force_plural A flag indicating whether we want to override the plural form (we can't tell if we're processing 1 dollar or 1001 dollars from within this method)
     *
     * @return string   The words for the given number and the given noun.
     * @access private
     * @author Bogdan Stăncescu <bogdan@moongate.ro>
     */
    private function _showDigitsGroup($num, $noun, $force_noun=false, $force_plural=false)
    {
        $ret = '';
        
        // extract the value of each digit from the three-digit number
        $u = $num%10;                  // ones
        $uz = $num%100;                // ones+tens
        $z = ($num-$u)%100/10;         // tens
        $s = ($num-$z*10-$u)%1000/100; // hundreds

        if ($s) {
            $ret.=$this->_showDigitsGroup($s, NumberDictionary::getExponents()[2]);
            if ($uz) {
                $ret.=$this->_sep;
            }
        }
        if ($uz) {
            if (isset(NumberDictionary::getNumbers()[$uz])) {
              $ret.=$this->_get_number_inflection_for_gender(NumberDictionary::getNumbers()[$uz], $noun, !$force_noun);
            } else {
                if ($z) {
                    $ret.=NumberDictionary::getNumbers()[$z*10]; // no accord needed for tens
                    if ($u) {
                      $ret.=$this->_sep.$this->_and.$this->_sep;
                    }
                }
                if ($u) {
                    $ret.=$this->_get_number_inflection_for_gender(NumberDictionary::getNumbers()[$u], $noun, !$force_noun);
                }
            }
        }

        if ($noun[2]==Gender::FEATURELESS) {
            return $ret;
        }

        $plural_rule=$this->_get_plural_rule($num);
        if ($plural_rule=='o' && $force_plural) {
            $plural_rule='f';
        }

        return $ret.$this->_sep.$this->_get_noun_declension_for_number($plural_rule, $noun);
    }
    // }}}

    // {{{ _toWords()

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
     * @param Number $number An integer (or its string representation) between 9.99*-10^302
     *                        and 9.99*10^302 (999 centillions) that need to be converted to words
     * @param array $noun  Optionally you can also provide a noun to be formatted accordingly
     * @return string  The corresponding word representation
     * @access protected
     * @author Bogdan Stăncescu <bogdan@moongate.ro>
     */
    public function toWords(Number $number, $noun = array())
    {
        $num = $number->getValue();

        if (empty($noun)) {
          $noun=array(NULL, NULL, Gender::FEATURELESS);
        }

        $ret = '';

        // check if $num is a valid non-zero number
        if (!$num || preg_match('/^-?0+$/', $num) || !preg_match('/^-?\d+$/', $num)) {
            $ret = NumberDictionary::getNumbers()[0];
            if ($noun[2]!=Gender::FEATURELESS) {
                $ret .= $this->_sep.$this->_get_noun_declension_for_number('f',$noun);
            }
            return $ret;
        }

        // add a minus sign
        if (substr($num, 0, 1) == '-') {
            $ret = $this->_minus . $this->_sep;
            $num = substr($num, 1);
        }

        // One is a special case
        if (abs($num)==1) {
            $ret = $this->_get_number_inflection_for_gender(NumberDictionary::getNumbers()[1], $noun);
            if ($noun[2]!=Gender::FEATURELESS) {
                $ret .= $this->_sep.$this->_get_noun_declension_for_number('o',$noun);
            }
            return $ret;
        }

        // if the absolute value is greater than 9.99*10^302, return infinity
        if (strlen($num)>306) {
            return $ret . $this->_infinity;
        }

        // strip excessive zero signs
        $num = ltrim($num, '0');

        // split $num to groups of three-digit numbers
        $num_groups = $this->_splitNumber($num);

        $sizeof_numgroups = count($num_groups);
        $showed_noun = false;
        foreach ($num_groups as $i=>$number) {
            // what is the corresponding exponent for the current group
            $pow = $sizeof_numgroups-$i;

            $valid_groups=array();

            // skip processment for empty groups
            if ($number=='000') {
                continue;
            }

            if ($i) {
              $ret.=$this->_sep;
            }

            if ($pow-1) {
               $ret.=$this->_showDigitsGroup($number, NumberDictionary::getExponents()[($pow-1)*3]);
            } else {
               $showed_noun = true;
               $ret.=$this->_showDigitsGroup($number, $noun, false, $num!=1);
            }
        }
        if (!$showed_noun) {
            $ret.=$this->_sep.$this->_get_noun_declension_for_number('m',$noun); // ALWAYS many
        }

        return rtrim($ret, $this->_sep);
    }
}
