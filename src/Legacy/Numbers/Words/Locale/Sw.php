<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Legacy\Numbers\Words;
use NumberToWords\Exception\NumberToWordsException;

class Sw extends Words
{
    private static $miscNumbers = [
        10 => 'kumi',
        20 => 'ishirini',
        30 => 'thelathini',
        40 => 'arobaini',
        50 => 'hamsini',
        60 => 'sitini',
        70 => 'sabini',
        80 => 'themanini',
        90 => 'tisini',
        100 => 'mia'
    ];

    private static $digits = [
        1 => 'moja',
        2 => 'mbili',
        3 => 'tatu',
        4 => 'nne',
        5 => 'tano',
        6 => 'sita',
        7 => 'saba',
        8 => 'nane',
        9 => 'tisa'
    ];

    private static $exponent = [
        0 => '',
        3 => 'elfu',
        5 => 'laki',
        6 => 'milioni',
        9 => 'bilioni',
        12 => 'trilioni',
    ];

    private $zero = 'sifuri';
    private $and = 'na';
    private $wordSeparator = ' ';
    private $minus = 'kasoro';
 
    // Currency names 
    private static $currencyNames = [
        'KES' => [['Shilingi ya Kenya', 'Shilingi za Kenya'], ['senti', 'senti']],
        'USD' => [['Dola ya Marekani', 'Dola za Marekani'], ['senti', 'senti']],
        'EUR' => [['Yuro', 'Yuro'], ['senti', 'senti']],
        'GBP' => [['Pauni ya Uingereza', 'Pauni za Uingereza'], ['senti', 'senti']],
        'TZS' => [['Shilingi ya Tanzania', 'Shilingi za Tanzania'], ['senti', 'senti']],
        'UGX' => [['Shilingi ya Uganda', 'Shilingi za Uganda'], ['senti', 'senti']],
        'ZAR' => [['Randi ya Afrika Kusini', 'Randi za Afrika Kusini'], ['senti', 'senti']],
        'NGN' => [['Naira ya Nigeria', 'Naira za Nigeria'], ['kobo', 'kobo']],
        'GHS' => [['Cedi ya Ghana', 'Cedi za Ghana'], ['Pesewa', 'Pesewa']],
        'RWF' => [['Faranga ya Rwanda', 'Faranga za Rwanda'], ['senti', 'senti']],
        'BWP' => [['Pula ya Botswana', 'Pula za Botswana'], ['thebe', 'thebe']],
        'INR' => [['Rupia ya India', 'Rupia za India'], ['paise', 'paise']],
        'JPY' => [['Yen ya Japani', 'Yen za Japani'], ['seni', 'seni']],
        'CNY' => [['Yuan ya China', 'Yuan za China'], ['feni', 'feni']],
        'CAD' => [['Dola ya Kanada', 'Dola za Kanada'], ['senti', 'senti']],
        'AUD' => [['Dola ya Australia', 'Dola za Australia'], ['senti', 'senti']],
        'CHF' => [['Faranga ya Uswisi', 'Faranga za Uswisi'], ['senti', 'senti']],
        'BRL' => [['Reali ya Brazil', 'Reali za Brazil'], ['sentavo', 'sentavo']],
        'MXN' => [['Peso ya Meksiko', 'Peso za Meksiko'], ['sentavo', 'sentavo']],
        'SAR' => [['Riyal ya Saudi Arabia', 'Riyal za Saudi Arabia'], ['halala', 'halala']],
        'AED' => [['Dirham ya Umoja wa Falme za Kiarabu', 'Dirham za Umoja wa Falme za Kiarabu'], ['fils', 'fils']],
        'EGP' => [['Pauni ya Misri', 'Pauni za Misri'], ['piastiri', 'piastiri']],
    ];



    protected function toWords($number)
    {
        if ($number == 0) {
            return $this->zero;
        }

        $isNegative = $number < 0;
        $number = abs($number);

        // Handle decimal numbers
        $integerPart = floor($number);
        $decimalPart = $number - $integerPart;

        $result = $this->convertIntegerPart($integerPart);

        if ($decimalPart > 0) {
            $result .= ' nukta ' . $this->convertDecimalPart($decimalPart);
        }

        if ($isNegative) {
            $result = $this->minus . $this->wordSeparator . $result;
        }

        return trim($result);
    }

