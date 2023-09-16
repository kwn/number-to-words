<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Legacy\Numbers\Words;

class DanishNumberTransformer implements NumberTransformer
{
    public function toWords(int $number): string
    {
        $converter = new Words();

        return $converter->transformToWords($number, 'dk');
    }
}
