<?php

namespace NumberToWords\NumberTransformer;

class BulgarianNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($number)
    {
        $converter = new \Numbers_Words();

        return $converter->toWords($number, 'bg');
    }
}
