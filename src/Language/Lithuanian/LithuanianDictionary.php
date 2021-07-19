<?php

namespace NumberToWords\Language\Lithuanian;

use NumberToWords\Language\Dictionary;

class LithuanianDictionary implements Dictionary
{
    public const LOCALE               = 'lt';
    public const LANGUAGE_NAME        = 'Lithuanian';
    public const LANGUAGE_NAME_NATIVE = 'Lietuvių';

    private static array $units = [
        0 => 'nulis',
        1 => 'vienas',
        2 => 'du',
        3 => 'trys',
        4 => 'keturi',
        5 => 'penki',
        6 => 'šeši',
        7 => 'septyni',
        8 => 'aštuoni',
        9 => 'devyni'
    ];

    private static array $tens = [
        0 => 'dešimt',
        1 => 'vienuolika',
        2 => 'dvylika',
        3 => 'trylika',
        4 => 'keturiolika',
        5 => 'penkiolika',
        6 => 'šešiolika',
        7 => 'septyniolika',
        8 => 'aštuoniolika',
        9 => 'devyniolika'
    ];

    private static array $teens = [
        0 => '',
        1 => 'dešimt',
        2 => 'dvidešimt',
        3 => 'trisdešimt',
        4 => 'keturiasdešimt',
        5 => 'penkiasdešimt',
        6 => 'šešiasdešimt',
        7 => 'septyniasdešimt',
        8 => 'aštuoniasdešimt',
        9 => 'devyniasdešimt'
    ];

    private static array $hundreds = [
        0 => 'šimtas',
        2 => 'šimtai',
    ];

    public static array $exponent = [
        ['', ''],
        ['tūkstantis', 'tūkstančių', 'tūkstančiai'],
        ['milijonas', 'milijonų', 'milijonai'],
        ['bilijonas', 'bilijonų', 'bilijonai'],
        ['trilijonas', 'trilijonų', 'trilijardai'],
        ['kvadrilijonas', 'kvadrilijonų', 'kvadrilijonai'],
        ['kvintilijonas', 'kvintilijonų', 'kvintilijonai'],
        ['sikstilijonas', 'sikstilijonų', 'sikstilijonai'],
        ['septilijonas', 'septilijonų', 'septilijonai'],
        ['oktilijonas', 'oktilijonų', 'oktilijonai'],
        ['nonilijonas', 'nonilijonų', 'nonilijonai'],
        ['gugolas', 'gugolų', 'gugolai'],
        ['gugolplexas', 'gugolplexų', 'gugolplexai']
    ];

    public static array $currencyNames = [
        'EUR' => [['euras', 'eurų', 'eurai'], ['euro centas', 'euro centų', 'euro centai']],
        'LT' => [['litas', 'litų', 'litai'], ['lito centas', 'lito centų', 'lito centai']],
    ];

    public function getAnd(): string
    {
        return 'ir';
    }

    public function getMinus(): string
    {
        return 'minus';
    }

    public function getZero(): string
    {
        return 'nulis';
    }

    public function getCorrespondingUnit(int $unit): string
    {
        return self::$units[$unit];
    }

    public function getCorrespondingTen(int $ten): string
    {
        return self::$tens[$ten];
    }

    public function getCorrespondingTeen(int $teen): string
    {
        return self::$teens[$teen];
    }

    public function getCorrespondingHundred(int $hundred): string
    {
        if ($hundred === 1) {
            return static::$hundreds[0];
        }

        return self::$units[$hundred] . ' ' . static::$hundreds[1];
    }
}
