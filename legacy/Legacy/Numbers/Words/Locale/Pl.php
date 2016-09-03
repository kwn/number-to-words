<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;

class Pl extends Words
{
    const LOCALE = 'pl';
    const LANGUAGE_NAME = 'Polish';
    const LANGUAGE_NAME_NATIVE = 'polski';
    const MINUS = 'minus';

    private static $exponent = [
        0   => ['', '', ''],
        3   => ['tysiąc', 'tysiące', 'tysięcy'],
        6   => ['milion', 'miliony', 'milionów'],
        9   => ['miliard', 'miliardy', 'miliardów'],
        12  => ['bilion', 'biliony', 'bilionów'],
        15  => ['biliard', 'biliardy', 'biliardów'],
        18  => ['trylion', 'tryliony', 'trylionów'],
        21  => ['tryliard', 'tryliardy', 'tryliardów'],
        24  => ['kwadrylion', 'kwadryliony', 'kwadrylionów'],
        27  => ['kwadryliard', 'kwadryliardy', 'kwadryliardów'],
        30  => ['kwintylion', 'kwintyliony', 'kwintylionów'],
        33  => ['kwintyliiard', 'kwintyliardy', 'kwintyliardów'],
        36  => ['sekstylion', 'sekstyliony', 'sekstylionów'],
        39  => ['sekstyliard', 'sekstyliardy', 'sekstyliardów'],
        42  => ['septylion', 'septyliony', 'septylionów'],
        45  => ['septyliard', 'septyliardy', 'septyliardów'],
        48  => ['oktylion', 'oktyliony', 'oktylionów'],
        51  => ['oktyliard', 'oktyliardy', 'oktyliardów'],
        54  => ['nonylion', 'nonyliony', 'nonylionów'],
        57  => ['nonyliard', 'nonyliardy', 'nonyliardów'],
        60  => ['decylion', 'decyliony', 'decylionów'],
        63  => ['decyliard', 'decyliardy', 'decyliardów'],
        100 => ['centylion', 'centyliony', 'centylionów'],
        103 => ['centyliard', 'centyliardy', 'centyliardów'],
        120 => ['wicylion', 'wicylion', 'wicylion'],
        123 => ['wicyliard', 'wicyliardy', 'wicyliardów'],
        180 => ['trycylion', 'trycylion', 'trycylion'],
        183 => ['trycyliard', 'trycyliardy', 'trycyliardów'],
        240 => ['kwadragilion', 'kwadragilion', 'kwadragilion'],
        243 => ['kwadragiliard', 'kwadragiliardy', 'kwadragiliardów'],
        300 => ['kwinkwagilion', 'kwinkwagilion', 'kwinkwagilion'],
        303 => ['kwinkwagiliard', 'kwinkwagiliardy', 'kwinkwagiliardów'],
        360 => ['seskwilion', 'seskwilion', 'seskwilion'],
        363 => ['seskwiliard', 'seskwiliardy', 'seskwiliardów'],
        420 => ['septagilion', 'septagilion', 'septagilion'],
        423 => ['septagiliard', 'septagiliardy', 'septagiliardów'],
        480 => ['oktogilion', 'oktogilion', 'oktogilion'],
        483 => ['oktogiliard', 'oktogiliardy', 'oktogiliardów'],
        540 => ['nonagilion', 'nonagilion', 'nonagilion'],
        543 => ['nonagiliard', 'nonagiliardy', 'nonagiliardów'],
        600 => ['centylion', 'centyliony', 'centylionów'],
        603 => ['centyliard', 'centyliardy', 'centyliardów'],
    ];

    private static $digits = array(
        0 => 'zero',
        'jeden',
        'dwa',
        'trzy',
        'cztery',
        'pięć', 'sześć', 'siedem', 'osiem', 'dziewięć'
    );

    private $wordSeparator = ' ';

