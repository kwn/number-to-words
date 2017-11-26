<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;
use NumberToWords\Language\German\GermanDictionary;
use NumberToWords\Language\German\GermanExponentInflector;
use NumberToWords\Language\German\GermanTripletTransformer;
use NumberToWords\Service\NumberToTripletsConverter;
use NumberToWords\NumberTransformer\NumberTransformerBuilder;

class De extends Words
{
    const LOCALE               = 'de';
    const LANGUAGE_NAME        = 'German';
    const LANGUAGE_NAME_NATIVE = 'Deutsch';

    private $minus = 'Minus';

    private static $exponent = [
        ['', ''],
        ['tausend', 'tausend'],
        ['Million', 'Millionen'],
        ['Milliarde', 'Milliarden'],
        ['Billion', 'Billionen'],
        ['Billiarde', 'Billiarden'],
        ['Trillion', 'Trillionen'],
        ['Trilliarde', 'Trilliarden'],
        ['Quadrillion', 'Quadrillionen'],
        ['Quadrilliarde', 'Quadrilliarden'],
        ['Quintillion', 'Quintillionen'],
        ['Quintilliarde', 'Quintilliarden'],
        ['Sextillion', 'Sextillionen'],
        ['Sextilliarde', 'Sextilliarden'],
        ['Septillion', 'Septillionen'],
        ['Septilliarde', 'Septilliarden'],
        ['Oktillion', 'Oktillionen'], // oder Octillionen
        ['Oktilliarde', 'Oktilliarden'],
        ['Nonillion', 'Nonillionen'],
        ['Nonilliarde', 'Nonilliarden'],
        ['Dezillion', 'Dezillionen'],
        ['Dezilliarde', 'Dezilliarden'],
    ];

    private static $digits = [
        'null',
        'ein',
        'zwei',
        'drei',
        'vier',
        'fünf',
        'sechs',
        'sieben',
        'acht',
        'neun'
    ];

    private $wordSeparator = ' ';

    private $and = 'und';
    
//    private $pluralSuffix = 's';
    
    private static $currencyNames = [
        'AUD' => [['Australischer Dollar', 'Australische Dollar'], ['Cent']],
        'CHF' => [['Schweizer Franken', 'Schweizer Franken'], ['Rappen']],
        'EUR' => [['Euro'], ['Cent']],
        'JPY' => [['Yen', ['sen']]],
        'MXN' => [['Mexikanischer Peso', 'Mexikanische Peso'], ['Centavos']],
        'USD' => [['US-Dollar', 'US-Dollars'], ['Cent']],
    ];

    /**
     * @param int $number
     *
     * @return array
     */
    private function splitNumber($number)
    {
        return array_map('intval', explode(' ', number_format($number, 0, '', ' ')));
    }

    /**
     * @param int  $num
     * @param bool $last
     *
     * @return string
     */
    private function showDigitsGroup($num, $last = false)
    {
        $return = '';
        $ones = $num % 10;
        $tens = (int) ($num % 100 / 10);
        $hundreds = (int) ($num % 1000 / 100);
        if ($hundreds) {
            if ($hundreds > 1) {
                $return .= self::$digits[$hundreds] . $this->wordSeparator . self::$miscNumbers[100];
                if ($last && !$ones && !$tens) {
//                    $return .= $this->pluralSuffix;
                }
            } else {
                $return .= self::$miscNumbers[100];
            }
            $return .= $this->wordSeparator;
        }
        if ($tens) {
            if ($tens === 1) {
                if ($ones <= 6) {
                    $return .= self::$miscNumbers[10 + $ones];
                } else {
                    $return .= self::$miscNumbers[10] . '-' . self::$digits[$ones];
                }
                $ones = 0;
            } elseif ($tens > 5) {
                if ($tens < 8) {
                    $return .= self::$miscNumbers[60];
                    $resto = $tens * 10 + $ones - 60;
                    if ($ones === 1) {
                        $return .= $this->wordSeparator . $this->and . $this->wordSeparator;
                    } elseif ($resto) {
                        $return .= $this->dash;
                    }
                    if ($resto) {
                        $return .= $this->showDigitsGroup($resto);
                    }
                    $ones = 0;
                } else {
                    $return .= self::$digits[4] . $this->dash . self::$miscNumbers[20];
                    $resto = $tens * 10 + $ones - 80;
                    if ($resto) {
                        $return .= $this->dash;
                        $return .= $this->showDigitsGroup($resto);
                        $ones = 0;
                    } else {
//                        $return .= $this->pluralSuffix;
                    }
                }
            } else {
                $return .= self::$miscNumbers[$tens * 10];
            }
        }
        if ($ones) {
            if ($tens) {
                if ($ones === 1) {
                    $return .= $this->wordSeparator . $this->and . $this->wordSeparator;
                } else {
                    $return .= $this->dash;
                }
            }
            $return .= self::$digits[$ones];
        }
        return rtrim($return, $this->wordSeparator);
    }

    /**
     * @param int $number
     *
     * @return string
     */
    protected function toWords($number)
    {
        $dictionary = new GermanDictionary();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new GermanTripletTransformer($dictionary);
        $exponentInflector = new GermanExponentInflector();
        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withWordsSeparatedBy('')
            ->withExponentsSeparatedBy(' ')
            ->transformNumbersBySplittingIntoPowerAwareTriplets($numberToTripletsConverter, $tripletTransformer)
            ->inflectExponentByNumbers($exponentInflector)
            ->build();
        return $numberTransformer->toWords($number);
    }
    
    /**
     * @param string $currency
     * @param int    $decimal
     * @param int    $fraction
     *
     * @throws NumberToWordsException
     * @return string
     */
    public function toCurrencyWords($currency, $decimal, $fraction = null)
    {
        $currency = strtoupper($currency);
        if (!array_key_exists($currency, static::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }
        $currencyNames = static::$currencyNames[$currency];
        $return = trim($this->toWords($decimal)) . $this->wordSeparator;
        $level = ($decimal === 1) ? 0 : 1;
        if ($level > 0) {
            if (count($currencyNames[0]) > 1) {
                $return .= $currencyNames[0][$level];
            } else {
//                $return .= $currencyNames[0][0] . 's';
                $return .= $currencyNames[0][0];
            }
        } else {
            $return .= $currencyNames[0][0];
        }
        if (null !== $fraction) {
            $return .= sprintf('%1$s%2$s%1$s%3$s%1$s', $this->wordSeparator, $this->and, trim($this->toWords($fraction)));
            $level = $fraction === 1 ? 0 : 1;
            if ($level > 0) {
                if (count($currencyNames[1]) > 1) {
                    $return .= $currencyNames[1][$level];
                } else {
//                    $return .= $currencyNames[1][0] . 's';
                    $return .= $currencyNames[1][0];
                }
            } else {
                $return .= $currencyNames[1][0];
            }
        }
        return $return;
    }
}
