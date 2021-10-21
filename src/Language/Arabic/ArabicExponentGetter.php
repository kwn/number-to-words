<?php

namespace NumberToWords\Language\Arabic;

use NumberToWords\Language\ExponentGetter;

class ArabicExponentGetter implements ExponentGetter
{
    private static $exponent = [
        '',
        'الف',
        'مليون',
        'مليار',
        'ترليون',
        'كوادرليون',
        'كوينتيليون',
        'سكستليون',
        'سبتيليون',
        'اوكتيليون',
        'نونليون',
        'ديليون',
        'انديليون',
        'دوديليون',
        'تريديليون',
        'كواتورديليون',
        'كوينديليون',
        'سيكسديليون',
        'سبتينديليون',
        'اوكتاديليون',
        'novemdecillion',
        'vigintillion',
    ];

    /**
     * @param int $power
     *
     * @return string
     */
    public function getExponent($power): string
    {
        return self::$exponent[$power];
    }
}
