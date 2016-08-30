<?php

namespace NumberToWords\NumberTransformer;

class FrenchBelgianNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($number)
    {
        $converter = new \Numbers_Words();

        return $converter->toWords($number, 'fr_BE');
    }
}
