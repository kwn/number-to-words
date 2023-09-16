<?php

namespace NumberToWords\Language\Slovak;

use NumberToWords\Language\ExponentInflector;

class SlovakExponentInflector implements ExponentInflector
{
    private static array $exponent = [
        ['', '', ''],
        ['tisíc', 'tisíce', 'tisíc'],
        ['milión', 'milióny', 'miliónov'],
        ['miliarda', 'miliardy', 'miliard'],
        ['bilion', 'biliony', 'bilionów'],
        //polish exponents next
        ['biliard', 'biliardy', 'biliardów'],
        ['trylion', 'tryliony', 'trylionów'],
        ['tryliard', 'tryliardy', 'tryliardów'],
        ['kwadrylion', 'kwadryliony', 'kwadrylionów'],
        ['kwadryliard', 'kwadryliardy', 'kwadryliardów'],
        ['kwintylion', 'kwintyliony', 'kwintylionów'],
        ['kwintyliiard', 'kwintyliardy', 'kwintyliardów'],
        ['sekstylion', 'sekstyliony', 'sekstylionów'],
        ['sekstyliard', 'sekstyliardy', 'sekstyliardów'],
        ['septylion', 'septyliony', 'septylionów'],
        ['septyliard', 'septyliardy', 'septyliardów'],
        ['oktylion', 'oktyliony', 'oktylionów'],
        ['oktyliard', 'oktyliardy', 'oktyliardów'],
        ['nonylion', 'nonyliony', 'nonylionów'],
        ['nonyliard', 'nonyliardy', 'nonyliardów'],
        ['decylion', 'decyliony', 'decylionów'],
        ['decyliard', 'decyliardy', 'decyliardów'],
    ];

    private SlovakNounGenderInflector $inflector;

    public function __construct(SlovakNounGenderInflector $inflector)
    {
        $this->inflector = $inflector;
    }

    public function inflectExponent(int $number, int $power): string
    {
        return $this->inflector->inflectNounByNumber(
            $number,
            self::$exponent[$power][0],
            self::$exponent[$power][1],
            self::$exponent[$power][2]
        );
    }
}
