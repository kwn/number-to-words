<?php

namespace NumberToWords;

use NumberToWords\Concerns\ManagesCurrencyTransformers;
use NumberToWords\Concerns\ManagesNumberTransformers;
use NumberToWords\CurrencyTransformer\CurrencyTransformer;
use NumberToWords\Exception\InvalidArgumentException;
use NumberToWords\NumberTransformer\NumberTransformer;

class NumberToWords
{
    use ManagesCurrencyTransformers;
    use ManagesNumberTransformers;

    /**
     * @throws InvalidArgumentException
     */
    public function getNumberTransformer(string $language): NumberTransformer
    {
        if (!array_key_exists($language, $this->numberTransformers)) {
            throw new InvalidArgumentException(sprintf(
                'Number transformer for "%s" language is not implemented.',
                $language
            ));
        }

        return new $this->numberTransformers[$language]();
    }

    public static function numberTransformer(string $language): NumberTransformer
    {
        return (new static())->getNumberTransformer($language);
    }

    /**
     * @throws InvalidArgumentException
     */
    public function getCurrencyTransformer(string $language): CurrencyTransformer
    {
        if (!array_key_exists($language, $this->currencyTransformers)) {
            throw new InvalidArgumentException(sprintf(
                'Currency transformer for "%s" language is not implemented.',
                $language
            ));
        }

        return new $this->currencyTransformers[$language]();
    }

    public static function currencyTransformer(string $language): CurrencyTransformer
    {
        return (new static())->getCurrencyTransformer($language);
    }
}
