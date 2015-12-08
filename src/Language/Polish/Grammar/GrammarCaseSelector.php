<?php

namespace Kwn\NumberToWords\Language\Polish\Grammar;

class GrammarCaseSelector
{
    /**
     * Obtain grammar case for a given value
     *
     * @param $value
     *
     * @return int
     */
    public function getGrammarCase($value)
    {
        $units = $value % 10;
        $tens = ((int) ($value / 10)) % 10;
        $type = 2;

        if ($value === 1) {
            $type = 0;
        } elseif ($tens === 1 && $units > 1) {
            $type = 2;
        } elseif ($units >= 2 && $units <= 4) {
            $type = 1;
        }

        return $type;
    }
}
