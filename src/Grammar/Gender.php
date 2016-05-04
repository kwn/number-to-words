<?php

namespace Kwn\NumberToWords\Grammar;

class Gender
{
    /**
     * Masculine gender
     */
    const MALE = 0;

    /**
     * Feminine gender
     */
    const FEMALE = 1;

    /**
     * Neuter gender
     */
    const NEUTER = 2;

    /**
     * This is not an actual gender; some languages have different ways of numbering actual things
     * (e.g. Romanian: "un nor, doi nori" for "one cloud, two clouds") and for just counting in an abstract
     * manner (e.g. Romanian: "unu, doi" for "one, two"
     */
    const FEATURELESS = 3;
}
