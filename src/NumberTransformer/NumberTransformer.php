<?php

namespace NumberToWords\NumberTransformer;

interface NumberTransformer
{
    public function toWords(int $number): string;
}
