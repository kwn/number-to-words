<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Language\Persian\PersianConverter;
use NumberToWords\Language\Persian\PersianDictionary;

class PersianNumberTransformer implements NumberTransformer
{
    public function toWords(int $number): string
    {
        $dictionary = new PersianDictionary();
        return (new PersianConverter($dictionary))->convert($number);
    }
}
