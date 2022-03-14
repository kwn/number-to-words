<?php

namespace NumberToWords\CurrencyTransformer;

class NigerianCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new NigerianCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [6474, 'NGN', 'sixty-four naira seventy-four kobo'],
            [6574, 'NGN', 'sixty-five naira seventy-four kobo'],
            [8174, 'NGN', 'eighty-one naira seventy-four kobo'],
            [8255, 'NGN', 'eighty-two naira fifty-five kobo'],
            [72900, 'NGN', 'seven hundred and twenty-nine naira'],
            [89400, 'NGN', 'eight hundred and ninety-four naira'],
            [99900, 'NGN', 'nine hundred and ninety-nine naira'],
            [100000, 'NGN', 'one thousand naira'],
            [100100, 'NGN', 'one thousand one naira'],
            [109725, 'NGN', 'one thousand and ninety-seven naira twenty-five kobo'],
            [110400, 'NGN', 'one thousand one hundred and four naira'],
            [124380, 'NGN', 'one thousand two hundred and forty-three naira eighty kobo'],
            [238500, 'NGN', 'two thousand three hundred and eighty-five naira'],
            [376600, 'NGN', 'three thousand seven hundred and sixty-six naira'],
            [419645, 'NGN', 'four thousand one hundred and ninety-six naira forty-five kobo'],
            [584600, 'NGN', 'five thousand eight hundred and forty-six naira'],
            [645900, 'NGN', 'six thousand four hundred and fifty-nine naira'],
            [723200, 'NGN', 'seven thousand two hundred and thirty-two naira'],
            [123456789, 'NGN', 'one million two hundred and thirty-four thousand five hundred and sixty-seven naira eighty-nine kobo'],
            [-72925, 'NGN', 'minus seven hundred and twenty-nine naira twenty-five kobo'],
            [-89425, 'NGN', 'minus eight hundred and ninety-four naira twenty-five kobo'],
            [-99925, 'NGN', 'minus nine hundred and ninety-nine naira twenty-five kobo'],
        ];
    }
}
