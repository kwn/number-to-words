<?php

namespace NumberToWords;

use NumberToWords\Exception\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class LocaleAliasTest extends TestCase
{

    /**
     * @dataProvider providerItUsesSameTransformersWithLocaleAlias
     * @throws InvalidArgumentException
     */
    public function testItUsesSameTransformersWithLocaleAlias($locale, $alias): void
    {
        $original = new NumberToWords();
        $originalNumberTransformer = $original->getNumberTransformer($locale);
        $originalCurrencyTransformer = $original->getCurrencyTransformer($locale);

        $numberToWords = new NumberToWords();
        $aliasedNumberTransformer = $numberToWords->getNumberTransformer($alias);
        $aliasedCurrencyTransformer = $numberToWords->getCurrencyTransformer($alias);

        $this->assertInstanceOf(get_class($originalNumberTransformer), $aliasedNumberTransformer);
        $this->assertInstanceOf(get_class($originalCurrencyTransformer), $aliasedCurrencyTransformer);
    }

    public function providerItUsesSameTransformersWithLocaleAlias(): array
    {
        return [
            ['fr', 'fr_FR'],
        ];
    }
}
