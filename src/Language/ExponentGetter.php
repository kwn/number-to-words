<?php

namespace NumberToWords\Language;

interface ExponentGetter
{
    public function getExponent(int $power): string;
}
