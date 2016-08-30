<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;

class Lt extends Words
{

    // {{{ properties

    /**
     * Locale name
     * @var string
     * @access public
     */
    var $locale = 'lt';

    /**
     * Language name in English
     * @var string
     * @access public
     */
    var $lang = 'Lithuanian';

    /**
     * Native language name
     * @var string
     * @access public
     */
    var $lang_native = 'lietuviškai';

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
        3 => array('tūkstantis','tūkstančiai','tūkstančių'),
        6 => array('milijonas','milijonai','milijonų'),
        9 => array('bilijonas','bilijonai','bilijonų'),
       12 => array('trilijonas','trilijonai','trilijonų'),
       15 => array('kvadrilijonas','kvadrilijonai','kvadrilijonų'),
       18 => array('kvintilijonas','kvintilijonai','kvintilijonų')
        );

    /**
     * The array containing the digits (indexed by the digits themselves).
     * @var array
     * @access private
     */
    var $_digits = array(
        0 => 'nulis', 'vienas', 'du', 'trys', 'keturi',
        'penki', 'šeši', 'septyni', 'aštuoni', 'devyni'
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
    var $def_currency = 'LTL';

    // }}}
    // {{{ _toWords()

    /**
     * Converts a number to its word representation
     * in Lithuanian language
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
     * @author Laurynas Butkus <lauris@night.lt>
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

        switch(strlen($num)) {
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

        if ( $h > 1 ) {
            $ret .= $this->_sep . $this->_digits[$h] . $this->_sep . 'šimtai';
        } elseif ( $h ) {
            $ret .= $this->_sep . 'šimtas';
        }

        // ten, twenty etc.
        switch ($t) {
        case 9:
            $ret .= $this->_sep . 'devyniasdešimt';
            break;

        case 8:
            $ret .= $this->_sep . 'aštuoniasdešimt';
            break;

        case 7:
            $ret .= $this->_sep . 'septyniasdešimt';
            break;

        case 6:
            $ret .= $this->_sep . 'šešiasdešimt';
            break;

        case 5:
            $ret .= $this->_sep . 'penkiasdešimt';
            break;

        case 4:
            $ret .= $this->_sep . 'keturiasdešimt';
            break;

        case 3:
            $ret .= $this->_sep . 'trisdešimt';
            break;

        case 2:
            $ret .= $this->_sep . 'dvidešimt';
            break;

        case 1:
            switch ($d) {
            case 0:
                $ret .= $this->_sep . 'dešimt';
                break;

            case 1:
                $ret .= $this->_sep . 'vienuolika';
                break;

            case 2:
                $ret .= $this->_sep . 'dvylika';
                break;

            case 3:
                $ret .= $this->_sep . 'trylika';
                break;

            case 4:
                $ret .= $this->_sep . 'keturiolika';
                break;

            case 5:
                $ret .= $this->_sep . 'penkiolika';
                break;

            case 6:
                $ret .= $this->_sep . 'šešiolika';
                break;

            case 7:
                $ret .= $this->_sep . 'septyniolika';
                break;

            case 8:
                $ret .= $this->_sep . 'aštuoniolika';
                break;

            case 9:
                $ret .= $this->_sep . 'devyniolika';
                break;

            }
            break;
        }

        // add digits only in <0>,<1,9> and <21,inf>
        if ($t != 1 && $d > 0) {
            if ( $d > 1 || !$power || $t ) {
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

            //echo " $t $d  <br>";

            if ($t == 1 || ($t > 0 && $d == 0 )) {
                $ret .= $this->_sep . $lev[2];
            } elseif ( $d > 1 ) {
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
