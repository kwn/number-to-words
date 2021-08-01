<?php

namespace NumberToWords;

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

trait ManagesCurrencyTransformers
{
    private array $currencyTransformers = [
        'al' => AlbanianCurrencyTransformer::class,
        'de' => GermanCurrencyTransformer::class,
        'dk' => DanishCurrencyTransformer::class,
        'en' => EnglishCurrencyTransformer::class,
        'es' => SpanishCurrencyTransformer::class,
        'fr' => FrenchCurrencyTransformer::class,
        'hu' => HungarianCurrencyTransformer::class,
        'ka' => GeorgianCurrencyTransformer::class,
        'lt' => LithuanianCurrencyTransformer::class,
        'lv' => LatvianCurrencyTransformer::class,
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
}