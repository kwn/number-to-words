<?php

namespace Kwn\NumberToWords\Transformer;

interface NumberTransformer
{
    /**
     * @param mixed $number
     *
     * @return string
     */
    public function toWords($number);
}
