<?php

namespace NumberToWords\Language;

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
     *
     * @return string
     */
    public function getCorrespondingUnit($unit);

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
