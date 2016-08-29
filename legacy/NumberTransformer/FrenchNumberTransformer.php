<?php

namespace NumberToWords\NumberTransformer;

class FrenchNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($number)
    {
        $converter = new \Numbers_Words();

        return $converter->toWords($number, 'fr');
    }
}
