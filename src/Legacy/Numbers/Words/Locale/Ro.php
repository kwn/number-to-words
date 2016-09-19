<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Ro extends Words
{
    const LOCALE = 'ro';
    const LANGUAGE_NAME = 'Romanian';
    const LANGUAGE_NAME_NATIVE = 'Română';
    const MINUS = 'minus';


    private $thresholdFew = 1;
    private $thresholdMany = 19;

    private static $numbers = [
        'zero', // 0
        [ // 1
            [ // masculine
                'un', // article
                'unu', // noun
            ],
            [ // feminine
                'o', // article
                'una', // noun
            ],
            'un', // neutral
            'unu', // abstract (stand-alone cardinal)
        ],
        [ //  2
            'doi', // masculine and abstract
            'două', // feminine and neutral
        ],
        'trei', //  3
        'patru', //  4
        'cinci', //  5
        'șase', //  6
        'șapte', //  7
        'opt', //  8
        'nouă', //  9
        'zece', // 10
        'unsprezece', // 11
        [ // 12
            'doisprezece', // masculine and abstract
            'douăsprezece', // feminine and abstract
        ],
        'treisprezece', // 13
        'paisprezece', // 14
        'cincisprezece', // 15
        'șaisprezece', // 16
        'șaptesprezece', // 17
        'optsprezece', // 18
        'nouăsprezece', // 19
        'douăzeci', // 20
        30 => 'treizeci', // 30
        40 => 'patruzeci', // 40
        50 => 'cincizeci', // 50
        60 => 'șaizeci', // 60
        70 => 'șaptezeci', // 70
        80 => 'optzeci', // 80
        90 => 'nouăzeci', // 90
    ];

    private $infinity = 'infinit';

    private $and = 'și';

    private $wordSeparator = ' ';

    private static $currencyNames = [
        'AUD' => [
            ['dolar australian', 'dolari australieni', Words::GENDER_MASCULINE],
            ['cent', 'cenți', Words::GENDER_MASCULINE],
        ],
        'CAD' => [
            ['dolar canadian', 'dolari canadieni', Words::GENDER_MASCULINE],
            ['cent', 'cenți', Words::GENDER_MASCULINE],
        ],
        'CHF' => [
            ['franc elvețian', 'franci elvețieni', Words::GENDER_MASCULINE],
            ['cent', 'cenți', Words::GENDER_MASCULINE],
        ],
        'CZK' => [
            ['coroană cehă', 'coroane cehe', Words::GENDER_FEMININE],
            ['haler', 'haleri', Words::GENDER_MASCULINE],
        ],
        'EUR' => [
            ['euro', 'euro', Words::GENDER_MASCULINE],
            ['cent', 'cenți', Words::GENDER_MASCULINE],
        ],
        'GBP' => [
            ['liră sterlină', 'lire sterline', Words::GENDER_FEMININE],
            ['penny', 'penny', Words::GENDER_MASCULINE],
        ],
        'HUF' => [
            ['forint', 'forinți', Words::GENDER_MASCULINE],
            ['filer', 'fileri', Words::GENDER_MASCULINE],
        ],
        'JPY' => [
            ['yen', 'yeni', Words::GENDER_MASCULINE],
            ['sen', 'seni', Words::GENDER_MASCULINE],
        ],
        'PLN' => [
            ['zlot', 'zloți', Words::GENDER_MASCULINE],
            ['gros', 'grosi', Words::GENDER_MASCULINE],
        ],
        'ROL' => [
            ['leu', 'lei', Words::GENDER_MASCULINE],
            ['ban', 'bani', Words::GENDER_MASCULINE],
        ],
        'RON' => [
            ['leu', 'lei', Words::GENDER_MASCULINE],
            ['ban', 'bani', Words::GENDER_MASCULINE],
        ],
        'RUB' => [
            ['rublă', 'ruble', Words::GENDER_FEMININE],
            ['copeică', 'copeici', Words::GENDER_FEMININE],
        ],
        'SKK' => [
            ['coroană slovacă', 'coroane slovace', Words::GENDER_FEMININE],
            ['haler', 'haleri', Words::GENDER_MASCULINE],
        ],
        'TRL' => [
            ['liră turcească', 'lire turcești', Words::GENDER_FEMININE],
            ['kuruș', 'kuruși', Words::GENDER_MASCULINE],
        ],
        'USD' => [
            ['dolar american', 'dolari americani', Words::GENDER_MASCULINE],
            ['cent', 'cenți', Words::GENDER_MASCULINE],
        ],
    ];

    private $manyPart = 'de';

    private $minus = 'minus'; // minus sign

    private static $exponent = [
        0 => '',
        2 => ['sută', 'sute', Words::GENDER_FEMININE],
        3 => ['mie', 'mii', Words::GENDER_FEMININE],
        6   => ['milion', 'milioane', Words::GENDER_NEUTER],
        9   => ['miliard', 'miliarde', Words::GENDER_NEUTER],
        12  => ['trilion', 'trilioane', Words::GENDER_NEUTER],
        15  => ['cvadrilion', 'cvadrilioane', Words::GENDER_NEUTER],
        18  => ['cvintilion', 'cvintilioane', Words::GENDER_NEUTER],
        21  => ['sextilion', 'sextilioane', Words::GENDER_NEUTER],
        24  => ['septilion', 'septilioane', Words::GENDER_NEUTER],
        27  => ['octilion', 'octilioane', Words::GENDER_NEUTER],
        30  => ['nonilion', 'nonilioane', Words::GENDER_NEUTER],
        33  => ['decilion', 'decilioane', Words::GENDER_NEUTER],
        36  => ['undecilion', 'undecilioane', Words::GENDER_NEUTER],
        39  => ['dodecilion', 'dodecilioane', Words::GENDER_NEUTER],
        42  => ['tredecilion', 'tredecilioane', Words::GENDER_NEUTER],
        45  => ['cvadrodecilion', 'cvadrodecilioane', Words::GENDER_NEUTER],
        48  => ['cvindecilion', 'cvindecilioane', Words::GENDER_NEUTER],
        51  => ['sexdecilion', 'sexdecilioane', Words::GENDER_NEUTER],
        54  => ['septdecilion', 'septdecilioane', Words::GENDER_NEUTER],
        57  => ['octodecilion', 'octodecilioane', Words::GENDER_NEUTER],
        60  => ['novemdecilion', 'novemdecilioane', Words::GENDER_NEUTER],
        63  => ['vigintilion', 'vigintilioane', Words::GENDER_NEUTER],
        66  => ['unvigintilion', 'unvigintilioane', Words::GENDER_NEUTER],
        69  => ['dovigintilion', 'dovigintilioane', Words::GENDER_NEUTER],
        72  => ['trevigintilion', 'trevigintilioane', Words::GENDER_NEUTER],
        75  => ['cvadrovigintilion', 'cvadrovigintilioane', Words::GENDER_NEUTER],
        78  => ['cvinvigintilion', 'cvinvigintilioane', Words::GENDER_NEUTER],
        81  => ['sexvigintilion', 'sexvigintilioane', Words::GENDER_NEUTER],
        84  => ['septvigintilion', 'septvigintilioane', Words::GENDER_NEUTER],
        87  => ['octvigintilion', 'octvigintilioane', Words::GENDER_NEUTER],
        90  => ['novemvigintilion', 'novemvigintilioane', Words::GENDER_NEUTER],
        93  => ['trigintilion', 'trigintilioane', Words::GENDER_NEUTER],
        96  => ['untrigintilion', 'untrigintilioane', Words::GENDER_NEUTER],
        99  => ['dotrigintilion', 'dotrigintilioane', Words::GENDER_NEUTER],
        102 => ['trestrigintilion', 'trestrigintilioane', Words::GENDER_NEUTER],
        105 => ['cvadrotrigintilion', 'cvadrotrigintilioane', Words::GENDER_NEUTER],
        108 => ['cvintrigintilion', 'cvintrigintilioane', Words::GENDER_NEUTER],
        111 => ['sextrigintilion', 'sextrigintilioane', Words::GENDER_NEUTER],
        114 => ['septentrigintilion', 'septentrigintilioane', Words::GENDER_NEUTER],
        117 => ['octotrigintilion', 'octotrigintilioane', Words::GENDER_NEUTER],
        120 => ['novemtrigintilion', 'novemtrigintilioane', Words::GENDER_NEUTER],
        123 => ['cvadragintilion', 'cvadragintilioane', Words::GENDER_NEUTER],
        126 => ['uncvadragintilion', 'uncvadragintilioane', Words::GENDER_NEUTER],
        129 => ['docvadragintilion', 'docvadragintilioane', Words::GENDER_NEUTER],
        132 => ['trecvadragintilion', 'trecvadragintilioane', Words::GENDER_NEUTER],
        135 => ['cvadrocvadragintilion', 'cvadrocvadragintilioane', Words::GENDER_NEUTER],
        138 => ['cvincvadragintilion', 'cvincvadragintilioane', Words::GENDER_NEUTER],
        141 => ['sexcvadragintilion', 'sexcvadragintilioane', Words::GENDER_NEUTER],
        144 => ['septencvadragintilion', 'septencvadragintilioane', Words::GENDER_NEUTER],
        147 => ['octocvadragintilion', 'octocvadragintilioane', Words::GENDER_NEUTER],
        150 => ['novemcvadragintilion', 'novemcvadragintilioane', Words::GENDER_NEUTER],
        153 => ['cvincvagintilion', 'cvincvagintilioane', Words::GENDER_NEUTER],
        156 => ['uncvincvagintilion', 'uncvincvagilioane', Words::GENDER_NEUTER],
        159 => ['docvincvagintilion', 'docvincvagintilioane', Words::GENDER_NEUTER],
        162 => ['trecvincvagintilion', 'trecvincvagintilioane', Words::GENDER_NEUTER],
        165 => ['cvadrocvincvagintilion', 'cvadrocvincvagintilioane', Words::GENDER_NEUTER],
        168 => ['cvincvincvagintilion', 'cvincvincvagintilioane', Words::GENDER_NEUTER],
        171 => ['sexcvincvagintilion', 'sexcvincvagintilioane', Words::GENDER_NEUTER],
        174 => ['septencvincvagintilion', 'septencvincvagintilioane', Words::GENDER_NEUTER],
        177 => ['octocvincvagintilion', 'octocvincvagintilioane', Words::GENDER_NEUTER],
        180 => ['novemcvincvagintilion', 'novemcvincvagintilioane', Words::GENDER_NEUTER],
        183 => ['sexagintilion', 'sexagintilioane', Words::GENDER_NEUTER],
        186 => ['unsexagintilion', 'unsexagintilioane', Words::GENDER_NEUTER],
        189 => ['dosexagintilion', 'dosexagintilioane', Words::GENDER_NEUTER],
        192 => ['tresexagintilion', 'tresexagintilioane', Words::GENDER_NEUTER],
        195 => ['cvadrosexagintilion', 'cvadrosexagintilioane', Words::GENDER_NEUTER],
        198 => ['cvinsexagintilion', 'cvinsexagintilioane', Words::GENDER_NEUTER],
        201 => ['sexsexagintilion', 'sexsexagintilioane', Words::GENDER_NEUTER],
        204 => ['septensexagintilion', 'septensexagintilioane', Words::GENDER_NEUTER],
        207 => ['octosexagintilion', 'octosexagintilioane', Words::GENDER_NEUTER],
        210 => ['novemsexagintilion', 'novemsexagintilioane', Words::GENDER_NEUTER],
        213 => ['septuagintilion', 'septuagintilioane', Words::GENDER_NEUTER],
        216 => ['unseptuagintilion', 'unseptuagintilioane', Words::GENDER_NEUTER],
        219 => ['doseptuagintilion', 'doseptuagintilioane', Words::GENDER_NEUTER],
        222 => ['treseptuagintilion', 'treseptuagintilioane', Words::GENDER_NEUTER],
        225 => ['cvadroseptuagintilion', 'cvadroseptuagintilioane', Words::GENDER_NEUTER],
        228 => ['cvinseptuagintilion', 'cvinseptuagintilioane', Words::GENDER_NEUTER],
        231 => ['sexseptuagintilion', 'sexseptuagintilioane', Words::GENDER_NEUTER],
        234 => ['septenseptuagintilion', 'septenseptuagintilioane', Words::GENDER_NEUTER],
        237 => ['octoseptuagintilion', 'octoseptuagintilioane', Words::GENDER_NEUTER],
        240 => ['novemseptuagintilion', 'novemseptuagintilioane', Words::GENDER_NEUTER],
        243 => ['octogintilion', 'octogintilioane', Words::GENDER_NEUTER],
        246 => ['unoctogintilion', 'unoctogintilioane', Words::GENDER_NEUTER],
        249 => ['dooctogintilion', 'dooctogintilioane', Words::GENDER_NEUTER],
        252 => ['treoctogintilion', 'treoctogintilioane', Words::GENDER_NEUTER],
        255 => ['cvadrooctogintilion', 'cvadrooctogintilioane', Words::GENDER_NEUTER],
        258 => ['cvinoctogintilion', 'cvinoctogintilioane', Words::GENDER_NEUTER],
        261 => ['sexoctogintilion', 'sexoctogintilioane', Words::GENDER_NEUTER],
        264 => ['septoctogintilion', 'septoctogintilioane', Words::GENDER_NEUTER],
        267 => ['octooctogintilion', 'octooctogintilioane', Words::GENDER_NEUTER],
        270 => ['novemoctogintilion', 'novemoctogintilioane', Words::GENDER_NEUTER],
        273 => ['nonagintilion', 'nonagintilioane', Words::GENDER_NEUTER],
        276 => ['unnonagintilion', 'unnonagintilioane', Words::GENDER_NEUTER],
        279 => ['dononagintilion', 'dononagintilioane', Words::GENDER_NEUTER],
        282 => ['trenonagintilion', 'trenonagintilioane', Words::GENDER_NEUTER],
        285 => ['cvadrononagintilion', 'cvadrononagintilioane', Words::GENDER_NEUTER],
        288 => ['cvinnonagintilion', 'cvinnonagintilioane', Words::GENDER_NEUTER],
        291 => ['sexnonagintilion', 'sexnonagintilioane', Words::GENDER_NEUTER],
        294 => ['septennonagintilion', 'septennonagintilioane', Words::GENDER_NEUTER],
        297 => ['octononagintilion', 'octononagintilioane', Words::GENDER_NEUTER],
        300 => ['novemnonagintilion', 'novemnonagintilioane', Words::GENDER_NEUTER],
        303 => ['centilion', 'centilioane', Words::GENDER_NEUTER],
    ];

    /**
     * @param string|int $number
     *
     * @return array
     */
    private function splitNumber($number)
    {
        if (is_string($number)) {
            $ret = [];
            $strlen = strlen($number);
            $first = substr($number, 0, $strlen % 3);

            preg_match_all('/\d{3}/', substr($number, $strlen % 3, $strlen), $m);
            $ret =& $m[0];

            if ($first) {
                array_unshift($ret, $first);
            }

            return $ret;
        }

        return explode(' ', number_format($number, 0, '', ' '));
    }

    /**
     * @param mixed $numberAtom
     * @param array $noun
     * @param bool  $asNoun
     *
     * @return string
     */
    private function getNumberInflectionForGender($numberAtom, $noun, $asNoun = false)
    {
        if (!is_array($numberAtom)) {
            $num_names = [
                $numberAtom,
                $numberAtom,
                $numberAtom,
                $numberAtom,
            ];
        } elseif (count($numberAtom) === 2) {
            $num_names = [
                $numberAtom[0],
                $numberAtom[1],
                $numberAtom[1],
                $numberAtom[0],
            ];
        } else {
            $num_names = $numberAtom;
        }

        $num_name = $num_names[$noun[2]];
        if (!is_array($num_name)) {
            return $num_name;
        }

        return $num_name[(int) $asNoun];
    }

    /**
     * @param string $pluralRule
     * @param array  $noun
     *
     * @return string
     */
    private function getNounDeclensionForNumber($pluralRule, $noun)
    {
        if ($noun[2] == Words::GENDER_ABSTRACT) {
            // Nothing for abstract count
            return "";
        }

        if ($pluralRule == 'o') {
            // One
            return $noun[0];
        }

        if ($pluralRule == 'f') {
            // Few
            return $noun[1];
        }

        // Many
        return $this->manyPart . $this->wordSeparator . $noun[1];
    }

    /**
     * @param int $number
     *
     * @return string
     */
    private function getPluralRule($number)
    {
        if ($number == $this->thresholdFew) {
            // One
            return 'o';
        }

        if ($number == 0) {
            // Zero, which behaves like few
            return 'f';
        }

        $uz = $number % 100;

        if ($uz == 0) {
            // Hundreds behave like many
            return 'm';
        }

        if ($uz > $this->thresholdMany) {
            // Many
            return 'm';
        }

        // Below the many threshold, so few
        return 'f';
    }

    /**
     * @param int   $number
     * @param array $noun
     * @param bool  $forceNoun
     * @param bool  $forcePlural
     *
     * @return string
     */
    private function showDigitsGroup($number, $noun, $forceNoun = false, $forcePlural = false)
    {
        $ret = '';

        // extract the value of each digit from the three-digit number
        $u = $number % 10;                  // ones
        $uz = $number % 100;                // ones+tens
        $z = ($number - $u) % 100 / 10;         // tens
        $s = ($number - $z * 10 - $u) % 1000 / 100; // hundreds

        if ($s) {
            $ret .= $this->showDigitsGroup($s, self::$exponent[2]);
            if ($uz) {
                $ret .= $this->wordSeparator;
            }
        }
        if ($uz) {
            if (isset(self::$numbers[$uz])) {
                $ret .= $this->getNumberInflectionForGender(self::$numbers[$uz], $noun, !$forceNoun);
            } else {
                if ($z) {
                    $ret .= self::$numbers[$z * 10]; // no accord needed for tens
                    if ($u) {
                        $ret .= $this->wordSeparator . $this->and . $this->wordSeparator;
                    }
                }
                if ($u) {
                    $ret .= $this->getNumberInflectionForGender(self::$numbers[$u], $noun, !$forceNoun);
                }
            }
        }

        if ($noun[2] == Words::GENDER_ABSTRACT) {
            return $ret;
        }

        $pluralRule = $this->getPluralRule($number);
        if ($pluralRule == 'o' && $forcePlural) {
            $pluralRule = 'f';
        }

        return $ret . $this->wordSeparator . $this->getNounDeclensionForNumber($pluralRule, $noun);
    }

    /**
     * @param int   $num
     * @param array $noun
     *
     * @return string
     */
    protected function toWords($num = 0, $noun = [])
    {
        if (empty($noun)) {
            $noun = [null, null, Words::GENDER_ABSTRACT];
        }

        $ret = '';

        // check if $num is a valid non-zero number
        if (!$num || preg_match('/^-?0+$/', $num) || !preg_match('/^-?\d+$/', $num)) {
            $ret = self::$numbers[0];
            if ($noun[2] != Words::GENDER_ABSTRACT) {
                $ret .= $this->wordSeparator . $this->getNounDeclensionForNumber('f', $noun);
            }

            return $ret;
        }

        // add a minus sign
        if (substr($num, 0, 1) == '-') {
            $ret = $this->minus . $this->wordSeparator;
            $num = substr($num, 1);
        }

        // One is a special case
        if (abs($num) == 1) {
            $ret = $this->getNumberInflectionForGender(self::$numbers[1], $noun);
            if ($noun[2] != Words::GENDER_ABSTRACT) {
                $ret .= $this->wordSeparator . $this->getNounDeclensionForNumber('o', $noun);
            }

            return $ret;
        }

        // if the absolute value is greater than 9.99*10^302, return infinity
        if (strlen($num) > 306) {
            return $ret . $this->infinity;
        }

        // strip excessive zero signs
        $num = ltrim($num, '0');

        // split $num to groups of three-digit numbers
        $num_groups = $this->splitNumber($num);

        $sizeof_numgroups = count($num_groups);
        $showed_noun = false;

        foreach ($num_groups as $i => $number) {
            // what is the corresponding exponent for the current group
            $pow = $sizeof_numgroups - $i;

            $valid_groups = [];

            // skip processment for empty groups
            if ($number == '000') {
                continue;
            }

            if ($i) {
                $ret .= $this->wordSeparator;
            }

            if ($pow - 1) {
                $ret .= $this->showDigitsGroup($number, self::$exponent[($pow - 1) * 3]);
            } else {
                $showed_noun = true;
                $ret .= $this->showDigitsGroup($number, $noun, false, $num != 1);
            }
        }
        if (!$showed_noun) {
            $ret .= $this->wordSeparator . $this->getNounDeclensionForNumber('m', $noun); // ALWAYS many
        }

        return rtrim($ret, $this->wordSeparator);
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

        if (!isset(self::$currencyNames[$currency])) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNouns = self::$currencyNames[$currency];
        $return = $this->toWords($decimal, $currencyNouns[0]);

        if ($fraction !== null) {
            $return .= $this->wordSeparator . $this->and;

            if ($convertFraction) {
                $return .= $this->wordSeparator . $this->toWords($fraction, $currencyNouns[1]);
            } else {
                $return .= $fraction . $this->wordSeparator;
                $plural_rule = $this->getPluralRule($fraction);
                $this->getNounDeclensionForNumber($currencyNouns[1]);
            }
        }

        return $return;
    }
}
