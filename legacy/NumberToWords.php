<?php

namespace NumberToWords;

use NumberToWords\NumberTransformer\BulgarianNumberTransformer;
use NumberToWords\NumberTransformer\EnglishNumberTransformer;
use NumberToWords\NumberTransformer\FrenchBelgianNumberTransformer;
use NumberToWords\NumberTransformer\FrenchNumberTransformer;
use NumberToWords\NumberTransformer\GermanNumberTransformer;
use NumberToWords\NumberTransformer\HungarianNumberTransformer;
use NumberToWords\NumberTransformer\ItalianNumberTransformer;
use NumberToWords\NumberTransformer\LithuanianNumberTransformer;
use NumberToWords\NumberTransformer\PolishNumberTransformer;
use NumberToWords\NumberTransformer\NumberTransformer;
use NumberToWords\NumberTransformer\PortugueseBrazilianNumberTransformer;
use NumberToWords\NumberTransformer\RomanianNumberTransformer;
use NumberToWords\NumberTransformer\SpanishNumberTransformer;

class NumberToWords
{
    private $languageMappings = [
        'bg' => BulgarianNumberTransformer::class,
        'de' => GermanNumberTransformer::class,
        'en' => EnglishNumberTransformer::class,
        'es' => SpanishNumberTransformer::class,
        'fr' => FrenchNumberTransformer::class,
        'fr_BE' => FrenchBelgianNumberTransformer::class,
        'hu' => HungarianNumberTransformer::class,
        'it' => ItalianNumberTransformer::class,
        'lt' => LithuanianNumberTransformer::class,
        'pl' => PolishNumberTransformer::class,
        'pt_BR' => PortugueseBrazilianNumberTransformer::class,
        'ro' => RomanianNumberTransformer::class,
    ];

    /**
     * @param string $language
     *
     * @throws \InvalidArgumentException
     * @return NumberTransformer
     */
    public function getNumberTransformer($language)
    {
        if (!array_key_exists($language, $this->languageMappings)) {
            throw new \InvalidArgumentException(sprintf('Language %s is not implemented.', $language));
        }

        return new $this->languageMappings[$language];
    }
}
