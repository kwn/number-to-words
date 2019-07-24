<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Ka extends Words
{
    const LOCALE = 'ka';
    const LANGUAGE_NAME = 'Georgian';
    const LANGUAGE_NAME_NATIVE = 'ქართული';

    const MINUS = 'მინუს';
    const CONJUNCTION = 'და';
    const DECIMAL = ' მთელი ';
    const SUFFIX = 'ი';
    const FRACTION_PREFIX = ' მე';
    const FRACTION_SUFFIX = 'ედი';


    private static $dictionary = array(
        0 => 'ნულ',
        1 => 'ერთ',
        2 => 'ორ',
        3 => 'სამ',
        4 => 'ოთხ',
        5 => 'ხუთ',
        6 => 'ექვს',
        7 => 'შვიდ',
        8 => 'რვა',
        9 => 'ცხრა',
        10 => 'ათ',
        11 => 'თერთმეტ',
        12 => 'თორმეტ',
        13 => 'ცამეტ',
        14 => 'თოთხმეტ',
        15 => 'თხუთმეტ',
        16 => 'თექვსმეტ',
        17 => 'ჩვიდმეტ',
        18 => 'თვრამეტ',
        19 => 'ცხრამეტ',
        20 => 'ოც',
        40 => 'ორმოც',
        60 => 'სამოც',
        80 => 'ოთხმოც',
        100 => 'ას',
        1000 => 'ათას',
        1000000 => 'მილიონ',
        1000000000 => 'მილიარდ',
        1000000000000 => 'ტრილიონ',
        1000000000000000 => 'კვადრილიონ',
        1000000000000000000 => 'კვინტილიონ',
    );

    private static $currencyNames = [
        'GEL' => [['ლარი'], ['თეთრი']],
        'CHF' => [['ფრანკი'], ['სენტიმი']],
        'CNY' => [['იუანი'], ['ფინი']],
        'DZD' => [['დინარი'], ['სენტიმი']],
        'EUR' => [['ევრო'], ['სენტიმი']],
        'JPY' => [['იენი', ['სენი']]],
        'LYD' => [['დინარი'], ['სენტიმი']],
        'MAD' => [['დირჰამი'], ['სენტიმი']],
        'MXN' => [['მექსიკური პესო'], ['სენტავო']],
        'TND' => [['დინარი'], ['სენტიმი']],
        'USD' => [['დოლარი'], ['ცენტი']],
        'TRY' => [['ლირა'], ['ყურუში']],
        'AMD' => [['დრამი'], ['ლუმა']],
        'PLN' => [['ზლოტი'], ['გროში']],
        'GBP' => [['ფუნტი'], ['პენი']]
    ];

    public function toCurrencyWords($currency, $decimal, $fraction = null)
    {
        $currency = strtoupper($currency);

        if (!array_key_exists($currency, static::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = static::$currencyNames[$currency];
        $majorName = $currencyNames[0][0];
        $minorName = $currencyNames[1][0];

        $result = '';

        if ($decimal != 0) {
            $result = $this->toWords($decimal) . ' ' . $majorName;

        }

        if ($fraction) {
            if($decimal != 0){
                $result = $result . ' ' . self::CONJUNCTION;
            }
            $result = $result. ' ' . $this->toWords($fraction) . ' ' . $minorName;
        }

        return $result;
    }

    protected function toWords($number, $use_suffix = true, $use_spaces = true)
    {
        $space = $use_spaces ? ' ' : '';
        if (!is_numeric($number)) {
            return false;
        }
        if ($number > PHP_INT_MAX or $number < -PHP_INT_MAX) {
            // overflow
            throw new NumberToWordsException(
                sprintf('out of range')
            );
            return false;
        }
        if ($number < 0) {
            return self::MINUS . $this->toWords(abs($number));
        }
        $string = $fraction = null;
        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }
        switch (true) {
            case $number == 0:
                $string = self::$dictionary[0];
                break;
            case $number < 21:
                $string = self::$dictionary[$number];
                break;
            case $number < 100:
                $twenties = ((int)($number / 20)) * 20;
                $units = $number % 20;
                $string = self::$dictionary[$twenties];
                if ($units) {
                    $string .= self::CONJUNCTION . self::$dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds = $number / 100;
                $remainder = $number % 100;
                $hundredsStr = $hundreds < 2 ? '' : self::$dictionary[$hundreds];
                $string = $hundredsStr . self::$dictionary[100];
                if ($remainder) {
                    $string .= $space . $this->toWords($remainder, false);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int)($number / $baseUnit);
                $remainder = $number % $baseUnit;
                if ($numBaseUnits < 2) {
                    $string = self::$dictionary[$baseUnit];
                } else {
                    $string = $this->toWords($numBaseUnits);
                    $string .= $space . self::$dictionary[$baseUnit];
                }
                if ($remainder) {
                    $string .= $space . $this->toWords($remainder, false);
                }
                break;
        }
        // no suffix for 8 and 9
        if ($use_suffix and !in_array($number % 20, array(8, 9))) {
            $string .= self::SUFFIX;
        }
        if (null !== $fraction and is_numeric($fraction)) {
            $string .= self::DECIMAL;
            $string .= $this->toWords($fraction);
            $string .= self::FRACTION_PREFIX;
            $string .= $this->toWords(pow(10, floor(log($fraction, 10)) + 1), false, false);
            $string .= self::FRACTION_SUFFIX;
        }
        return $string;
    }


}