<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Legacy\Numbers\Words;

class HungarianNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($number)
    {
        $converter = new Words();

        return $converter->toWords($number, 'hu_HU');
    }
}
