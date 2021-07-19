<?php

namespace NumberToWords\Service;

class NumberToTripletsConverter
{
    public function convertToTriplets(int $number): array
    {
        $triplets = [];

        while ($number > 0) {
            $triplets[] = $number % 1000;
            $number = (int) ($number / 1000);
        }

        return array_reverse($triplets);
    }
}
