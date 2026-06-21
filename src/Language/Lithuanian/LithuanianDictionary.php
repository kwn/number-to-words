<?php

namespace NumberToWords\Language\Lithuanian;

use NumberToWords\Language\Dictionary;

class LithuanianDictionary implements Dictionary
{
    public const LOCALE               = 'lt';
    public const LANGUAGE_NAME        = 'Lithuanian';
    public const LANGUAGE_NAME_NATIVE = 'Lietuvių';

    private static array $units = [
        0 => 'nulis',
        1 => 'vienas',
        2 => 'du',
        3 => 'trys',
        4 => 'keturi',
        5 => 'penki',
        6 => 'šeši',
        7 => 'septyni',
        8 => 'aštuoni',
        9 => 'devyni'
    ];

    private static array $tens = [
        0 => 'dešimt',
        1 => 'vienuolika',
        2 => 'dvylika',
        3 => 'trylika',
        4 => 'keturiolika',
        5 => 'penkiolika',
        6 => 'šešiolika',
        7 => 'septyniolika',
        8 => 'aštuoniolika',
        9 => 'devyniolika'
    ];

    private static array $teens = [
        0 => '',
        1 => 'dešimt',
        2 => 'dvidešimt',
        3 => 'trisdešimt',
        4 => 'keturiasdešimt',
        5 => 'penkiasdešimt',
        6 => 'šešiasdešimt',
        7 => 'septyniasdešimt',
        8 => 'aštuoniasdešimt',
        9 => 'devyniasdešimt'
    ];

    private static array $hundreds = [
        0 => 'šimtas',
        2 => 'šimtai',
    ];

    public static array $exponent = [
        ['', ''],
        ['tūkstantis', 'tūkstančių', 'tūkstančiai'],
        ['milijonas', 'milijonų', 'milijonai'],
        ['bilijonas', 'bilijonų', 'bilijonai'],
        ['trilijonas', 'trilijonų', 'trilijardai'],
        ['kvadrilijonas', 'kvadrilijonų', 'kvadrilijonai'],
        ['kvintilijonas', 'kvintilijonų', 'kvintilijonai'],
        ['sikstilijonas', 'sikstilijonų', 'sikstilijonai'],
        ['septilijonas', 'septilijonų', 'septilijonai'],
        ['oktilijonas', 'oktilijonų', 'oktilijonai'],
        ['nonilijonas', 'nonilijonų', 'nonilijonai'],
        ['gugolas', 'gugolų', 'gugolai'],
        ['gugolplexas', 'gugolplexų', 'gugolplexai']
    ];

