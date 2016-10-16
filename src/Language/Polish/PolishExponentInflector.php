<?php

namespace NumberToWords\Language\Polish;

use NumberToWords\Language\Polish\PolishDictionary;
use NumberToWords\Grammar\Inflector\PolishInflector;
use NumberToWords\Language\ExponentInflector;

class PolishExponentInflector implements ExponentInflector
{
    /**
     * @var PolishInflector
     */
    private $inflector;

    /**
     * @param PolishInflector $inflector
     */
    public function __construct(PolishInflector $inflector)
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
