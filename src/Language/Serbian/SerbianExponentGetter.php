<?php

namespace NumberToWords\Language\Serbian;

use NumberToWords\Language\ExponentGetter;

class SerbianExponentGetter implements ExponentGetter
{
    private static array $exponent = [
      ['', ''],
      ['hiljadu', 'hiljada'],
      ['milion', 'miliona'],
      ['milijarda', 'milijardi'],
      ['bilion', 'biliona'],
      ['bilijarda', 'bilijardi'],
      ['trilion', 'triliona'],
      ['trilijarda', 'trilijardi'],
      ['kvadrilion', 'kvadriliona'],
      ['kvadrilijarda', 'kvadrilijardi'],
      ['kvintilion', 'kvintiliona'],
      ['kvintilijarda', 'kvintilijardi'],
      ['sekstilion', 'sekstiliona'],
      ['sekstilijarda', 'sekstilijardi'],
      ['septilion', 'septiliona'],
      ['septilijarda', 'septilijardi'],
      ['oktilion', 'oktiliona'],
      ['oktilijarda', 'oktilijardi'],
      ['nonilion', 'noniliona'],
      ['nonilijarda', 'nonilijardi'],
      ['decilion', 'deciliona'],
      ['decilijarda', 'decilijardi'],
    ];

    public function getExponent(int $power): string
    {
        return self::$exponent[$power];
    }
}
