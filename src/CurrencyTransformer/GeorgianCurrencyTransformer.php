<?php
/**
 * Created by PhpStorm.
 * User: goderdzi.jobadze
 * Date: 7/19/2019
 * Time: 2:52 PM
 */

namespace NumberToWords\CurrencyTransformer;


use NumberToWords\Legacy\Numbers\Words;
use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class GeorgianCurrencyTransformer implements CurrencyTransformer
{

    /**
     * @param int $amount
     * @param string $currency
     * @param CurrencyTransformerOptions|null $options
     *
     * @return string
     */
    public function toWords($amount, $currency, $options = null)
    {
        $converter = new Words($options);
        return $converter->transformToCurrency($amount, 'ka', $currency);
    }
}