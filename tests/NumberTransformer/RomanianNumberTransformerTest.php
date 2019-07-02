<?php

namespace NumberToWords\NumberTransformer;

class RomanianNumberTransformerTest extends NumberTransformerTest
{
    public function setUp()
    {
        $this->numberTransformer = new RomanianNumberTransformer();
    }

    public function providerItConvertsNumbersToWords()
    {
        return [
            [-300, 'minus trei sute'],
            [0, 'zero'],
            [1, 'unu'],
            [2, 'doi'],
            [3, 'trei'],
            [4, 'patru'],
            [5, 'cinci'],
            [6, 'șase'],
            [7, 'șapte'],
            [8, 'opt'],
            [9, 'nouă'],
            [11, 'unsprezece'],
            [12, 'doisprezece'],
            [16, 'șaisprezece'],
            [19, 'nouăsprezece'],
            [20, 'douăzeci'],
            [21, 'douăzeci și unu'],
            [26, 'douăzeci și șase'],
            [30, 'treizeci'],
            [31, 'treizeci și unu'],
            [40, 'patruzeci'],
            [43, 'patruzeci și trei'],
            [50, 'cincizeci'],
            [55, 'cincizeci și cinci'],
            [60, 'șaizeci'],
            [67, 'șaizeci și șapte'],
            [70, 'șaptezeci'],
            [79, 'șaptezeci și nouă'],
            [100, 'una sută'],
            [101, 'una sută unu'],
            [199, 'una sută nouăzeci și nouă'],
            [203, 'două sute trei'],
            [287, 'două sute optzeci și șapte'],
            [300, 'trei sute'],
            [356, 'trei sute cincizeci și șase'],
            [410, 'patru sute zece'],
            [434, 'patru sute treizeci și patru'],
            [578, 'cinci sute șaptezeci și opt'],
            [689, 'șase sute optzeci și nouă'],
            [729, 'șapte sute douăzeci și nouă'],
            [894, 'opt sute nouăzeci și patru'],
            [999, 'nouă sute nouăzeci și nouă'],
            [1000, 'una mie'],
            [1001, 'una mie unu'],
            [1097, 'una mie nouăzeci și șapte'],
            [1104, 'una mie una sută patru'],
            [1243, 'una mie două sute patruzeci și trei'],
            [2385, 'două mii trei sute optzeci și cinci'],
            [3766, 'trei mii șapte sute șaizeci și șase'],
            [4196, 'patru mii una sută nouăzeci și șase'],
            [5846, 'cinci mii opt sute patruzeci și șase'],
            [6459, 'șase mii patru sute cincizeci și nouă'],
            [7232, 'șapte mii două sute treizeci și doi'],
            [8569, 'opt mii cinci sute șaizeci și nouă'],
            [9539, 'nouă mii cinci sute treizeci și nouă'],
        ];
    }
}
