<?php

namespace NumberToWords\Language\Hebrew;

class HebrewNounGenderInflector
{
    /**
     * @param int    $number
     * @param string $singular
     * @param string $plural
     * @param string $genitivePlural
     *
     * @return string
     */
    public function inflectNounByNumber($number, $plural, $genitivePlural, array $exponentBetweenTenToTeweny)
    {
        $units = $number % 10;
        $tens = ((int) ($number / 10)) % 10;

        if ($number <= 10) {
            return ($exponentBetweenTenToTeweny[$number] ?? false)
                ?  $exponentBetweenTenToTeweny[$number] . ' ' . $plural
                : $plural;
        }

        if (($units > 2 && $tens === 0) || ($units === 0 && $tens === 1)) {
            return $genitivePlural;
        }

        return $genitivePlural;
    }
}
