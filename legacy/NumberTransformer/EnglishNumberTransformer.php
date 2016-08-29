<?php

namespace NumberToWords\NumberTransformer;

class EnglishNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($number)
    {
        $converter = new \Numbers_Words();

        return $converter->toWords($number, 'en_US');
    }
}
