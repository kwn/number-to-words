<?php

namespace Kwn\NumberToWords\Model;

class Number
{
    /**
     * @var float
     */
    private $value;

    /**
     * @var integer
     */
    private $units;

    /**
     * @var integer
     */
    private $subunits;

    /**
     * Constructor
     *
     * @param float $value Number value
     */
    public function __construct($value)
    {
        $this->value    = (float) $value;
        $this->units    = $this->extractUnits($value);
        $this->subunits = $this->extractSubunits($value);
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

    /**
     * Get units
     *
     * @return integer
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * Get subunits
     *
     * @return integer
     */
    public function getSubunits()
    {
        return $this->subunits;
    }

    /**
     * Extract units from given number
     *
     * @param float $value
     *
     * @return integer
     */
    private function extractUnits($value)
    {
        return (int) $value;
    }

    /**
     * Extract subunits from given number.
     *
     * @param float $value
     *
     * @return integer
     */
    private function extractSubunits($value)
    {
        $valueParts = explode('.', (string) $value);
        $subunits   = array_pop($valueParts);

        return (int) $subunits;
    }
}
