<?php

namespace Kwn\NumberToWords\Language\Romanian\Transformer\Decorator;

use Kwn\NumberToWords\Language\Romanian\Dictionary\Currency;
use Kwn\NumberToWords\Model\Currency as CurrencyModel;
use Kwn\NumberToWords\Language\Romanian\Transformer\AbstractTransformer;
use Kwn\NumberToWords\Model\Number;

class CurrencyTransformerDecorator extends AbstractTransformerDecorator
{
    /**
     * @var CurrencyModel
     */
    protected $currency;

    /**
     * @param AbstractTransformer $transformer
     * @param CurrencyModel       $currency
     */
    public function __construct(AbstractTransformer $transformer, CurrencyModel $currency)
    {
        parent::__construct($transformer);

        $this->currency = $currency;
    }

    /**
     * Converts a currency value to its word representation
     * (with monetary units) in Romanian
     *
     * @param string $int_curr         An international currency symbol
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
    private function toCurrencyWords($int_curr, $decimal, $fraction = false, $convert_fraction = true)
    {
        $int_curr = strtoupper($int_curr);
        if (!isset(Currency::getCurrencyNames()[$int_curr])) {
            $int_curr = 'EUR';
        }

        $curr_nouns = Currency::getCurrencyNames()[$int_curr];
        $ret = $this->transformer->toWords(new Number($decimal), $curr_nouns[0]);

        if ($fraction !== false) {
            $ret .= $this->_sep . $this->_and;
            if ($convert_fraction) {
                $ret .= $this->_sep . $this->_toWords($fraction, $curr_nouns[1]);
            } else {
                $ret .= $fraction . $this->_sep;
                $plural_rule = $this->_get_plural_rule($fraction);
                $this->_get_noun_declension_for_number($plural_rule, $curr_nouns[1]);
            }
        }

        return $ret;
    }

    /**
     * @param $num
     * @param string $intCurr
     * @param null|string $decimalPoint
     * @return string
     */
    public function toWords(Number $num, $intCurr = '', $decimalPoint = null)
    {
        if (is_null($decimalPoint)) {
            $decimalPoint = '.';
        }

        $num = $num->getValue();

        if (is_float($num)) {
            $num = round($num, 2);
        }

        if (strpos($num, $decimalPoint) === false) {
            return trim($this->toCurrencyWords($this->currency->getIdentifier(), $num));
        }

        $currency = explode($decimalPoint, $num, 2);

        $len = strlen($currency[1]);

        if ($len == 1) {
            // add leading zero
            $currency[1] .= '0';
        } elseif ($len > 2) {

            // cut everything after the 2nd digit
            $currency[1] = substr($currency[1], 0, 2);
        }

        return trim($this->toCurrencyWords($intCurr, $currency[0], $currency[1]));
    }
}
