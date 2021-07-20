<?php

namespace NumberToWords\Language;

interface PowerAwareTripletTransformer
{
    public function transformToWords(int $number, int $power): string;
}
