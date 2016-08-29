<?php

namespace NumberToWords;

use NumberToWords\NumberTransformer\PolishNumberTransformer;
use NumberToWords\NumberTransformer\NumberTransformer;

class NumberToWords
{
    private $languageMappings = [
        'pl' => PolishNumberTransformer::class
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
