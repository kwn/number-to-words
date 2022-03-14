<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Ng extends Words
{
    const LOCALE = 'ng';
    const LANGUAGE_NAME = 'English';
    const LANGUAGE_NAME_NATIVE = 'English';
    const MINUS = 'minus';

    protected $zero = 'zero';
    protected static $conjunction = 'and';
    protected static $separator = 'and';

    /**
     * Sources
     * https://en.wikipedia.org/wiki/Yoruba_numerals
     * https://en.09nt.com/yoruba-numbers-from-1-to-100
     */
    protected static $unit = [
        0 => '',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine'
    ];

    protected static $teens = [
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'forteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen',
    ];

    protected static $tens = [
        20 => 'twenty',
        30 => 'thirty',
        40 => 'forty',
        50 => 'fifty',
        60 => 'sixty',
        70 => 'seventy',
        80 => 'eighty',
        90 => 'ninety',
    ];

    protected static $hundred = [
        0 => '',
        100 => 'hunred',
        200 => 'two hundred',
        300 => 'three hundred',
        400 => 'four hundred',
        500 => 'five hundred',
        600 => 'six hundred',
        700 => 'seven hundred',
        800 => 'eight hundred',
        900 => 'nine hundred',
    ];

    protected static $mega = [
        1 => 'thousand',
        2 => 'million',
        3 => 'billion',
        4 => 'million million',
        5 => 'billion million',
        6 => 'billion billion',
        7 => 'several million',
    ];

    public static $currencyNames = [
        'ALL' => [['lek'], ['qindarka']],
        'AUD' => [['Australian dollar'], ['cent']],
        'BAM' => [['convertible marka'], ['fenig']],
        'BGN' => [['lev'], ['stotinka']],
        'BRL' => [['real'], ['centavos']],
        'BYR' => [['Belarussian rouble'], ['kopiejka']],
        'CAD' => [['Canadian dollar'], ['cent']],
        'CHF' => [['Swiss franc'], ['rapp']],
        'CYP' => [['Cypriot pound'], ['cent']],
        'CZK' => [['Czech koruna'], ['halerz']],
        'DKK' => [['Danish krone'], ['ore']],
        'DZD' => [['dinar'], ['cent']],
        'EEK' => [['kroon'], ['senti']],
        'EUR' => [['euro'], ['euro-cent']],
        'GBP' => [['pound', 'pounds'], ['pence', 'pence']],
        'HKD' => [['Hong Kong dollar'], ['cent']],
        'HRK' => [['Croatian kuna'], ['lipa']],
        'HUF' => [['forint'], ['filler']],
        'ILS' => [['new sheqel', 'new sheqels'], ['agora', 'agorot']],
        'ISK' => [['Icelandic króna'], ['aurar']],
        'JPY' => [['yen'], ['sen']],
        'LTL' => [['litas'], ['cent']],
        'LVL' => [['lat'], ['sentim']],
        'LYD' => [['dinar'], ['cent']],
        'MAD' => [['dirham'], ['cent']],
        'MKD' => [['Macedonian dinar'], ['deni']],
        'MRO' => [['ouguiya'], ['khoums']],
        'MTL' => [['Maltese lira'], ['centym']],
        'NGN' => [['Naira'], ['kobo']],
        'NOK' => [['Norwegian krone'], ['oere']],
        'PHP' => [['peso'], ['centavo']],
        'PLN' => [['zloty', 'zlotys'], ['grosz']],
        'ROL' => [['Romanian leu'], ['bani']],
        'RUB' => [['Russian Federation rouble'], ['kopiejka']],
        'SEK' => [['Swedish krona'], ['oere']],
        'SIT' => [['Tolar'], ['stotinia']],
        'SKK' => [['Slovak koruna'], []],
        'TMT' => [['manat'], ['tenge']],
        'TND' => [['dinar'], ['cent']],
        'TRL' => [['lira'], ['kuruş']],
        'UAH' => [['hryvna'], ['cent']],
        'USD' => [['dollar'], ['cent']],
        'XAF' => [['CFA franc'], ['cent']],
        'XOF' => [['CFA franc'], ['cent']],
        'XPF' => [['CFP franc'], ['centime']],
        'YUM' => [['dinar'], ['para']],
        'ZAR' => [['rand'], ['cent']],
    ];

    /**
     * @param  $num
     *
     * @return string
     */
    protected function toWords($num)
    {
        $word = "";
        $num = preg_replace('/[\W]/', '', $num);
        $formatted = number_format((int) $num, 2);

        $leftNumber = explode(".", $formatted);
        $split = explode(",", $leftNumber[0]);

        foreach ($split as $key => $number) {
            if (!$number) {
                continue;
            }
            $suffix = $this->_suffix($number); //2
            $prefix = $this->_prefix(count($split) - 1); //million
            $combined = trim($prefix . ' ' . $suffix);

            $word .= ((count($split) == 1 && !empty($word)
                    ? " " . self::$conjunction . " "
                    : !empty($word)) ? ", " : "") . $combined;
            unset($split[$key]);
        }

        return preg_replace(['/\s{2,}/', '/[\t\n]/'], ' ', $word);
    }

    private function _prefix($num)
    {
        switch ($num) {
            case 0:
                return '';
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
                return self::$mega[$num];
            default:
                return self::$mega[7];
        }
    }

    private function _suffix($num)
    {
        $word = "";
        $num = (int) $num;
        if (strlen($num) == 3) {
            $hundred = $num - ($num % 100);
            $word .= self::$hundred[$hundred];

            $num = (int) substr($num, 1);
        }
        if (strlen($num) == 2 && $num > 19) {
            $ten = $num - ($num % 10);
            $word .= ($word && !empty(self::$tens[$ten])
                    ? " " . self::$conjunction . " " : '') . self::$tens[$ten];

            $num = (int) substr($num, 1);
        }

        if (strlen($num) == 2 && $num <= 19) {
            $word .= ($word && !empty(self::$teens[$num])
                    ? " " . self::$conjunction . " " : '') . self::$teens[$num];

            $num = str_replace($num, "", $num);
        }

        if (strlen($num) == 1) {
            $word .= ($word && !empty(self::$unit[$num])
                    ? " " . self::$conjunction . " " : '') . self::$unit[$num];
        }

        return $word;
    }

    /**
     * @param string $currency
     * @param int $decimal
     * @param int $fraction
     *
     * @return string
     * @throws NumberToWordsException
     */
    public function toCurrencyWords($currency, $decimal, $fraction = null)
    {
        $currency = strtoupper($currency);

        if (!array_key_exists($currency, static::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf(
                    'Currency "%s" is not available for "%s" language',
                    $currency,
                    get_class($this)
                )
            );
        }

        $actual = $this->toWords($decimal);

        $word = $actual . " " . self::$currencyNames[$currency][0][0];

        if ($fraction) {
            $decimal = $this->toWords($fraction);
            $word .= " " . self::$separator . " ";
            $word .= self::$currencyNames[$currency][1][0] . " " . $decimal;
        }

        return $word;
    }

}
