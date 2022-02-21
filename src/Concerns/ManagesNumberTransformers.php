<?php

namespace NumberToWords\Concerns;

use NumberToWords\NumberTransformer;

trait ManagesNumberTransformers
{
    private array $numberTransformers = [
        'al' => NumberTransformer\AlbanianNumberTransformer::class,
        'bg' => NumberTransformer\BulgarianNumberTransformer::class,
        'cs' => NumberTransformer\CzechNumberTransformer::class,
        'de' => NumberTransformer\GermanNumberTransformer::class,
        'dk' => NumberTransformer\DanishNumberTransformer::class,
        'en' => NumberTransformer\EnglishNumberTransformer::class,
        'es' => NumberTransformer\SpanishNumberTransformer::class,
        'et' => NumberTransformer\EstonianNumberTransformer::class,
        'fa' => NumberTransformer\PersianNumberTransformer::class,
        'fr' => NumberTransformer\FrenchNumberTransformer::class,
        'fr_BE' => NumberTransformer\FrenchBelgianNumberTransformer::class,
        'hu' => NumberTransformer\HungarianNumberTransformer::class,
        'id' => NumberTransformer\IndonesianNumberTransformer::class,
        'it' => NumberTransformer\ItalianNumberTransformer::class,
        'ka' => NumberTransformer\GeorgianNumberTransformer::class,
        'lt' => NumberTransformer\LithuanianNumberTransformer::class,
        'lv' => NumberTransformer\LatvianNumberTransformer::class,
        'ms' => NumberTransformer\MalayNumberTransformer::class,
        'nl' => NumberTransformer\DutchNumberTransformer::class,
        'pl' => NumberTransformer\PolishNumberTransformer::class,
        'pt_BR' => NumberTransformer\PortugueseBrazilianNumberTransformer::class,
        'ro' => NumberTransformer\RomanianNumberTransformer::class,
        'ru' => NumberTransformer\RussianNumberTransformer::class,
        'sk' => NumberTransformer\SlovakNumberTransformer::class,
        'sv' => NumberTransformer\SwedishNumberTransformer::class,
        'tk' => NumberTransformer\TurkmenNumberTransformer::class,
        'tr' => NumberTransformer\TurkishNumberTransformer::class,
        'ua' => NumberTransformer\UkrainianNumberTransformer::class,
        'yo' => NumberTransformer\YorubaNumberTransformer::class,
    ];
}
