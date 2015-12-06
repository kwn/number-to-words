<?php

namespace Kwn\NumberToWords\Language\English\Dictionary;

class Number
{
    protected $zero = 'zero';

    protected $units = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];

    protected $teens = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen',
        'sixteen', 'seventeen', 'eighteen', 'nineteen'];

    protected $tens = ['', 'ten', 'twenty', 'thirty', 'forty', 'fifty',
        'sixty', 'seventy', 'eighty', 'ninety'];

    protected $hundred = 'hundred';

    protected $mega = ['', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion'];

    public function getZero()
    {
        return $this->zero;
    }

    public function getUnit($value)
    {
        return $this->units[$value];
    }

    public function getSubHundred($tens, $units)
    {
        $words = [];

        if ($tens === 1) {
            $words[] = $this->teens[$units];
        } else {
            if ($tens > 0) {
                $words[] = $this->tens[$tens];
            }
            if ($units > 0) {
                $words[] = $this->units[$units];
            }
        }

        return implode(' ', $words);
    }

    public function getHundred($value)
    {
        if ($word = $this->getUnit($value))
            return $word . ' ' . $this->hundred;
    }

    public function getMega($scale)
    {
        if ($word = $this->mega[$scale])
            return $word;
    }
}
