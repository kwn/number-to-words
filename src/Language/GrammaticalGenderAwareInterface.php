<?php

namespace NumberToWords\Language;

interface GrammaticalGenderAwareInterface
{
    public const GRAMMATICAL_GENDER = 'grammaticalGender';
    public const GRAMMATICAL_GENDER_MASCULINE = 'm';
    public const GRAMMATICAL_GENDER_FEMININE = 'f';
    public const GRAMMATICAL_GENDER_NEUTER = 'n';

    public function getGrammaticalGender(): string;

    /**
     * @return static
     *
     * Replace return type after PHP 7.4 support drop
     */
    public function setGrammaticalGender(string $grammaticalGender): GrammaticalGenderAwareInterface;
}
