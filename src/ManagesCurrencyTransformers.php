<?php

namespace NumberToWords;

<<<<<<< HEAD
use NumberToWords\CurrencyTransformer;
=======
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
>>>>>>> 01fa74606531ca5c8a0896c52b056b21d47803f4

trait ManagesCurrencyTransformers
{
    private array $currencyTransformers = [
<<<<<<< HEAD
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
=======
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
>>>>>>> 01fa74606531ca5c8a0896c52b056b21d47803f4
    ];
}