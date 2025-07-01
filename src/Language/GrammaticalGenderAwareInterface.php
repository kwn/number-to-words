<?php

namespace NumberToWords\Language;

interface GrammaticalGenderAwareInterface
{
    public const GRAMMATICAL_GENDER = 'grammaticalGender';

    public function getGrammaticalGender(): int;

    /**
     * @return static
     *
     * Replace return type after PHP 7.4 support drop
     */
    public function setGrammaticalGender(int $grammaticalGender): GrammaticalGenderAwareInterface;
}
