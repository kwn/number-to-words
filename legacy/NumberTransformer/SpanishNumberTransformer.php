<?php

namespace NumberToWords\NumberTransformer;

class SpanishNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($number)
    {
        $converter = new \Numbers_Words();

        return $converter->toWords($number, 'es');
    }
}
