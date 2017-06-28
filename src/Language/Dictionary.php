<?php

namespace NumberToWords\Language;

use NumberToWords\Grammar\Gender;

interface Dictionary
{
    /**
     * @return string
     */
    public function getZero();

    /**
     * @return string
     */
    public function getMinus();

    /**
     * @param int $unit
     * @param int $gender
     *
     * @return string
     */
    public function getCorrespondingUnit($unit, $gender = Gender::GENDER_MASCULINE);

    /**
     * @param int $ten
     *
     * @return string
     */
    public function getCorrespondingTen($ten);

    /**
     * @param int $teen
     *
     * @return string
     */
    public function getCorrespondingTeen($teen);

    /**
     * @param int $hundred
     *
     * @return string
     */
    public function getCorrespondingHundred($hundred);
}
