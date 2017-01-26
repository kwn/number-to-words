<?php

namespace NumberToWords\Language\English;

use NumberToWords\Language\ExponentGetter;

class EnglishExponentGetter implements ExponentGetter
{
    /**
     * @param int $power
     *
     * @return string
     */
    public function getExponent($power)
    {
        return EnglishDictionary::$exponent[$power];
    }
}
