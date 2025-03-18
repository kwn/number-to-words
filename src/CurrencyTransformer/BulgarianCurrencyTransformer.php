<?php

namespace NumberToWords\CurrencyTransformer;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Grammar\Form;
use NumberToWords\Language\Bulgarian\BulgarianDictionary;
use NumberToWords\Language\Bulgarian\BulgarianExponentInflector;
use NumberToWords\Language\Bulgarian\BulgarianNounGenderInflector;
use NumberToWords\Language\Bulgarian\BulgarianTripletTransformer;
use NumberToWords\Language\GrammaticalGenderAwareInterface;
use NumberToWords\NumberTransformer\NumberTransformerBuilder;
use NumberToWords\Service\NumberToTripletsConverter;
use NumberToWords\TransformerOptions\CurrencyTransformerOptions;

class BulgarianCurrencyTransformer implements CurrencyTransformer
{
    public function toWords(int $amount, string $currency, ?CurrencyTransformerOptions $options = null): string
    {
        $currency = strtoupper($currency);

        if (!array_key_exists($currency, BulgarianDictionary::CURRENCY)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currency = BulgarianDictionary::CURRENCY[$currency];

        $dictionary = new BulgarianDictionary();
        $nounGenderInflector = new BulgarianNounGenderInflector();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformerWholePart =
            (new BulgarianTripletTransformer($dictionary))
                ->setGrammaticalGender(
                    $currency
                        [BulgarianDictionary::CURRENCY_WHOLE]
                        [GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER]
                );
        $tripletTransformerFractionPart =
            (new BulgarianTripletTransformer($dictionary))
                ->setGrammaticalGender(
                    $currency
                        [BulgarianDictionary::CURRENCY_FRACTION]
                        [GrammaticalGenderAwareInterface::GRAMMATICAL_GENDER]
                );
        $exponentInflector = new BulgarianExponentInflector($nounGenderInflector);

        $decimal = (int) ($amount / 100);

        $fraction = abs($amount % 100);

        if ($fraction === 0) {
            $fraction = null;
        }

        $numberTransformerWholePart = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withWordsSeparatedBy($dictionary->getSeparator())
            ->transformNumbersBySplittingIntoPowerAwareTriplets(
                $numberToTripletsConverter,
                $tripletTransformerWholePart
            )
            ->inflectExponentByNumbers($exponentInflector)
            ->build();

        $words = [];

        $words[] = $numberTransformerWholePart->toWords($decimal);
        $words[] = $nounGenderInflector->inflectNounByNumber(
            $decimal,
            $currency[BulgarianDictionary::CURRENCY_WHOLE][Form::SINGULAR],
            $currency[BulgarianDictionary::CURRENCY_WHOLE][Form::PLURAL],
            $currency[BulgarianDictionary::CURRENCY_WHOLE][Form::PLURAL],
        );

        $words[] = BulgarianDictionary::GRAMMATICAL_CONJUNCTION_AND;

        if ($fraction !== null) {
            $numberTransformerFractionPart = (new NumberTransformerBuilder())
                ->withDictionary($dictionary)
                ->withWordsSeparatedBy($dictionary->getSeparator())
                ->transformNumbersBySplittingIntoPowerAwareTriplets(
                    $numberToTripletsConverter,
                    $tripletTransformerFractionPart
                )
                ->inflectExponentByNumbers($exponentInflector)
                ->build();

            $words[] = $numberTransformerFractionPart->toWords($fraction);
            $words[] = $nounGenderInflector->inflectNounByNumber(
                $fraction,
                $currency[BulgarianDictionary::CURRENCY_FRACTION][Form::SINGULAR],
                $currency[BulgarianDictionary::CURRENCY_FRACTION][Form::PLURAL],
                $currency[BulgarianDictionary::CURRENCY_FRACTION][Form::PLURAL],
            );
        } else {
            $words[] = $dictionary->getZero();
            $words[] =
                $currency[BulgarianDictionary::CURRENCY_FRACTION][Form::PLURAL];
        }

        return implode(' ', $words);
    }
}
