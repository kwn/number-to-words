<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;

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
     * @return string
     */
    protected function toWords($number)
    {
        $ret = '';
        if ($number === 0) {
            return $this->zero;
        }
        if ($number < 0) {
            $ret = $this->minus . $this->wordSeparator;
        }
        $numberGroups = $this->splitNumber(abs($number));
        $sizeOfNumberGroups = count($numberGroups);
        foreach ($numberGroups as $i => $numb) {
            $power = $sizeOfNumberGroups - $i;
            if ($numb !== 0) {
                if ($numb !== 1 || $power !== 2) {
                    $ret .= $this->showDigitsGroup(
                        $numb,
                        $i + 1 === $sizeOfNumberGroups || $power > 2
                    ) . $this->wordSeparator;
                }
                $ret .= self::$exponent[($power - 1) * 3];
                if ($power > 2 && $numb > 1) {
                    $ret .= $this->pluralSuffix;
                }
                $ret .= $this->wordSeparator;
            }
        }
        return rtrim($ret, $this->wordSeparator);
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
                $return .= $currencyNames[0][0] . 's';
            }
        } else {
            $return .= $currencyNames[0][0];
        }
        if (null !== $fraction) {
            $return .= sprintf('%1$s%2$s%1$s%3$s%1$s', $this->wordSeparator, $this->subunitSeparator, trim($this->toWords($fraction)));
            $level = $fraction === 1 ? 0 : 1;
            if ($level > 0) {
                if (count($currencyNames[1]) > 1) {
                    $return .= $currencyNames[1][$level];
                } else {
                    $return .= $currencyNames[1][0] . 's';
                }
            } else {
                $return .= $currencyNames[1][0];
            }
        }
        return $return;
    }
}
