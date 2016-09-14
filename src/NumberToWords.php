<?php

namespace NumberToWords;

use NumberToWords\CurrencyTransformer\CurrencyTransformer;
use NumberToWords\CurrencyTransformer\EnglishCurrencyTransformer;
use NumberToWords\CurrencyTransformer\PolishCurrencyTransformer;
use NumberToWords\CurrencyTransformer\RomanianCurrencyTransformer;
use NumberToWords\CurrencyTransformer\RussianCurrencyTransformer;
use NumberToWords\NumberTransformer\BulgarianNumberTransformer;
use NumberToWords\NumberTransformer\DutchNumberTransformer;
use NumberToWords\NumberTransformer\EnglishNumberTransformer;
use NumberToWords\NumberTransformer\EstonianNumberTransformer;
use NumberToWords\NumberTransformer\FrenchBelgianNumberTransformer;
use NumberToWords\NumberTransformer\FrenchNumberTransformer;
use NumberToWords\NumberTransformer\GermanNumberTransformer;
use NumberToWords\NumberTransformer\HungarianNumberTransformer;
use NumberToWords\NumberTransformer\ItalianNumberTransformer;
use NumberToWords\NumberTransformer\LatvianNumberTransformer;
use NumberToWords\NumberTransformer\LithuanianNumberTransformer;
use NumberToWords\NumberTransformer\PolishNumberTransformer;
use NumberToWords\NumberTransformer\NumberTransformer;
use NumberToWords\NumberTransformer\PortugueseBrazilianNumberTransformer;
use NumberToWords\NumberTransformer\RomanianNumberTransformer;
use NumberToWords\NumberTransformer\RussianNumberTransformer;
use NumberToWords\NumberTransformer\SpanishNumberTransformer;

class NumberToWords
{
    private $numberTransformers = [
        'bg' => BulgarianNumberTransformer::class,
        'de' => GermanNumberTransformer::class,
        'en' => EnglishNumberTransformer::class,
        'es' => SpanishNumberTransformer::class,
        'et' => EstonianNumberTransformer::class,
        'fr' => FrenchNumberTransformer::class,
        'fr_BE' => FrenchBelgianNumberTransformer::class,
        'hu' => HungarianNumberTransformer::class,
        'it' => ItalianNumberTransformer::class,
        'lt' => LithuanianNumberTransformer::class,
        'lv' => LatvianNumberTransformer::class,
        'nl' => DutchNumberTransformer::class,
        'pl' => PolishNumberTransformer::class,
        'pt_BR' => PortugueseBrazilianNumberTransformer::class,
        'ro' => RomanianNumberTransformer::class,
        'ru' => RussianNumberTransformer::class
    ];

    private $currencyTransformers = [
        'en' => EnglishCurrencyTransformer::class,
        'pl' => PolishCurrencyTransformer::class,
        'ro' => RomanianCurrencyTransformer::class,
        'ru' => RussianCurrencyTransformer::class
    ];

    /**
     * @param string $language
     *
     * @throws \InvalidArgumentException
     * @return NumberTransformer
     */
    public function getNumberTransformer($language)
    {
        if (!array_key_exists($language, $this->numberTransformers)) {
            throw new \InvalidArgumentException(sprintf(
                'Number transformer for "%s" language is not implemented.',
                $language
            ));
        }

        return new $this->numberTransformers[$language];
    }

    /**
     * @param string $language
     *
     * @throws \InvalidArgumentException
     * @return CurrencyTransformer
     */
    public function getCurrencyTransformer($language)
    {
        if (!array_key_exists($language, $this->currencyTransformers)) {
            throw new \InvalidArgumentException(sprintf(
                'Currency transformer for "%s" language is not implemented.',
                $language
            ));
        }

        return new $this->currencyTransformers[$language];
    }
}
