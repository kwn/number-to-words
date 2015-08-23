<?php

namespace Kwn\NumberToWords\Language\Romanian\Dictionary;

use Kwn\NumberToWords\Grammar\Gender;

class Number
{
    /**
     * The suffixes for exponents (singular)
     *
     * @var array
     */
    private static $exponents = [
        0 => '',
        2 => ['sută', 'sute', Gender::FEMALE],
        3 => ['mie', 'mii', Gender::FEMALE],
        6 => ['milion', 'milioane', Gender::NEUTER],
        9 => ['miliard', 'miliarde', Gender::NEUTER],
        12 => ['trilion', 'trilioane', Gender::NEUTER],
        15 => ['cvadrilion', 'cvadrilioane', Gender::NEUTER],
        18 => ['cvintilion', 'cvintilioane', Gender::NEUTER],
        21 => ['sextilion', 'sextilioane', Gender::NEUTER],
        24 => ['septilion', 'septilioane', Gender::NEUTER],
        27 => ['octilion', 'octilioane', Gender::NEUTER],
        30 => ['nonilion', 'nonilioane', Gender::NEUTER],
        33 => ['decilion', 'decilioane', Gender::NEUTER],
        36 => ['undecilion', 'undecilioane', Gender::NEUTER],
        39 => ['dodecilion', 'dodecilioane', Gender::NEUTER],
        42 => ['tredecilion', 'tredecilioane', Gender::NEUTER],
        45 => ['cvadrodecilion', 'cvadrodecilioane', Gender::NEUTER],
        48 => ['cvindecilion', 'cvindecilioane', Gender::NEUTER],
        51 => ['sexdecilion', 'sexdecilioane', Gender::NEUTER],
        54 => ['septdecilion', 'septdecilioane', Gender::NEUTER],
        57 => ['octodecilion', 'octodecilioane', Gender::NEUTER],
        60 => ['novemdecilion', 'novemdecilioane', Gender::NEUTER],
        63 => ['vigintilion', 'vigintilioane', Gender::NEUTER],
        66 => ['unvigintilion', 'unvigintilioane', Gender::NEUTER],
        69 => ['dovigintilion', 'dovigintilioane', Gender::NEUTER],
        72 => ['trevigintilion', 'trevigintilioane', Gender::NEUTER],
        75 => ['cvadrovigintilion', 'cvadrovigintilioane', Gender::NEUTER],
        78 => ['cvinvigintilion', 'cvinvigintilioane', Gender::NEUTER],
        81 => ['sexvigintilion', 'sexvigintilioane', Gender::NEUTER],
        84 => ['septvigintilion', 'septvigintilioane', Gender::NEUTER],
        87 => ['octvigintilion', 'octvigintilioane', Gender::NEUTER],
        90 => ['novemvigintilion', 'novemvigintilioane', Gender::NEUTER],
        93 => ['trigintilion', 'trigintilioane', Gender::NEUTER],
        96 => ['untrigintilion', 'untrigintilioane', Gender::NEUTER],
        99 => ['dotrigintilion', 'dotrigintilioane', Gender::NEUTER],
        102 => ['trestrigintilion', 'trestrigintilioane', Gender::NEUTER],
        105 => ['cvadrotrigintilion', 'cvadrotrigintilioane', Gender::NEUTER],
        108 => ['cvintrigintilion', 'cvintrigintilioane', Gender::NEUTER],
        111 => ['sextrigintilion', 'sextrigintilioane', Gender::NEUTER],
        114 => ['septentrigintilion', 'septentrigintilioane', Gender::NEUTER],
        117 => ['octotrigintilion', 'octotrigintilioane', Gender::NEUTER],
        120 => ['novemtrigintilion', 'novemtrigintilioane', Gender::NEUTER],
        123 => ['cvadragintilion', 'cvadragintilioane', Gender::NEUTER],
        126 => ['uncvadragintilion', 'uncvadragintilioane', Gender::NEUTER],
        129 => ['docvadragintilion', 'docvadragintilioane', Gender::NEUTER],
        132 => ['trecvadragintilion', 'trecvadragintilioane', Gender::NEUTER],
        135 => ['cvadrocvadragintilion', 'cvadrocvadragintilioane', Gender::NEUTER],
        138 => ['cvincvadragintilion', 'cvincvadragintilioane', Gender::NEUTER],
        141 => ['sexcvadragintilion', 'sexcvadragintilioane', Gender::NEUTER],
        144 => ['septencvadragintilion', 'septencvadragintilioane', Gender::NEUTER],
        147 => ['octocvadragintilion', 'octocvadragintilioane', Gender::NEUTER],
        150 => ['novemcvadragintilion', 'novemcvadragintilioane', Gender::NEUTER],
        153 => ['cvincvagintilion', 'cvincvagintilioane', Gender::NEUTER],
        156 => ['uncvincvagintilion', 'uncvincvagilioane', Gender::NEUTER],
        159 => ['docvincvagintilion', 'docvincvagintilioane', Gender::NEUTER],
        162 => ['trecvincvagintilion', 'trecvincvagintilioane', Gender::NEUTER],
        165 => ['cvadrocvincvagintilion', 'cvadrocvincvagintilioane', Gender::NEUTER],
        168 => ['cvincvincvagintilion', 'cvincvincvagintilioane', Gender::NEUTER],
        171 => ['sexcvincvagintilion', 'sexcvincvagintilioane', Gender::NEUTER],
        174 => ['septencvincvagintilion', 'septencvincvagintilioane', Gender::NEUTER],
        177 => ['octocvincvagintilion', 'octocvincvagintilioane', Gender::NEUTER],
        180 => ['novemcvincvagintilion', 'novemcvincvagintilioane', Gender::NEUTER],
        183 => ['sexagintilion', 'sexagintilioane', Gender::NEUTER],
        186 => ['unsexagintilion', 'unsexagintilioane', Gender::NEUTER],
        189 => ['dosexagintilion', 'dosexagintilioane', Gender::NEUTER],
        192 => ['tresexagintilion', 'tresexagintilioane', Gender::NEUTER],
        195 => ['cvadrosexagintilion', 'cvadrosexagintilioane', Gender::NEUTER],
        198 => ['cvinsexagintilion', 'cvinsexagintilioane', Gender::NEUTER],
        201 => ['sexsexagintilion', 'sexsexagintilioane', Gender::NEUTER],
        204 => ['septensexagintilion', 'septensexagintilioane', Gender::NEUTER],
        207 => ['octosexagintilion', 'octosexagintilioane', Gender::NEUTER],
        210 => ['novemsexagintilion', 'novemsexagintilioane', Gender::NEUTER],
        213 => ['septuagintilion', 'septuagintilioane', Gender::NEUTER],
        216 => ['unseptuagintilion', 'unseptuagintilioane', Gender::NEUTER],
        219 => ['doseptuagintilion', 'doseptuagintilioane', Gender::NEUTER],
        222 => ['treseptuagintilion', 'treseptuagintilioane', Gender::NEUTER],
        225 => ['cvadroseptuagintilion', 'cvadroseptuagintilioane', Gender::NEUTER],
        228 => ['cvinseptuagintilion', 'cvinseptuagintilioane', Gender::NEUTER],
        231 => ['sexseptuagintilion', 'sexseptuagintilioane', Gender::NEUTER],
        234 => ['septenseptuagintilion', 'septenseptuagintilioane', Gender::NEUTER],
        237 => ['octoseptuagintilion', 'octoseptuagintilioane', Gender::NEUTER],
        240 => ['novemseptuagintilion', 'novemseptuagintilioane', Gender::NEUTER],
        243 => ['octogintilion', 'octogintilioane', Gender::NEUTER],
        246 => ['unoctogintilion', 'unoctogintilioane', Gender::NEUTER],
        249 => ['dooctogintilion', 'dooctogintilioane', Gender::NEUTER],
        252 => ['treoctogintilion', 'treoctogintilioane', Gender::NEUTER],
        255 => ['cvadrooctogintilion', 'cvadrooctogintilioane', Gender::NEUTER],
        258 => ['cvinoctogintilion', 'cvinoctogintilioane', Gender::NEUTER],
        261 => ['sexoctogintilion', 'sexoctogintilioane', Gender::NEUTER],
        264 => ['septoctogintilion', 'septoctogintilioane', Gender::NEUTER],
        267 => ['octooctogintilion', 'octooctogintilioane', Gender::NEUTER],
        270 => ['novemoctogintilion', 'novemoctogintilioane', Gender::NEUTER],
        273 => ['nonagintilion', 'nonagintilioane', Gender::NEUTER],
        276 => ['unnonagintilion', 'unnonagintilioane', Gender::NEUTER],
        279 => ['dononagintilion', 'dononagintilioane', Gender::NEUTER],
        282 => ['trenonagintilion', 'trenonagintilioane', Gender::NEUTER],
        285 => ['cvadrononagintilion', 'cvadrononagintilioane', Gender::NEUTER],
        288 => ['cvinnonagintilion', 'cvinnonagintilioane', Gender::NEUTER],
        291 => ['sexnonagintilion', 'sexnonagintilioane', Gender::NEUTER],
        294 => ['septennonagintilion', 'septennonagintilioane', Gender::NEUTER],
        297 => ['octononagintilion', 'octononagintilioane', Gender::NEUTER],
        300 => ['novemnonagintilion', 'novemnonagintilioane', Gender::NEUTER],
        303 => ['centilion', 'centilioane', Gender::NEUTER]
    ];

