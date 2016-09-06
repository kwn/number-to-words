<?php

namespace NumberToWords\NumberTransformer;

class GermanNumberTransformerTest extends NumberTransformerTest
{
    public function setUp()
    {
        $this->numberTransformer = new GermanNumberTransformer();
    }

    public function providerItConvertsNumbersToWords()
    {
        return [
            [0, 'null'],
            [1, 'eins'],
            [2, 'zwei'],
            [3, 'drei'],
            [4, 'vier'],
            [5, 'fünf'],
            [6, 'sechs'],
            [7, 'sieben'],
            [8, 'acht'],
            [9, 'neun'],
            [11, 'elf'],
            [12, 'zwölf'],
            [16, 'sechzehn'],
            [19, 'neunzehn'],
            [20, 'zwanzig'],
            [21, 'einundzwanzig'],
            [26, 'sechsundzwanzig'],
            [30, 'dreißig'],
            [31, 'einunddreißig'],
            [40, 'vierzig'],
            [43, 'dreiundvierzig'],
            [50, 'fünfzig'],
            [55, 'fünfundfünfzig'],
            [60, 'sechzig'],
            [67, 'siebenundsechzig'],
            [70, 'siebzig'],
            [79, 'neunundsiebzig'],
            [100, 'einhundert'],
            [101, 'einhunderteins'],
            [199, 'einhundertneunundneunzig'],
            [203, 'zweihundertdrei'],
            [287, 'zweihundertsiebenundachtzig'],
            [300, 'dreihundert'],
            [356, 'dreihundertsechsundfünfzig'],
            [410, 'vierhundertzehn'],
            [434, 'vierhundertvierunddreißig'],
            [578, 'fünfhundertachtundsiebzig'],
            [689, 'sechshundertneunundachtzig'],
            [729, 'siebenhundertneunundzwanzig'],
            [894, 'achthundertvierundneunzig'],
            [999, 'neunhundertneunundneunzig'],
            [1000, 'eintausend'],
            [1001, 'eintausendeins'],
            [1097, 'eintausendsiebenundneunzig'],
            [1104, 'eintausendeinhundertvier'],
            [1243, 'eintausendzweihundertdreiundvierzig'],
            [2385, 'zweitausenddreihundertfünfundachtzig'],
            [3766, 'dreitausendsiebenhundertsechsundsechzig'],
            [4196, 'viertausendeinhundertsechsundneunzig'],
            [5846, 'fünftausendachthundertsechsundvierzig'],
            [6459, 'sechstausendvierhundertneunundfünfzig'],
            [7232, 'siebentausendzweihundertzweiunddreißig'],
            [8569, 'achttausendfünfhundertneunundsechzig'],
            [9539, 'neuntausendfünfhundertneununddreißig']
        ];
    }
}
