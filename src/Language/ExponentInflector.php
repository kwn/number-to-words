<?php

namespace NumberToWords\Language;

interface ExponentInflector
{
    public function inflectExponent(int $number, int $power): string;
}
