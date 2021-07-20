<?php

namespace NumberToWords\Language\Persian;

use NumberToWords\Language\ExponentGetter;

class PersianExponentGetter implements ExponentGetter
{
    private static array $exponent = [
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

    public function getExponent(int $power): string
    {
        return self::$exponent[$power];
    }
}