    /**
     * The currency names (based on the below links,
     * informations from central bank websites and on encyclopedias)
     *
     * @var array
     * @link http://www.xe.com/iso4217.htm Currency codes
     * @link http://www.republika.pl/geographia/peuropy.htm Europe review
     * @link http://pieniadz.hoga.pl/waluty_objasnienia.asp Currency service
     * @access private
     */
    private $_currency_names = array(
        'ALL' => array(array('lek','leki','leków'), array('quindarka','quindarki','quindarek')),
        'AUD' => array(array('dolar australijski', 'dolary australijskie', 'dolarów australijskich'), array('cent', 'centy', 'centów')),
        'BAM' => array(array('marka','marki','marek'), array('fenig','fenigi','fenigów')),
        'BGN' => array(array('lew','lewy','lew'), array('stotinka','stotinki','stotinek')),
        'BRL' => array(array('real','reale','realów'), array('centavos','centavos','centavos')),
        'BYR' => array(array('rubel','ruble','rubli'), array('kopiejka','kopiejki','kopiejek')),
        'CAD' => array(array('dolar kanadyjski', 'dolary kanadyjskie', 'dolarów kanadyjskich'), array('cent', 'centy', 'centów')),
        'CHF' => array(array('frank szwajcarski','franki szwajcarskie','franków szwajcarskich'), array('rapp','rappy','rappów')),
        'CYP' => array(array('funt cypryjski','funty cypryjskie','funtów cypryjskich'), array('cent', 'centy', 'centów')),
        'CZK' => array(array('korona czeska','korony czeskie','koron czeskich'), array('halerz','halerze','halerzy')),
        'DKK' => array(array('korona duńska','korony duńskie','koron duńskich'), array('ore','ore','ore')),
        'EEK' => array(array('korona estońska','korony estońskie','koron estońskich'), array('senti','senti','senti')),
        'EUR' => array(array('euro', 'euro', 'euro'), array('eurocent', 'eurocenty', 'eurocentów')),
        'GBP' => array(array('funt szterling','funty szterlingi','funtów szterlingów'), array('pens','pensy','pensów')),
        'HKD' => array(array('dolar Hongkongu','dolary Hongkongu','dolarów Hongkongu'), array('cent', 'centy', 'centów')),
        'HRK' => array(array('kuna','kuny','kun'), array('lipa','lipy','lip')),
        'HUF' => array(array('forint','forinty','forintów'), array('filler','fillery','fillerów')),
        'ILS' => array(array('nowy szekel','nowe szekele','nowych szekeli'), array('agora','agory','agorot')),
        'ISK' => array(array('korona islandzka','korony islandzkie','koron islandzkich'), array('aurar','aurar','aurar')),
        'JPY' => array(array('jen','jeny','jenów'), array('sen','seny','senów')),
        'LTL' => array(array('lit','lity','litów'), array('cent', 'centy', 'centów')),
        'LVL' => array(array('łat','łaty','łatów'), array('sentim','sentimy','sentimów')),
        'MKD' => array(array('denar','denary','denarów'), array('deni','deni','deni')),
        'MTL' => array(array('lira maltańska','liry maltańskie','lir maltańskich'), array('centym','centymy','centymów')),
        'NOK' => array(array('korona norweska','korony norweskie','koron norweskich'), array('oere','oere','oere')),
        'PLN' => array(array('złoty', 'złote', 'złotych'), array('grosz', 'grosze', 'groszy')),
        'ROL' => array(array('lej','leje','lei'), array('bani','bani','bani')),
        'RUB' => array(array('rubel','ruble','rubli'), array('kopiejka','kopiejki','kopiejek')),
        'SEK' => array(array('korona szwedzka','korony szwedzkie','koron szweckich'), array('oere','oere','oere')),
        'SIT' => array(array('tolar','tolary','tolarów'), array('stotinia','stotinie','stotini')),
        'SKK' => array(array('korona słowacka','korony słowackie','koron słowackich'), array('halerz','halerze','halerzy')),
        'TRL' => array(array('lira turecka','liry tureckie','lir tureckich'), array('kurusza','kurysze','kuruszy')),
        'UAH' => array(array('hrywna','hrywna','hrywna'), array('cent', 'centy', 'centów')),
        'USD' => array(array('dolar','dolary','dolarów'), array('cent', 'centy', 'centów')),
        'YUM' => array(array('dinar','dinary','dinarów'), array('para','para','para')),
        'ZAR' => array(array('rand','randy','randów'), array('cent', 'centy', 'centów'))
    );

    /**
     * The default currency name
     * @var string
     * @access public
     */
    var $def_currency = 'PLN'; // Polish zloty

