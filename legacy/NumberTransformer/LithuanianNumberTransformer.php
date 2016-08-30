<?php

namespace NumberToWords\NumberTransformer;

class LithuanianNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($number)
    {
        $converter = new \Numbers_Words();

        return $converter->toWords($number, 'lt');
    }
}
