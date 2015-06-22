<?php

namespace Kwn\NumberToWords\Language\Romanian\Transformer\Decorator;

use Kwn\NumberToWords\Language\Romanian\Dictionary\Currency;
use Kwn\NumberToWords\Language\Romanian\Dictionary\Language;
use Kwn\NumberToWords\Model\Currency as CurrencyModel;
use Kwn\NumberToWords\Language\Romanian\Transformer\AbstractTransformer;
use Kwn\NumberToWords\Model\Number;
use Kwn\NumberToWords\Model\SubunitFormat;

class CurrencyTransformerDecorator extends AbstractTransformerDecorator
{
    /**
     * @var CurrencyModel
     */
    protected $currency;

    /**
     * @var SubunitFormat
     */
    protected $subunit;

    /**
     * Constructor
     *
     * @param AbstractTransformer $transformer
     * @param CurrencyModel       $currency
     * @param SubunitFormat             $subunit
     */
    public function __construct(AbstractTransformer $transformer, CurrencyModel $currency, SubunitFormat $subunit)
    {
        parent::__construct($transformer);

        $this->currency = $currency;
        $this->subunit  = $subunit;
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
            $ret .= ' ' . Language::WORD_AND;
            if ($convert_fraction) {
                $ret .= ' ' . $this->toWords(new Number($fraction), $curr_nouns[1]);
            } else {
                $ret .= $fraction . ' ';
                $plural_rule = $this->_get_plural_rule($fraction);
                $this->_get_noun_declension_for_number($plural_rule, $curr_nouns[1]);
            }
        }

        return trim($ret);
    }

    /**
     * @param Number $number
     *
     * @return string
     */
    public function toWords(Number $number)
    {
        $decimalPoint = '.';

        $amount = round($number->getValue(), 2);

        if (strpos($amount, $decimalPoint) === false) {
            return trim($this->toCurrencyWords($this->currency->getIdentifier(), $amount));
        }

        $currency = explode($decimalPoint, $amount, 2);

        $len = strlen($currency[1]);

        if ($len === 1) {
            $currency[1] .= '0';
        }

        return $this->toCurrencyWords($this->currency->getIdentifier(), $currency[0], $currency[1]);
    }
}
