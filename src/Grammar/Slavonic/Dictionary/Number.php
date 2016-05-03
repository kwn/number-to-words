<?php
namespace Kwn\NumberToWords\Grammar\Slavonic\Dictionary;

abstract class Number
{
    protected $zero = '';

    protected $ten = [];

    protected $teens = [];

    protected $tens = [];

    protected $hundred = [];

    protected $mega = [];

    /**
     * @return string
     */
    public function getZero()
    {
        return $this->zero;
    }

    /**
     * @return array
     */
    public function getTen()
    {
        return $this->ten;
    }

    /**
     * @return array
     */
    public function getTeens()
    {
        return $this->teens;
    }

    /**
     * @return array
     */
    public function getTens()
    {
        return $this->tens;
    }

    /**
     * @return array
     */
    public function getHundred()
    {
        return $this->hundred;
    }

    /**
     * @return array
     */
    public function getMega()
    {
        return $this->mega;
    }

    public function reverseTen()
    {
        $this->ten = array_reverse($this->ten);
    }
}