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
            [-12, 'menos doce'],
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
            [10, 'diez'],
            [11, 'once'],
            [12, 'doce'],
            [16, 'dieciseis'], // should be dieciséis
            [19, 'diecinueve'],
            [20, 'veinte'],
            [21, 'veintiuno'],
            [22, 'veintidos'], // should be veintidós
            [23, 'veintitres'], // should be veintitrés
            [26, 'veintiseis'], // should be veintiséis
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
            [80, 'ochenta'],
            [90, 'noventa'],
            [99, 'noventa y nueve'],
            [100, 'cien'],
            [101, 'ciento uno'],
            [111, 'ciento once'],
            [120, 'ciento veinte'],
            [121, 'ciento veintiuno'],
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
            [900, 'novecientos'],
            [909, 'novecientos nueve'],
            [919, 'novecientos diecinueve'],
            [990, 'novecientos noventa'],
            [999, 'novecientos noventa y nueve'],
            [1000, 'mil'],
            [1001, 'mil uno'],
            [1097, 'mil noventa y siete'],
            [1104, 'mil ciento cuatro'],
            [1243, 'mil doscientos cuarenta y tres'],
            [2000, 'dos mil'],
            [2385, 'dos mil trescientos ochenta y cinco'],
            [3766, 'tres mil setecientos sesenta y seis'],
            [4000, 'cuatro mil'],
            [4196, 'cuatro mil ciento noventa y seis'],
            [5000, 'cinco mil'],
            [5846, 'cinco mil ochocientos cuarenta y seis'],
            [6459, 'seis mil cuatrocientos cincuenta y nueve'],
            [7232, 'siete mil doscientos treinta y dos'],
            [8569, 'ocho mil quinientos sesenta y nueve'],
            [9539, 'nueve mil quinientos treinta y nueve'],
            [11000, 'once mil'],
            [21000, 'veintiún mil'],
            [21021, 'veintiún mil veintiuno'],
            [999000, 'novecientos noventa y nueve mil'],
            [999999, 'novecientos noventa y nueve mil novecientos noventa y nueve'],
            [1000000, 'un millón'],
            [2000000, 'dos millones'],
            [4000000, 'cuatro millones'],
            [5000000, 'cinco millones'],
            [999000000, 'novecientos noventa y nueve millones'],
            [999000999, 'novecientos noventa y nueve millones novecientos noventa y nueve'],
            [999999000, 'novecientos noventa y nueve millones novecientos noventa y nueve mil'],
            [999999999, 'novecientos noventa y nueve millones novecientos noventa y nueve mil novecientos noventa y nueve'],
            [1000000000, 'mil millones'],
            [1174315110, 'mil ciento setenta y cuatro millones trescientos quince mil ciento diez'],
            [1174315119, 'mil ciento setenta y cuatro millones trescientos quince mil ciento diecinueve'],
            [15174315119, 'quince mil ciento setenta y cuatro millones trescientos quince mil ciento diecinueve'],
            [35174315119, 'treinta y cinco mil ciento setenta y cuatro millones trescientos quince mil ciento diecinueve'],
            [935174315119, 'novecientos treinta y cinco mil ciento setenta y cuatro millones trescientos quince mil ciento diecinueve'],
            [2935174315119, 'dos billones novecientos treinta y cinco mil ciento setenta y cuatro millones trescientos quince mil ciento diecinueve'],
        ];
    }
}
