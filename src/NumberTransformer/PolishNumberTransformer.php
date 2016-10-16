<?php

namespace NumberToWords\NumberTransformer;

use NumberToWords\Language\Polish\PolishDictionary;
use NumberToWords\Grammar\Inflector\PolishInflector;
use NumberToWords\Grammar\NumberTransformerBuilder;
use NumberToWords\Language\Polish\PolishExponentInflector;
use NumberToWords\Language\Polish\PolishTripletTransformer;

class PolishNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($number)
    {
        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary(new PolishDictionary())
            ->withWordsSeparatedBy(' ')
            ->transformNumbersBySplittingIntoTriplets(new PolishTripletTransformer())
            ->inflectExponentByNumbers(new PolishExponentInflector(new PolishInflector()));

        return $numberTransformer->toWords($number);
    }
}
