<?php

namespace NumberToWords\Language\Bulgarian;

use NumberToWords\Language\ExponentInflector;

class BulgarianExponentInflector implements ExponentInflector
{
    protected BulgarianNounGenderInflector $inflector;

    public function __construct(BulgarianNounGenderInflector $inflector)
    {
        $this->inflector = $inflector;
    }

    public function inflectExponent(int $number, int $power): string
    {
        if ($power === 0) {
            return '';
        }

        return $this->inflector->inflectNounByNumber(
            $number,
            BulgarianDictionary
                ::ENUMERATIONS
                    [BulgarianDictionary::ENUMERATION_BY_POWERS_OF_A_THOUSAND]
                    [$power]
                    [BulgarianDictionary::GRAMMATICAL_NUMBER_SINGULAR],
            BulgarianDictionary
                ::ENUMERATIONS
                    [BulgarianDictionary::ENUMERATION_BY_POWERS_OF_A_THOUSAND]
                    [$power]
                    [BulgarianDictionary::GRAMMATICAL_NUMBER_PLURAL],
            BulgarianDictionary
                ::ENUMERATIONS
                    [BulgarianDictionary::ENUMERATION_BY_POWERS_OF_A_THOUSAND]
                    [$power]
                    [BulgarianDictionary::GRAMMATICAL_NUMBER_PLURAL],
        );
    }
}
