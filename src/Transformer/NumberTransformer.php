<?php

namespace Kwn\NumberToWords\Transformer;

interface NumberTransformer
{
    /**
     * Convert number to words
     *
     * @param mixed $number
     *
     * @return string
     */
    public function toWords($number);
}
