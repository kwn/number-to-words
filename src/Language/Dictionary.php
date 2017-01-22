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
     * @return array
     */
    public function getTens();

    /**
     * @return array
     */
    public function getTeens();

    /**
     * @return array
     */
    public function getHundreds();
}
