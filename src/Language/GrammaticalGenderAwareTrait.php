<?php

namespace NumberToWords\Language;

trait GrammaticalGenderAwareTrait
{
    protected string $grammaticalGender;

    public function getGrammaticalGender(): string
    {
        return $this->grammaticalGender;
    }

    /**
     * @return static
     *
     * Replace return type after PHP 7.4 support drop
     */
    public function setGrammaticalGender(string $grammaticalGender): GrammaticalGenderAwareInterface
    {
        $this->grammaticalGender = $grammaticalGender;

        return $this;
    }
}
