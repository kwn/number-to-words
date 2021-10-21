<?php

namespace NumberToWords\Language\Arabic;

use NumberToWords\Language\ExponentInflector;

class ArabicExponentInflector implements ExponentInflector
{
    private static $exponent = [
        ['', '', ''],
        ['الف', 'الفين', 'آلاف'],
        ['مليون', 'مليونين', 'ملايين'],
        ['مليار', 'مليارين', 'مليارات'],
        ['ترليون', 'ترليونين', 'ترليونات'],
        ['كوادرليون', 'كوادرليونين', 'كوادرليونات'],
        ['كوينتيليون', 'كوينتيليونين', 'كوينتيليونات']
    ];

    /**
     * @var ArabicNounGenderInflector
     */
    private $inflector;

    /**
     * @param ArabicNounGenderInflector $inflector
     */
    public function __construct(ArabicNounGenderInflector $inflector)
    {
        $this->inflector = $inflector;
    }


    /**
     * @param int $number
     * @param int $power
     *
     * @return string
     */
    public function inflectExponent($number, $power): string
    {
        return $this->inflector->inflectNounByNumber(
            $number,
            self::$exponent[$power][0],
            self::$exponent[$power][1],
            self::$exponent[$power][2]
        );
    }
}
