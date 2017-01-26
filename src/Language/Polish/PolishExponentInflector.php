<?php

namespace NumberToWords\Language\Polish;

use NumberToWords\Language\ExponentInflector;

class PolishExponentInflector implements ExponentInflector
{
    /**
     * @var PolishNounGenderInflector
     */
    private $inflector;

    /**
     * @param PolishNounGenderInflector $inflector
     */
    public function __construct(PolishNounGenderInflector $inflector)
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
            PolishDictionary::$exponent[$power][0],
            PolishDictionary::$exponent[$power][1],
            PolishDictionary::$exponent[$power][2]
        );
    }
}
