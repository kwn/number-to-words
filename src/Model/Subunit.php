<?php

namespace Kwn\NumberToWords\Model;

use Kwn\NumberToWords\Exception\InvalidArgumentException;

class Subunit
{
    const FORMAT_IN_WORDS   = 1;
    const FORMAT_IN_NUMBERS = 2;

    /**
     * @var integer
     */
    private $format;

    /**
     * Constructor
     *
     * @param $format
     *
     * @throws InvalidArgumentException
     */
    public function __construct($format)
    {
        $this->guardAgainstUnexistingSubunitsFormat($format);

        $this->format = $format;
    }

    /**
     * Get format
     *
     * @return integer
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Check if passed subunit format is correct
     *
     * @param integer $format
     *
     * @throws InvalidArgumentException
     */
    private function guardAgainstUnexistingSubunitsFormat($format)
    {
        if (!in_array($format, [ self::FORMAT_IN_WORDS, self::FORMAT_IN_NUMBERS ], true)) {
            throw new InvalidArgumentException('Unexisting subunits format specified');
        }
    }
}
