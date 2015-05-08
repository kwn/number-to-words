<?php

namespace Kwn\NumberToWords\Model;

class Number
{
    /**
     * @var float
     */
    private $value;

    /**
     * Constructor
     *
     * @param float $value Number value
     */
    public function __construct($value)
    {
        $this->value = (float) $value;
    }

    /**
     * Get value
     *
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }
}
