<?php

namespace NumberToWords;

<<<<<<< HEAD
use NumberToWords\NumberTransformer;
=======
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
>>>>>>> 01fa74606531ca5c8a0896c52b056b21d47803f4

trait ManagesNumberTransformers
{
    private array $numberTransformers = [
<<<<<<< HEAD
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
=======
        'al' => AlbanianNumberTransformer::class,
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
>>>>>>> 01fa74606531ca5c8a0896c52b056b21d47803f4
    ];
}