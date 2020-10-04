<?php

namespace NumberToWords\Language\Lithuania;

use NumberToWords\Language\Dictionary;

class LithuaniaDictionary implements Dictionary
{
    const LOCALE               = 'lt';
    const LANGUAGE_NAME        = 'Lithuanian';
    const LANGUAGE_NAME_NATIVE = 'Lietuvių';

    /** @var array<string>  */
    private static $units = [
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

    /** @var array<string>  */
    private static $tens = [
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

    /** @var array<string>  */
    private static $teens = [
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

    /** @var array<string>  */
    private static $hundreds = [
        0 => 'šimtas',
        2 => 'šimtai',
    ];

    /** @var array<array<string>>  */
    public static $exponent = [
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

    /** @var array<array<string>>  */
    public static $currencyNames = [
        'EUR' => [['euras', 'eurų', 'eurai'], ['euro centas', 'euro centų', 'euro centai']],
        'LT' => [['litas', 'litų', 'litai'], ['lito centas', 'lito centų', 'lito centai']],
    ];

    /**
     * @return string
     */
    public function getAnd()
    {
        return 'ir';
    }

    /**
     * @return string
     */
    public function getMinus()
    {
        return 'minus';
    }

    /**
     * @return string
     */
    public function getZero()
    {
        return 'nulis';
    }

    /**
     * @param int $unit
     *
     * @return string
     */
    public function getCorrespondingUnit($unit)
    {
        return self::$units[$unit];
    }

    /**
     * @param int $ten
     *
     * @return string
     */
    public function getCorrespondingTen($ten)
    {
        return self::$tens[$ten];
    }

    /**
     * @param int $teen
     *
     * @return string
     */
    public function getCorrespondingTeen($teen)
    {
        return self::$teens[$teen];
    }

    /**
     * @param int $hundred
     *
     * @return string
     */
    public function getCorrespondingHundred($hundred)
    {
        if ($hundred === 1) {
            return static::$hundreds[0];
        }

        return self::$units[$hundred] . ' ' . static::$hundreds[1];
    }
}
