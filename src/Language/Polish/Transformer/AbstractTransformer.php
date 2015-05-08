<?php

namespace Kwn\NumberToWords\Language\Polish\Transformer;

use Kwn\NumberToWords\Model\Number;

abstract class AbstractTransformer
{
    /**
     * Return number converted to words
     *
     * @param Number $number
     *
     * @return string
     */
    abstract public function toWords(Number $number);

    /**
     * Obtain grammar case for a passed number
     *
     * @param $value
     *
     * @return int
     */
    protected function grammarCase($value)
    {
        $units = $value % 10;
        $tens  = ((int) ($value / 10)) % 10;
        $type  = 2;

        if ($value == 1) {
            $type = 0;
        } elseif ($tens === 1 && $units > 1) {
            $type = 2;
        } elseif ($units >= 2 && $units <= 4) {
            $type = 1;
        }

        return $type;
    }
}
