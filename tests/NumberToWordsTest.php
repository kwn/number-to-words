<?php

namespace Kwn\NumberToWords;


use Kwn\NumberToWords\Factory\TransformerFactoriesRegistry;
use Kwn\NumberToWords\Language\Polish\PolishTransformerFactory;
use Kwn\NumberToWords\Model\Subunit;

class NumberToWordsTest extends \PHPUnit_Framework_TestCase
{
    public function testGetExistingNumberTransformer()
    {
        $registry = new TransformerFactoriesRegistry([
            new PolishTransformerFactory()
        ]);

        $numberToWords = new NumberToWords($registry);
        $transformer   = $numberToWords->getNumberTransformer('pl');

        $this->assertInstanceOf('Kwn\NumberToWords\Language\Polish\Transformer\NumberTransformer', $transformer);
    }

    /**
     * @expectedException \Kwn\NumberToWords\Exception\InvalidArgumentException
     */
    public function testGetUnexistingNumberTransformer()
    {
        $registry = new TransformerFactoriesRegistry([
            new PolishTransformerFactory()
        ]);

        $numberToWords = new NumberToWords($registry);

        $numberToWords->getNumberTransformer('cd');
    }

    public function testGetExistingCurrencyTransformer()
    {
        $registry = new TransformerFactoriesRegistry([
            new PolishTransformerFactory()
        ]);

        $numberToWords = new NumberToWords($registry);
        $transformer   = $numberToWords->getCurrencyTransformer(
            'pl',
            'EUR',
            Subunit::FORMAT_IN_WORDS
        );

        $this->assertInstanceOf(
            'Kwn\NumberToWords\Language\Polish\Transformer\Decorator\CurrencyTransformerDecorator',
            $transformer
        );
    }

    /**
     * @expectedException \Kwn\NumberToWords\Exception\InvalidArgumentException
     */
    public function testGetUnexistingCurrencyTransformer()
    {
        $registry = new TransformerFactoriesRegistry([
            new PolishTransformerFactory()
        ]);

        $numberToWords = new NumberToWords($registry);

        $numberToWords->getCurrencyTransformer(
            'cd',
            'EUR',
            Subunit::FORMAT_IN_WORDS
        );
    }
}
