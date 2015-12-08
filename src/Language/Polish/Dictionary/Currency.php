<?php

namespace Kwn\NumberToWords\Language\Polish\Dictionary;

class Currency
{
    private static $units = [
        'PLN' => ['złoty', 'złote', 'złotych'],
        'EUR' => ['euro', 'euro', 'euro'],
        'GBP' => ['funt', 'funty', 'funtów'],
        'USD' => ['dolar', 'dolary', 'dolarów'],
        'CHF' => ['frank', 'franki', 'franków'],
        'RON' => ['lej', 'leje', 'lejów'],
        'HUF' => ['forint', 'forinty', 'forintów'],
        'CZK' => ['korona', 'korony', 'koron'],
        'DKK' => ['korona', 'korony', 'koron'],
        'SEK' => ['korona', 'korony', 'koron'],
        'RUB' => ['rubel', 'ruble', 'rubli']
    ];
    
    private static $subunits = [
        'PLN' => ['grosz', 'grosze', 'groszy'],
        'EUR' => ['euro cent', 'euro centy', 'euro centów'],
        'GBP' => ['pens', 'pensy', 'pensów'],
        'USD' => ['cent', 'centy', 'centów'],
        'CHF' => ['centym', 'centymy', 'centymów'],
        'RON' => ['ban', 'bany', 'banów'],
        'HUF' => ['filler', 'fillery', 'fillerów'],
        'CZK' => ['halerz', 'halerze', 'halerzy'],
        'DKK' => ['ore', 'ore', 'ore'],
        'SEK' => ['ore', 'ore', 'ore'],
        'RUB' => ['kopiejka', 'kopiejki', 'kopiejek']
    ];

    /**
     * @return array
     */
    public static function getUnits()
    {
        return self::$units;
    }

    /**
     * @return array
     */
    public static function getSubunits()
    {
        return self::$subunits;
    }
}
