<?php

namespace NumberToWords\Language\Persian;

use NumberToWords\Language\ExponentGetter;

class PersianExponentGetter implements ExponentGetter
{
    private static $exponent = [
        '',
        'هزار',
        'میلیون',
        'میلیارد',
        'تریلیارد',
        'کادریلیون',
        'کیانتیلیون',
        'سکستیلیون',
        'سپتیلیون',
        'اوکتیلیون',
        'مینیلیون',
        'دسیلیون',
        'انسلیون',
        'دودلیون',
        'ترسیلیون',
    ];

    /**
     * @param int $power
     *
     * @return string
     */
    public function getExponent($power)
    {
        return self::$exponent[$power];
    }
}
