<?php

namespace NumberToWords\Language;

interface TripletTransformer
{
    public function transformToWords(int $number): string;
}
