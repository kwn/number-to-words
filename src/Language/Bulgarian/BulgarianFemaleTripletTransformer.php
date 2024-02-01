<?php

namespace NumberToWords\Language\Bulgarian;

/**
 * Class used only for getting the proper translation of the cents-values to words.
 * It was needed, because in Bulgarian, the main unit ("лев") and the cent-unit ("стотинка") are of different gender.
 */
class BulgarianFemaleTripletTransformer extends BulgarianTripletTransformer
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

        if ($units > 0 && ($hundreds > 0 || $tens > 1)) {
            $words[] = BulgarianDictionary::$and;
        }

        if ($tens != 1) {
            $words[] = $this->dictionary->getCorrespondingUnitFemale($units);
        }

        return implode($this->dictionary->getSeparator(), $words);
    }
}
