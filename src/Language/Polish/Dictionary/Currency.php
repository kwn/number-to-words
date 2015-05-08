<?php

namespace Kwn\NumberToWords\Language\Polish\Dictionary;

class Currency
{
    private static $units = [
        'PLN' => ['złoty', 'złote', 'złotych'],
        'EUR' => ['euro', 'euro', 'euro'],
        'GBP' => ['funt', 'funty', 'funtów'],
        'USD' => ['dolar', 'dolary', 'dolarów'],
        'CHF' => ['frank', 'franki', 'franków']
    ];
    
    private static $subunits = [
        'PLN' => ['grosz', 'grosze', 'groszy'],
        'EUR' => ['euro cent', 'euro centy', 'euro centów'],
        'GBP' => ['pens', 'pensy', 'pensów'],
        'USD' => ['cent', 'centy', 'centów'],
        'CHF' => ['centym', 'centymy', 'centymów']
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
