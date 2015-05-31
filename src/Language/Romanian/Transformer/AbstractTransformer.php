<?php

namespace Kwn\NumberToWords\Language\Romanian\Transformer;

use Kwn\NumberToWords\Model\Number;

abstract class AbstractTransformer
{
    /**
     * Return number converted to words
     *
     * @param Number $number
     *
     * @return mixed
     */
    abstract public function toWords(Number $number);
}