    public static array $currencyNames = [
        'ALL' => [['albanų lekas', 'albanų lekų', 'albanų lekai'], ['qindarka', 'qindarkų', 'qindarkai']],
        'AED' => [['JAE dirhamas', 'JAE dirhamų', 'JAE dirhamai'], ['fils', 'filsų', 'filsai']],
        'AUD' => [
            ['Australijos doleris', 'Australijos dolerių', 'Australijos doleriai'],
            ['centas', 'centų', 'centai'],
        ],
        'BAM' => [['Bosnijos marka', 'Bosnijos markų', 'Bosnijos markos'], ['fenigas', 'fenigų', 'fenigai']],
        'BGN' => [['Bulgarijos levas', 'Bulgarijos levų', 'Bulgarijos levai'], ['stotinka', 'stotinkų', 'stotinkos']],
        'BRL' => [['Brazilijos realas', 'Brazilijos realų', 'Brazilijos realai'], ['centavo', 'centavų', 'centavai']],
        'BYR' => [
            ['Baltarusijos rublis', 'Baltarusijos rublių', 'Baltarusijos rubliai'],
            ['kapeika', 'kapeikų', 'kapeikos'],
        ],
        'CAD' => [['Kanados doleris', 'Kanados dolerių', 'Kanados doleriai'], ['centas', 'centų', 'centai']],
        'CHF' => [['Šveicarijos frankas', 'Šveicarijos frankų', 'Šveicarijos frankai'], ['rapas', 'rapų', 'rapai']],
        'CNY' => [['Kinijos juanis', 'Kinijos juanių', 'Kinijos juaniai'], ['fenas', 'fenų', 'fenai']],
        'CYP' => [['Kipro svaras', 'Kipro svarų', 'Kipro svarai'], ['centas', 'centų', 'centai']],
        'CZK' => [['Čekijos krona', 'Čekijos kronų', 'Čekijos kronos'], ['haleris', 'halerių', 'haleriai']],
        'DKK' => [['Danijos krona', 'Danijos kronų', 'Danijos kronos'], ['eras', 'erų', 'erai']],
        'DZD' => [['Alžyro dinaras', 'Alžyro dinarų', 'Alžyro dinarai'], ['santimas', 'santimų', 'santimai']],
        'EEK' => [['Estijos krona', 'Estijos kronų', 'Estijos kronos'], ['sentas', 'sentų', 'sentai']],
        'EGP' => [['Egipto svaras', 'Egipto svarų', 'Egipto svarai'], ['piastras', 'piastrų', 'piastrai']],
        'EUR' => [['euras', 'eurų', 'eurai'], ['euro centas', 'euro centų', 'euro centai']],
        'GBP' => [['svaras sterlingas', 'svarų sterlingų', 'svarai sterlingai'], ['pensas', 'pensų', 'pensai']],
        'HKD' => [['Honkongo doleris', 'Honkongo dolerių', 'Honkongo doleriai'], ['centas', 'centų', 'centai']],
        'HRK' => [['Kroatijos kuna', 'Kroatijos kunų', 'Kroatijos kunos'], ['lipa', 'lipų', 'lipos']],
        'HUF' => [
            ['Vengrijos forintas', 'Vengrijos forintų', 'Vengrijos forintai'],
            ['fileris', 'filerių', 'fileriai'],
        ],
        'IDR' => [['Indonezijos rupija', 'Indonezijos rupijų', 'Indonezijos rupijos'], ['senas', 'senų', 'senai']],
        'ILS' => [['Izraelio šekelis', 'Izraelio šekelių', 'Izraelio šekeliai'], ['agora', 'agorų', 'agoros']],
        'ISK' => [['Islandijos krona', 'Islandijos kronų', 'Islandijos kronos'], ['eyrir', 'eyrirų', 'eyrirai']],
        'JPY' => [['Japonijos jena', 'Japonijos jenų', 'Japonijos jenos'], ['senas', 'senų', 'senai']],
        'LTL' => [['litas', 'litų', 'litai'], ['lito centas', 'lito centų', 'lito centai']],
        'LVL' => [['Latvijos latas', 'Latvijos latų', 'Latvijos latai'], ['santimas', 'santimų', 'santimai']],
        'LYD' => [['Libijos dinaras', 'Libijos dinarų', 'Libijos dinarai'], ['dirhamas', 'dirhamų', 'dirhamai']],
        'MAD' => [['Maroko dirhamas', 'Maroko dirhamų', 'Maroko dirhamai'], ['santimas', 'santimų', 'santimai']],
        'MKD' => [['Makedonijos denaras', 'Makedonijos denarų', 'Makedonijos denarai'], ['denis', 'denių', 'deniai']],
        'MRO' => [['Mauritanijos ugija', 'Mauritanijos ugijų', 'Mauritanijos ugijos'], ['chumas', 'chumų', 'chumai']],
        'MTL' => [['Maltos lira', 'Maltos lirų', 'Maltos liros'], ['centas', 'centų', 'centai']],
        'MXN' => [['Meksikos pesas', 'Meksikos pesų', 'Meksikos pesai'], ['sentavas', 'sentavų', 'sentavai']],
        'MYR' => [['Malaizijos ringitas', 'Malaizijos ringitų', 'Malaizijos ringitai'], ['senas', 'senų', 'senai']],
        'NGN' => [['Nigerijos naira', 'Nigerijos nairų', 'Nigerijos nairos'], ['kobo', 'kobų', 'kobai']],
        'NOK' => [['Norvegijos krona', 'Norvegijos kronų', 'Norvegijos kronos'], ['eras', 'erų', 'erai']],
        'PHP' => [['Filipinų pesas', 'Filipinų pesų', 'Filipinų pesai'], ['sentavo', 'sentavų', 'sentavai']],
        'PLN' => [['Lenkijos zlotas', 'Lenkijos zlotų', 'Lenkijos zlotai'], ['grašas', 'grašų', 'grašai']],
        'ROL' => [['Rumunijos lėja', 'Rumunijos lėjų', 'Rumunijos lėjos'], ['banas', 'banų', 'banai']],
        'RUB' => [['Rusijos rublis', 'Rusijos rublių', 'Rusijos rubliai'], ['kapeika', 'kapeikų', 'kapeikos']],
        'SAR' => [
            ['Saudo Arabijos rialas', 'Saudo Arabijos rialų', 'Saudo Arabijos rialai'],
            ['halalas', 'halalų', 'halalai'],
        ],
        'SEK' => [['Švedijos krona', 'Švedijos kronų', 'Švedijos kronos'], ['eras', 'erų', 'erai']],
        'SIT' => [
            ['Slovėnijos toliaras', 'Slovėnijos toliarų', 'Slovėnijos toliarai'],
            ['stotinas', 'stotinų', 'stotinai'],
        ],
        'SKK' => [['Slovakijos krona', 'Slovakijos kronų', 'Slovakijos kronos'], ['haleris', 'halerių', 'haleriai']],
        'TMT' => [
            ['Turkmėnistano manatas', 'Turkmėnistano manatų', 'Turkmėnistano manatai'],
            ['tenga', 'tengų', 'tengos'],
        ],
        'TND' => [['Tuniso dinaras', 'Tuniso dinarų', 'Tuniso dinarai'], ['milimas', 'milimų', 'milimai']],
        'TRL' => [['Turkijos lira', 'Turkijos lirų', 'Turkijos liros'], ['kurušas', 'kurušų', 'kurušai']],
        'TRY' => [['Turkijos lira', 'Turkijos lirų', 'Turkijos liros'], ['kurušas', 'kurušų', 'kurušai']],
        'UAH' => [['Ukrainos grivna', 'Ukrainos grivnų', 'Ukrainos grivnos'], ['kapeika', 'kapeikų', 'kapeikos']],
        'USD' => [['JAV doleris', 'JAV dolerių', 'JAV doleriai'], ['centas', 'centų', 'centai']],
        'UZS' => [['Uzbekistano sumas', 'Uzbekistano sumų', 'Uzbekistano sumai'], ['tiyinas', 'tiyinų', 'tiyinai']],
        'XAF' => [['CFA frankas', 'CFA frankų', 'CFA frankai'], ['santimas', 'santimų', 'santimai']],
        'XOF' => [['CFA frankas', 'CFA frankų', 'CFA frankai'], ['santimas', 'santimų', 'santimai']],
        'XPF' => [['CFP frankas', 'CFP frankų', 'CFP frankai'], ['santimas', 'santimų', 'santimai']],
        'YUM' => [['Jugoslavijos dinaras', 'Jugoslavijos dinarų', 'Jugoslavijos dinarai'], ['para', 'parų', 'parai']],
        'ZAR' => [
            ['Pietų Afrikos randas', 'Pietų Afrikos randų', 'Pietų Afrikos randai'],
            ['centas', 'centų', 'centai'],
        ],
    ];

    public function getAnd(): string
    {
        return 'ir';
    }

    public function getMinus(): string
    {
        return 'minus';
    }

    public function getZero(): string
    {
        return 'nulis';
    }

    public function getCorrespondingUnit(int $unit): string
    {
        return self::$units[$unit];
    }

    public function getCorrespondingTen(int $ten): string
    {
        return self::$tens[$ten];
    }

    public function getCorrespondingTeen(int $teen): string
    {
        return self::$teens[$teen];
    }

    public function getCorrespondingHundred(int $hundred): string
    {
        if ($hundred === 1) {
            return static::$hundreds[0];
        }

        return self::$units[$hundred] . ' ' . static::$hundreds[1];
    }
}
