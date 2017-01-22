<?php

namespace NumberToWords\Grammar;

use NumberToWords\Language\Dictionary;
use NumberToWords\Language\ExponentInflector;
use NumberToWords\Language\TripletTransformer;
use NumberToWords\Service\NumberToTripletsConverter;

class NumberTransformerBuilder
{
    /**
     * @var \NumberToWords\Language\Dictionary
     */
    private $dictionary;

    /**
     * @var string
     */
    private $separator;

    /**
     * @var NumberToTripletsConverter
     */
    private $numberToTripletsConverter;

    /**
     * @var TripletTransformer
     */
    private $tripletTransformer;

    /**
     * @var ExponentInflector
     */
    private $exponentInflector;

    public function __construct()
    {
        $this->numberToTripletsConverter = new NumberToTripletsConverter();
    }

    /**
     * @param Dictionary $dictionary
     *
     * @return $this
     */
    public function withDictionary(Dictionary $dictionary)
    {
        $this->dictionary = $dictionary;

        return $this;
    }

    /**
     * @param string $separator
     *
     * @return $this
     */
    public function withWordsSeparatedBy($separator)
    {
        $this->separator = $separator;

        return $this;
    }

    /**
     * @param TripletTransformer $tripletTransformer
     *
     * @return $this
     */
    public function transformNumbersBySplittingIntoTriplets(TripletTransformer $tripletTransformer)
    {
        $this->tripletTransformer = $tripletTransformer;

        return $this;
    }

    /**
     * @param ExponentInflector $exponentInflector
     *
     * @return $this
     */
    public function inflectExponentByNumbers(ExponentInflector $exponentInflector)
    {
        $this->exponentInflector = $exponentInflector;

        return $this;
    }
}
