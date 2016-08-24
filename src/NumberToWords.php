<?php

namespace Kwn\NumberToWords;

use Kwn\NumberToWords\Exception\InvalidArgumentException;
use Kwn\NumberToWords\Transformer\CurrencyTransformer;
use Kwn\NumberToWords\Transformer\NumberTransformer;
use Kwn\NumberToWords\Transformer\TransformerFactory;
use Kwn\NumberToWords\Transformer\TransformerFactoriesRegistry;
use Kwn\NumberToWords\Model\Currency;
use Kwn\NumberToWords\Model\Language;
use Kwn\NumberToWords\Model\SubunitFormat;

class NumberToWords
{
    /**
     * @var TransformerFactoriesRegistry
     */
    private $transformerFactoriesRegistry;

    /**
     * @param TransformerFactoriesRegistry $transformerFactoriesRegistry
     */
    public function __construct(TransformerFactoriesRegistry $transformerFactoriesRegistry)
    {
        $this->transformerFactoriesRegistry = $transformerFactoriesRegistry;
    }

    /**
     * @param string $language
     *
     * @throws InvalidArgumentException
     * @return NumberTransformer
     */
    public function getNumberTransformer($language)
    {
        return $this->getTransformerFactory(new Language($language))->createNumberTransformer();
    }

    /**
     * @param string  $language       Language Identifier (RFC 3066)
     * @param string  $currency       Currency identifier (ISO 4217)
     * @param integer $subunitsFormat SubunitFormat format constant
     *
     * @throws InvalidArgumentException
     * @return CurrencyTransformer
     */
    public function getCurrencyTransformer($language, $currency, $subunitsFormat)
    {
        return $this->getTransformerFactory(new Language($language))->createCurrencyTransformer(
            new Currency($currency),
            new SubunitFormat($subunitsFormat)
        );
    }

    /**
     * @param Language $language
     *
     * @throws InvalidArgumentException
     * @return TransformerFactory
     */
    private function getTransformerFactory(Language $language)
    {
        if (!$this->doesTransformerFactoryExist($language)) {
            throw new InvalidArgumentException(sprintf(
                'Transformer with language identifier "%s" is not registered',
                $language->getIdentifier()
            ));
        }

        return $this->transformerFactoriesRegistry->getTransformerFactories()->offsetGet($language->getIdentifier());
    }

    /**
     * @param Language $language
     *
     * @return bool
     */
    private function doesTransformerFactoryExist(Language $language)
    {
        return $this->transformerFactoriesRegistry->getTransformerFactories()->offsetExists($language->getIdentifier());
    }
}
