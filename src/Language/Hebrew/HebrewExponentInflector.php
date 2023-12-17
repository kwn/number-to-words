<?php

namespace NumberToWords\Language\Hebrew;

use NumberToWords\Language\ExponentInflector;

class HebrewExponentInflector implements ExponentInflector
{
    private static $exponent = [
        ['', '', ''],
        ['אלפים', 'אלף'], // 'אלף' is 'thousand
        ['מיליון', 'מיליון'], // 'מיליון' is 'million'
        ['מיליארד', 'מיליארד'], // 'מיליארד' is 'billion'
        ['טריליון', 'טריליון'], // 'טריליון' is 'trillion'
        ['קוודריליון', 'קוודריליון'], // 'קוודריליון' is 'quadrillion'
        ['קווינטיליון', 'קווינטיליון'], // 'קווינטיליון' is 'quintillion'
        ['סקסטיליון', 'סקסטיליון'], // 'סקסטיליון' is 'sextillion'
        ['ספטיליון', 'ספטיליון'], // 'ספטיליון' is 'septillion'
        ['אוקטיליון', 'אוקטיליון'], // 'אוקטיליון' is 'octillion'
        ['נוניליון', 'נוניליון'], // 'נוניליון' is 'nonillion'
        ['דציליון', 'דציליון'], // 'דציליון' is 'decillion'
        ['אנדציליון', 'אנדציליון'], // 'אנדציליון' is 'undecillion'
        ['דודציליון', 'דודציליון'], // 'דודציליון
    ];

    private static $exponentBetweenTenToTeweny = [
        '',
        'אלף',
        'אלפיים',
        'שלושת',
        'ארבעת',
        'חמשת',
        'ששת',
        'שבעת',
        'שמונת',
        'תשעת',
        'עשרת',
    ];

    /**
     * @var HebrewNounGenderInflector
     */
    private $inflector;

    /**
     * @param HebrewNounGenderInflector $inflector
     */
    public function __construct(HebrewNounGenderInflector $inflector)
    {
        $this->inflector = $inflector;
    }


    /**
     * @param int $number
     * @param int $power
     *
     * @return string
     */
    public function inflectExponent($number, $power): string
    {
        var_dump($number, $power);
        if ($power === 0) {
            return '';
        }

        return $this->inflector->inflectNounByNumber(
            $number,
            self::$exponent[$power][0],
            self::$exponent[$power][1],
            $power === 1 ? self::$exponentBetweenTenToTeweny : []
        );
    }
}
