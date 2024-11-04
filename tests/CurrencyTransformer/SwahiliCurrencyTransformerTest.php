<?php

namespace NumberToWords\CurrencyTransformer;

class SwahiliCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new SwahiliCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [6474, 'USD', 'Dola za Marekani sitini na nne na senti sabini na nne'],
            [6574, 'USD', 'Dola za Marekani sitini na tano na senti sabini na nne'],
            [8174, 'USD', 'Dola za Marekani themanini na moja na senti sabini na nne'],
            [8255, 'KES', 'Shilingi za Kenya themanini na mbili na senti hamsini na tano'],
            [72900, 'USD', 'Dola za Marekani mia saba na ishirini na tisa'],
            [89400, 'USD', 'Dola za Marekani mia nane na tisini na nne'],
            [99900, 'TZS', 'Shilingi za Tanzania mia tisa na tisini na tisa'],
            [100000, 'USD', 'Dola za Marekani elfu moja'],
            [100100, 'USD', 'Dola za Marekani elfu moja, moja'],
            [109725, 'GBP', 'Pauni za Uingereza elfu moja, tisini na saba na senti ishirini na tano'],
            [110400, 'USD', 'Dola za Marekani elfu moja, mia na nne'],
            [124380, 'EUR', 'Yuro elfu moja, mia mbili na arobaini na tatu na senti themanini'],
            [238500, 'USD', 'Dola za Marekani elfu mbili, mia tatu na themanini na tano'],
            [376600, 'USD', 'Dola za Marekani elfu tatu, mia saba na sitini na sita'],
            [584600, 'USD', 'Dola za Marekani elfu tano, mia nane na arobaini na sita'],
            [645900, 'USD', 'Dola za Marekani elfu sita, mia nne na hamsini na tisa'],
            [723200, 'USD', 'Dola za Marekani elfu saba, mia mbili na thelathini na mbili'],
            [-72925, 'UGX', 'Shilingi za Uganda kasoro mia saba na ishirini na tisa na senti ishirini na tano'],
            [-89425, 'USD', 'Dola za Marekani kasoro mia nane na tisini na nne na senti ishirini na tano'],
            [-99925, 'USD', 'Dola za Marekani kasoro mia tisa na tisini na tisa na senti ishirini na tano'],
        ];
    }
}
