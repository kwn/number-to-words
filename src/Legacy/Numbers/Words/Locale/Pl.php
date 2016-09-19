<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Pl extends Words
{
    const LOCALE = 'pl';
    const LANGUAGE_NAME = 'Polish';
    const LANGUAGE_NAME_NATIVE = 'polski';
    const MINUS = 'minus';

    public static $zero = 'zero';

    public static $units = ['', 'jeden', 'dwa', 'trzy', 'cztery', 'pięć', 'sześć', 'siedem', 'osiem', 'dziewięć'];

    public static $teens = [
        'dziesięć',
        'jedenaście',
        'dwanaście',
        'trzynaście',
        'czternaście',
        'piętnaście',
        'szesnaście',
        'siedemnaście',
        'osiemnaście',
        'dziewiętnaście'
    ];

    public static $tens = [
        '',
        'dziesięć',
        'dwadzieścia',
        'trzydzieści',
        'czterdzieści',
        'pięćdziesiąt',
        'sześćdziesiąt',
        'siedemdziesiąt',
        'osiemdziesiąt',
        'dziewięćdziesiąt'
    ];

    public static $hundreds = [
        '',
        'sto',
        'dwieście',
        'trzysta',
        'czterysta',
        'pięćset',
        'sześćset',
        'siedemset',
        'osiemset',
        'dziewięćset'
    ];

    public static $exponent = [
        ['', '', ''],
        ['tysiąc', 'tysiące', 'tysięcy'],
        ['milion', 'miliony', 'milionów'],
        ['miliard', 'miliardy', 'miliardów'],
        ['bilion', 'biliony', 'bilionów'],
        ['biliard', 'biliardy', 'biliardów'],
        ['trylion', 'tryliony', 'trylionów'],
        ['tryliard', 'tryliardy', 'tryliardów'],
        ['kwadrylion', 'kwadryliony', 'kwadrylionów'],
        ['kwadryliard', 'kwadryliardy', 'kwadryliardów'],
        ['kwintylion', 'kwintyliony', 'kwintylionów'],
        ['kwintyliiard', 'kwintyliardy', 'kwintyliardów'],
        ['sekstylion', 'sekstyliony', 'sekstylionów'],
        ['sekstyliard', 'sekstyliardy', 'sekstyliardów'],
        ['septylion', 'septyliony', 'septylionów'],
        ['septyliard', 'septyliardy', 'septyliardów'],
        ['oktylion', 'oktyliony', 'oktylionów'],
        ['oktyliard', 'oktyliardy', 'oktyliardów'],
        ['nonylion', 'nonyliony', 'nonylionów'],
        ['nonyliard', 'nonyliardy', 'nonyliardów'],
        ['decylion', 'decyliony', 'decylionów'],
        ['decyliard', 'decyliardy', 'decyliardów'],
    ];

    private $wordSeparator = ' ';

    private static $currencyNames = [
        'ALL' => [['lek', 'leki', 'leków'], ['quindarka', 'quindarki', 'quindarek']],
        'AUD' => [['dolar australijski', 'dolary australijskie', 'dolarów australijskich'], ['cent', 'centy', 'centów']],
        'BAM' => [['marka', 'marki', 'marek'], ['fenig', 'fenigi', 'fenigów']],
        'BGN' => [['lew', 'lewy', 'lew'], ['stotinka', 'stotinki', 'stotinek']],
        'BRL' => [['real', 'reale', 'realów'], ['centavos', 'centavos', 'centavos']],
        'BYR' => [['rubel', 'ruble', 'rubli'], ['kopiejka', 'kopiejki', 'kopiejek']],
        'CAD' => [['dolar kanadyjski', 'dolary kanadyjskie', 'dolarów kanadyjskich'], ['cent', 'centy', 'centów']],
        'CHF' => [['frank szwajcarski', 'franki szwajcarskie', 'franków szwajcarskich'], ['rapp', 'rappy', 'rappów']],
        'CYP' => [['funt cypryjski', 'funty cypryjskie', 'funtów cypryjskich'], ['cent', 'centy', 'centów']],
        'CZK' => [['korona czeska', 'korony czeskie', 'koron czeskich'], ['halerz', 'halerze', 'halerzy']],
        'DKK' => [['korona duńska', 'korony duńskie', 'koron duńskich'], ['ore', 'ore', 'ore']],
        'EEK' => [['korona estońska', 'korony estońskie', 'koron estońskich'], ['senti', 'senti', 'senti']],
        'EUR' => [['euro', 'euro', 'euro'], ['eurocent', 'eurocenty', 'eurocentów']],
        'GBP' => [['funt szterling', 'funty szterlingi', 'funtów szterlingów'], ['pens', 'pensy', 'pensów']],
        'HKD' => [['dolar Hongkongu', 'dolary Hongkongu', 'dolarów Hongkongu'], ['cent', 'centy', 'centów']],
        'HRK' => [['kuna', 'kuny', 'kun'], ['lipa', 'lipy', 'lip']],
        'HUF' => [['forint', 'forinty', 'forintów'], ['filler', 'fillery', 'fillerów']],
        'ILS' => [['nowy szekel', 'nowe szekele', 'nowych szekeli'], ['agora', 'agory', 'agorot']],
        'ISK' => [['korona islandzka', 'korony islandzkie', 'koron islandzkich'], ['aurar', 'aurar', 'aurar']],
        'JPY' => [['jen', 'jeny', 'jenów'], ['sen', 'seny', 'senów']],
        'LTL' => [['lit', 'lity', 'litów'], ['cent', 'centy', 'centów']],
        'LVL' => [['łat', 'łaty', 'łatów'], ['sentim', 'sentimy', 'sentimów']],
        'MKD' => [['denar', 'denary', 'denarów'], ['deni', 'deni', 'deni']],
        'MTL' => [['lira maltańska', 'liry maltańskie', 'lir maltańskich'], ['centym', 'centymy', 'centymów']],
        'NOK' => [['korona norweska', 'korony norweskie', 'koron norweskich'], ['oere', 'oere', 'oere']],
        'PLN' => [['złoty', 'złote', 'złotych'], ['grosz', 'grosze', 'groszy']],
        'ROL' => [['lej', 'leje', 'lei'], ['bani', 'bani', 'bani']],
        'RUB' => [['rubel', 'ruble', 'rubli'], ['kopiejka', 'kopiejki', 'kopiejek']],
        'SEK' => [['korona szwedzka', 'korony szwedzkie', 'koron szweckich'], ['oere', 'oere', 'oere']],
        'SIT' => [['tolar', 'tolary', 'tolarów'], ['stotinia', 'stotinie', 'stotini']],
        'SKK' => [['korona słowacka', 'korony słowackie', 'koron słowackich'], ['halerz', 'halerze', 'halerzy']],
        'TRL' => [['lira turecka', 'liry tureckie', 'lir tureckich'], ['kurusza', 'kurysze', 'kuruszy']],
        'UAH' => [['hrywna', 'hrywna', 'hrywna'], ['cent', 'centy', 'centów']],
        'USD' => [['dolar', 'dolary', 'dolarów'], ['cent', 'centy', 'centów']],
        'YUM' => [['dinar', 'dinary', 'dinarów'], ['para', 'para', 'para']],
        'ZAR' => [['rand', 'randy', 'randów'], ['cent', 'centy', 'centów']]
    ];

    /**
     * @param int $number
     *
     * @return string
     */
    protected function toWords($number)
    {
        if ($number === 0) {
            return self::$zero;
        }

        $triplets = $this->extractTriplets(abs($number));
        $words = [];

        foreach ($triplets as $i => $triplet) {
            if ($triplet > 0) {
                $threeDigitsWords = $this->threeDigitsToWords($triplet);

                if ($i > 0) {
                    $case = $this->getGrammarCase($triplet);
                    $mega = self::$exponent[$i][$case];
                    $threeDigitsWords = $threeDigitsWords . ' ' . $mega;
                }

                $words[] = $threeDigitsWords;
            }
        }

        $transformedNumber = implode(' ', array_reverse($words));

        return $number < 0 ? self::MINUS . ' ' . $transformedNumber : $transformedNumber;
    }

    /**
     * @param int $number
     *
     * @return array
     */
    private function extractTriplets($number)
    {
        $triplets = [];

        while ($number > 0) {
            $triplets[] = $number % 1000;
            $number = (int) ($number / 1000);
        }

        return $triplets;
    }

    /**
     * @param int $number
     *
     * @return string
     */
    private function threeDigitsToWords($number)
    {
        $units = $number % 10;
        $tens = (int) ($number / 10) % 10;
        $hundreds = (int) ($number / 100) % 10;
        $words = [];

        if ($hundreds > 0) {
            $words[] = self::$hundreds[$hundreds];
        }

        if ($tens === 1) {
            $words[] = self::$teens[$units];
        } else {
            if ($tens > 0) {
                $words[] = self::$tens[$tens];
            }
            if ($units > 0) {
                $words[] = self::$units[$units];
            }
        }

        return implode(' ', $words);
    }

    /**
     * @param int $number
     *
     * @return int
     */
    private function getGrammarCase($number)
    {
        $units = $number % 10;
        $tens = ((int) ($number / 10)) % 10;
        $case = 2;

        if ($number === 1) {
            $case = 0;
        } elseif ($tens === 1 && $units > 1) {
            $case = 2;
        } elseif ($units >= 2 && $units <= 4) {
            $case = 1;
        }

        return $case;
    }

    /**
     * @param string $currency
     * @param int    $decimal
     * @param int    $fraction
     * @param bool   $convertFraction
     *
     * @throws NumberToWordsException
     * @return string
     */
    public function toCurrencyWords($currency, $decimal, $fraction = null, $convertFraction = true)
    {
        $currency = strtoupper($currency);

        if (!array_key_exists($currency, self::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = self::$currencyNames[$currency];

        $return = trim($this->toWords($decimal));
        $grammarCase = $this->getGrammarCase($decimal);
        $return .= $this->wordSeparator . $currencyNames[0][$grammarCase];

        if (null !== $fraction) {
            if (true === $convertFraction) {
                $return .= $this->wordSeparator . trim($this->toWords($fraction));
            } else {
                $return .= $this->wordSeparator . $fraction;
            }

            $grammarCase = $this->getGrammarCase($fraction);
            $return .= $this->wordSeparator . $currencyNames[1][$grammarCase];
        }

        return $return;
    }
}
