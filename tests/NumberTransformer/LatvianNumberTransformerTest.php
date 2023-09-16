<?php

namespace NumberToWords\NumberTransformer;

class LatvianNumberTransformerTest extends NumberTransformerTest
{
    protected function setUp(): void
    {
        $this->numberTransformer = new LatvianNumberTransformer();
    }

    public function providerItConvertsNumbersToWords(): array
    {
        return [
            [0, 'nulle'],
            [1, 'viens'],
            [9, 'deviņi'],
            [10, 'desmit'],
            [11, 'vienpadsmit'],
            [19, 'deviņpadsmit'],
            [20, 'divdesmit'],
            [21, 'divdesmit viens'],
            [90, 'deviņdesmit'],
            [99, 'deviņdesmit deviņi'],
            [100, 'viens simts'],
            [101, 'viens simts viens'],
            [111, 'viens simts vienpadsmit'],
            [120, 'viens simts divdesmit'],
            [121, 'viens simts divdesmit viens'],
            [900, 'deviņi simti'],
            [909, 'deviņi simti deviņi'],
            [919, 'deviņi simti deviņpadsmit'],
            [990, 'deviņi simti deviņdesmit'],
            [999, 'deviņi simti deviņdesmit deviņi'],
            [1000, 'viens tūkstotis'],
            [2000, 'divi tūkstoši'],
            [4000, 'četri tūkstoši'],
            [5000, 'pieci tūkstoši'],
            [11000, 'vienpadsmit tūkstoši'],
            [21000, 'divdesmit viens tūkstotis'],
            [999000, 'deviņi simti deviņdesmit deviņi tūkstoši'],
            [999999, 'deviņi simti deviņdesmit deviņi tūkstoši deviņi simti deviņdesmit deviņi'],
            [1000000, 'viens miljons'],
            [2000000, 'divi miljoni'],
            [4000000, 'četri miljoni'],
            [5000000, 'pieci miljoni'],
            [999000000, 'deviņi simti deviņdesmit deviņi miljoni'],
            [999000999, 'deviņi simti deviņdesmit deviņi miljoni deviņi simti deviņdesmit deviņi'],
            [999999000, 'deviņi simti deviņdesmit deviņi miljoni deviņi simti deviņdesmit deviņi tūkstoši'],
            [999999999, 'deviņi simti deviņdesmit deviņi miljoni deviņi simti deviņdesmit deviņi tūkstoši deviņi simti deviņdesmit deviņi'],
            [1174315110, 'viens miljards viens simts septiņdesmit četri miljoni trīs simti piecpadsmit tūkstoši viens simts desmit'],
            [1174315119, 'viens miljards viens simts septiņdesmit četri miljoni trīs simti piecpadsmit tūkstoši viens simts deviņpadsmit'],
            [15174315110, 'piecpadsmit miljardi viens simts septiņdesmit četri miljoni trīs simti piecpadsmit tūkstoši viens simts desmit'],
            [35174315119, 'trīsdesmit pieci miljardi viens simts septiņdesmit četri miljoni trīs simti piecpadsmit tūkstoši viens simts deviņpadsmit'],
            [935174315119, 'deviņi simti trīsdesmit pieci miljardi viens simts septiņdesmit četri miljoni trīs simti piecpadsmit tūkstoši viens simts deviņpadsmit'],
            [2935174315119, 'divi triljoni deviņi simti trīsdesmit pieci miljardi viens simts septiņdesmit četri miljoni trīs simti piecpadsmit tūkstoši viens simts deviņpadsmit'],
        ];
    }
}
