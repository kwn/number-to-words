<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Legacy\Numbers\Words;

class GeorgianNumberTransformer implements NumberTransformer
{
    public function toWords($number)
    {
        $converter = new Words();
        return $converter->transformToWords($number, 'ka');
    }
}
