<?php

namespace Kwn\NumberToWords\Model;

class Currency
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * Constructor
     *
     * @param string $identifier Currency identifier (ISO 4217)
     */
    public function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Get identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }
}
