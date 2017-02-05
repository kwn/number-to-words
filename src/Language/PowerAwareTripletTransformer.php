<?php

namespace NumberToWords\Language;

interface PowerAwareTripletTransformer
{
    /**
     * @param int $number
     * @param int $power
     *
     * @return string
     */
    public function transformToWords($number, $power);
}
