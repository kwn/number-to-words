<?php

namespace NumberToWords\NumberTransformer;

class PolishNumberTransformer implements NumberTransformer
{
    /**
     * @param int $number
     *
     * @return string
     */
    public function toWords($number)
    {
        $converter = new \Numbers_Words();

        return $converter->toWords($number, 'pl');
    }
}
