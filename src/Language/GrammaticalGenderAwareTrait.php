<?php

namespace NumberToWords\Language;

trait GrammaticalGenderAwareTrait
{
    protected string $grammaticalGender;

    public function getGrammaticalGender(): string
    {
        return $this->grammaticalGender;
    }

    public function setGrammaticalGender(string $grammaticalGender): static
    {
        $this->grammaticalGender = $grammaticalGender;

        return $this;
    }
}
