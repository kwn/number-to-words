<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale\Pt;

use NumberToWords\Legacy\Numbers\Words;
use NumberToWords\Exception\NumberToWordsException;

class Br extends Words
{
    const LOCALE               = 'pt_BR';
    const LANGUAGE_NAME        = 'Brazilian Portuguese';
    const LANGUAGE_NAME_NATIVE = 'Português Brasileiro';

    private $minus = 'negativo';

    private $separator = ' e ';

    private $currencySeparator = ' de ';

    private static $contractions = [
        '',
        'onze',
        'doze',
        'treze',
        'quatorze',
        'quinze',
        'dezesseis',
        'dezessete',
        'dezoito',
        'dezenove'
    ];

    private static $words = [
        /**
         * The array containing the digits (indexed by the digits themselves).
         */
        [
            '',         // 0: not displayed
            'um',
            'dois',
            'três',
            'quatro',
            'cinco',
            'seis',
            'sete',
            'oito',
            'nove'
        ],
        /**
         * The array containing numbers for 10,20,...,90.
         */
        [
            '',         // 0: not displayed
            'dez',
            'vinte',
            'trinta',
            'quarenta',
            'cinqüenta',
            'sessenta',
            'setenta',
            'oitenta',
            'noventa'
        ],
        /**
         * The array containing numbers for hundreds.
         */
        [
            '',         // 0: not displayed
            'cento',    // 'cem' is a special case handled in toWords()
            'duzentos',
            'trezentos',
            'quatrocentos',
            'quinhentos',
            'seiscentos',
            'setecentos',
            'oitocentos',
            'novecentos'
        ],
    ];

    private static $exponent = [
        '', // 0: not displayed
        'mil',
        'milhão',
        'bilhão',
        'trilhão',
        'quatrilhão',
        'quintilhão',
        'sextilhão',
        'septilhão',
        'octilhão',
        'nonilhão',
        'decilhão',
        'undecilhão',
        'dodecilhão',
        'tredecilhão',
        'quatuordecilhão',
        'quindecilhão',
        'sedecilhão',
        'septendecilhão'
    ];

    private static $currencyNames = [
        'BRL' => [['real', 'reais'], ['centavo', 'centavos']],
        'USD' => [['dólar', 'dólares'], ['centavo', 'centavos']],
        'EUR' => [['euro', 'euros'], ['centavo', 'centavos']],
        'GBP' => [['libra esterlina', 'libras esterlinas'], ['centavo', 'centavos']],
        'JPY' => [['iene', 'ienes'], ['centavo', 'centavos']],
        'ARS' => [['peso argentino', 'pesos argentinos'], ['centavo', 'centavos']],
        'MXN' => [['peso mexicano', 'pesos mexicanos'], ['centavo', 'centavos']],
        'UYU' => [['peso uruguaio', 'pesos uruguaios'], ['centavo', 'centavos']],
        'PYG' => [['guarani', 'guaranis'], ['centavo', 'centavos']],
        'BOB' => [['boliviano', 'bolivianos'], ['centavo', 'centavos']],
        'CLP' => [['peso chileno', 'pesos chilenos'], ['centavo', 'centavos']],
        'COP' => [['peso colombiano', 'pesos colombianos'], ['centavo', 'centavos']],
        'CUP' => [['peso cubano', 'pesos cubanos'], ['centavo', 'centavos']],
    ];

    /**
     * @param int $num
     *
     * @return string
     * @throws NumberToWordsException
     */
    protected function toWords($num)
    {
        $neg = 0;
        $ret = [];

        /**
         * Negative ?
         */
        if ($num < 0) {
            $ret[] = $this->minus;
            $num = -$num;
            $neg = 1;
        }

        /**
         * Removes leading zeros, spaces, decimals etc.
         * Adds thousands separator.
         */
        $num = number_format($num, 0, '.', '.');

        /**
         * Testing Zero
         */
        if ($num == 0) {
            return 'zero';
        }

        /**
         * Breaks into chunks of 3 digits.
         * Reversing array to process from right to left.
         */
        $chunks = array_reverse(explode(".", $num));

        /**
         * Looping through the chunks
         */
        foreach ($chunks as $index => $chunk) {
            /**
             * Testing Range
             */
            if (!array_key_exists($index, self::$exponent)) {
                throw new NumberToWordsException('Number out of range.');
            }

            /**
             * Testing Zero
             */
            if ($chunk == 0) {
                continue;
            }

            /**
             * Testing plural of exponent
             */
            if ($chunk > 1) {
                $exponent = str_replace('ão', 'ões', self::$exponent[$index]);
            } else {
                $exponent = self::$exponent[$index];
            }

            /**
             * Adding exponent
             */
            $ret[] = $exponent;

            /**
             * Actual Number
             */
            $word = array_filter($this->parseChunk($chunk));
            $ret[] = implode($this->separator, $word);
        }

        /**
         * In Brazilian Portuguese the last chunck must be separated under
         * special conditions.
         */
        if ((count($ret) > 2 + $neg)
            && $this->mustSeparate($chunks)
        ) {
            $ret[1 + $neg] = trim($this->separator . $ret[1 + $neg]);
        }

        $ret = array_reverse(array_filter($ret));

        return implode(' ', $ret);
    }

