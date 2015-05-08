<?php

namespace Kwn\NumberToWords\Model;

class Language
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * Constructor
     *
     * @param string $identifier Language Identifier (RFC 3066)
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
