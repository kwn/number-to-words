<?php

namespace NumberToWords\Service;

class NumberToTripletsConverter
{
    /**
     * @param int $number
     *
     * @return int[]
     */
    public function convertToTriplets($number)
    {
        $triplets = [];

        while ($number > 0) {
            $triplets[] = $number % 1000;
            $number = (int) ($number / 1000);
        }

        return array_reverse($triplets);
    }
}