    /**
     * @param string $chunk
     *
     * @return array
     */
    private function parseChunk($chunk)
    {
        /**
         * Base Case
         */
        if (!$chunk) {
            return [];
        }

        /**
         * 100 is a special case
         */
        if ($chunk == 100) {
            return ['cem'];
        }

        /**
         * Testing contractions (11~19)
         */
        if (($chunk < 20) && ($chunk > 10)) {
            return [self::$contractions[$chunk % 10]];
        }

        $i = strlen($chunk) - 1;
        $n = (int) $chunk[0];
        $word = self::$words[$i][$n];

        return array_merge([$word], $this->parseChunk(substr($chunk, 1)));
    }

    /**
     * @param array $chunks
     *
     * @return bool
     */
    private function mustSeparate($chunks)
    {
        $found = null;

        foreach ($chunks as $chunk) {
            if ($chunk !== '000') {
                break;
            }
        }

        if ($chunk < 100 || !($chunk % 100)) {
            return true;
        }

        return false;
    }

    /**
     * @param string $currency
     * @param int    $decimal
     * @param int    $fraction
     *
     * @return string
     * @throws NumberToWordsException
     */
    public function toCurrencyWords($currency, $decimal, $fraction = null)
    {
        $negative = 0;
        $ret = [];
        $noDecimals = false;

        /**
         * Negative ?
         * We can lose the '-' sign if we do the
         * check after number_format() call (i.e. -0.01)
         */
        if (substr($decimal, 0, 1) == '-') {
            $decimal = -$decimal;
            $negative = 1;
        }

        /**
         * Removes leading zeros, spaces, decimals etc.
         * Adds thousands separator.
         */
        $num = number_format($decimal, 0, '', '');

        /**
         * Checking if given currency exists in driver.
         * If not, use default currency
         */
        $currency = strtoupper($currency);
        if (!isset(self::$currencyNames[$currency])) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        /**
         * Currency names and plural
         */
        $currencyNames = self::$currencyNames[$currency];

        if ($num > 0) {
            /**
             * Word representation of decimal
             */
            $ret[] = $this->toWords($num);

            /**
             * Special case.
             */
            if (substr($num, -6) == '000000') {
                $ret[] = trim($this->currencySeparator);
            }

            /**
             * Testing plural. Adding currency name
             */
            if ($num > 1) {
                $ret[] = $currencyNames[0][1];
            } else {
                $ret[] = $currencyNames[0][0];
            }
        }

        /**
         * Test if fraction was given and != 0
         */
        $fraction = (int) $fraction;
        if ($fraction) {

            /**
             * Removes leading zeros, spaces, decimals etc.
             * Adds thousands separator.
             */
            $num = number_format($fraction, 0, '.', '.');

            if ($num < 0 || $num > 99) {
                throw new NumberToWordsException('Fraction out of range.');
            }

            if (count($ret)) {
                $ret[] = trim($this->separator);
            } else {
                $noDecimals = true;
            }


            $ret[] = $this->toWords($num);

            if ($num > 1) {
                $ret[] = $currencyNames[1][1];
            } else {
                $ret[] = $currencyNames[1][0];
            }

            if ($noDecimals) {
                $ret[] = trim($this->currencySeparator);
                $ret[] = $currencyNames[0][0];
            }
        }

        if ($negative) {
            $ret[] = $this->minus;
        }

        return implode(' ', $ret);
    }
}
