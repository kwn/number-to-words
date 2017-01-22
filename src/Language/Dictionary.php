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
     * @return array
     */
    public function getUnits();

    /**
     * @param int $unit
     *
     * @return string
     */
    public function getCorrespondingUnit($unit);

    /**
     * @return array
     */
    public function getTens();

    /**
     * @param int $ten
     *
     * @return string
     */
    public function getCorrespondingTen($ten);

    /**
     * @return array
     */
    public function getTeens();

    /**
     * @param int $teen
     *
     * @return string
     */
    public function getCorrespondingTeen($teen);

    /**
     * @return array
     */
    public function getHundreds();

    /**
     * @param int $hundred
     *
     * @return string
     */
    public function getCorrespondingHundred($hundred);
}
