<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Legacy\Numbers\Words;

class PortugueseNumberTransformer implements NumberTransformer
{
    public function toWords(int $number): string
    {
        $converter = new Words();

        return $converter->transformToWords($number, 'pt_PT');
    }
}
