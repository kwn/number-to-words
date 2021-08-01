<?php

namespace NumberToWords;

use NumberToWords\CurrencyTransformer;

trait ManagesCurrencyTransformers
{
    private array $currencyTransformers = [
        'al' => CurrencyTransformer\AlbanianCurrencyTransformer::class,
        'de' => CurrencyTransformer\GermanCurrencyTransformer::class,
        'dk' => CurrencyTransformer\DanishCurrencyTransformer::class,
        'en' => CurrencyTransformer\EnglishCurrencyTransformer::class,
        'es' => CurrencyTransformer\SpanishCurrencyTransformer::class,
        'fr' => CurrencyTransformer\FrenchCurrencyTransformer::class,
        'hu' => CurrencyTransformer\HungarianCurrencyTransformer::class,
        'ka' => CurrencyTransformer\GeorgianCurrencyTransformer::class,
        'lt' => CurrencyTransformer\LithuanianCurrencyTransformer::class,
        'lv' => CurrencyTransformer\LatvianCurrencyTransformer::class,
        'pl' => CurrencyTransformer\PolishCurrencyTransformer::class,
        'pt_BR' => CurrencyTransformer\PortugueseBrazilianCurrencyTransformer::class,
        'ro' => CurrencyTransformer\RomanianCurrencyTransformer::class,
        'ru' => CurrencyTransformer\RussianCurrencyTransformer::class,
        'sk' => CurrencyTransformer\SlovakCurrencyTransformer::class,
        'tk' => CurrencyTransformer\TurkmenCurrencyTransformer::class,
        'tr' => CurrencyTransformer\TurkishCurrencyTransformer::class,
        'ua' => CurrencyTransformer\UkrainianCurrencyTransformer::class,
        'yo' => CurrencyTransformer\YorubaCurrencyTransformer::class
    ];
}
