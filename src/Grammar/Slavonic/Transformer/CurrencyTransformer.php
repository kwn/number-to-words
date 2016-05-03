<?php
namespace Kwn\NumberToWords\Grammar\Slavonic\Transformer;

use Kwn\NumberToWords\Model;
use Kwn\NumberToWords\Model\SubunitFormat;
use Kwn\NumberToWords\Grammar\Slavonic\Dictionary\Currency as CurrencyDictionary;
use Kwn\NumberToWords\Transformer\CurrencyTransformer as BaseCurrencyTransformer;

class CurrencyTransformer extends BaseCurrencyTransformer
{
    /**
     * @var NumberTransformer
     */
    protected $numberTransformer;

    /**
     * @var CurrencyDictionary
     */
    protected $currencyDictionary;

    /**
     * @param NumberTransformer $numberTransformer
     * @param CurrencyDictionary $currencyDictionary
     */
    public function __construct(NumberTransformer $numberTransformer, CurrencyDictionary $currencyDictionary)
    {
        $this->numberTransformer = $numberTransformer;
        $this->currencyDictionary = $currencyDictionary;
    }

    /**
     * @return NumberTransformer
     */
    public function getNumberTransformer()
    {
        return $this->numberTransformer;
    }

    /**
     * @return CurrencyDictionary
     */
    public function getCurrencyDictionary()
    {
        return $this->currencyDictionary;
    }

    /**
     * Convert given number to words
     *
     * @param number $number
     * @return string
     */
    public function toWords($number)
    {
        $numberTransformer = $this->getNumberTransformer();
        /** @var Model\Number $number */
        $number = $this->createCurrencyNumber($number);
        $numberTransformer->getNumberDictionary()->reverseTen();
        $words = $this->getIntegerPart($number) . ' ' . $this->getFractionalPart($number);
        $numberTransformer->getNumberDictionary()->reverseTen();

        return $words;
    }

    /**
     * Gets an array of valid currencies (ISO 4217)
     *
     * @return array
     */
    protected function getValidCurrencies()
    {
        return array_keys($this->currencyDictionary->getUnitNames());
    }

    /**
     * Gets the integer part of the provided amount
     *
     * @param Model\Number $number
     * @return string
     */
    protected function getIntegerPart(Model\Number $number)
    {
        $transformer = $this->getNumberTransformer();
        $currencyDictionary = $this->getCurrencyDictionary();
        $value = $number->getValue();
        $unit = $currencyDictionary->getUnitName($this->currency);
        $words = $transformer->toWords($value) . ' ' . $transformer->morph($value, $unit[0], $unit[1], $unit[2]);

        return $words;
    }

    /**
     * Gets the fractional part of the provided amount
     *
     * @param Model\Number $number
     * @return string
     */
    protected function getFractionalPart(Model\Number $number)
    {
        $transformer = $this->getNumberTransformer();
        $currencyDictionary = $this->getCurrencyDictionary();
        $value = $number->getSubunits();
        // if the subunit format is numbers, we want to simply return a fraction
        if ($this->subunitFormat->getFormat() === SubunitFormat::NUMBERS) {
            return sprintf('%d/100', $value);
        }
        $unit = $currencyDictionary->getSubunitName($this->currency);
        $words = $transformer->toWords($value) . ' ' . $transformer->morph($value, $unit[0], $unit[1], $unit[2]);

        return $words;
    }
}
