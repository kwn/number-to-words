<?php

namespace NumberToWords\CurrencyTransformer;
class GeorgianCurrencyTransformerTest extends CurrencyTransformerTest
{
    public function setUp()
    {
        $this->currencyTransformer = new GeorgianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords()
    {
        return [
            [1, 'GEL', 'ერთი თეთრი'],
            [11, 'GEL', 'თერთმეტი თეთრი'],
            [105, 'GEL', 'ერთი ლარი და ხუთი თეთრი'],
            [115, 'GEL', 'ერთი ლარი და თხუთმეტი თეთრი'],
            [125, 'TRY', 'ერთი ლირა და ოცდახუთი ყურუში'],
            [180, 'PLN', 'ერთი ზლოტი და ოთხმოცი გროში'],
            [1025, 'USD', 'ათი დოლარი და ოცდახუთი ცენტი'],
            [1050, 'AMD', 'ათი დრამი და ორმოცდაათი ლუმა'],
            [2001, 'EUR', 'ოცი ევრო და ერთი სენტიმი'],
            [121084, 'GBP', 'ათას ორას ათი ფუნტი და ოთხმოცდაოთხი პენი']
        ];
    }
}
