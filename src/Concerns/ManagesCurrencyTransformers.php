<?php

namespace NumberToWords\Concerns;

use NumberToWords\CurrencyTransformer as Transformer;
use NumberToWords\Exception\InvalidArgumentException;
use NumberToWords\CurrencyTransformer\CurrencyTransformer;

trait ManagesCurrencyTransformers
{
    private array $currencyTransformers = [
        'ar' => Transformer\ArabicCurrencyTransformer::class,
        'al' => Transformer\AlbanianCurrencyTransformer::class,
        'az' => Transformer\AzerbaijaniCurrencyTransformer::class,
        'de' => Transformer\GermanCurrencyTransformer::class,
        'dk' => Transformer\DanishCurrencyTransformer::class,
        'en' => Transformer\EnglishCurrencyTransformer::class,
        'es' => Transformer\SpanishCurrencyTransformer::class,
        'fr' => Transformer\FrenchCurrencyTransformer::class,
        'hu' => Transformer\HungarianCurrencyTransformer::class,
        'ka' => Transformer\GeorgianCurrencyTransformer::class,
        'lt' => Transformer\LithuanianCurrencyTransformer::class,
        'lv' => Transformer\LatvianCurrencyTransformer::class,
        'pl' => Transformer\PolishCurrencyTransformer::class,
        'pt_BR' => Transformer\PortugueseBrazilianCurrencyTransformer::class,
        'ro' => Transformer\RomanianCurrencyTransformer::class,
        'ru' => Transformer\RussianCurrencyTransformer::class,
        'sk' => Transformer\SlovakCurrencyTransformer::class,
        'tk' => Transformer\TurkmenCurrencyTransformer::class,
        'tr' => Transformer\TurkishCurrencyTransformer::class,
        'ua' => Transformer\UkrainianCurrencyTransformer::class,
        'yo' => Transformer\YorubaCurrencyTransformer::class
    ];

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

    public static function transformCurrency(string $language, int $number, string $currency): string
    {
        return (new static())->getCurrencyTransformer($language)->toWords($number, $currency);
    }
}
