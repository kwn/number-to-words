<?php
/**
 * Words
 *
 * PHP version 5
 *
 * Copyright (c) 1997-2006 The PHP Group
 *
 * This source file is subject to version 3.01 of the PHP license,
 * that is bundled with this package in the file LICENSE, and is
 * available at through the world-wide-web at
 * http://www.php.net/license/3_01.txt
 * If you did not receive a copy of the PHP license and are unable to
 * obtain it through the world-wide-web, please send a note to
 * license@php.net so we can mail you a copy immediately.
 *
 * @category Numbers
 * @package  Words
 * @author   Petr 'PePa' Pavel <petr.pavel@pepa.info>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @version  SVN: $Id$
 * @link     http://pear.php.net/package/Numbers_Words
 */

/**
 * Class for translating numbers into Czech.
 *
 * @author Petr 'PePa' Pavel
 * @package Words
 */

/**
 * Include needed files
 */
require_once "Numbers/Words.php";

/**
 * Class for translating numbers into Czech.
 *
 * @category Numbers
 * @package  Words
 * @author   Petr 'PePa' Pavel <petr.pavel@pepa.info>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @link     http://pear.php.net/package/Numbers_Words
 */
class Numbers_Words_Locale_cs extends Numbers_Words
{

    // {{{ properties

    /**
     * Locale name
     * @var string
     * @access public
     */
    var $locale = 'cs';

    /**
     * Language name in English
     * @var string
     * @access public
     */
    var $lang = 'Czech';

    /**
     * Native language name
     * @var string
     * @access public
     */
    var $lang_native = 'Czech';

    /**
     * The word for the minus sign
     * @var string
     * @access private
     */
    var $_minus = 'm�nus'; // minus sign

    /**
     * The sufixes for exponents (singular and plural)
     * Names partly based on:
     * http://cs.wikipedia.org/wiki/P%C5%99edpony_soustavy_SI
     * the rest was translated from lang.en_GB.php
     * names verified by "Ustav pro jazyk cesky" only up to Septilion
     * (they could verify only the lingual matter - not the mathematical one)
     * @var array
     * @access private
     */
    var $_exponent = array(
        0 => array(''),
        3 => array('tis�c','tis�ce','tis�c'),
        6 => array('milion','miliony','milion�'),
        9 => array('miliarda','miliardy','miliard'),
       12 => array('bilion','biliony','bilion�'),
       15 => array('biliarda','biliardy','biliard'),
       18 => array('trilion','triliony','trilion�'),
       21 => array('triliarda','triliardy','triliard'),

       24 => array('kvadrilion','kvadriliony','kvadrilion�'),
       30 => array('kvintilion','kvintiliony','kvintilion�'),
       36 => array('sextilion','sextiliony','sextilion�'),
       42 => array('septilion','septiliony','septilion�'),

       48 => array('oktilion','oktiliony','oktilion�'),
       54 => array('nonilion','noniliony','nonilion�'),
       60 => array('decilion','deciliony','decilion�'),

       66 => array('undecilion','undeciliony','undecilion�'),
       72 => array('duodecilion','duodeciliony','duodecilion�'),
       78 => array('tredecilion','tredeciliony','tredecilion�'),
       84 => array('kvatrodecilion','kvatrodeciliony','kvatrodecilion�'),
       90 => array('kvindecilion','kvindeciliony','kvindecilion�'),
       96 => array('sexdecilion','sexdeciliony','sexdecilion�'),
      102 => array('septendecilion','septendeciliony','septendecilion�'),
      108 => array('oktodecilion','oktodeciliony','oktodecilion�'),
      114 => array('novemdecilion','novemdeciliony','novemdecilion�'),
      120 => array('vigintilion','vigintiliony','vigintilion�'),
      192 => array('duotrigintilion','duotrigintiliony','duotrigintilion�'),
      600 => array('centilion','centiliony','centilion�')

        );

    /**
     * The array containing the forms of Czech word for "hundred"
     * @var array
     * @access private
     */
    var $_hundreds = array(
        0 => 'sto', 'st�', 'sta', 'set'
    );

    /**
     * The array containing the digits (indexed by the digits themselves).
     * @var array
     * @access private
     */
    var $_digits = array(
        0 => 'nula', 'jedna', 'dva', 't�i', '�ty�i',
        'p�t', '�est', 'sedm', 'osm', 'dev�t'
    );

    /**
     * The word separator
     * @var string
     * @access private
     */
    var $_sep = ' ';

    // }}}
    // {{{ _toWords()

