<?php

namespace NumberToWords\Language\Kurdish;

use NumberToWords\Language\ExponentGetter;

class KurdishExponentGetter implements ExponentGetter
{
    private static array $exponent = [
        '',
        'هەزار',
        'ملیۆن',
        'ملیار',
        'تریلیۆن',
        'کوادریلیۆن',
        'کینتیلیۆن',
        'سکستیلیۆن',
        'سپتیلیۆن',
        'ئۆکتیلیۆن',
        'نۆنیلیۆن',
        'دیسیلیۆن',
        'ئۆندیسیلیۆن',
        'دودیسیلیۆن',
        'تریسیلیۆن',
        'کوادریسیلیۆن',
        'کینتیسیلیۆن',
        'سکستیسیلیۆن',
        'سێپتندسیلیۆن',
        'ئۆکتیسیلیۆن',
        'نۆڤێمدیسیلیۆن',
        'ڤێجینتیلیۆن',
    ];

    public function getExponent(int $power): string
    {
        return self::$exponent[$power];
    }
}
