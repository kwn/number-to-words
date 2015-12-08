<?php

namespace Kwn\NumberToWords\Model;

use Kwn\NumberToWords\Exception\InvalidArgumentException;

class SubunitFormat
{
    const WORDS   = 1;
    const NUMBERS = 2;

    /**
     * @var integer
     */
    private $format;

    /**
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
     * @throws InvalidArgumentException
     */
    private function guardAgainstUnexistingSubunitsFormat($format)
    {
        if (!in_array($format, [self::WORDS, self::NUMBERS], true)) {
            throw new InvalidArgumentException('Unexisting subunits format specified');
        }
    }
}
