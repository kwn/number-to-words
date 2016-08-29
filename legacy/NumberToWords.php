<?php

namespace NumberToWords;

use NumberToWords\NumberTransformer\BulgarianNumberTransformer;
use NumberToWords\NumberTransformer\EnglishNumberTransformer;
use NumberToWords\NumberTransformer\FrenchNumberTransformer;
use NumberToWords\NumberTransformer\GermanNumberTransformer;
use NumberToWords\NumberTransformer\HungarianNumberTransformer;
use NumberToWords\NumberTransformer\PolishNumberTransformer;
use NumberToWords\NumberTransformer\NumberTransformer;

class NumberToWords
{
    private $languageMappings = [
        'bg' => BulgarianNumberTransformer::class,
        'de' => GermanNumberTransformer::class,
        'en' => EnglishNumberTransformer::class,
        'fr' => FrenchNumberTransformer::class,
        'hu' => HungarianNumberTransformer::class,
        'pl' => PolishNumberTransformer::class,
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
            throw new \InvalidArgumentException(sprintf('Language %s does not exist.', $language));
        }

        return new $this->languageMappings[$language];
    }
}