    /**
     * Converts a number to its word representation
     * in Czech language
     *
     * @param integer $num       An integer between -infinity and infinity inclusive :)
     *                           that need to be converted to words
     * @param integer $power     The power of ten for the rest of the number to the right.
     *                           Optional, defaults to 0.
     * @param integer $powsuffix The power name to be added to the end of the return string.
     *                            Used internally. Optional, defaults to ''.
     *
     * @return string  The corresponding word representation
     *
     * @access protected
     * @author Petr 'PePa' Pavel <petr.pavel@pepa.info>
     * @since  Words 0.16.3
     */
    function _toWords($num, $power = 0, $powsuffix = '')
    {
        $ret = '';

        // add a minus sign
        if (substr($num, 0, 1) == '-') {
            $ret = $this->_sep . $this->_minus;
            $num = substr($num, 1);
        }

        // strip excessive zero signs and spaces
        $num = trim($num);
        $num = preg_replace('/^0+/', '', $num);

        if (strlen($num) > 3) {
            $maxp = strlen($num)-1;
            $curp = $maxp;
            for ($p = $maxp; $p > 0; --$p) { // power

                // check for highest power
                if (isset($this->_exponent[$p])) {
                    // send substr from $curp to $p
                    $snum = substr($num, $maxp - $curp, $curp - $p + 1);
                    $snum = preg_replace('/^0+/', '', $snum);
                    if ($snum !== '') {
                        $cursuffix = $this->_exponent[$power][count($this->_exponent[$power])-1];
                        if ($powsuffix != '') {
                            $cursuffix .= $this->_sep . $powsuffix;
                        }

                        $ret .= $this->_toWords($snum, $p, $cursuffix);
                    }
                    $curp = $p - 1;
                    continue;
                }
            }
            $num = substr($num, $maxp - $curp, $curp - $p + 1);
            if ($num == 0) {
                return $ret;
            }
        } elseif ($num == 0 || $num == '') {
            return $this->_sep . $this->_digits[0];
        }

        $h = $t = $d = 0;

        switch (strlen($num)) {
            case 3:
                $h = (int)substr($num, -3, 1);

            case 2:
                $t = (int)substr($num, -2, 1);

            case 1:
                $d = (int)substr($num, -1, 1);
                break;

            case 0:
                return;
            break;
        }

        if ($h) {
            // inflection of the word "hundred"
            if ($h == 1) {
                $ret .= $this->_sep . $this->_hundreds[0];
            } elseif ($h == 2) {
                $ret .= $this->_sep . "dv�" . $this->_sep . $this->_hundreds[1];
            } elseif (($h > 1) && ($h < 5)) {
                $ret .= $this->_sep . $this->_digits[$h] . $this->_sep . $this->_hundreds[2];
            } else {        //if ($h >= 5)
                $ret .= $this->_sep . $this->_digits[$h] . $this->_sep . $this->_hundreds[3];
            }
            // in English only - add ' and' for [1-9]01..[1-9]99
            // (also for 1001..1099, 10001..10099 but it is harder)
            // for now it is switched off, maybe some language purists
            // can force me to enable it, or to remove it completely
            // if (($t + $d) > 0)
            //   $ret .= $this->wordSeparator . 'and';
        }

        // ten, twenty etc.
        switch ($t) {
            case 2:
            case 3:
            case 4:
                $ret .= $this->_sep . $this->_digits[$t] . 'cet';
                break;

            case 5:
                $ret .= $this->_sep . 'pades�t';
                break;

            case 6:
                $ret .= $this->_sep . '�edes�t';
                break;

            case 7:
                $ret .= $this->_sep . 'sedmdes�t';
                break;

            case 8:
                $ret .= $this->_sep . 'osmdes�t';
                break;

            case 9:
                $ret .= $this->_sep . 'devades�t';
                break;

            case 1:
                switch ($d) {
                    case 0:
                        $ret .= $this->_sep . 'deset';
                        break;

                    case 1:
                        $ret .= $this->_sep . 'jeden�ct';
                        break;

                    case 4:
                        $ret .= $this->_sep . '�trn�ct';
                        break;

                    case 5:
                        $ret .= $this->_sep . 'patn�ct';
                        break;

                    case 9:
                        $ret .= $this->_sep . 'devaten�ct';
                        break;

                    case 2:
                    case 3:
                    case 6:
                    case 7:
                    case 8:
                        $ret .= $this->_sep . $this->_digits[$d] . 'n�ct';
                        break;
                }
                break;
        }

        if (($t != 1) && ($d > 0) && (($power == 0) || ($num > 1))) {
            $ret .= $this->_sep . $this->_digits[$d];
        }

        if ($power > 0) {
            if (isset($this->_exponent[$power])) {
                $lev = $this->_exponent[$power];
            }

            if (!isset($lev) || !is_array($lev)) {
                return null;
            }

            // inflection of exponental words
            if ($num == 1) {
                $idx = 0;
            } elseif ((($num > 1) && ($num < 5)) || ((intval("$t$d") > 1) && (intval("$t$d") < 5))) {
                $idx = 1;
            } else {
                $idx = 2;
            }

            $ret .= $this->_sep . $lev[$idx];
        }

        if ($powsuffix != '') {
            $ret .= $this->_sep . $powsuffix;
        }

        return $ret;
    }
    // }}}
}
