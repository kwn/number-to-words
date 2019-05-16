<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Legacy\Numbers\Words;

class Dutch implements NumberTransformer
{
    public function toWords($number)
    {
        $converter = new Words();

        return $converter->transformToWords($number, 'nl');
    }
}
