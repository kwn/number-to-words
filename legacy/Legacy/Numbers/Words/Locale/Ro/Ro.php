<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale\Ro;

use NumberToWords\Legacy\Numbers\Words;

class Ro extends Words
{

    // {{{ properties

    /**
     * Locale name.
     * @var string
     * @access public
     */
    var $locale = 'ro_RO';

    /**
     * Language name in English.
     * @var string
     * @access public
     */
    var $lang = 'Romanian';

    /**
     * Native language name.
     * @var string
     * @access public
     */
    var $lang_native = 'Română';

    /**
     * Anything higher than this is few or many
     * @var integer
     * @access private
     */
    var $_thresh_few=1;

    /**
     * Anything higher than this is many
     * @var integer
     * @access private
     */
    var $_thresh_many=19;

    /**
     * The words for some numbers.
     * @var string
     * @access private
     */
    var $_numbers = array(
        'zero',        // 0
        array(         // 1
          array(           // masculine
            'un',              // article
            'unu',             // noun
          ),
          array(           // feminine
            'o',               // article
            'una',             // noun
          ),
          'un',            // neutral
          'unu',           // abstract (stand-alone cardinal)
        ),
        array(         //  2
          'doi',           // masculine and abstract
          'două',          // feminine and neutral
        ),
        'trei',        //  3
        'patru',       //  4
        'cinci',       //  5
        'șase',        //  6
        'șapte',       //  7
        'opt',         //  8
        'nouă',        //  9
        'zece',        // 10
        'unsprezece',  // 11
        array(         // 12
          'doisprezece',   // masculine and abstract
          'douăsprezece',  // feminine and abstract
        ),
        'treisprezece',   // 13
        'paisprezece',    // 14
        'cincisprezece',  // 15
        'șaisprezece',    // 16
        'șaptesprezece',  // 17
        'optsprezece',    // 18
        'nouăsprezece',   // 19
        'douăzeci',       // 20
        30=>'treizeci',   // 30
        40=>'patruzeci',  // 40
        50=>'cincizeci',  // 50
        60=>'șaizeci',    // 60
        70=>'șaptezeci',  // 70
        80=>'optzeci',    // 80
        90=>'nouăzeci',   // 90
    );

    /**
     * The word for infinity.
     * @var string
     * @access private
     */
    var $_infinity = 'infinit';

    /**
     * The word for the "and" language construct.
     * @var string
     * @access private
     */
    var $_and = 'și';

    /**
     * The word separator.
     * @var string
     * @access private
     */
    var $_sep = ' ';

    /**
     * Some currency names (as nouns, see {@link _toWords()} in Romanian
     * @access private
     */
    var $_currency_names = array(
        'AUD' => array(
            array('dolar australian', 'dolari australieni', Words::GENDER_MASCULINE),
            array('cent', 'cenți', Words::GENDER_MASCULINE),
        ),
        'CAD' => array(
            array('dolar canadian', 'dolari canadieni', Words::GENDER_MASCULINE),
            array('cent', 'cenți', Words::GENDER_MASCULINE),
        ),
        'CHF' => array(
            array('franc elvețian', 'franci elvețieni', Words::GENDER_MASCULINE),
            array('cent', 'cenți', Words::GENDER_MASCULINE),
        ),
        'CZK' => array(
            array('coroană cehă', 'coroane cehe', Words::GENDER_FEMININE),
            array('haler', 'haleri', Words::GENDER_MASCULINE),
        ),
        'EUR' => array(
            array('euro', 'euro', Words::GENDER_MASCULINE),
            array('cent', 'cenți', Words::GENDER_MASCULINE),
        ),
        'GBP' => array(
            array('liră sterlină', 'lire sterline', Words::GENDER_FEMININE),
            array('penny', 'penny', Words::GENDER_MASCULINE),
        ),
        'HUF' => array(
            array('forint', 'forinți', Words::GENDER_MASCULINE),
            array('filer', 'fileri', Words::GENDER_MASCULINE),
        ),
        'JPY' => array(
            array('yen', 'yeni', Words::GENDER_MASCULINE),
            array('sen', 'seni', Words::GENDER_MASCULINE),
        ),
        'PLN' => array(
            array('zlot', 'zloți', Words::GENDER_MASCULINE),
            array('gros', 'grosi', Words::GENDER_MASCULINE),
        ),
        'ROL' => array(
            array('leu', 'lei', Words::GENDER_MASCULINE),
            array('ban', 'bani', Words::GENDER_MASCULINE),
        ),
        'RON' => array(
            array('leu', 'lei', Words::GENDER_MASCULINE),
            array('ban', 'bani', Words::GENDER_MASCULINE),
        ),
        'RUB' => array(
            array('rublă', 'ruble', Words::GENDER_FEMININE),
            array('copeică', 'copeici', Words::GENDER_FEMININE),
        ),
        'SKK' => array(
            array('coroană slovacă', 'coroane slovace', Words::GENDER_FEMININE),
            array('haler', 'haleri', Words::GENDER_MASCULINE),
        ),
        'TRL' => array(
            array('liră turcească', 'lire turcești', Words::GENDER_FEMININE),
            array('kuruș', 'kuruși', Words::GENDER_MASCULINE),
        ),
        'USD' => array(
            array('dolar american', 'dolari americani', Words::GENDER_MASCULINE),
            array('cent', 'cenți', Words::GENDER_MASCULINE),
        ),
    );

