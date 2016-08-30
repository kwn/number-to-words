<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Legacy\Numbers\Words;

class RomanianNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($number)
    {
        $converter = new Words();

        return $converter->toWords($number, 'ro_RO');
    }
}
