<?php

namespace NumberToWords\Language\Serbian;

class SerbianExponentGenderInflector
{
    protected static array $exponentUnits = [
        ['jedan', 'jedna'],
        ['dva', 'dve'],
        ['tri', 'tri'],
        ['četiri', 'četiri'],
        ['pet', 'pet'],
        ['šest', 'šest'],
        ['sedam', 'sedam'],
        ['osam', 'osam'],
        ['devet', 'devet'],
    ];

    /**
     * Returns a proper unit gender to use, for all the triplet exponents
     * @param  string  $power
     *
     * @return string
     */
    public function inflectExponentGender(int $power): string
    {
        if ($power % 2) {
            // For exponent of 1, 3 (*ijarda), use female form
            return 0;
        } else {
            // For exponent of 0, 2 (*ilion) , use male form
            return 1;
        }
    }
}
