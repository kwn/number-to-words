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
use NumberToWords\CurrencyTransformer\TurkishCurrencyTransformer;
use NumberToWords\CurrencyTransformer\UkrainianCurrencyTransformer;
use NumberToWords\CurrencyTransformer\FrenchCurrencyTransformer;
use NumberToWords\NumberTransformer\Bulgarian;
use NumberToWords\NumberTransformer\Czech;
use NumberToWords\NumberTransformer\Danish;
use NumberToWords\NumberTransformer\Dutch;
use NumberToWords\NumberTransformer\English;
use NumberToWords\NumberTransformer\Estonian;
use NumberToWords\NumberTransformer\FrenchBelgian;
use NumberToWords\NumberTransformer\French;
use NumberToWords\NumberTransformer\German;
use NumberToWords\NumberTransformer\Hungarian;
use NumberToWords\NumberTransformer\Indonesian;
use NumberToWords\NumberTransformer\Italian;
use NumberToWords\NumberTransformer\Latvian;
use NumberToWords\NumberTransformer\Lithuanian;
use NumberToWords\NumberTransformer\Malay;
use NumberToWords\NumberTransformer\Polish;
use NumberToWords\NumberTransformer\NumberTransformer;
use NumberToWords\NumberTransformer\PortugueseBrazilian;
use NumberToWords\NumberTransformer\Romanian;
use NumberToWords\NumberTransformer\Russian;
use NumberToWords\NumberTransformer\Spanish;
use NumberToWords\NumberTransformer\Swedish;
use NumberToWords\NumberTransformer\Turkish;
use NumberToWords\NumberTransformer\Turkmen;
use NumberToWords\NumberTransformer\Ukrainian;

class NumberToWords
{
    private $numberTransformers = [
        'bg' => Bulgarian::class,
        'cs' => Czech::class,
        'de' => German::class,
        'dk' => Danish::class,
        'en' => English::class,
        'es' => Spanish::class,
        'et' => Estonian::class,
        'fr' => French::class,
        'fr_BE' => FrenchBelgian::class,
        'hu' => Hungarian::class,
        'id' => Indonesian::class,
        'it' => Italian::class,
        'lt' => Lithuanian::class,
        'lv' => Latvian::class,
        'ms' => Malay::class,
        'nl' => Dutch::class,
        'pl' => Polish::class,
        'pt_BR' => PortugueseBrazilian::class,
        'ro' => Romanian::class,
        'ru' => Russian::class,
        'sv' => Swedish::class,
        'tk' => Turkmen::class,
        'tr' => Turkish::class,
        'ua' => Ukrainian::class
    ];

    private $currencyTransformers = [
        'de' => GermanCurrencyTransformer::class,
        'dk' => DanishCurrencyTransformer::class,
        'en' => EnglishCurrencyTransformer::class,
        'es' => SpanishCurrencyTransformer::class,
        'fr' => FrenchCurrencyTransformer::class,
        'hu' => Hungarian::class,
        'pl' => PolishCurrencyTransformer::class,
        'pt_BR' => PortugueseBrazilianCurrencyTransformer::class,
        'ro' => RomanianCurrencyTransformer::class,
        'ru' => RussianCurrencyTransformer::class,
        'tk' => TurkmenCurrencyTransformer::class,
        'tr' => TurkishCurrencyTransformer::class,
        'ua' => UkrainianCurrencyTransformer::class
    ];

    /**
     * @param string $language
     *
     * @throws \InvalidArgumentException
     * @return NumberTransformer
     */
    public function getNumberTransformer(string $language): NumberTransformer
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
