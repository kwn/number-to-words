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
 * @author   Andrius Virbičianskas <a@ndri.us>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @version  SVN: $Id$
 * @link     http://pear.php.net/package/Numbers_Words
 */

/**
 * Class for translating numbers into Latvian.
 *
 * @author Andrius Virbičianskas. Source from Laurynas Butkus.
 * @package Words
 */

/**
 * Include needed files
 */
require_once "Numbers/Words.php";

/**
 * Class for translating numbers into Latvian.
 *
 * @category Numbers
 * @package  Words
 * @author   Andrius Virbičianskas <a@ndri.us>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @link     http://pear.php.net/package/Numbers_Words
 */
class Numbers_Words_Locale_lv extends Numbers_Words
{

    // {{{ properties

    /**
     * Locale name
     * @var string
     * @access public
     */
    var $locale = 'lv';

    /**
     * Language name in English
     * @var string
     * @access public
     */
    var $lang = 'Latvian';

    /**
     * Native language name
     * @var string
     * @access public
     */
    var $lang_native = 'latviešu';

    /**
     * The word for the minus sign
     * @var string
     * @access private
     */
    var $_minus = 'minus'; // minus sign

    /**
     * The sufixes for exponents (singular and plural)
     * @var array
     * @access private
     */
    var $_exponent = array(
        0 => array(''),
        3 => array('tūkstotis','tūkstoši','tūkstoši'),
        6 => array('miljons','miljoni','miljons'),
        9 => array('miljards','miljardi','miljardi'),
       12 => array('triljons','triljoni','triljoni'),
       15 => array('kvadriljons','kvadriljoni','kvadriljoni'),
       18 => array('kvintiljons','kvintiljoni','kvintiljoni')
        );

    /**
     * The array containing the digits (indexed by the digits themselves).
     * @var array
     * @access private
     */
    var $_digits = array(
        0 => 'nulle', 'viens', 'divi', 'trīs', 'četri',
        'pieci', 'seši', 'septiņi', 'astoņi', 'deviņi'
    );

    /**
     * The word separator
     * @var string
     * @access private
     */
    var $_sep = ' ';

    /**
     * The default currency name
     * @var string
     * @access public
     */
    var $def_currency = 'Ls';

    // }}}
    // {{{ _toWords()

    /**
     * Converts a number to its word representation
     * in Latvian language
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
     * @author Andrius Virbičianskas <a@ndri.us>
     * @since  Words 0.16.4
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

        if ($h > 1) {
            $ret .= $this->_sep . $this->_digits[$h] . $this->_sep . 'simti';
        } elseif ($h) {
            $ret .= $this->_sep . 'simts';
        }

        // ten, twenty etc.
        switch ($t) {
            case 9:
                $ret .= $this->_sep . 'deviņdesmit';
                break;

            case 8:
                $ret .= $this->_sep . 'astoņdesmit';
                break;

            case 7:
                $ret .= $this->_sep . 'septiņdesmit';
                break;

            case 6:
                $ret .= $this->_sep . 'sešdesmit';
                break;

            case 5:
                $ret .= $this->_sep . 'piecdesmit';
                break;

            case 4:
                $ret .= $this->_sep . 'četrdesmit';
                break;

            case 3:
                $ret .= $this->_sep . 'trīsdesmit';
                break;

            case 2:
                $ret .= $this->_sep . 'divdesmit';
                break;

            case 1:
                switch ($d) {
                    case 0:
                        $ret .= $this->_sep . 'desmit';
                        break;

                    case 1:
                        $ret .= $this->_sep . 'vienpadsmit';
                        break;

                    case 2:
                        $ret .= $this->_sep . 'divpadsmit';
                        break;

                    case 3:
                        $ret .= $this->_sep . 'trīspadsmit';
                        break;

                    case 4:
                        $ret .= $this->_sep . 'četrpadsmit';
                        break;

                    case 5:
                        $ret .= $this->_sep . 'piecpadsmit';
                        break;

                    case 6:
                        $ret .= $this->_sep . 'sešpadsmit';
                        break;

                    case 7:
                        $ret .= $this->_sep . 'septiņpadsmit';
                        break;

                    case 8:
                        $ret .= $this->_sep . 'astoņpadsmit';
                        break;

                    case 9:
                        $ret .= $this->_sep . 'deviņpadsmit';
                        break;
                }
                break;
        }

        // add digits only in <0>,<1,9> and <21,inf>
        if ($t != 1 && $d > 0) {
            if ($d > 1 || !$power || $t) {
                $ret .= $this->_sep . $this->_digits[$d];
            }
        }

        if ($power > 0) {
            if (isset($this->_exponent[$power])) {
                $lev = $this->_exponent[$power];
            }

            if (!isset($lev) || !is_array($lev)) {
                return null;
            }

            if ($t == 1 || ($t > 0 && $d == 0 )) {
                $ret .= $this->_sep . $lev[2];
            } elseif ($d > 1) {
                $ret .= $this->_sep . $lev[1];
            } else {
                $ret .= $this->_sep . $lev[0];
            }
        }

        if ($powsuffix != '') {
            $ret .= $this->_sep . $powsuffix;
        }

        return $ret;
    }
    // }}}
}
