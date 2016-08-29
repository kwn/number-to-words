<?php

namespace NumberToWords\NumberTransformer;

class HungarianNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($number)
    {
        $converter = new \Numbers_Words();

        return $converter->toWords($number, 'hu_HU');
    }
}
