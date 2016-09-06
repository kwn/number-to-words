<?php

namespace NumberToWords\NumberTransformer;

class SpanishNumberTransformerTest extends NumberTransformerTest
{
    public function setUp()
    {
        $this->numberTransformer = new SpanishNumberTransformer();
    }

    public function providerItConvertsNumbersToWords()
    {
        return [
            [0, 'cero'],
            [1, 'uno'],
            [2, 'dos'],
            [3, 'tres'],
            [4, 'cuatro'],
            [5, 'cinco'],
            [6, 'seis'],
            [7, 'siete'],
            [8, 'ocho'],
            [9, 'nueve'],
            [11, 'once'],
            [12, 'doce'],
            [16, 'dieciseis'],
            [19, 'diecinueve'],
            [20, 'veinte'],
            [21, 'veintiuno'],
            [26, 'veintiseis'],
            [30, 'treinta'],
            [31, 'treinta y uno'],
            [40, 'cuarenta'],
            [43, 'cuarenta y tres'],
            [50, 'cincuenta'],
            [55, 'cincuenta y cinco'],
            [60, 'sesenta'],
            [67, 'sesenta y siete'],
            [70, 'setenta'],
            [79, 'setenta y nueve'],
            [100, 'cien'],
            [101, 'ciento uno'],
            [199, 'ciento noventa y nueve'],
            [203, 'doscientos tres'],
            [287, 'doscientos ochenta y siete'],
            [300, 'trescientos'],
            [356, 'trescientos cincuenta y seis'],
            [410, 'cuatrocientos diez'],
            [434, 'cuatrocientos treinta y cuatro'],
            [578, 'quinientos setenta y ocho'],
            [689, 'seiscientos ochenta y nueve'],
            [729, 'setecientos veintinueve'],
            [894, 'ochocientos noventa y cuatro'],
            [999, 'novecientos noventa y nueve'],
            [1000, 'mil'],
            [1001, 'mil uno'],
            [1097, 'mil noventa y siete'],
            [1104, 'mil ciento cuatro'],
            [1243, 'mil doscientos cuarenta y tres'],
            [2385, 'dos mil trescientos ochenta y cinco'],
            [3766, 'tres mil setecientos sesenta y seis'],
            [4196, 'cuatro mil ciento noventa y seis'],
            [5846, 'cinco mil ochocientos cuarenta y seis'],
            [6459, 'seis mil cuatrocientos cincuenta y nueve'],
            [7232, 'siete mil doscientos treinta y dos'],
            [8569, 'ocho mil quinientos sesenta y nueve'],
            [9539, 'nueve mil quinientos treinta y nueve']
        ];
    }
}
