<?php

namespace NumberToWords;

use NumberToWords\CurrencyTransformer\AzerbaijaniCurrencyTransformer;
use NumberToWords\CurrencyTransformer\CurrencyTransformer;
use NumberToWords\CurrencyTransformer\GeorgianCurrencyTransformer;
use NumberToWords\CurrencyTransformer\GermanCurrencyTransformer;
use NumberToWords\CurrencyTransformer\HungarianCurrencyTransformer;
use NumberToWords\CurrencyTransformer\DanishCurrencyTransformer;
use NumberToWords\CurrencyTransformer\EnglishCurrencyTransformer;
use NumberToWords\CurrencyTransformer\LatvianCurrencyTransformer;
use NumberToWords\CurrencyTransformer\LithuanianCurrencyTransformer;
use NumberToWords\CurrencyTransformer\PolishCurrencyTransformer;
use NumberToWords\CurrencyTransformer\PortugueseBrazilianCurrencyTransformer;
use NumberToWords\CurrencyTransformer\RomanianCurrencyTransformer;
use NumberToWords\CurrencyTransformer\RussianCurrencyTransformer;
use NumberToWords\CurrencyTransformer\SlovakCurrencyTransformer;
use NumberToWords\CurrencyTransformer\SpanishCurrencyTransformer;
use NumberToWords\CurrencyTransformer\TurkmenCurrencyTransformer;
use NumberToWords\CurrencyTransformer\TurkishCurrencyTransformer;
use NumberToWords\CurrencyTransformer\UkrainianCurrencyTransformer;
use NumberToWords\CurrencyTransformer\FrenchCurrencyTransformer;
use NumberToWords\CurrencyTransformer\YorubaCurrencyTransformer;
use NumberToWords\CurrencyTransformer\AlbanianCurrencyTransformer;
use NumberToWords\CurrencyTransformer\IndonesianCurrencyTransformer;
use NumberToWords\CurrencyTransformer\MalaysianCurrencyTransformer;
use NumberToWords\Exception\InvalidArgumentException;
use NumberToWords\NumberTransformer\AzerbaijaniNumberTransformer;
use NumberToWords\NumberTransformer\BulgarianNumberTransformer;
use NumberToWords\NumberTransformer\CzechNumberTransformer;
use NumberToWords\NumberTransformer\DanishNumberTransformer;
use NumberToWords\NumberTransformer\DutchNumberTransformer;
use NumberToWords\NumberTransformer\EnglishNumberTransformer;
use NumberToWords\NumberTransformer\EstonianNumberTransformer;
use NumberToWords\NumberTransformer\FrenchBelgianNumberTransformer;
use NumberToWords\NumberTransformer\FrenchNumberTransformer;
use NumberToWords\NumberTransformer\GeorgianNumberTransformer;
use NumberToWords\NumberTransformer\GermanNumberTransformer;
use NumberToWords\NumberTransformer\HungarianNumberTransformer;
use NumberToWords\NumberTransformer\IndonesianNumberTransformer;
use NumberToWords\NumberTransformer\ItalianNumberTransformer;
use NumberToWords\NumberTransformer\LatvianNumberTransformer;
use NumberToWords\NumberTransformer\LithuanianNumberTransformer;
use NumberToWords\NumberTransformer\MalayNumberTransformer;
use NumberToWords\NumberTransformer\PersianNumberTransformer;
use NumberToWords\NumberTransformer\PolishNumberTransformer;
use NumberToWords\NumberTransformer\NumberTransformer;
use NumberToWords\NumberTransformer\PortugueseBrazilianNumberTransformer;
use NumberToWords\NumberTransformer\RomanianNumberTransformer;
use NumberToWords\NumberTransformer\RussianNumberTransformer;
use NumberToWords\NumberTransformer\SlovakNumberTransformer;
use NumberToWords\NumberTransformer\SpanishNumberTransformer;
use NumberToWords\NumberTransformer\SwedishNumberTransformer;
use NumberToWords\NumberTransformer\TurkishNumberTransformer;
use NumberToWords\NumberTransformer\TurkmenNumberTransformer;
use NumberToWords\NumberTransformer\UkrainianNumberTransformer;
use NumberToWords\NumberTransformer\YorubaNumberTransformer;
use NumberToWords\NumberTransformer\AlbanianNumberTransformer;
use NumberToWords\NumberTransformer\ArabicNumberTransformer;
use NumberToWords\CurrencyTransformer\ArabicCurrencyTransformer;

