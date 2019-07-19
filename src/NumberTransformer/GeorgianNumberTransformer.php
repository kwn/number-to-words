<?php
/**
 * Created by PhpStorm.
 * User: goderdzi.jobadze
 * Date: 7/19/2019
 * Time: 2:50 PM
 */

namespace NumberToWords\NumberTransformer;


use NumberToWords\Legacy\Numbers\Words;

class GeorgianNumberTransformer implements NumberTransformer
{

    /**
     * @param int $number
     *
     * @return string
     */
    public function toWords($number)
    {
        $converter = new Words();
        return $converter->transformToWords($number, 'ka');

    }
}