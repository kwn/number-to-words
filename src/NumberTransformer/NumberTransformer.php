<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Exception\NumberToWordsException;

interface NumberTransformer
{
    /**
     * @throws NumberToWordsException
     */
    public function toWords(int $number): string;
}
