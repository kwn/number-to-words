<?php

namespace Kwn\NumberToWords\Transformer;

use Kwn\NumberToWords\Model\Number;

interface NumberTransformer
{
    /**
     * Convert number to words
     *
     * @param Number $number
     *
     * @return string
     */
    public function toWords(Number $number);
}
