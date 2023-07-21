<?php

namespace NumberToWords\Language\Serbian;

use NumberToWords\Language\ExponentInflector;

class SerbianExponentInflector implements ExponentInflector
{
    protected static array $exponent = [
        ['', '', ''],
        ['hiljada', 'hiljada', 'hiljade'],
        ['milion', 'miliona', 'miliona'],
        ['milijarda', 'milijardi', 'milijarde'],
        ['bilion', 'biliona', 'biliona'],
        ['bilijarda', 'bilijardi', 'bilijarde'],
        ['trilion', 'triliona', 'triliona'],
        ['trilijarda', 'trilijardi', 'trilijarde'],
        ['kvadrilion', 'kvadriliona', 'kvadriliona'],
        ['kvadrilijarda', 'kvadrilijardi', 'kvadrilijarde'],
        ['kvintilion', 'kvintiliona', 'kvintiliona'],
        ['kvintilijarda', 'kvintilijardi', 'kvintilijarde'],
        ['sekstilion', 'sekstiliona', 'sekstiliona'],
        ['sekstilijarda', 'sekstilijardi', 'sekstilijarde'],
        ['septilion', 'septiliona', 'septiliona'],
        ['septilijarda', 'septilijardi', 'septilijarde'],
        ['oktilion', 'oktiliona', 'oktiliona'],
        ['oktilijarda', 'oktilijardi', 'oktilijarde'],
        ['nonilion', 'noniliona', 'noniliona'],
        ['nonilijarda', 'nonilijardi', 'nonilijarde'],
        ['decilion', 'deciliona', 'deciliona'],
        ['decilijarda', 'decilijardi', 'decilijarde'],
    ];

    protected SerbianNounGenderInflector $inflector;

    public function __construct(SerbianNounGenderInflector $inflector)
    {
        $this->inflector = $inflector;
    }

    public function inflectExponent(int $number, int $power): string
    {

        return $this->inflector->inflectNounByNumber(
            $number,
            self::$exponent[$power][0],
            self::$exponent[$power][1],
            self::$exponent[$power][2],
        );

        /*
         * 1 hiljada
         * 2 hiljade
         * 3 hiljade
         * 4 hiljade
         * 5 hiljada
         * 10 hiljada
         * 11 hiljada
         * 19 hiljada
         * 20 hiljada
         * 21 hiljada
         * 22 hiljade
         * 23 hiljade
         * 24 hiljade
         * 25 hiljada
         * 30 hiljada
         * 31 hiljada
         * 32 hiljade
         * 33 hiljade
         * 34 hiljade
         * 35 hiljada
         * 101 hiljada
         * 102 hiljade
         * 103 hiljade
         * 104 hiljade
         * 105 hiljada
         */
        $level = self::$exponent[$power];
        $units = $number % 10;
        $tens = ((int) ($number / 10)) % 10;

        if ($tens === 1) {
            // For *11 .. *19
            return $level[1];

        } elseif ($tens !== 1 && $units >= 2 && $units <= 4) {
            return $level[2];

        } elseif ($units === 1) {
            // Anything that ends with 1 (but not ending with 11, which was caught earlier)
            return $level[0];

        } else {
            return $level[1];
        }
    }
}