    /**
     * Converts a number to its word representation
     * in Polish language
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
     * @since  Words 0.16.3
     */
    function _toWords($num, $power = 0, $powsuffix = '')
    {
        $ret = '';

        // add a minus sign
        if (substr($num, 0, 1) == '-') {
            $ret = $this->wordSeparator . self::MINUS;
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
                if (isset(self::$exponent[$p])) {
                    // send substr from $curp to $p
                    $snum = substr($num, $maxp - $curp, $curp - $p + 1);
                    $snum = preg_replace('/^0+/', '', $snum);
                    if ($snum !== '') {
                        $cursuffix = self::$exponent[$power][count(self::$exponent[$power])-1];
                        if ($powsuffix != '') {
                            $cursuffix .= $this->wordSeparator . $powsuffix;
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
            return $this->wordSeparator . self::$digits[0];
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

        switch ($h) {
        case 9:
            $ret .= $this->wordSeparator . 'dziewięćset';
            break;

        case 8:
            $ret .= $this->wordSeparator . 'osiemset';
            break;

        case 7:
            $ret .= $this->wordSeparator . 'siedemset';
            break;

        case 6:
            $ret .= $this->wordSeparator . 'sześćset';
            break;

        case 5:
            $ret .= $this->wordSeparator . 'pięćset';
            break;

        case 4:
            $ret .= $this->wordSeparator . 'czterysta';
            break;

        case 3:
            $ret .= $this->wordSeparator . 'trzysta';
            break;

        case 2:
            $ret .= $this->wordSeparator . 'dwieście';
            break;

        case 1:
            $ret .= $this->wordSeparator . 'sto';
            break;
        }

        switch ($t) {
        case 9:
        case 8:
        case 7:
        case 6:
        case 5:
            $ret .= $this->wordSeparator . self::$digits[$t] . 'dziesiąt';
            break;

        case 4:
            $ret .= $this->wordSeparator . 'czterdzieści';
            break;

        case 3:
            $ret .= $this->wordSeparator . 'trzydzieści';
            break;

        case 2:
            $ret .= $this->wordSeparator . 'dwadzieścia';
            break;

        case 1:
            switch ($d) {
            case 0:
                $ret .= $this->wordSeparator . 'dziesięć';
                break;

            case 1:
                $ret .= $this->wordSeparator . 'jedenaście';
                break;

            case 2:
            case 3:
            case 7:
            case 8:
                $ret .= $this->wordSeparator . self::$digits[$d] . 'naście';
                break;

            case 4:
                $ret .= $this->wordSeparator . 'czternaście';
                break;

            case 5:
                $ret .= $this->wordSeparator . 'piętnaście';
                break;

            case 6:
                $ret .= $this->wordSeparator . 'szesnaście';
                break;

            case 9:
                $ret .= $this->wordSeparator . 'dziewiętnaście';
                break;
            }
            break;
        }

        if ($t != 1 && $d > 0) {
            $ret .= $this->wordSeparator . self::$digits[$d];
        }

        if ($t == 1) {
            $d = 0;
        }

        if (( $h + $t ) > 0 && $d == 1) {
            $d = 0;
        }

        if ($power > 0) {
            if (isset(self::$exponent[$power])) {
                $lev = self::$exponent[$power];
            }

            if (!isset($lev) || !is_array($lev)) {
                return null;
            }

            switch ($d) {
            case 1:
                $suf = $lev[0];
                break;
            case 2:
            case 3:
            case 4:
                $suf = $lev[1];
                break;
            case 0:
            case 5:
            case 6:
            case 7:
            case 8:
            case 9:
                $suf = $lev[2];
                break;
            }

            $ret .= $this->wordSeparator . $suf;
        }

        if ($powsuffix != '') {
            $ret .= $this->wordSeparator . $powsuffix;
        }

        return $ret;
    }

    /**
     * Converts a currency value to its word representation
     * (with monetary units) in Polish language
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
     * @author Piotr Klaban <makler@man.torun.pl>
     * @since  Words 0.4
     */
    function toCurrencyWords($int_curr, $decimal, $fraction = false, $convert_fraction = true)
    {
        $int_curr = strtoupper($int_curr);
        if (!isset($this->_currency_names[$int_curr])) {
            $int_curr = $this->def_currency;
        }

        $curr_names = $this->_currency_names[$int_curr];

        $ret  = trim($this->_toWords($decimal));
        $lev  = $this->_get_numlevel($decimal);
        $ret .= $this->wordSeparator . $curr_names[0][$lev];

        if ($fraction !== false) {
            if ($convert_fraction) {
                $ret .= $this->wordSeparator . trim($this->_toWords($fraction));
            } else {
                $ret .= $this->wordSeparator . $fraction;
            }
            $lev  = $this->_get_numlevel($fraction);
            $ret .= $this->wordSeparator . $curr_names[1][$lev];
        }

        return $ret;
    }

    /**
     * Returns grammatical "level" of the number - this is necessary
     * for choosing the right suffix for exponents and currency names.
     *
     * @param integer $num An integer between -infinity and infinity inclusive
     *                     that need to be converted to words
     *
     * @return integer  The grammatical "level" of the number.
     *
     * @access private
     * @author Piotr Klaban <makler@man.torun.pl>
     * @since  Words 0.4
     */
    function _get_numlevel($num)
    {
        if (strlen($num) > 3) {
            $num = substr($num, -3);
        }
        $num = (int) $num;

        $h = $t = $d = $lev = 0;

        switch (strlen($num)) {
        case 3:
            $h = (int)substr($num, -3, 1);

        case 2:
            $t = (int)substr($num, -2, 1);

        case 1:
            $d = (int)substr($num, -1, 1);
            break;

        case 0:
            return $lev;
            break;
        }

        if ($t == 1) {
            $d = 0;
        }

        if (( $h + $t ) > 0 && $d == 1) {
            $d = 0;
        }

        switch ($d) {
        case 1:
            $lev = 0;
            break;
        case 2:
        case 3:
        case 4:
            $lev = 1;
            break;
        default:
            $lev = 2;
        }
        return $lev;
    }
}
