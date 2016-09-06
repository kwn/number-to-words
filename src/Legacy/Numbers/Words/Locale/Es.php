<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;

class Es extends Words
{
    // {{{ properties

    /**
     * Locale name
     * @var string
     * @access public
     */
    var $defaultLocale = 'es';

    /**
     * Language name in English
     * @var string
     * @access public
     */
    var $lang = 'Spanish';

    /**
     * Native language name
     * @var string
     * @access public
     */
    var $lang_native = 'Español';

    /**
     * The word for the minus sign
     * @var string
     * @access private
     */
    var $_minus = 'menos';

    /**
     * The sufixes for exponents (singular and plural)
     * @var array
     * @access private
     */
    var $_exponent = array(
        0 => array('',''),
        3 => array('mil','mil'),
        6 => array('millón','millones'),
       12 => array('billón','billones'),
       18 => array('trilón','trillones'),
       24 => array('cuatrillón','cuatrillones'),
       30 => array('quintillón','quintillones'),
       36 => array('sextillón','sextillones'),
       42 => array('septillón','septillones'),
       48 => array('octallón','octallones'),
       54 => array('nonallón','nonallones'),
       60 => array('decallón','decallones'),
        );
    /**
     * The array containing the digits (indexed by the digits themselves).
     * @var array
     * @access private
     */
    var $_digits = array(
        0 => 'cero', 'uno', 'dos', 'tres', 'cuatro',
        'cinco', 'seis', 'siete', 'ocho', 'nueve'
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
     * in Spanish (Castellano).
     *
     * @param integer $num   An integer between -infinity and infinity inclusive :)
     *                        that should be converted to a words representation
     * @param integer $power The power of ten for the rest of the number to the right.
     *                        For example toWords(12,3) should give "doce mil".
     *                        Optional, defaults to 0.
     *
     * @return string  The corresponding word representation
     *
     * @access protected
     * @author Xavier Noguer
     * @since  Words 0.16.3
     */
    function _toWords($num, $power = 0)
    {
        // The return string;
        $ret = '';

        // add a the word for the minus sign if necessary
        if (substr($num, 0, 1) == '-') {
            $ret = $this->_sep . $this->_minus;
            $num = substr($num, 1);
        }


        // strip excessive zero signs
        $num = preg_replace('/^0+/', '', $num);

        if (strlen($num) > 6) {
            $current_power = 6;
            // check for highest power
            if (isset($this->_exponent[$power])) {
                // convert the number above the first 6 digits
                // with it's corresponding $power.
                $snum = substr($num, 0, -6);
                $snum = preg_replace('/^0+/', '', $snum);
                if ($snum !== '') {
                    $ret .= $this->_toWords($snum, $power + 6);
                }
            }
            $num = substr($num, -6);
            if ($num == 0) {
                return $ret;
            }
        } elseif ($num == 0 || $num == '') {
            return(' '.$this->_digits[0]);
            $current_power = strlen($num);
        } else {
            $current_power = strlen($num);
        }

        // See if we need "thousands"
        $thousands = floor($num / 1000);
        if ($thousands == 1) {
            $ret .= $this->_sep . 'mil';
        } elseif ($thousands > 1) {
            $ret .= $this->_toWords($thousands, 3);
        }

        // values for digits, tens and hundreds
        $h = floor(($num / 100) % 10);
        $t = floor(($num / 10) % 10);
        $d = floor($num % 10);

        // cientos: doscientos, trescientos, etc...
        switch ($h) {
            case 1:
                if (($d == 0) and ($t == 0)) { // is it's '100' use 'cien'
                    $ret .= $this->_sep . 'cien';
                } else {
                    $ret .= $this->_sep . 'ciento';
                }
                break;
            case 2:
            case 3:
            case 4:
            case 6:
            case 8:
                $ret .= $this->_sep . $this->_digits[$h] . 'cientos';
                break;
            case 5:
                $ret .= $this->_sep . 'quinientos';
                break;
            case 7:
                $ret .= $this->_sep . 'setecientos';
                break;
            case 9:
                $ret .= $this->_sep . 'novecientos';
                break;
        }

        // decenas: veinte, treinta, etc...
        switch ($t) {
            case 9:
                $ret .= $this->_sep . 'noventa';
                break;

            case 8:
                $ret .= $this->_sep . 'ochenta';
                break;

            case 7:
                $ret .= $this->_sep . 'setenta';
                break;

            case 6:
                $ret .= $this->_sep . 'sesenta';
                break;

            case 5:
                $ret .= $this->_sep . 'cincuenta';
                break;

            case 4:
                $ret .= $this->_sep . 'cuarenta';
                break;

            case 3:
                $ret .= $this->_sep . 'treinta';
                break;

            case 2:
                if ($d == 0) {
                    $ret .= $this->_sep . 'veinte';
                } else {
                    if (($power > 0) and ($d == 1)) {
                        $ret .= $this->_sep . 'veintiún';
                    } else {
                        $ret .= $this->_sep . 'veinti' . $this->_digits[$d];
                    }
                }
                break;

            case 1:
                switch ($d) {
                    case 0:
                        $ret .= $this->_sep . 'diez';
                        break;

                    case 1:
                        $ret .= $this->_sep . 'once';
                        break;

                    case 2:
                        $ret .= $this->_sep . 'doce';
                        break;

                    case 3:
                        $ret .= $this->_sep . 'trece';
                        break;

                    case 4:
                        $ret .= $this->_sep . 'catorce';
                        break;

                    case 5:
                        $ret .= $this->_sep . 'quince';
                        break;

                    case 6:
                    case 7:
                    case 9:
                    case 8:
                        $ret .= $this->_sep . 'dieci' . $this->_digits[$d];
                        break;
                }
                break;
        }

        // add digits only if it is a multiple of 10 and not 1x or 2x
        if (($t != 1) and ($t != 2) and ($d > 0)) {
            // don't add 'y' for numbers below 10
            if ($t != 0) {
                // use 'un' instead of 'uno' when there is a suffix ('mil', 'millones', etc...)
                if (($power > 0) and ($d == 1)) {
                    $ret .= $this->_sep.' y un';
                } else {
                    $ret .= $this->_sep.'y '.$this->_digits[$d];
                }
            } else {
                if (($power > 0) and ($d == 1)) {
                    $ret .= $this->_sep.'un';
                } else {
                    $ret .= $this->_sep.$this->_digits[$d];
                }
            }
        }

        if ($power > 0) {
            if (isset($this->_exponent[$power])) {
                $lev = $this->_exponent[$power];
            }

            if (!isset($lev) || !is_array($lev)) {
                return null;
            }

            // if it's only one use the singular suffix
            if (($d == 1) and ($t == 0) and ($h == 0)) {
                $suffix = $lev[0];
            } else {
                $suffix = $lev[1];
            }
            if ($num != 0) {
                $ret .= $this->_sep . $suffix;
            }
        }

        return $ret;
    }
    // }}}
}