class NumberToWords
{
    private array $numberTransformers = [
        'ar' => ArabicNumberTransformer::class,
        'al' => AlbanianNumberTransformer::class,
        'az' => AzerbaijaniNumberTransformer::class,
        'bg' => BulgarianNumberTransformer::class,
        'cs' => CzechNumberTransformer::class,
        'de' => GermanNumberTransformer::class,
        'dk' => DanishNumberTransformer::class,
        'en' => EnglishNumberTransformer::class,
        'es' => SpanishNumberTransformer::class,
        'et' => EstonianNumberTransformer::class,
        'fa' => PersianNumberTransformer::class,
        'fr' => FrenchNumberTransformer::class,
        'fr_BE' => FrenchBelgianNumberTransformer::class,
        'hu' => HungarianNumberTransformer::class,
        'id' => IndonesianNumberTransformer::class,
        'it' => ItalianNumberTransformer::class,
        'ka' => GeorgianNumberTransformer::class,
        'lt' => LithuanianNumberTransformer::class,
        'lv' => LatvianNumberTransformer::class,
        'ms' => MalayNumberTransformer::class,
        'nl' => DutchNumberTransformer::class,
        'pl' => PolishNumberTransformer::class,
        'pt_BR' => PortugueseBrazilianNumberTransformer::class,
        'ro' => RomanianNumberTransformer::class,
        'ru' => RussianNumberTransformer::class,
        'sk' => SlovakNumberTransformer::class,
        'sv' => SwedishNumberTransformer::class,
        'tk' => TurkmenNumberTransformer::class,
        'tr' => TurkishNumberTransformer::class,
        'ua' => UkrainianNumberTransformer::class,
        'yo' => YorubaNumberTransformer::class,
    ];

    private array $currencyTransformers = [
        'ar' => ArabicCurrencyTransformer::class,
        'al' => AlbanianCurrencyTransformer::class,
        'az' => AzerbaijaniCurrencyTransformer::class,
        'de' => GermanCurrencyTransformer::class,
        'dk' => DanishCurrencyTransformer::class,
        'en' => EnglishCurrencyTransformer::class,
        'es' => SpanishCurrencyTransformer::class,
        'fr' => FrenchCurrencyTransformer::class,
        'hu' => HungarianCurrencyTransformer::class,
        'id' => IndonesianCurrencyTransformer::class,
        'ka' => GeorgianCurrencyTransformer::class,
        'lt' => LithuanianCurrencyTransformer::class,
        'lv' => LatvianCurrencyTransformer::class,
        'ms' => MalaysianCurrencyTransformer::class,
        'pl' => PolishCurrencyTransformer::class,
        'pt_BR' => PortugueseBrazilianCurrencyTransformer::class,
        'ro' => RomanianCurrencyTransformer::class,
        'ru' => RussianCurrencyTransformer::class,
        'sk' => SlovakCurrencyTransformer::class,
        'tk' => TurkmenCurrencyTransformer::class,
        'tr' => TurkishCurrencyTransformer::class,
        'ua' => UkrainianCurrencyTransformer::class,
        'yo' => YorubaCurrencyTransformer::class
    ];

    /**
     * @throws InvalidArgumentException
     */
    public function getNumberTransformer(string $language): NumberTransformer
    {
        if (!array_key_exists($language, $this->numberTransformers)) {
            throw new InvalidArgumentException(sprintf(
                'Number transformer for "%s" language is not implemented.',
                $language
            ));
        }

        return new $this->numberTransformers[$language]();
    }

    /**
     * @throws InvalidArgumentException
     */
    public function getCurrencyTransformer(string $language): CurrencyTransformer
    {
        if (!array_key_exists($language, $this->currencyTransformers)) {
            throw new InvalidArgumentException(sprintf(
                'Currency transformer for "%s" language is not implemented.',
                $language
            ));
        }

        return new $this->currencyTransformers[$language]();
    }
}