    /**
     * The default currency name
     * @var string
     * @access public
     */
    var $def_currency = 'RON'; // Romanian leu

    /**
     * The particle added for many items (>=20)
     */
    var $_many_part='de';

    /**
     * The word for the minus sign.
     * @var string
     * @access private
     */
    var $_minus = 'minus'; // minus sign

    /**
     * The suffixes for exponents (singular).
     * @var array
     * @access private
     */
    var $_exponent = array(
        0 => '',
        2 => array('sută','sute',Words::GENDER_FEMININE),
        3 => array('mie','mii',Words::GENDER_FEMININE),
        6 => array('milion','milioane',Words::GENDER_NEUTER),
        9 => array('miliard','miliarde',Words::GENDER_NEUTER),
       12 => array('trilion','trilioane',Words::GENDER_NEUTER),
       15 => array('cvadrilion','cvadrilioane',Words::GENDER_NEUTER),
       18 => array('cvintilion','cvintilioane',Words::GENDER_NEUTER),
       21 => array('sextilion','sextilioane',Words::GENDER_NEUTER),
       24 => array('septilion','septilioane',Words::GENDER_NEUTER),
       27 => array('octilion','octilioane',Words::GENDER_NEUTER),
       30 => array('nonilion','nonilioane',Words::GENDER_NEUTER),
       33 => array('decilion','decilioane',Words::GENDER_NEUTER),
       36 => array('undecilion','undecilioane',Words::GENDER_NEUTER),
       39 => array('dodecilion','dodecilioane',Words::GENDER_NEUTER),
       42 => array('tredecilion','tredecilioane',Words::GENDER_NEUTER),
       45 => array('cvadrodecilion','cvadrodecilioane',Words::GENDER_NEUTER),
       48 => array('cvindecilion','cvindecilioane',Words::GENDER_NEUTER),
       51 => array('sexdecilion','sexdecilioane',Words::GENDER_NEUTER),
       54 => array('septdecilion','septdecilioane',Words::GENDER_NEUTER),
       57 => array('octodecilion','octodecilioane',Words::GENDER_NEUTER),
       60 => array('novemdecilion','novemdecilioane',Words::GENDER_NEUTER),
       63 => array('vigintilion','vigintilioane',Words::GENDER_NEUTER),
       66 => array('unvigintilion','unvigintilioane',Words::GENDER_NEUTER),
       69 => array('dovigintilion','dovigintilioane',Words::GENDER_NEUTER),
       72 => array('trevigintilion','trevigintilioane',Words::GENDER_NEUTER),
       75 => array('cvadrovigintilion','cvadrovigintilioane',Words::GENDER_NEUTER),
       78 => array('cvinvigintilion','cvinvigintilioane',Words::GENDER_NEUTER),
       81 => array('sexvigintilion','sexvigintilioane',Words::GENDER_NEUTER),
       84 => array('septvigintilion','septvigintilioane',Words::GENDER_NEUTER),
       87 => array('octvigintilion','octvigintilioane',Words::GENDER_NEUTER),
       90 => array('novemvigintilion','novemvigintilioane',Words::GENDER_NEUTER),
       93 => array('trigintilion','trigintilioane',Words::GENDER_NEUTER),
       96 => array('untrigintilion','untrigintilioane',Words::GENDER_NEUTER),
       99 => array('dotrigintilion','dotrigintilioane',Words::GENDER_NEUTER),
      102 => array('trestrigintilion','trestrigintilioane',Words::GENDER_NEUTER),
      105 => array('cvadrotrigintilion','cvadrotrigintilioane',Words::GENDER_NEUTER),
      108 => array('cvintrigintilion','cvintrigintilioane',Words::GENDER_NEUTER),
      111 => array('sextrigintilion','sextrigintilioane',Words::GENDER_NEUTER),
      114 => array('septentrigintilion','septentrigintilioane',Words::GENDER_NEUTER),
      117 => array('octotrigintilion','octotrigintilioane',Words::GENDER_NEUTER),
      120 => array('novemtrigintilion','novemtrigintilioane',Words::GENDER_NEUTER),
      123 => array('cvadragintilion','cvadragintilioane',Words::GENDER_NEUTER),
      126 => array('uncvadragintilion','uncvadragintilioane',Words::GENDER_NEUTER),
      129 => array('docvadragintilion','docvadragintilioane',Words::GENDER_NEUTER),
      132 => array('trecvadragintilion','trecvadragintilioane',Words::GENDER_NEUTER),
      135 => array('cvadrocvadragintilion','cvadrocvadragintilioane',Words::GENDER_NEUTER),
      138 => array('cvincvadragintilion','cvincvadragintilioane',Words::GENDER_NEUTER),
      141 => array('sexcvadragintilion','sexcvadragintilioane',Words::GENDER_NEUTER),
      144 => array('septencvadragintilion','septencvadragintilioane',Words::GENDER_NEUTER),
      147 => array('octocvadragintilion','octocvadragintilioane',Words::GENDER_NEUTER),
      150 => array('novemcvadragintilion','novemcvadragintilioane',Words::GENDER_NEUTER),
      153 => array('cvincvagintilion','cvincvagintilioane',Words::GENDER_NEUTER),
      156 => array('uncvincvagintilion','uncvincvagilioane',Words::GENDER_NEUTER),
      159 => array('docvincvagintilion','docvincvagintilioane',Words::GENDER_NEUTER),
      162 => array('trecvincvagintilion','trecvincvagintilioane',Words::GENDER_NEUTER),
      165 => array('cvadrocvincvagintilion','cvadrocvincvagintilioane',Words::GENDER_NEUTER),
      168 => array('cvincvincvagintilion','cvincvincvagintilioane',Words::GENDER_NEUTER),
      171 => array('sexcvincvagintilion','sexcvincvagintilioane',Words::GENDER_NEUTER),
      174 => array('septencvincvagintilion','septencvincvagintilioane',Words::GENDER_NEUTER),
      177 => array('octocvincvagintilion','octocvincvagintilioane',Words::GENDER_NEUTER),
      180 => array('novemcvincvagintilion','novemcvincvagintilioane',Words::GENDER_NEUTER),
      183 => array('sexagintilion','sexagintilioane',Words::GENDER_NEUTER),
      186 => array('unsexagintilion','unsexagintilioane',Words::GENDER_NEUTER),
      189 => array('dosexagintilion','dosexagintilioane',Words::GENDER_NEUTER),
      192 => array('tresexagintilion','tresexagintilioane',Words::GENDER_NEUTER),
      195 => array('cvadrosexagintilion','cvadrosexagintilioane',Words::GENDER_NEUTER),
      198 => array('cvinsexagintilion','cvinsexagintilioane',Words::GENDER_NEUTER),
      201 => array('sexsexagintilion','sexsexagintilioane',Words::GENDER_NEUTER),
      204 => array('septensexagintilion','septensexagintilioane',Words::GENDER_NEUTER),
      207 => array('octosexagintilion','octosexagintilioane',Words::GENDER_NEUTER),
      210 => array('novemsexagintilion','novemsexagintilioane',Words::GENDER_NEUTER),
      213 => array('septuagintilion','septuagintilioane',Words::GENDER_NEUTER),
      216 => array('unseptuagintilion','unseptuagintilioane',Words::GENDER_NEUTER),
      219 => array('doseptuagintilion','doseptuagintilioane',Words::GENDER_NEUTER),
      222 => array('treseptuagintilion','treseptuagintilioane',Words::GENDER_NEUTER),
      225 => array('cvadroseptuagintilion','cvadroseptuagintilioane',Words::GENDER_NEUTER),
      228 => array('cvinseptuagintilion','cvinseptuagintilioane',Words::GENDER_NEUTER),
      231 => array('sexseptuagintilion','sexseptuagintilioane',Words::GENDER_NEUTER),
      234 => array('septenseptuagintilion','septenseptuagintilioane',Words::GENDER_NEUTER),
      237 => array('octoseptuagintilion','octoseptuagintilioane',Words::GENDER_NEUTER),
      240 => array('novemseptuagintilion','novemseptuagintilioane',Words::GENDER_NEUTER),
      243 => array('octogintilion','octogintilioane',Words::GENDER_NEUTER),
      246 => array('unoctogintilion','unoctogintilioane',Words::GENDER_NEUTER),
      249 => array('dooctogintilion','dooctogintilioane',Words::GENDER_NEUTER),
      252 => array('treoctogintilion','treoctogintilioane',Words::GENDER_NEUTER),
      255 => array('cvadrooctogintilion','cvadrooctogintilioane',Words::GENDER_NEUTER),
      258 => array('cvinoctogintilion','cvinoctogintilioane',Words::GENDER_NEUTER),
      261 => array('sexoctogintilion','sexoctogintilioane',Words::GENDER_NEUTER),
      264 => array('septoctogintilion','septoctogintilioane',Words::GENDER_NEUTER),
      267 => array('octooctogintilion','octooctogintilioane',Words::GENDER_NEUTER),
      270 => array('novemoctogintilion','novemoctogintilioane',Words::GENDER_NEUTER),
      273 => array('nonagintilion','nonagintilioane',Words::GENDER_NEUTER),
      276 => array('unnonagintilion','unnonagintilioane',Words::GENDER_NEUTER),
      279 => array('dononagintilion','dononagintilioane',Words::GENDER_NEUTER),
      282 => array('trenonagintilion','trenonagintilioane',Words::GENDER_NEUTER),
      285 => array('cvadrononagintilion','cvadrononagintilioane',Words::GENDER_NEUTER),
      288 => array('cvinnonagintilion','cvinnonagintilioane',Words::GENDER_NEUTER),
      291 => array('sexnonagintilion','sexnonagintilioane',Words::GENDER_NEUTER),
      294 => array('septennonagintilion','septennonagintilioane',Words::GENDER_NEUTER),
      297 => array('octononagintilion','octononagintilioane',Words::GENDER_NEUTER),
      300 => array('novemnonagintilion','novemnonagintilioane',Words::GENDER_NEUTER),
      303 => array('centilion','centilioane',Words::GENDER_NEUTER),
    );
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
    function _splitNumber($num)
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
    function _get_number_inflection_for_gender($number_atom, $noun, $as_noun=false)
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
    function _get_noun_declension_for_number($plural_rule, $noun)
    {
        if ($noun[2]==Words::GENDER_ABSTRACT) {
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
    function _get_plural_rule($number)
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
    function _showDigitsGroup($num, $noun, $force_noun=false, $force_plural=false)
    {
        $ret = '';

        // extract the value of each digit from the three-digit number
        $u = $num%10;                  // ones
        $uz = $num%100;                // ones+tens
        $z = ($num-$u)%100/10;         // tens
        $s = ($num-$z*10-$u)%1000/100; // hundreds

        if ($s) {
            $ret.=$this->_showDigitsGroup($s, $this->_exponent[2]);
            if ($uz) {
                $ret.=$this->_sep;
            }
        }
        if ($uz) {
            if (isset($this->_numbers[$uz])) {
              $ret.=$this->_get_number_inflection_for_gender($this->_numbers[$uz], $noun, !$force_noun);
            } else {
                if ($z) {
                    $ret.=$this->_numbers[$z*10]; // no accord needed for tens
                    if ($u) {
                      $ret.=$this->_sep.$this->_and.$this->_sep;
                    }
                }
                if ($u) {
                    $ret.=$this->_get_number_inflection_for_gender($this->_numbers[$u], $noun, !$force_noun);
                }
            }
        }

        if ($noun[2]==Words::GENDER_ABSTRACT) {
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
     *      - Words::GENDER_MASCULINE for masculine nouns
     *      - Words::GENDER_FEMININE for feminine nouns
     *      - Words::GENDER_NEUTER for neuter nouns
     *
     * @param integer $num An integer (or its string representation) between 9.99*-10^302
     *                        and 9.99*10^302 (999 centillions) that need to be converted to words
     * @param array $noun  Optionally you can also provide a noun to be formatted accordingly
     * @return string  The corresponding word representation
     * @access protected
     * @author Bogdan Stăncescu <bogdan@moongate.ro>
     */
    function _toWords($num = 0, $noun = array())
    {
        if (empty($noun)) {
          $noun=array(NULL, NULL, Words::GENDER_ABSTRACT);
        }

        $ret = '';

        // check if $num is a valid non-zero number
        if (!$num || preg_match('/^-?0+$/', $num) || !preg_match('/^-?\d+$/', $num)) {
            $ret = $this->_numbers[0];
            if ($noun[2]!=Words::GENDER_ABSTRACT) {
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
            $ret = $this->_get_number_inflection_for_gender($this->_numbers[1], $noun);
            if ($noun[2]!=Words::GENDER_ABSTRACT) {
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
               $ret.=$this->_showDigitsGroup($number, $this->_exponent[($pow-1)*3]);
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
    // }}}

    // {{{ toCurrencyWords()

    /**
     * Converts a currency value to its word representation
     * (with monetary units) in Romanian
     *
     * @param integer $int_curr         An international currency symbol
     *                                  as defined by the ISO 4217 standard (three characters)
     * @param integer $decimal          A money total amount without fraction part (e.g. amount of dollars)
     * @param integer $fraction         Fractional part of the money amount (e.g. amount of cents)
     *                                  Optional. Defaults to false.
     * @param integer $convert_fraction Convert fraction to words (left as numeric if set to false).
     *                                  Optional. Defaults to true.
     *
     * @return string  The corresponding word representation for the currency
     *
     * @access public
     * @author Bogdan Stăncescu <bogdan@moongate.ro>
     */
    function toCurrencyWords($int_curr, $decimal, $fraction = false, $convert_fraction = true)
    {
        $int_curr = strtoupper($int_curr);
        if (!isset($this->_currency_names[$int_curr])) {
            $int_curr = $this->def_currency;
        }

        $curr_nouns = $this->_currency_names[$int_curr];
        $ret = $this->_toWords($decimal, $curr_nouns[0]);

        if ($fraction !== false) {
            $ret .= $this->_sep . $this->_and;
            if ($convert_fraction) {
                $ret .= $this->_sep . $this->_toWords($fraction, $curr_nouns[1]);
            } else {
                $ret .= $fraction . $this->_sep;
                $plural_rule = $this->_get_plural_rule($fraction);
                $this->_get_noun_declension_for_number($curr_nouns[1]);
            }
        }

        return $ret;
    }

    // }}}
}
