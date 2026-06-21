<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Fr extends Words
{
    const LOCALE = 'fr';
    const LANGUAGE_NAME = 'French';
    const LANGUAGE_NAME_NATIVE = 'Français';

    private static $miscNumbers = [
        10 => 'dix',
        11 => 'onze',
        12 => 'douze',
        13 => 'treize',
        14 => 'quatorze',
        15 => 'quinze',
        16 => 'seize',
        20 => 'vingt',
        30 => 'trente',
        40 => 'quarante',
        50 => 'cinquante',
        60 => 'soixante',
        100 => 'cent'
    ];

    private static $digits = [
        1 => 'un',
        2 => 'deux',
        3 => 'trois',
        4 => 'quatre',
        5 => 'cinq',
        6 => 'six',
        7 => 'sept',
        8 => 'huit',
        9 => 'neuf'
    ];

    private $zero = 'zéro';

    private $and = 'et';

    private $wordSeparator = ' ';

    private $subunitSeparator = 'et';

    private $dash = '-';

    private $minus = 'moins';

    private $pluralSuffix = 's';

    private static $exponent = [
        0 => '',
        3 => 'mille',
        6 => 'million',
        9 => 'milliard',
        12 => 'billion', // was 'trillion',
        15 => 'quadrillion',
        18 => 'quintillion',
        21 => 'sextillion',
        24 => 'septillion',
        27 => 'octillion',
        30 => 'nonillion',
        33 => 'decillion',
        36 => 'undecillion',
        39 => 'duodecillion',
        42 => 'tredecillion',
        45 => 'quattuordecillion',
        48 => 'quindecillion',
        51 => 'sexdecillion',
        54 => 'septendecillion',
        57 => 'octodecillion',
        60 => 'novemdecillion',
        63 => 'vigintillion',
        66 => 'unvigintillion',
        69 => 'duovigintillion',
        72 => 'trevigintillion',
        75 => 'quattuorvigintillion',
        78 => 'quinvigintillion',
        81 => 'sexvigintillion',
        84 => 'septenvigintillion',
        87 => 'octovigintillion',
        90 => 'novemvigintillion',
        93 => 'trigintillion',
        96 => 'untrigintillion',
        99 => 'duotrigintillion',
    ];

    private static $currencyNames = [
        'AED' => [['dirham des Émirats', 'dirhams des Émirats'], ['fils', 'fils']],
        'ALL' => [['lek albanais', 'leks albanais'], ['qindarka', 'qindarkas']],
        'AUD' => [['dollar australien', 'dollars australiens'], ['cent']],
        'BAM' => [['mark convertible', 'marks convertibles'], ['fening', 'fenings']],
        'BGN' => [['lev bulgare', 'levs bulgares'], ['stotinka', 'stotinkas']],
        'BRL' => [['réal brésilien', 'réals brésiliens'], ['centavo', 'centavos']],
        'BYR' => [['rouble biélorusse', 'roubles biélorusses'], ['kopek', 'kopeks']],
        'CAD' => [['dollar canadien', 'dollars canadiens'], ['cent']],
        'CHF' => [['franc suisse', 'francs suisses'], ['centime']],
        'CNY' => [['yuan'], ['fen']],
        'CYP' => [['livre chypriote', 'livres chypriotes'], ['cent', 'cents']],
        'CZK' => [['couronne tchèque', 'couronnes tchèques'], ['haler', 'halers']],
        'DKK' => [['couronne danoise', 'couronnes danoises'], ['øre', 'øre']],
        'DZD' => [['dinar'], ['centime']],
        'EEK' => [['couronne estonienne', 'couronnes estoniennes'], ['sent', 'sents']],
        'EGP' => [['livre égyptienne', 'livres égyptiennes'], ['piastre', 'piastres']],
        'EUR' => [['euro'], ['centime']],
        'GBP' => [['pound', 'pounds'], ['penny', 'pence']],
        'HKD' => [['dollar de Hong Kong', 'dollars de Hong Kong'], ['cent', 'cents']],
        'HRK' => [['kuna croate', 'kunas croates'], ['lipa', 'lipas']],
        'HUF' => [['forint hongrois', 'forints hongrois'], ['fillér', 'fillérs']],
        'IDR' => [['roupie indonésienne', 'roupies indonésiennes'], ['sen', 'sens']],
        'ILS' => [['shekel israélien', 'shekels israéliens'], ['agora', 'agoras']],
        'ISK' => [['couronne islandaise', 'couronnes islandaises'], ['eyrir', 'eyrir']],
        'JPY' => [['yen'], ['sen']],
        'LTL' => [['litas lituanien', 'litas lituaniens'], ['centas', 'centai']],
        'LVL' => [['lats letton', 'lats lettons'], ['santim', 'santims']],
        'LYD' => [['dinar'], ['centime']],
        'MAD' => [['dirham'], ['centime']],
        'MKD' => [['denar macédonien', 'denars macédoniens'], ['deni', 'denis']],
        'MRO' => [['ouguiya'], ['khoums']],
        'MTL' => [['lire maltaise', 'lires maltaises'], ['cent', 'cents']],
        'MXN' => [['peso mexicain', 'pesos mexicains'], ['centavo']],
        'MYR' => [['ringgit malaisien', 'ringgits malaisiens'], ['sen', 'sens']],
        'NGN' => [['naira nigérian', 'nairas nigérians'], ['kobo', 'kobos']],
        'NOK' => [['couronne norvégienne', 'couronnes norvégiennes'], ['øre', 'øre']],
        'PHP' => [['peso philippin', 'pesos philippins'], ['sentavo', 'sentavos']],
        'PLN' => [['zloty polonais', 'zlotys polonais'], ['grosz', 'groszs']],
        'RON' => [['leu roumain', 'lei roumains'], ['ban', 'bans']],
        'RUB' => [['rouble russe', 'roubles russes'], ['kopek', 'kopeks']],
        'SAR' => [['riyal saoudien', 'riyals saoudiens'], ['halala', 'halalas']],
        'SEK' => [['couronne suédoise', 'couronnes suédoises'], ['öre', 'öre']],
        'SIT' => [['tolar slovène', 'tolars slovènes'], ['stotin', 'stotins']],
        'SKK' => [['couronne slovaque', 'couronnes slovaques'], ['haler', 'halers']],
        'TMT' => [['manat turkmène', 'manats turkmènes'], ['tenge', 'tenges']],
        'TND' => [['dinar'], ['millime']],
        'TRL' => [['livre turque', 'livres turques'], ['kuruş', 'kuruş']],
        'TRY' => [['livre turque', 'livres turques'], ['kuruş', 'kuruş']],
        'UAH' => [['hryvnia ukrainienne', 'hryvnias ukrainiennes'], ['kopek', 'kopeks']],
        'USD' => [['dollar américain', 'dollars américains'], ['cent']],
        'UZS' => [['sum ouzbek', 'sums ouzbeks'], ['tiyin', 'tiyins']],
        'XAF' => [['franc CFA', 'francs CFA'], ['centime']],
        'XOF' => [['franc CFA', 'francs CFA'], ['centime']],
        'XPF' => [['franc CFP', 'francs CFP'], ['centime']],
        'YUM' => [['dinar yougoslave', 'dinars yougoslaves'], ['para', 'paras']],
        'ZAR' => [['rand sud-africain', 'rands sud-africains'], ['cent', 'cents']],
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
     * @param int $num
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
                    $return .= $this->pluralSuffix;
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
                        $return .= $this->pluralSuffix;
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
            $return .= sprintf(
                '%1$s%2$s%1$s%3$s%1$s',
                $this->wordSeparator,
                $this->subunitSeparator,
                trim($this->toWords($fraction))
            );

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
