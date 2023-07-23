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
    }
}
