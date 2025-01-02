<?php

namespace NumberToWords\Concerns;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\NumberTransformer as Transformer;
use NumberToWords\Exception\InvalidArgumentException;
use NumberToWords\NumberTransformer\NumberTransformer;

trait ManagesNumberTransformers
{
    use ManagesLocaleAlias;

    private array $numberTransformers = [
        'ar' => Transformer\ArabicNumberTransformer::class,
        'al' => Transformer\AlbanianNumberTransformer::class,
        'az' => Transformer\AzerbaijaniNumberTransformer::class,
        'bg' => Transformer\BulgarianNumberTransformer::class,
        'cs' => Transformer\CzechNumberTransformer::class,
        'de' => Transformer\GermanNumberTransformer::class,
        'dk' => Transformer\DanishNumberTransformer::class,
        'en' => Transformer\EnglishNumberTransformer::class,
        'es' => Transformer\SpanishNumberTransformer::class,
        'et' => Transformer\EstonianNumberTransformer::class,
        'fa' => Transformer\PersianNumberTransformer::class,
        'fr' => Transformer\FrenchNumberTransformer::class,
        'fr_BE' => Transformer\FrenchBelgianNumberTransformer::class,
        'hu' => Transformer\HungarianNumberTransformer::class,
        'id' => Transformer\IndonesianNumberTransformer::class,
        'it' => Transformer\ItalianNumberTransformer::class,
        'ka' => Transformer\GeorgianNumberTransformer::class,
        'ku' => Transformer\KurdishNumberTransformer::class,
        'lt' => Transformer\LithuanianNumberTransformer::class,
        'lv' => Transformer\LatvianNumberTransformer::class,
        'mk' => Transformer\MacedonianNumberTransformer::class,
        'ms' => Transformer\MalayNumberTransformer::class,
        'nl' => Transformer\DutchNumberTransformer::class,
        'pl' => Transformer\PolishNumberTransformer::class,
        'pt_BR' => Transformer\PortugueseBrazilianNumberTransformer::class,
        'ro' => Transformer\RomanianNumberTransformer::class,
        'sr' => Transformer\SerbianNumberTransformer::class,
        'ru' => Transformer\RussianNumberTransformer::class,
        'sk' => Transformer\SlovakNumberTransformer::class,
        'sv' => Transformer\SwedishNumberTransformer::class,
        'sw' => Transformer\SwahiliNumberTransformer::class,
        'tk' => Transformer\TurkmenNumberTransformer::class,
        'tr' => Transformer\TurkishNumberTransformer::class,
        'ua' => Transformer\UkrainianNumberTransformer::class,
        'uz' => Transformer\UzbekNumberTransformer::class,
        'yo' => Transformer\YorubaNumberTransformer::class,
    ];

    /**
     * @throws InvalidArgumentException
     */
    public function getNumberTransformer(string $language): NumberTransformer
    {
        $language = $this->resolveAlias($language);
        if (!array_key_exists($language, $this->numberTransformers)) {
            throw new InvalidArgumentException(sprintf(
                'Number transformer for "%s" language is not implemented.',
                $language
            ));
        }

        return new $this->numberTransformers[$language]();
    }

    /**
     * @throws NumberToWordsException
     * @throws InvalidArgumentException
     */
    public static function transformNumber(string $language, int $number): string
    {
        $static = new static();
        $language = $static->resolveAlias($language);

        return $static->getNumberTransformer($language)->toWords($number);
    }
}
