<?php

namespace NumberToWords\Language\Serbian;

/**
 * Class used only for getting the proper translation of the cents-values to words.
 * It was needed, because in Serbian, the main unit ("dinar") and the cent-unit ("para") are of different gender.
 */
class SerbianFemaleTripletTransformer extends SerbianTripletTransformer
{
    public function transformToWords(int $number, int $power): string
    {
        $units = $number % 10;
        $tens = (int) ($number / 10) % 10;
        $hundreds = (int) ($number / 100) % 10;
        $words = [];

        if ($hundreds > 0) {
            $words[] = $this->dictionary->getCorrespondingHundred($hundreds);
        }

        if ($tens === 1) {
            $words[] = $this->dictionary->getCorrespondingTeen($units);
        }

        if ($tens > 1) {
            $words[] = $this->dictionary->getCorrespondingTen($tens);
        }

        $words[] = $this->dictionary->getCorrespondingUnitFemale($units);

        return implode($this->dictionary->getSeparator(), $words);
    }
}
