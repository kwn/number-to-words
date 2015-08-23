<?php

namespace Kwn\NumberToWords\Language\Romanian\Dictionary;

use Kwn\NumberToWords\Grammar\Gender;

class Currency
{
    /**
     * Some currency names as nouns in Romanian
     */
    private static $currencyNames = [
        'AUD' => [
            ['dolar australian', 'dolari australieni', Gender::MALE],
            ['cent', 'cenți', Gender::MALE]
        ],
        'CAD' => [
            ['dolar canadian', 'dolari canadieni', Gender::MALE],
            ['cent', 'cenți', Gender::MALE]
        ],
        'CHF' => [
            ['franc elvețian', 'franci elvețieni', Gender::MALE],
            ['cent', 'cenți', Gender::MALE]
        ],
        'CZK' => [
            ['coroană cehă', 'coroane cehe', Gender::FEMALE],
            ['haler', 'haleri', Gender::MALE]
        ],
        'EUR' => [
            ['euro', 'euro', Gender::MALE],
            ['cent', 'cenți', Gender::MALE]
        ],
        'GBP' => [
            ['liră sterlină', 'lire sterline', Gender::FEMALE],
            ['penny', 'penny', Gender::MALE]
        ],
        'HUF' => [
            ['forint', 'forinți', Gender::MALE],
            ['filer', 'fileri', Gender::MALE]
        ],
        'JPY' => [
            ['yen', 'yeni', Gender::MALE],
            ['sen', 'seni', Gender::MALE]
        ],
        'PLN' => [
            ['zlot', 'zloți', Gender::MALE],
            ['gros', 'grosi', Gender::MALE]
        ],
        'ROL' => [
            ['leu', 'lei', Gender::MALE],
            ['ban', 'bani', Gender::MALE]
        ],
        'RON' => [
            ['leu', 'lei', Gender::MALE],
            ['ban', 'bani', Gender::MALE]
        ],
        'RUB' => [
            ['rublă', 'ruble', Gender::FEMALE],
            ['copeică', 'copeici', Gender::FEMALE]
        ],
        'SKK' => [
            ['coroană slovacă', 'coroane slovace', Gender::FEMALE],
            ['haler', 'haleri', Gender::MALE]
        ],
        'TRL' => [
            ['liră turcească', 'lire turcești', Gender::FEMALE],
            ['kuruș', 'kuruși', Gender::MALE]
        ],
        'USD' => [
            ['dolar american', 'dolari americani', Gender::MALE],
            ['cent', 'cenți', Gender::MALE]
        ]
    ];

    /**
     * Get currency names
     *
     * @return array
     */
    public static function getCurrencyNames()
    {
        return self::$currencyNames;
    }
}
