<?php

namespace NumberToWords\NumberTransformer;

interface NumberTransformer
{
    /**
     * @param int $number
     */
    public function toWords($number);
}
