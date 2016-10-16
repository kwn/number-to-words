<?php

namespace NumberToWords\Language;

interface ExponentInflector
{
    /**
     * @param int $number
     * @param int $power
     *
     * @return string
     */
    public function inflectExponent($number, $power);
}
