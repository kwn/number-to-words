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
}
