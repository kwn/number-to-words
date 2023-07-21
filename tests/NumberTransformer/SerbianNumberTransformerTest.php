<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Language\Serbian\SerbianDictionary;
use NumberToWords\Language\Serbian\SerbianExponentGenderInflector;
use NumberToWords\Language\Serbian\SerbianNounGenderInflector;
use NumberToWords\Language\Serbian\SerbianUnitGenderInflector;
use NumberToWords\Language\Serbian\SerbianTripletTransformer;
use PHPUnit\Framework\TestCase;

class SerbianNumberTransformerTest extends TestCase
{
    /**
     * @param $number
     * @param $expectedTranslation
     * @dataProvider providerTestToWords
     *
     * @return void
     * @throws \NumberToWords\Exception\NumberToWordsException
     */
    public function testToWords($number, $expectedTranslation)
    {
        $transformer = new SerbianNumberTransformer();
        $translation = $transformer->toWords($number);

        $this->assertEquals($expectedTranslation, $translation, "Wrongly translated $translation -> $expectedTranslation.");
    }

    public function providerTestToWords()
    {
        return [
            [1, 'jedan'],
            [2, 'dva'],
            [3, 'tri'],
            [4, 'četiri'],
            [5, 'pet'],
            [6, 'šest'],
            [7, 'sedam'],
            [8, 'osam'],
            [9, 'devet'],
            [10, 'deset'],
            [11, 'jedanaest'],
            [14, 'četrnaest'],
            [15, 'petnaest'],
            [16, 'šesnaest'],
            [20, 'dvadeset'],
            [21, 'dvadeset jedan'],
            [22, 'dvadeset dva'],
            [23, 'dvadeset tri'],
            [24, 'dvadeset četiri'],
            [25, 'dvadeset pet'],
            [30, 'trideset'],
            [40, 'četrdeset'],
            [50, 'pedeset'],
            [51, 'pedeset jedan'],
            [54, 'pedeset četiri'],
            [55, 'pedeset pet'],
            [60, 'šezdeset'],
            [101, 'sto jedan'],
            [102, 'sto dva'],
            [103, 'sto tri'],
            [104, 'sto četiri'],
            [105, 'sto pet'],
            [111, 'sto jedanaest'],
            [112, 'sto dvanaest'],
            [200, 'dvesta'],
            [300, 'trista'],
            [400, 'četiristo'],
            [500, 'petsto'],
            [1001, 'jedna hiljada jedan'],
            [1010, 'jedna hiljada deset'],
            [5099, 'pet hiljada devedeset devet'],
            [10000, 'deset hiljada'],
            [10001, 'deset hiljada jedan'],
            [10002, 'deset hiljada dva'],
            [10004, 'deset hiljada četiri'],
            [10005, 'deset hiljada pet'],
            [10010, 'deset hiljada deset'],
            [10101, 'deset hiljada sto jedan'],
            [12123, 'dvanaest hiljada sto dvadeset tri'],
            [1000001, 'jedan milion jedan'],
            [1000002, 'jedan milion dva'],
            [123456789, 'sto dvadeset tri miliona četiristo pedeset šest hiljada sedamsto osamdeset devet'],
        ];
    }
}
