<?php

namespace NumberToWords;

use NumberToWords\CurrencyTransformer\CurrencyTransformer;
use NumberToWords\CurrencyTransformer\GermanCurrencyTransformer;
use NumberToWords\CurrencyTransformer\DanishCurrencyTransformer;
use NumberToWords\CurrencyTransformer\EnglishCurrencyTransformer;
use NumberToWords\CurrencyTransformer\PolishCurrencyTransformer;
use NumberToWords\CurrencyTransformer\PortugueseBrazilianCurrencyTransformer;
use NumberToWords\CurrencyTransformer\RomanianCurrencyTransformer;
use NumberToWords\CurrencyTransformer\RussianCurrencyTransformer;
use NumberToWords\CurrencyTransformer\SpanishCurrencyTransformer;
use NumberToWords\CurrencyTransformer\TurkmenCurrencyTransformer;
use NumberToWords\CurrencyTransformer\UkrainianCurrencyTransformer;
use NumberToWords\CurrencyTransformer\FrenchCurrencyTransformer;
use NumberToWords\NumberTransformer\BulgarianNumberTransformer;
use NumberToWords\NumberTransformer\CzechNumberTransformer;
use NumberToWords\NumberTransformer\DanishNumberTransformer;
use NumberToWords\NumberTransformer\DutchNumberTransformer;
use NumberToWords\NumberTransformer\EnglishNumberTransformer;
use NumberToWords\NumberTransformer\EstonianNumberTransformer;
use NumberToWords\NumberTransformer\FrenchBelgianNumberTransformer;
use NumberToWords\NumberTransformer\FrenchNumberTransformer;
use NumberToWords\NumberTransformer\GermanNumberTransformer;
use NumberToWords\NumberTransformer\HungarianNumberTransformer;
use NumberToWords\NumberTransformer\IndonesianNumberTransformer;
use NumberToWords\NumberTransformer\ItalianNumberTransformer;
use NumberToWords\NumberTransformer\LatvianNumberTransformer;
use NumberToWords\NumberTransformer\LithuanianNumberTransformer;
use NumberToWords\NumberTransformer\MalayNumberTransformer;
use NumberToWords\NumberTransformer\PolishNumberTransformer;
use NumberToWords\NumberTransformer\NumberTransformer;
use NumberToWords\NumberTransformer\PortugueseBrazilianNumberTransformer;
use NumberToWords\NumberTransformer\RomanianNumberTransformer;
use NumberToWords\NumberTransformer\RussianNumberTransformer;
use NumberToWords\NumberTransformer\SpanishNumberTransformer;
use NumberToWords\NumberTransformer\SwedishNumberTransformer;
use NumberToWords\NumberTransformer\TurkishNumberTransformer;
use NumberToWords\NumberTransformer\TurkmenNumberTransformer;
use NumberToWords\NumberTransformer\UkrainianNumberTransformer;

class NumberToWords
{
    private $numberTransformers = [
        'bg' => BulgarianNumberTransformer::class,
        'cs' => CzechNumberTransformer::class,
        'de' => GermanNumberTransformer::class,
        'dk' => DanishNumberTransformer::class,
        'en' => EnglishNumberTransformer::class,
        'es' => SpanishNumberTransformer::class,
        'et' => EstonianNumberTransformer::class,
        'fr' => FrenchNumberTransformer::class,
        'fr_BE' => FrenchBelgianNumberTransformer::class,
        'hu' => HungarianNumberTransformer::class,
        'id' => IndonesianNumberTransformer::class,
        'it' => ItalianNumberTransformer::class,
        'lt' => LithuanianNumberTransformer::class,
        'lv' => LatvianNumberTransformer::class,
        'ms' => MalayNumberTransformer::class,
        'nl' => DutchNumberTransformer::class,
        'pl' => PolishNumberTransformer::class,
        'pt_BR' => PortugueseBrazilianNumberTransformer::class,
        'ro' => RomanianNumberTransformer::class,
        'ru' => RussianNumberTransformer::class,
        'sv' => SwedishNumberTransformer::class,
        'tk' => TurkmenNumberTransformer::class,
        'tr' => TurkishNumberTransformer::class,
        'ua' => UkrainianNumberTransformer::class,
    ];

    private $currencyTransformers = [
        'de' => GermanCurrencyTransformer::class,
        'dk' => DanishCurrencyTransformer::class,
        'en' => EnglishCurrencyTransformer::class,
        'es' => SpanishCurrencyTransformer::class,
        'fr' => FrenchCurrencyTransformer::class,
        'hu' => HungarianNumberTransformer::class,
        'pl' => PolishCurrencyTransformer::class,
        'pt_BR' => PortugueseBrazilianCurrencyTransformer::class,
        'ro' => RomanianCurrencyTransformer::class,
        'ru' => RussianCurrencyTransformer::class,
        'tk' => TurkmenCurrencyTransformer::class,
        'ua' => UkrainianCurrencyTransformer::class
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
