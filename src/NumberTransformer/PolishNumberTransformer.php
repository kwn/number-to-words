<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Legacy\Numbers\Words\Locale\Pl;

class PolishNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($number)
    {
        $converter = new Pl();

        return $converter->toWords($number);
    }
}
