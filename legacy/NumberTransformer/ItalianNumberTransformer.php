<?php

namespace NumberToWords\NumberTransformer;

class ItalianNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($number)
    {
        $converter = new \Numbers_Words();

        return $converter->toWords($number, 'it_IT');
    }
}
