<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Legacy\Numbers\Words;

class RussianNumberTransformer implements NumberTransformer
{
    public function toWords(int $number): string
    {
        $converter = new Words();

        return $converter->transformToWords($number, 'ru');
    }
}
