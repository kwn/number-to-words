<?php

namespace Kwn\NumberToWords\Language\Polish\Grammar;

class GrammarCaseSelectorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerGetGrammarCase
     */
    public function testGetGrammarCase($value, $expectedCase)
    {
        $grammarCaseSelector = new GrammarCaseSelector();

        $this->assertEquals($expectedCase, $grammarCaseSelector->getGrammarCase($value));
    }

    public function providerGetGrammarCase()
    {
        return [
            [1, 0],
            [2, 1],
            [5, 2],
            [10, 2],
            [101, 2],
            [102, 1],
            [107, 2]
        ];
    }
}