    private function convertIntegerPart($number)
    {
        $result = '';

        if ($number >= 1000000000000) {
            $trillions = floor($number / 1000000000000);
            $result .= self::$exponent[12] . $this->wordSeparator . $this->numberToSwahiliLessThanThousand($trillions) . ', ';
            $number %= 1000000000000;
        }

        if ($number >= 1000000000) {
            $billions = floor($number / 1000000000);
            $result .= self::$exponent[9] . $this->wordSeparator . $this->numberToSwahiliLessThanThousand($billions) . ', ';
            $number %= 1000000000;
        }

        if ($number >= 1000000) {
            $millions = floor($number / 1000000);
            $result .= self::$exponent[6] . $this->wordSeparator . $this->numberToSwahiliLessThanThousand($millions) . ', ';
            $number %= 1000000;
        }

        if ($number >= 100000) {
            $lakhs = floor($number / 100000);
            $result .= self::$exponent[5] . $this->wordSeparator . $this->numberToSwahiliLessThanHundredThousand($lakhs) . ', ';
            $number %= 100000;
        }

        if ($number >= 1000) {
            $thousands = floor($number / 1000);
            $result .= self::$exponent[3] . $this->wordSeparator . $this->numberToSwahiliLessThanThousand($thousands) . ', ';
            $number %= 1000;
        }

        if ($number > 0) {
            $result .= $this->numberToSwahiliLessThanThousand($number);
        }

        return rtrim(rtrim($result), ',');
    }

    private function convertDecimalPart($decimal)
    {
        $decimalStr = substr(strval($decimal), 2); // Remove "0."
        $result = '';
        foreach (str_split($decimalStr) as $digit) {
            $result .= $this->numberToSwahiliLessThanTen((int)$digit) . $this->wordSeparator;
        }
        return trim($result);
    }

    private function numberToSwahiliLessThanTen($number)
    {
        return self::$digits[$number];
    }

    private function numberToSwahiliLessThanHundred($number)
    {
        if ($number < 10) {
            return $this->numberToSwahiliLessThanTen($number);
        }

        $tens = array_values(self::$miscNumbers);
        $ten = floor($number / 10);
        $one = $number % 10;

        $result = $tens[$ten - 1];
        if ($one > 0) {
            $result .= $this->wordSeparator . $this->and . $this->wordSeparator . $this->numberToSwahiliLessThanTen($one);
        }

        return $result;
    }

    private function numberToSwahiliLessThanThousand($number)
    {
        if ($number < 100) {
            return $this->numberToSwahiliLessThanHundred($number);
        }

        $hundred = floor($number / 100);
        $remainder = $number % 100;

        $result = ($hundred == 1) ? self::$miscNumbers[100] : self::$miscNumbers[100] . $this->wordSeparator . $this->numberToSwahiliLessThanTen($hundred);
        if ($remainder > 0) {
            $result .= $this->wordSeparator . $this->and . $this->wordSeparator . $this->numberToSwahiliLessThanHundred($remainder);
        }

        return $result;
    }

    private function numberToSwahiliLessThanHundredThousand($number)
    {
        if ($number < 1000) {
            return $this->numberToSwahiliLessThanThousand($number);
        }

        $thousand = floor($number / 1000);
        $remainder = $number % 1000;

        $result = ($thousand == 1) ? self::$exponent[3] : self::$exponent[3] . $this->wordSeparator . $this->numberToSwahiliLessThanThousand($thousand);
        if ($remainder > 0) {
            $result .= $this->wordSeparator . $this->and . $this->wordSeparator . $this->numberToSwahiliLessThanThousand($remainder);
        }

        return $result;
    }

    public function toCurrencyWords($currency, $decimal, $fraction = null)
    {
        $currency = strtoupper($currency);

        if (!array_key_exists($currency, static::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for Swahili language', $currency)
            );
        }

        $currencyNames = static::$currencyNames[$currency];
        $return = trim($this->toWords($decimal));

        // Check if singular and plural forms are available
        $level = ($decimal === 1) ? 0 : 1;
        $currencySingularOrPlural = isset($currencyNames[0][$level]) ? $currencyNames[0][$level] : '';

        $return = $currencySingularOrPlural. $this->wordSeparator.$return;

        if (null !== $fraction) {
            
            $level = $fraction === 1 ? 0 : 1;

            // Check if singular and plural forms for fraction are available
            $fractionSingularOrPlural = isset($currencyNames[1][$level]) ? $currencyNames[1][$level] : '';
            
            $return .= sprintf(
                '%1$s%2$s%1$s%3$s',
                $this->wordSeparator,
                $this->and.' '.$fractionSingularOrPlural,
                trim($this->toWords($fraction))
            );
        }

        return trim(ucfirst($return));
    }

}
