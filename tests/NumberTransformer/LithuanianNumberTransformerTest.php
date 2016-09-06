<?php

namespace NumberToWords\NumberTransformer;

class LithuanianNumberTransformerTest extends NumberTransformerTest
{
    public function setUp()
    {
        $this->numberTransformer = new LithuanianNumberTransformer();
    }

    public function providerItConvertsNumbersToWords()
    {
        return [
            [726, 'septyni šimtai dvidešimt šeši']
        ];
    }
}
