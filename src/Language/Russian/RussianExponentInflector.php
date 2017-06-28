<?php

namespace NumberToWords\Language\Russian;

use NumberToWords\Language\ExponentInflector;

class RussianExponentInflector implements ExponentInflector
{
    private static $exponent = [
        ['', '', ''],
        ['тысяча', 'тысячи', 'тысяч'],
        ['миллион', 'миллиона', 'миллионов'],
        ['миллиард', 'милиарда', 'миллиардов'],
        ['триллион', 'триллионы', 'триллионов'],
        ['квадриллион', 'квадриллиона', 'квадриллионов'],
        ['секстиллион', 'секстильоны', 'секстиллионов'],
    ];

    /**
     * @var RussianNounGenderInflector
     */
    private $inflector;

    /**
     * @param RussianNounGenderInflector $inflector
     */
    public function __construct(RussianNounGenderInflector $inflector)
    {
        $this->inflector = $inflector;
    }

    /**
     * @param int $number
     * @param int $power
     *
     * @return string
     */
    public function inflectExponent($number, $power)
    {
        return $this->inflector->inflectNounByNumber(
            $number,
            self::$exponent[$power][0],
            self::$exponent[$power][1],
            self::$exponent[$power][2]
        );
    }
}
