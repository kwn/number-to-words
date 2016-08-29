<?php

namespace NumberToWords\NumberTransformer;

class GermanNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($number)
    {
        $converter = new \Numbers_Words();

        return $converter->toWords($number, 'de');
    }
}
