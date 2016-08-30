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
 * @author   Piotr Klaban <makler@man.torun.pl>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @version  SVN: $Id$
 * @link     http://pear.php.net/package/Numbers_Words
 */

/**
 *
 * Class for translating numbers into Dutch.
 * @author Piotr Klaban
 * @author WHAM van Dinter (for Dutch Translations)
 * @package Words
 */

/**
 * Include needed files
 */
require_once "Numbers/Words.php";

/**
 * Class for translating numbers into Dutch.
 *
 * @category Numbers
 * @package  Words
 * @author   Piotr Klaban <makler@man.torun.pl>
 * @author   WHAM van Dinter (for Dutch Translations)
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @link     http://pear.php.net/package/Numbers_Words
 */
class Numbers_Words_Locale_nl extends Numbers_Words
{

    // {{{ properties

    /**
     * Locale name
     * @var string
     * @access public
     */
    var $locale = 'nl';

    /**
     * Language name in English
     * @var string
     * @access public
     */
    var $lang = 'Dutch';

    /**
     * Native language name
     * @var string
     * @access public
     */
    var $lang_native = 'Nederlands';

    /**
     * The word for the minus sign
     * @var string
     * @access private
     */
    var $_minus = 'Minus'; // minus sign

    /**
     * The sufixes for exponents (singular and plural)
     * Names partly based on:
     * http://nl.wikipedia.org/wiki/Quadriljoen
     * @var array
     * @access private
     */
    var $_exponent = array(
        0 => array(''),
        3 => array('Duizend','Duizend'),
        6 => array('Miljoen','Miljoen'),
        9 => array('Miljard','Miljard'),
       12 => array('Biljoen','Biljoen'),
       15 => array('Biljard','Biljard'),
       18 => array('Triljoen','Triljoen'),
       21 => array('Triljard','Triljard'),
       24 => array('Quadriljoen','Quadriljoen'),
       27 => array('Quadriljard','Quadriljard'),
       30 => array('Quintiljoen','Quintiljoen'),
       33 => array('Quintiljard','Quintiljard'),
       36 => array('Sextiljoen','Sextiljoen'),
       39 => array('Sextiljard','Sextiljard'),
       42 => array('Septiljoen','Septiljoen'),
       45 => array('Septiljard','Septiljard'),
       48 => array('Octiljoen','Octiljoen'),
       51 => array('Octiljard','Octiljard'),
       54 => array('Noniljoen','Noniljoen'),
       57 => array('Noniljard','Noniljard'),
       60 => array('Deciljoen','Deciljoen'),
       63 => array('Deciljard','Deciljard'),
       66 => array('Undeciljoen','Undeciljoen'),
       69 => array('Undeciljard','Undeciljard'),
       72 => array('Duodeciljoen','Duodeciljoen'),
       75 => array('Duodeciljard','Duodeciljard'),
       78 => array('Tredeciljoen','Tredeciljoen'),
       81 => array('Tredeciljard','Tredeciljard'),
      120 => array('Vigintiljoen','Vigintiljoen'),
      123 => array('Vigintiljard','Vigintiljard'),
      600 => array('Zentiljoen','Zentiljoen'), // oder Centillion
      603 => array('Zentiljardn','Zentiljard')
        );

    /**
     * The array containing the digits (indexed by the digits themselves).
     * @var array
     * @access private
     */
    var $_digits = array(
        0 => 'nul', 'een', 'twee', 'drie', 'vier',
        'vijf', 'zes', 'zeven', 'acht', 'negen'
    );

    /**
     * The word separator
     * @var string
     * @access private
     */
    var $_sep = '';

    /**
     * The exponent word separator
     * @var string
     * @access private
     */
    var $_sep2 = '-';

