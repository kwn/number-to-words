<?php

namespace NumberToWords\Language\Bulgarian;

use NumberToWords\Language\GrammaticalGenderAwareInterface;
use NumberToWords\Language\GrammaticalGenderAwareTrait;
use NumberToWords\Language\PowerAwareTripletTransformer;

class BulgarianTripletTransformer implements PowerAwareTripletTransformer, GrammaticalGenderAwareInterface
{
    use GrammaticalGenderAwareTrait;

    protected BulgarianDictionary $dictionary;
    protected array $currency;

    public function __construct(BulgarianDictionary $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    public function transformToWords(int $number, int $power): ?string
    {
        $units = $number % 10;
        $tens = (int) ($number / 10) % 10;
        $hundreds = (int) ($number / 100) % 10;
        $words = [];

        if ($hundreds > 0) {
            $words[] = $this->dictionary->getCorrespondingHundred($hundreds * 100);
        }

        if ($hundreds > 0 && $tens > 0 && $units == 0) {
            $words[] = BulgarianDictionary::GRAMMATICAL_CONJUNCTION_AND;
        }

        if ($tens === 1) {
            $words[] = $this->dictionary->getCorrespondingTeen($units + 10);
        }

        if ($tens > 1) {
            $words[] = $this->dictionary->getCorrespondingTen($tens * 10);
        }

        if ($units > 0 && $tens !== 1) {
            /**
             * Handles one quantity of a thousand by omitting the quantifier (one) to comply with Bulgarian grammar
             * Example #1: 1001345 => един милион хиляда триста четиридесет и пет лева и нула стотинки
             * Example #2: 1002345 => един милион две хиляди триста четиридесет и пет лева и нула стотинки
             */
            if ($power == 1 && $units === 1 && $hundreds === 0 && $tens === 0) {
                return null;
            } else {
                if ($hundreds > 0 || $tens > 0) {
                    $words[] = BulgarianDictionary::GRAMMATICAL_CONJUNCTION_AND;
                }

                $words[] = $this->dictionary->getCorrespondingUnitForGrammaticalGender(
                    $units,
                    $power === 0
                        ? $this->getGrammaticalGender()
                        : BulgarianDictionary
                            ::ENUMERATIONS
                                [BulgarianDictionary::ENUMERATION_BY_POWERS_OF_A_THOUSAND]
                                [$power]
                                [GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER]
                );
            }
        }

        return implode($this->dictionary->getSeparator(), $words);
    }
}
