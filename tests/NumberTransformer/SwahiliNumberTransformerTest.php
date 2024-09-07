<?php

namespace NumberToWords\NumberTransformer;

class SwahiliNumberTransformerTest extends NumberTransformerTest
{
    protected function setUp(): void
    {
        $this->numberTransformer = new SwahiliNumberTransformer();
    }

    public function providerItConvertsNumbersToWords(): array
    {
        return [];
    }
}
