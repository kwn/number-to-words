<?php

namespace NumberToWords\NumberTransformer;

class EstonianNumberTransformerTest extends NumberTransformerTest
{
    protected function setUp(): void
    {
        $this->numberTransformer = new EstonianNumberTransformer();
    }

    public function providerItConvertsNumbersToWords(): array
    {
        return [
            [0, 'null'],
            [1, 'üks'],
            [9, 'üheksa'],
            [10, 'kümme'],
            [11, 'üksteist'],
            [19, 'üheksateist'],
            [20, 'kakskümmend'],
            [21, 'kakskümmend üks'],
            [80, 'kaheksakümmend'],
            [90, 'üheksakümmend'],
            [99, 'üheksakümmend üheksa'],
            [100, 'ükssada'],
            [101, 'ükssada üks'],
            [111, 'ükssada üksteist'],
            [120, 'ükssada kakskümmend'],
            [121, 'ükssada kakskümmend üks'],
            [900, 'üheksasada'],
            [909, 'üheksasada üheksa'],
            [919, 'üheksasada üheksateist'],
            [990, 'üheksasada üheksakümmend'],
            [999, 'üheksasada üheksakümmend üheksa'],
            [1000, 'üks tuhat'],
            [1111, 'üks tuhat ükssada üksteist'],
            [2000, 'kaks tuhat'],
            [2001, 'kaks tuhat üks'],
            [2111, 'kaks tuhat ükssada üksteist'],
            [4000, 'neli tuhat'],
            [5000, 'viis tuhat'],
            [11000, 'üksteist tuhat'],
            [21000, 'kakskümmend üks tuhat'],
            [999000, 'üheksasada üheksakümmend üheksa tuhat'],
            [999999, 'üheksasada üheksakümmend üheksa tuhat üheksasada üheksakümmend üheksa'],
            [1000000, 'üks miljon'],
            [2000000, 'kaks miljonit'],
            [4000000, 'neli miljonit'],
            [5000000, 'viis miljonit'],
            [999000000, 'üheksasada üheksakümmend üheksa miljonit'],
            [999000999, 'üheksasada üheksakümmend üheksa miljonit üheksasada üheksakümmend üheksa'],
            [999999000, 'üheksasada üheksakümmend üheksa miljonit üheksasada üheksakümmend üheksa tuhat'],
            [999999999, 'üheksasada üheksakümmend üheksa miljonit üheksasada üheksakümmend üheksa tuhat üheksasada üheksakümmend üheksa'],
            [1174315110, 'üks miljard ükssada seitsekümmend neli miljonit kolmsada viisteist tuhat ükssada kümme'],
            [1174315119, 'üks miljard ükssada seitsekümmend neli miljonit kolmsada viisteist tuhat ükssada üheksateist'],
            [15174315119, 'viisteist miljardit ükssada seitsekümmend neli miljonit kolmsada viisteist tuhat ükssada üheksateist'],
            [35174315119, 'kolmkümmend viis miljardit ükssada seitsekümmend neli miljonit kolmsada viisteist tuhat ükssada üheksateist'],
            [935174315119, 'üheksasada kolmkümmend viis miljardit ükssada seitsekümmend neli miljonit kolmsada viisteist tuhat ükssada üheksateist'],
            [1135174313119, 'üks triljon ükssada kolmkümmend viis miljardit ükssada seitsekümmend neli miljonit kolmsada kolmteist tuhat ükssada üheksateist'],
            [2935174315119, 'kaks triljonit üheksasada kolmkümmend viis miljardit ükssada seitsekümmend neli miljonit kolmsada viisteist tuhat ükssada üheksateist'],
        ];
    }
}