    /**
     * The currency names (based on the below links,
     * informations from central bank websites and on encyclopedias)
     *
     * @var array
     * @link http://30-03-67.dreamstation.com/currency_alfa.htm World Currency Information
     * @link http://www.jhall.demon.co.uk/currency/by_abbrev.html World currencies
     * @link http://www.shoestring.co.kr/world/p.visa/change.htm Currency names in English
     * @access private
     */
    var $_currency_names = array(
      'ALL' => array(array('lek'), array('qindarka')),
      'AUD' => array(array('Australian dollar'), array('cent')),
      'BAM' => array(array('convertible marka'), array('fenig')),
      'BGN' => array(array('lev'), array('stotinka')),
      'BRL' => array(array('real'), array('centavos')),
      'BYR' => array(array('Belarussian rouble'), array('kopiejka')),
      'CAD' => array(array('Canadian dollar'), array('cent')),
      'CHF' => array(array('Swiss franc'), array('rapp')),
      'CYP' => array(array('Cypriot pound'), array('cent')),
      'CZK' => array(array('Czech koruna'), array('halerz')),
      'DKK' => array(array('Danish krone'), array('ore')),
      'EEK' => array(array('kroon'), array('senti')),
      'EUR' => array(array('euro'), array('euro-cent')),
      'GBP' => array(array('pound', 'pounds'), array('pence', 'pence')),
      'HKD' => array(array('Hong Kong dollar'), array('cent')),
      'HRK' => array(array('Croatian kuna'), array('lipa')),
      'HUF' => array(array('forint'), array('filler')),
      'ILS' => array(array('new sheqel','new sheqels'), array('agora','agorot')),
      'ISK' => array(array('Icelandic kr\F3na'), array('aurar')),
      'JPY' => array(array('yen'), array('sen')),
      'LTL' => array(array('litas'), array('cent')),
      'LVL' => array(array('lat'), array('sentim')),
      'MKD' => array(array('Macedonian dinar'), array('deni')),
      'MTL' => array(array('Maltese lira'), array('centym')),
      'NOK' => array(array('Norwegian krone'), array('oere')),
      'PLN' => array(array('zloty', 'zlotys'), array('grosz')),
      'ROL' => array(array('Romanian leu'), array('bani')),
      'RUB' => array(array('Russian Federation rouble'), array('kopiejka')),
      'SEK' => array(array('Swedish krona'), array('oere')),
      'SIT' => array(array('Tolar'), array('stotinia')),
      'SKK' => array(array('Slovak koruna'), array()),
      'TRL' => array(array('lira'), array('kuru\FE')),
      'UAH' => array(array('hryvna'), array('cent')),
      'USD' => array(array('dollar'), array('cent')),
      'YUM' => array(array('dinars'), array('para')),
      'ZAR' => array(array('rand'), array('cent'))
    );

    var $def_currency = 'EUR';

    // }}}
    // {{{ _toWords()

    /**
     * Converts a number to its word representation
     * in Dutch language.
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
     * @author Piotr Klaban <makler@man.torun.pl>
     * @author WHAM van Dinter <willem@fkkc.nl>
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

        if ($h) {
            $ret .= $this->_sep . $this->_digits[$h] . $this->_sep . 'honderd';
        }

         // add digits only in <0>,<1,9> and <21,inf>
        if ($t != 1 && $d > 0) {
            if ($t > 0) {
                $ret .= $this->_digits[$d] . 'en';
            } else {
                $ret .= $this->_digits[$d];
                if ($d == 1) {
                    if ($power == 0) {
                        $ret .= 's'; // fuer eins
                    } else {
                        if ($power != 3) {  // tausend ausnehmen
                            $ret .= ''; // fuer eine
                        }
                    }
                }
            }
        }

        // ten, twenty etc.
        switch ($t) {
        case 9:
        case 8:
        case 7:
        case 6:
        case 5:
            $ret .= $this->_sep . $this->_digits[$t] . 'tig';
            break;

        case 4:
            $ret .= $this->_sep . 'veertig';
            break;

        case 3:
            $ret .= $this->_sep . 'dertig';
            break;

        case 2:
            $ret .= $this->_sep . 'twintig';
            break;

        case 1:
            switch ($d) {
            case 0:
                $ret .= $this->_sep . 'tien';
                break;

            case 1:
                $ret .= $this->_sep . 'elf';
                break;

            case 2:
                $ret .= $this->_sep . 'twaalf';
                break;

            case 3:
                $ret .= $this->_sep . 'dertien';
                break;

            case 4:
                $ret .= $this->_sep . 'veertien';
                break;

            case 5:
            case 6:
            case 7:
            case 8:
            case 9:
                $ret .= $this->_sep . $this->_digits[$d] . 'tien';
                break;

            }
            break;
        }

        if ($power > 0) {
            if (isset($this->_exponent[$power])) {
                $lev = $this->_exponent[$power];
            }

            if (!isset($lev) || !is_array($lev)) {
                return null;
            }

            if ($power == 3) {
                $ret .= $this->_sep . $lev[0];
            } elseif ($d == 1 && ($t+$h) == 0) {
                $ret .= $this->_sep2 . $lev[0] . $this->_sep2;
            } else {
                $ret .= $this->_sep2 . $lev[1] . $this->_sep2;
            }
        }

        if ($powsuffix != '') {
            $ret .= $this->_sep . $powsuffix;
        }

        return $ret;
    }
    // }}}
}
