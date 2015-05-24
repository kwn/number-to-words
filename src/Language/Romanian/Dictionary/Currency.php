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
            ['dolar australian', 'dolari australieni', Gender::MASCULINE],
            ['cent', 'cenți', Gender::MASCULINE]
        ],
        'CAD' => [
            ['dolar canadian', 'dolari canadieni', Gender::MASCULINE],
            ['cent', 'cenți', Gender::MASCULINE]
        ],
        'CHF' => [
            ['franc elvețian', 'franci elvețieni', Gender::MASCULINE],
            ['cent', 'cenți', Gender::MASCULINE]
        ],
        'CZK' => [
            ['coroană cehă', 'coroane cehe', Gender::FEMININE],
            ['haler', 'haleri', Gender::MASCULINE]
        ],
        'EUR' => [
            ['euro', 'euro', Gender::MASCULINE],
            ['cent', 'cenți', Gender::MASCULINE]
        ],
        'GBP' => [
            ['liră sterlină', 'lire sterline', Gender::FEMININE],
            ['penny', 'penny', Gender::MASCULINE]
        ],
        'HUF' => [
            ['forint', 'forinți', Gender::MASCULINE],
            ['filer', 'fileri', Gender::MASCULINE]
        ],
        'JPY' => [
            ['yen', 'yeni', Gender::MASCULINE],
            ['sen', 'seni', Gender::MASCULINE]
        ],
        'PLN' => [
            ['zlot', 'zloți', Gender::MASCULINE],
            ['gros', 'grosi', Gender::MASCULINE]
        ],
        'ROL' => [
            ['leu', 'lei', Gender::MASCULINE],
            ['ban', 'bani', Gender::MASCULINE]
        ],
        'RON' => [
            ['leu', 'lei', Gender::MASCULINE],
            ['ban', 'bani', Gender::MASCULINE]
        ],
        'RUB' => [
            ['rublă', 'ruble', Gender::FEMININE],
            ['copeică', 'copeici', Gender::FEMININE]
        ],
        'SKK' => [
            ['coroană slovacă', 'coroane slovace', Gender::FEMININE],
            ['haler', 'haleri', Gender::MASCULINE]
        ],
        'TRL' => [
            ['liră turcească', 'lire turcești', Gender::FEMININE],
            ['kuruș', 'kuruși', Gender::MASCULINE]
        ],
        'USD' => [
            ['dolar american', 'dolari americani', Gender::MASCULINE],
            ['cent', 'cenți', Gender::MASCULINE]
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