    /**
     * The words for some numbers
     *
     * @var array
     */
    private static $numbers = [
        'zero',        // 0
        [              // 1
            [          // masculine
                'un',  // article
                'unu', // noun
            ],
            [          // feminine
                'o',   // article
                'una', // noun
            ],
            'un',      // neutral
            'unu',     // abstract (stand-alone cardinal)
        ],
        [              //  2
            'doi',     // masculine and abstract
            'două',    // feminine and neutral
        ],
        'trei',        //  3
        'patru',       //  4
        'cinci',       //  5
        'șase',        //  6
        'șapte',       //  7
        'opt',         //  8
        'nouă',        //  9
        'zece',        // 10
        'unsprezece',  // 11
        [              // 12
            'doisprezece',  // masculine and abstract
            'douăsprezece', // feminine and abstract
        ],
        'treisprezece',    // 13
        'paisprezece',     // 14
        'cincisprezece',   // 15
        'șaisprezece',     // 16
        'șaptesprezece',   // 17
        'optsprezece',     // 18
        'nouăsprezece',    // 19
        'douăzeci',        // 20
        30 => 'treizeci',  // 30
        40 => 'patruzeci', // 40
        50 => 'cincizeci', // 50
        60 => 'șaizeci',   // 60
        70 => 'șaptezeci', // 70
        80 => 'optzeci',   // 80
        90 => 'nouăzeci',  // 90
    ];

    /**
     * Get exponents
     *
     * @return array
     */
    public static function getExponents()
    {
        return self::$exponents;
    }

    public static function getNumbers()
    {
        return self::$numbers;
    }
}
