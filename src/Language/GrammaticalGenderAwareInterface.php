<?php

namespace NumberToWords\Language;

interface GrammaticalGenderAwareInterface
{
    public const GRAMMATICAL_GENDER = 'grammaticalGender';
    public const GRAMMATICAL_GENDER_MASCULINE = 'm';
    public const GRAMMATICAL_GENDER_FEMININE = 'f';
    public const GRAMMATICAL_GENDER_NEUTER = 'n';

    public function getGrammaticalGender(): string;
    public function setGrammaticalGender(string $grammaticalGender): static;
}
