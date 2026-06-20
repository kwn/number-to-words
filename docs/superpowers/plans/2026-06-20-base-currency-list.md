# Base Currency List Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Add missing currencies to all currency transformers so every transformer supports the canonical 51-currency base list.

**Architecture:** Each transformer stores currency names in its language-specific dictionary (either a `Dictionary.php` class or a legacy `Locale/*.php` file). We add missing entries to each, following the existing array format for that transformer. We then extend the existing test file with 3–5 new cases per transformer.

**Tech Stack:** PHP 8, PHPUnit. Run tests with `vendor/bin/phpunit --filter <TestName>`.

---

## Base List (51 currencies)

```
ALL AED AUD BAM BGN BRL BYR CAD CHF CNY CYP CZK DKK DZD EEK EGP EUR GBP
HKD HRK HUF IDR ILS ISK JPY LTL LVL LYD MAD MKD MRO MTL MYR NGN NOK PHP
PLN ROL RUB SAR SEK SIT SKK TMT TND TRL TRY UAH USD UZS XAF XOF XPF YUM ZAR
```

---

## Format Reference

| Transformer | File | Format |
|---|---|---|
| Latvian | `src/Language/Latvian/LatvianDictionary.php` | `[['nom-sg','nom-pl','nom-pl'],['cent-sg','cent-pl','cent-pl']]` |
| Lithuanian | `src/Language/Lithuanian/LithuanianDictionary.php` | `[['nom-sg','gen-pl','nom-pl'],['cent-sg','cent-gen-pl','cent-nom-pl']]` |
| German | `src/Language/German/GermanDictionary.php` | `[['Singular'],['cent']]` |
| Romanian | `src/Language/Romanian/Dictionary.php` | `[['singular','plural',Gender::GENDER_X],['cent-sg','cent-pl',Gender::GENDER_X]]` |
| Slovak | `src/Language/Slovak/SlovakDictionary.php` | `[['sg','pl-2-4','gen-pl'],['cent-sg','cent-pl-2-4','cent-gen-pl']]` |
| Polish | `src/Language/Polish/PolishDictionary.php` | `[['sg','pl-2-4','gen-pl'],['cent-sg','cent-pl-2-4','cent-gen-pl']]` |
| Danish | `src/Legacy/Numbers/Words/Locale/Dk.php` | `[['singular','plural'],['subunit']]` or `[['invariant'],['subunit']]` |
| Turkmen | `src/Legacy/Numbers/Words/Locale/Tk.php` | `[['singular','plural'],['subunit']]` |
| French | `src/Legacy/Numbers/Words/Locale/Fr.php` | `[['singular','plural'],['subunit','subunit-plural']]` |
| Pt/BR | `src/Legacy/Numbers/Words/Locale/Pt/Br.php` | `[['singular','plural'],['cent-sg','cent-pl']]` |
| Hungarian | `src/Legacy/Numbers/Words/Locale/Hu.php` | `[['singular','plural'],['subunit']]` |
| Turkish | `src/Legacy/Numbers/Words/Locale/Tr.php` | `[['singular','plural'],['subunit']]` |
| Russian | `src/Legacy/Numbers/Words/Locale/Ru.php` | complex (see existing entries) |
| Ukrainian | `src/Legacy/Numbers/Words/Locale/Ua.php` | complex (see existing entries) |
| Georgian | `src/Legacy/Numbers/Words/Locale/Ka.php` | `[['singular','plural'],['subunit']]` |
| Swahili | `src/Legacy/Numbers/Words/Locale/Sw.php` | `[['singular','plural'],['subunit','subunit-pl']]` |
| Indonesian | `src/Legacy/Numbers/Words/Locale/Id.php` | `[['invariant'],['subunit']]` |
| Malay | `src/Legacy/Numbers/Words/Locale/Ms.php` | `[['invariant'],['subunit']]` |

---

## Task 1 — Latvian (`LatvianDictionary.php`)

**Files:**
- Modify: `src/Language/Latvian/LatvianDictionary.php`
- Modify: `tests/CurrencyTransformer/LatvianCurrencyTransformerTest.php`

- [ ] **Step 1: Add missing currencies to LatvianDictionary**

Open `src/Language/Latvian/LatvianDictionary.php`. Append to `$currencyNames` array:

```php
'ALL' => [['albāņu leks', 'albāņu leki', 'albāņu leki'], ['qindarka', 'qindarka', 'qindarka']],
'AED' => [['AAE dirhāms', 'AAE dirhāmi', 'AAE dirhāmi'], ['fils', 'fils', 'fils']],
'AUD' => [['Austrālijas dolārs', 'Austrālijas dolāri', 'Austrālijas dolāri'], ['cents', 'centi', 'centi']],
'BAM' => [['Bosnijas marka', 'Bosnijas markas', 'Bosnijas markas'], ['feniņš', 'feniņi', 'feniņi']],
'BGN' => [['Bulgārijas leva', 'Bulgārijas levas', 'Bulgārijas levas'], ['stotinka', 'stotinkas', 'stotinkas']],
'BRL' => [['Brazīlijas reāls', 'Brazīlijas reāli', 'Brazīlijas reāli'], ['centavo', 'centavo', 'centavo']],
'BYR' => [['Baltkrievijas rublis', 'Baltkrievijas rubļi', 'Baltkrievijas rubļi'], ['kapeikas', 'kapeikas', 'kapeikas']],
'CAD' => [['Kanādas dolārs', 'Kanādas dolāri', 'Kanādas dolāri'], ['cents', 'centi', 'centi']],
'CHF' => [['Šveices franks', 'Šveices franki', 'Šveices franki'], ['raps', 'rapi', 'rapi']],
'CNY' => [['Ķīnas juāns', 'Ķīnas juāni', 'Ķīnas juāni'], ['fens', 'feni', 'feni']],
'CYP' => [['Kipras mārciņa', 'Kipras mārciņas', 'Kipras mārciņas'], ['cents', 'centi', 'centi']],
'CZK' => [['Čehijas krona', 'Čehijas kronas', 'Čehijas kronas'], ['halērs', 'halēri', 'halēri']],
'DKK' => [['Dānijas krona', 'Dānijas kronas', 'Dānijas kronas'], ['ēre', 'ēres', 'ēres']],
'DZD' => [['Alžīrijas dinārs', 'Alžīrijas dināri', 'Alžīrijas dināri'], ['santīms', 'santīmi', 'santīmi']],
'EEK' => [['Igaunijas krona', 'Igaunijas kronas', 'Igaunijas kronas'], ['sents', 'senti', 'senti']],
'EGP' => [['Ēģiptes mārciņa', 'Ēģiptes mārciņas', 'Ēģiptes mārciņas'], ['piastrs', 'piastri', 'piastri']],
'GBP' => [['sterliņu mārciņa', 'sterliņu mārciņas', 'sterliņu mārciņas'], ['penss', 'pensi', 'pensi']],
'HKD' => [['Honkongas dolārs', 'Honkongas dolāri', 'Honkongas dolāri'], ['cents', 'centi', 'centi']],
'HRK' => [['Horvātijas kuna', 'Horvātijas kunas', 'Horvātijas kunas'], ['lipa', 'lipas', 'lipas']],
'HUF' => [['Ungārijas forints', 'Ungārijas forinti', 'Ungārijas forinti'], ['filērs', 'filēri', 'filēri']],
'IDR' => [['Indonēzijas rūpija', 'Indonēzijas rūpijas', 'Indonēzijas rūpijas'], ['sens', 'seni', 'seni']],
'ILS' => [['Izraēlas šekelis', 'Izraēlas šekeļi', 'Izraēlas šekeļi'], ['agora', 'agoras', 'agoras']],
'ISK' => [['Islandes krona', 'Islandes kronas', 'Islandes kronas'], ['ēyrir', 'ēyrir', 'ēyrir']],
'JPY' => [['Japānas jēna', 'Japānas jēnas', 'Japānas jēnas'], ['sens', 'seni', 'seni']],
'LTL' => [['Lietuvas lits', 'Lietuvas liti', 'Lietuvas liti'], ['cents', 'centi', 'centi']],
'LVL' => [['Latvijas lats', 'Latvijas lati', 'Latvijas lati'], ['santīms', 'santīmi', 'santīmi']],
'LYD' => [['Lībijas dinārs', 'Lībijas dināri', 'Lībijas dināri'], ['dirhams', 'dirhami', 'dirhami']],
'MAD' => [['Marokas dirhāms', 'Marokas dirhāmi', 'Marokas dirhāmi'], ['santīms', 'santīmi', 'santīmi']],
'MKD' => [['Maķedonijas denārs', 'Maķedonijas denāri', 'Maķedonijas denāri'], ['denis', 'deni', 'deni']],
'MRO' => [['Mauritānijas ugija', 'Mauritānijas ugijas', 'Mauritānijas ugijas'], ['kūms', 'kūmi', 'kūmi']],
'MTL' => [['Maltas lira', 'Maltas liras', 'Maltas liras'], ['cents', 'centi', 'centi']],
'MYR' => [['Malaizijas ringits', 'Malaizijas ringiti', 'Malaizijas ringiti'], ['sens', 'seni', 'seni']],
'NGN' => [['Nigērijas naira', 'Nigērijas nairas', 'Nigērijas nairas'], ['kobo', 'kobo', 'kobo']],
'NOK' => [['Norvēģijas krona', 'Norvēģijas kronas', 'Norvēģijas kronas'], ['ēre', 'ēres', 'ēres']],
'PHP' => [['Filipīnu peso', 'Filipīnu peso', 'Filipīnu peso'], ['sentavo', 'sentavo', 'sentavo']],
'PLN' => [['Polijas zlots', 'Polijas zloti', 'Polijas zloti'], ['grošs', 'groši', 'groši']],
'ROL' => [['Rumānijas leja', 'Rumānijas lejas', 'Rumānijas lejas'], ['bans', 'bani', 'bani']],
'RUB' => [['Krievijas rublis', 'Krievijas rubļi', 'Krievijas rubļi'], ['kapeikas', 'kapeikas', 'kapeikas']],
'SAR' => [['Saūda Arābijas riyāls', 'Saūda Arābijas riyāli', 'Saūda Arābijas riyāli'], ['hallāls', 'hallāli', 'hallāli']],
'SEK' => [['Zviedrijas krona', 'Zviedrijas kronas', 'Zviedrijas kronas'], ['ēre', 'ēres', 'ēres']],
'SIT' => [['Slovēnijas tolārs', 'Slovēnijas tolāri', 'Slovēnijas tolāri'], ['stotins', 'stotini', 'stotini']],
'SKK' => [['Slovākijas krona', 'Slovākijas kronas', 'Slovākijas kronas'], ['halērs', 'halēri', 'halēri']],
'TMT' => [['Turkmenistānas manāts', 'Turkmenistānas manāti', 'Turkmenistānas manāti'], ['teņģe', 'teņģes', 'teņģes']],
'TND' => [['Tunisijas dinārs', 'Tunisijas dināri', 'Tunisijas dināri'], ['millīms', 'millīmi', 'millīmi']],
'TRL' => [['Turcijas lira', 'Turcijas liras', 'Turcijas liras'], ['kuruš', 'kuruši', 'kuruši']],
'TRY' => [['Turcijas lira', 'Turcijas liras', 'Turcijas liras'], ['kuruš', 'kuruši', 'kuruši']],
'UAH' => [['Ukrainas grivna', 'Ukrainas grivnas', 'Ukrainas grivnas'], ['kapeikas', 'kapeikas', 'kapeikas']],
'UZS' => [['Uzbekistānas soms', 'Uzbekistānas somi', 'Uzbekistānas somi'], ['tiyins', 'tiyini', 'tiyini']],
'XAF' => [['CFA franks', 'CFA franki', 'CFA franki'], ['santīms', 'santīmi', 'santīmi']],
'XOF' => [['CFA franks', 'CFA franki', 'CFA franki'], ['santīms', 'santīmi', 'santīmi']],
'XPF' => [['CFP franks', 'CFP franki', 'CFP franki'], ['santīms', 'santīmi', 'santīmi']],
'YUM' => [['Dienvidslāvijas dinārs', 'Dienvidslāvijas dināri', 'Dienvidslāvijas dināri'], ['para', 'paras', 'paras']],
'ZAR' => [['Dienvidāfrikas rends', 'Dienvidāfrikas rendi', 'Dienvidāfrikas rendi'], ['cents', 'centi', 'centi']],
```

- [ ] **Step 2: Add test cases**

Open `tests/CurrencyTransformer/LatvianCurrencyTransformerTest.php`. Append to the return array:

```php
[500, 'GBP', 'pieci sterliņu mārciņas un nulle pensi'],
[100, 'JPY', 'viena Japānas jēna un nulle sens'],
[300, 'NOK', 'trīs Norvēģijas kronas un nulle ēres'],
[200, 'SAR', 'divi Saūda Arābijas riyāli un nulle hallāli'],
[100, 'ZAR', 'viena Dienvidāfrikas rends un nulle cents'],
```

- [ ] **Step 3: Run tests**

```bash
vendor/bin/phpunit --filter LatvianCurrencyTransformerTest
```

Expected: all pass.

---

## Task 2 — Lithuanian (`LithuanianDictionary.php`)

**Files:**
- Modify: `src/Language/Lithuanian/LithuanianDictionary.php`
- Modify: `tests/CurrencyTransformer/LithuanianCurrencyTransformerTest.php`

- [ ] **Step 1: Fix LT → LTL bug and add missing currencies**

Open `src/Language/Lithuanian/LithuanianDictionary.php`. Replace the `'LT'` entry with `'LTL'` and append all missing currencies:

```php
// Replace existing 'LT' with:
'LTL' => [['litas', 'litų', 'litai'], ['lito centas', 'lito centų', 'lito centai']],

// Add missing:
'ALL' => [['albanų lekas', 'albanų lekų', 'albanų lekai'], ['qindarka', 'qindarkų', 'qindarkai']],
'AED' => [['JAE dirhamas', 'JAE dirhamų', 'JAE dirhamai'], ['fils', 'filsų', 'filsai']],
'AUD' => [['Australijos doleris', 'Australijos dolerių', 'Australijos doleriai'], ['centas', 'centų', 'centai']],
'BAM' => [['Bosnijos marka', 'Bosnijos markų', 'Bosnijos markos'], ['fenigas', 'fenigų', 'fenigai']],
'BGN' => [['Bulgarijos levas', 'Bulgarijos levų', 'Bulgarijos levai'], ['stotinka', 'stotinkų', 'stotinkos']],
'BRL' => [['Brazilijos realas', 'Brazilijos realų', 'Brazilijos realai'], ['centavo', 'centavų', 'centavai']],
'BYR' => [['Baltarusijos rublis', 'Baltarusijos rublių', 'Baltarusijos rubliai'], ['kapeika', 'kapeikų', 'kapeikos']],
'CAD' => [['Kanados doleris', 'Kanados dolerių', 'Kanados doleriai'], ['centas', 'centų', 'centai']],
'CHF' => [['Šveicarijos frankas', 'Šveicarijos frankų', 'Šveicarijos frankai'], ['rapas', 'rapų', 'rapai']],
'CNY' => [['Kinijos juanis', 'Kinijos juanių', 'Kinijos juaniai'], ['fenas', 'fenų', 'fenai']],
'CYP' => [['Kipro svaras', 'Kipro svarų', 'Kipro svarai'], ['centas', 'centų', 'centai']],
'CZK' => [['Čekijos krona', 'Čekijos kronų', 'Čekijos kronos'], ['haleris', 'halerių', 'haleriai']],
'DKK' => [['Danijos krona', 'Danijos kronų', 'Danijos kronos'], ['eras', 'erų', 'erai']],
'DZD' => [['Alžyro dinaras', 'Alžyro dinarų', 'Alžyro dinarai'], ['santimas', 'santimų', 'santimai']],
'EEK' => [['Estijos krona', 'Estijos kronų', 'Estijos kronos'], ['sentas', 'sentų', 'sentai']],
'EGP' => [['Egipto svaras', 'Egipto svarų', 'Egipto svarai'], ['piastras', 'piastrų', 'piastrai']],
'GBP' => [['svaras sterlingas', 'svarų sterlingų', 'svarai sterlingai'], ['pensas', 'pensų', 'pensai']],
'HKD' => [['Honkongo doleris', 'Honkongo dolerių', 'Honkongo doleriai'], ['centas', 'centų', 'centai']],
'HRK' => [['Kroatijos kuna', 'Kroatijos kunų', 'Kroatijos kunos'], ['lipa', 'lipų', 'lipos']],
'HUF' => [['Vengrijos forintas', 'Vengrijos forintų', 'Vengrijos forintai'], ['fileris', 'filerių', 'fileriai']],
'IDR' => [['Indonezijos rupija', 'Indonezijos rupijų', 'Indonezijos rupijos'], ['senas', 'senų', 'senai']],
'ILS' => [['Izraelio šekelis', 'Izraelio šekelių', 'Izraelio šekeliai'], ['agora', 'agorų', 'agoros']],
'ISK' => [['Islandijos krona', 'Islandijos kronų', 'Islandijos kronos'], ['eyrir', 'eyrirų', 'eyrirai']],
'JPY' => [['Japonijos jena', 'Japonijos jenų', 'Japonijos jenos'], ['senas', 'senų', 'senai']],
'LVL' => [['Latvijos latas', 'Latvijos latų', 'Latvijos latai'], ['santimas', 'santimų', 'santimai']],
'LYD' => [['Libijos dinaras', 'Libijos dinarų', 'Libijos dinarai'], ['dirhamas', 'dirhamų', 'dirhamai']],
'MAD' => [['Maroko dirhamas', 'Maroko dirhamų', 'Maroko dirhamai'], ['santimas', 'santimų', 'santimai']],
'MKD' => [['Makedonijos denaras', 'Makedonijos denarų', 'Makedonijos denarai'], ['denis', 'denių', 'deniai']],
'MRO' => [['Mauritanijos ugija', 'Mauritanijos ugijų', 'Mauritanijos ugijos'], ['chumas', 'chumų', 'chumai']],
'MTL' => [['Maltos lira', 'Maltos lirų', 'Maltos liros'], ['centas', 'centų', 'centai']],
'MYR' => [['Malaizijos ringitas', 'Malaizijos ringitų', 'Malaizijos ringitai'], ['senas', 'senų', 'senai']],
'NGN' => [['Nigerijos naira', 'Nigerijos nairų', 'Nigerijos nairos'], ['kobo', 'kobų', 'kobai']],
'NOK' => [['Norvegijos krona', 'Norvegijos kronų', 'Norvegijos kronos'], ['eras', 'erų', 'erai']],
'PHP' => [['Filipinų pesas', 'Filipinų pesų', 'Filipinų pesai'], ['sentavo', 'sentavų', 'sentavai']],
'PLN' => [['Lenkijos zlotas', 'Lenkijos zlotų', 'Lenkijos zlotai'], ['grašas', 'grašų', 'grašai']],
'ROL' => [['Rumunijos lėja', 'Rumunijos lėjų', 'Rumunijos lėjos'], ['banas', 'banų', 'banai']],
'RUB' => [['Rusijos rublis', 'Rusijos rublių', 'Rusijos rubliai'], ['kapeika', 'kapeikų', 'kapeikos']],
'SAR' => [['Saudo Arabijos rialas', 'Saudo Arabijos rialų', 'Saudo Arabijos rialai'], ['halalas', 'halalų', 'halalai']],
'SEK' => [['Švedijos krona', 'Švedijos kronų', 'Švedijos kronos'], ['eras', 'erų', 'erai']],
'SIT' => [['Slovėnijos toliaras', 'Slovėnijos toliarų', 'Slovėnijos toliarai'], ['stotinas', 'stotinų', 'stotinai']],
'SKK' => [['Slovakijos krona', 'Slovakijos kronų', 'Slovakijos kronos'], ['haleris', 'halerių', 'haleriai']],
'TMT' => [['Turkmėnistano manatas', 'Turkmėnistano manatų', 'Turkmėnistano manatai'], ['tenga', 'tengų', 'tengos']],
'TND' => [['Tuniso dinaras', 'Tuniso dinarų', 'Tuniso dinarai'], ['milimas', 'milimų', 'milimai']],
'TRL' => [['Turkijos lira', 'Turkijos lirų', 'Turkijos liros'], ['kurušas', 'kurušų', 'kurušai']],
'TRY' => [['Turkijos lira', 'Turkijos lirų', 'Turkijos liros'], ['kurušas', 'kurušų', 'kurušai']],
'UAH' => [['Ukrainos grivna', 'Ukrainos grivnų', 'Ukrainos grivnos'], ['kapeika', 'kapeikų', 'kapeikos']],
'UZS' => [['Uzbekistano sumas', 'Uzbekistano sumų', 'Uzbekistano sumai'], ['tiyinas', 'tiyinų', 'tiyinai']],
'XAF' => [['CFA frankas', 'CFA frankų', 'CFA frankai'], ['santimas', 'santimų', 'santimai']],
'XOF' => [['CFA frankas', 'CFA frankų', 'CFA frankai'], ['santimas', 'santimų', 'santimai']],
'XPF' => [['CFP frankas', 'CFP frankų', 'CFP frankai'], ['santimas', 'santimų', 'santimai']],
'YUM' => [['Jugoslavijos dinaras', 'Jugoslavijos dinarų', 'Jugoslavijos dinarai'], ['para', 'parų', 'parai']],
'ZAR' => [['Pietų Afrikos randas', 'Pietų Afrikos randų', 'Pietų Afrikos randai'], ['centas', 'centų', 'centai']],
```

- [ ] **Step 2: Add test cases**

Open `tests/CurrencyTransformer/LithuanianCurrencyTransformerTest.php`. Append to the return array:

```php
[500, 'GBP', 'penki svarai sterlingai ir nulis pensų'],
[100, 'JPY', 'vienas Japonijos jenos ir nulis senų'],
[300, 'NOK', 'trys Norvegijos kronos ir nulis erų'],
[200, 'SAR', 'du Saudo Arabijos rialai ir nulis halalų'],
[100, 'ZAR', 'vienas Pietų Afrikos randas ir nulis centų'],
```

- [ ] **Step 3: Run tests**

```bash
vendor/bin/phpunit --filter LithuanianCurrencyTransformerTest
```

Expected: all pass.

---

## Task 3 — Turkmen (`Tk.php`)

**Files:**
- Modify: `src/Legacy/Numbers/Words/Locale/Tk.php`
- Modify: `tests/CurrencyTransformer/TurkmenCurrencyTransformerTest.php`

- [ ] **Step 1: Check format of existing entries**

Open `src/Legacy/Numbers/Words/Locale/Tk.php` and verify the `$currencyNames` format by looking at the USD and TMT entries. Match that format for all new entries below.

- [ ] **Step 2: Add missing currencies**

Append to `$currencyNames`:

```php
'ALL' => [['albaniya lekasy'], ['qindarka']],
'AED' => [['BAE dirhamy'], ['fils']],
'AUD' => [['Awstraliýa dollary'], ['sent']],
'BAM' => [['Bosniýa markasy'], ['fenig']],
'BGN' => [['Bolgariýa lewasy'], ['stotinka']],
'BRL' => [['Brazil realy'], ['sentawo']],
'BYR' => [['Belarus rubly'], ['kopeýka']],
'CAD' => [['Kanada dollary'], ['sent']],
'CHF' => [['Şweýsariýa franky'], ['rapp']],
'CNY' => [['Hytaý ýuany'], ['fen']],
'CYP' => [['Kipr funty'], ['sent']],
'CZK' => [['Çehiýa kronasy'], ['haler']],
'DKK' => [['Daniýa kronasy'], ['öre']],
'DZD' => [['Jazaýyr dinary'], ['santim']],
'EEK' => [['Estoniýa kronasy'], ['sent']],
'EGP' => [['Müsür funty'], ['piastr']],
'EUR' => [['ýewro'], ['sent']],
'GBP' => [['britan funty'], ['pens']],
'HKD' => [['Gonkong dollary'], ['sent']],
'HRK' => [['Horwatiýa kunasy'], ['lipa']],
'HUF' => [['Wengriýa forinti'], ['filler']],
'IDR' => [['Indoneziýa rupiýasy'], ['sen']],
'ILS' => [['Ysraýyl şekeli'], ['agora']],
'ISK' => [['Islandiýa kronasy'], ['eyrir']],
'JPY' => [['Ýaponiýa ýenasy'], ['sen']],
'LTL' => [['Litwa litasy'], ['sent']],
'LVL' => [['Latwiýa laty'], ['santim']],
'LYD' => [['Liwiýa dinary'], ['dirham']],
'MAD' => [['Marokko dirhamy'], ['santim']],
'MKD' => [['Makedoniýa denary'], ['deni']],
'MRO' => [['Mawritaniýa ugiýasy'], ['kum']],
'MTL' => [['Malta lirasy'], ['sent']],
'MYR' => [['Malaýziýa ringiti'], ['sen']],
'NGN' => [['Nigeriýa naýrasy'], ['kobo']],
'NOK' => [['Norweçiýa kronasy'], ['öre']],
'PHP' => [['Filippinler pesosy'], ['sentawo']],
'PLN' => [['Polşa zlotasy'], ['groş']],
'ROL' => [['Rumyniýa leýasy'], ['ban']],
'RUB' => [['Russiýa rubly'], ['kopeýka']],
'SAR' => [['Saud Arabiýasy riýaly'], ['halala']],
'SEK' => [['Şwesiýa kronasy'], ['öre']],
'SIT' => [['Sloweniýa tolary'], ['stotin']],
'SKK' => [['Slowakiýa kronasy'], ['haler']],
'TND' => [['Tunis dinary'], ['millim']],
'TRL' => [['Türkiýe lirasy'], ['kuruş']],
'TRY' => [['Türkiýe lirasy'], ['kuruş']],
'UAH' => [['Ukraina griwnasy'], ['kopeýka']],
'UZS' => [['Özbegistan somumy'], ['tiýin']],
'XAF' => [['CFA franky'], ['santim']],
'XOF' => [['CFA franky'], ['santim']],
'XPF' => [['CFP franky'], ['santim']],
'YUM' => [['Ýugoslawiýa dinary'], ['para']],
'ZAR' => [['Günorta Afrika rendi'], ['sent']],
```

- [ ] **Step 3: Add test cases**

Open `tests/CurrencyTransformer/TurkmenCurrencyTransformerTest.php`. Append to the return array:

```php
[500, 'EUR', 'bäş ýewro'],
[100, 'GBP', 'bir britan funty'],
[300, 'RUB', 'üç Russiýa rubly'],
[200, 'JPY', 'iki Ýaponiýa ýenasy'],
[100, 'SAR', 'bir Saud Arabiýasy riýaly'],
```

- [ ] **Step 4: Run tests**

```bash
vendor/bin/phpunit --filter TurkmenCurrencyTransformerTest
```

Expected: all pass.

---

## Task 4 — Danish (`Dk.php`)

**Files:**
- Modify: `src/Legacy/Numbers/Words/Locale/Dk.php`
- Modify: `tests/CurrencyTransformer/DanishCurrencyTransformerTest.php`

- [ ] **Step 1: Add missing currencies**

Open `src/Legacy/Numbers/Words/Locale/Dk.php`. Append to `$currencyNames`:

```php
'ALL' => [['albansk lek', 'albanske lek'], ['qindarka']],
'AED' => [['emiratisk dirham', 'emiratiske dirham'], ['fils']],
'BAM' => [['bosnisk konvertibel mark', 'bosniske konvertible mark'], ['fening']],
'BGN' => [['bulgarsk lev', 'bulgarske lev'], ['stotinka']],
'BRL' => [['brasiliansk real', 'brasilianske real'], ['centavo']],
'BYR' => [['hviderussisk rubel', 'hviderussiske rubel'], ['kopek']],
'CNY' => [['kinesisk yuan', 'kinesiske yuan'], ['fen']],
'DZD' => [['algerisk dinar', 'algeriske dinar'], ['santim']],
'EEK' => [['estisk kroon', 'estiske kroon'], ['sent']],
'EGP' => [['egyptisk pund', 'egyptiske pund'], ['piastre']],
'HRK' => [['kroatisk kuna', 'kroatiske kuna'], ['lipa']],
'HUF' => [['ungarsk forint', 'ungarske forint'], ['filler']],
'IDR' => [['indonesisk rupiah', 'indonesiske rupiah'], ['sen']],
'ILS' => [['israelsk shekel', 'israelske shekel'], ['agora']],
'ISK' => [['islandsk krone', 'islandske kroner'], ['eyrir']],
'LTL' => [['litauisk litas', 'litauiske litas'], ['sent']],
'LVL' => [['lettisk lats', 'lettiske lats'], ['santim']],
'LYD' => [['libysk dinar', 'libyske dinar'], ['dirham']],
'MAD' => [['marokkansk dirham', 'marokkanske dirham'], ['santim']],
'MKD' => [['makedonsk denar', 'makedonske denar'], ['deni']],
'MRO' => [['mauritansk ouguiya', 'mauritanske ouguiya'], ['khoums']],
'MTL' => [['maltesisk lira', 'maltesiske lira'], ['sent']],
'MYR' => [['malaysisk ringgit', 'malaysiske ringgit'], ['sen']],
'NGN' => [['nigeriansk naira', 'nigerianske naira'], ['kobo']],
'PHP' => [['filippinsk peso', 'filippinske peso'], ['sentavo']],
'ROL' => [['rumænsk leu', 'rumænske leu'], ['ban']],
'RUB' => [['russisk rubel', 'russiske rubel'], ['kopek']],
'SAR' => [['saudiarabisk riyal', 'saudiarabiske riyal'], ['halala']],
'SIT' => [['slovensk tolar', 'slovenske tolar'], ['stotin']],
'SKK' => [['slovakisk krone', 'slovakiske kroner'], ['haler']],
'TMT' => [['turkmensk manat', 'turkmenske manat'], ['tenge']],
'TND' => [['tunesisk dinar', 'tunesiske dinar'], ['millim']],
'TRL' => [['tyrkisk lira', 'tyrkiske lira'], ['kuruş']],
'TRY' => [['tyrkisk lira', 'tyrkiske lira'], ['kuruş']],
'UAH' => [['ukrainsk hryvnia', 'ukrainske hryvnia'], ['kopek']],
'UZS' => [['usbekisk som', 'usbekiske som'], ['tiyin']],
'XAF' => [['CFA franc', 'CFA franc'], ['santim']],
'XOF' => [['CFA franc', 'CFA franc'], ['santim']],
'XPF' => [['CFP franc', 'CFP franc'], ['santim']],
'YUM' => [['jugoslavisk dinar', 'jugoslaviske dinar'], ['para']],
'ZAR' => [['sydafrikansk rand', 'sydafrikanske rand'], ['sent']],
```

- [ ] **Step 2: Add test cases**

Open `tests/CurrencyTransformer/DanishCurrencyTransformerTest.php`. Append to the return array:

```php
[500, 'GBP', 'fem britan pund'],
[100, 'JPY', 'en japansk yen'],
[300, 'RUB', 'tre russiske rubel'],
[200, 'SAR', 'to saudiarabiske riyal'],
[100, 'ZAR', 'en sydafrikansk rand'],
```

- [ ] **Step 3: Run tests**

```bash
vendor/bin/phpunit --filter DanishCurrencyTransformerTest
```

Expected: all pass.

---

## Task 5 — French (`Fr.php`)

**Files:**
- Modify: `src/Legacy/Numbers/Words/Locale/Fr.php`
- Modify: `tests/CurrencyTransformer/FrenchCurrencyTransformerTest.php`

- [ ] **Step 1: Add missing currencies**

Open `src/Legacy/Numbers/Words/Locale/Fr.php`. Append to `$currencyNames`:

```php
'ALL' => [['lek albanais', 'leks albanais'], ['qindarka', 'qindarkas']],
'AED' => [['dirham des Émirats', 'dirhams des Émirats'], ['fils', 'fils']],
'BAM' => [['mark convertible', 'marks convertibles'], ['fening', 'fenings']],
'BGN' => [['lev bulgare', 'levs bulgares'], ['stotinka', 'stotinkas']],
'BRL' => [['réal brésilien', 'réals brésiliens'], ['centavo', 'centavos']],
'BYR' => [['rouble biélorusse', 'roubles biélorusses'], ['kopek', 'kopeks']],
'CYP' => [['livre chypriote', 'livres chypriotes'], ['cent', 'cents']],
'CZK' => [['couronne tchèque', 'couronnes tchèques'], ['haler', 'halers']],
'DKK' => [['couronne danoise', 'couronnes danoises'], ['øre', 'øre']],
'EEK' => [['couronne estonienne', 'couronnes estoniennes'], ['sent', 'sents']],
'EGP' => [['livre égyptienne', 'livres égyptiennes'], ['piastre', 'piastres']],
'HKD' => [['dollar de Hong Kong', 'dollars de Hong Kong'], ['cent', 'cents']],
'HRK' => [['kuna croate', 'kunas croates'], ['lipa', 'lipas']],
'HUF' => [['forint hongrois', 'forints hongrois'], ['fillér', 'fillérs']],
'IDR' => [['roupie indonésienne', 'roupies indonésiennes'], ['sen', 'sens']],
'ILS' => [['shekel israélien', 'shekels israéliens'], ['agora', 'agoras']],
'ISK' => [['couronne islandaise', 'couronnes islandaises'], ['eyrir', 'eyrir']],
'LTL' => [['litas lituanien', 'litas lituaniens'], ['centas', 'centai']],
'LVL' => [['lats letton', 'lats lettons'], ['santim', 'santims']],
'MKD' => [['denar macédonien', 'denars macédoniens'], ['deni', 'denis']],
'MTL' => [['lire maltaise', 'lires maltaises'], ['cent', 'cents']],
'MYR' => [['ringgit malaisien', 'ringgits malaisiens'], ['sen', 'sens']],
'NGN' => [['naira nigérian', 'nairas nigérians'], ['kobo', 'kobos']],
'NOK' => [['couronne norvégienne', 'couronnes norvégiennes'], ['øre', 'øre']],
'PHP' => [['peso philippin', 'pesos philippins'], ['sentavo', 'sentavos']],
'PLN' => [['zloty polonais', 'zlotys polonais'], ['grosz', 'groszs']],
'ROL' => [['leu roumain', 'lei roumains'], ['ban', 'bans']],
'RUB' => [['rouble russe', 'roubles russes'], ['kopek', 'kopeks']],
'SAR' => [['riyal saoudien', 'riyals saoudiens'], ['halala', 'halalas']],
'SEK' => [['couronne suédoise', 'couronnes suédoises'], ['öre', 'öre']],
'SIT' => [['tolar slovène', 'tolars slovènes'], ['stotin', 'stotins']],
'SKK' => [['couronne slovaque', 'couronnes slovaques'], ['haler', 'halers']],
'TMT' => [['manat turkmène', 'manats turkmènes'], ['tenge', 'tenges']],
'TRL' => [['livre turque', 'livres turques'], ['kuruş', 'kuruş']],
'TRY' => [['livre turque', 'livres turques'], ['kuruş', 'kuruş']],
'UAH' => [['hryvnia ukrainien', 'hryvnias ukrainiens'], ['kopek', 'kopeks']],
'UZS' => [['sum ouzbek', 'sums ouzbeks'], ['tiyin', 'tiyins']],
'YUM' => [['dinar yougoslave', 'dinars yougoslaves'], ['para', 'paras']],
'ZAR' => [['rand sud-africain', 'rands sud-africains'], ['cent', 'cents']],
```

- [ ] **Step 2: Add test cases**

Open `tests/CurrencyTransformer/FrenchCurrencyTransformerTest.php`. Append to the return array:

```php
[500, 'GBP', 'cinq livres sterling'],
[100, 'JPY', 'un yen japonais'],
[300, 'RUB', 'trois roubles russes'],
[200, 'SAR', 'deux riyals saoudiens'],
[100, 'ZAR', 'un rand sud-africain'],
```

- [ ] **Step 3: Run tests**

```bash
vendor/bin/phpunit --filter FrenchCurrencyTransformerTest
```

Expected: all pass.

---

## Task 6 — Portuguese Brazilian (`Pt/Br.php`)

**Files:**
- Modify: `src/Legacy/Numbers/Words/Locale/Pt/Br.php`
- Modify: `tests/CurrencyTransformer/PortugueseBrazilianCurrencyTransformerTest.php`

- [ ] **Step 1: Add missing currencies**

Open `src/Legacy/Numbers/Words/Locale/Pt/Br.php`. Append to `$currencyNames`:

```php
'ALL' => [['lek albanês', 'leks albaneses'], ['qindarka', 'qindarkas']],
'AED' => [['dirham dos Emirados', 'dirhams dos Emirados'], ['fils', 'fils']],
'AUD' => [['dólar australiano', 'dólares australianos'], ['centavo', 'centavos']],
'BAM' => [['marco conversível', 'marcos conversíveis'], ['fening', 'fenings']],
'BGN' => [['lev búlgaro', 'levs búlgaros'], ['stotinka', 'stotinkas']],
'BYR' => [['rublo bielorrusso', 'rublos bielorrussos'], ['kopek', 'kopeks']],
'CAD' => [['dólar canadense', 'dólares canadenses'], ['centavo', 'centavos']],
'CHF' => [['franco suíço', 'francos suíços'], ['rappen', 'rappens']],
'CNY' => [['yuan chinês', 'yuans chineses'], ['fen', 'fens']],
'CYP' => [['libra cipriota', 'libras cipriotas'], ['centavo', 'centavos']],
'CZK' => [['coroa tcheca', 'coroas tchecas'], ['haler', 'halers']],
'DKK' => [['coroa dinamarquesa', 'coroas dinamarquesas'], ['øre', 'øre']],
'DZD' => [['dinar argelino', 'dinares argelinos'], ['santim', 'santims']],
'EEK' => [['coroa estoniana', 'coroas estonianas'], ['sent', 'sents']],
'EGP' => [['libra egípcia', 'libras egípcias'], ['piastra', 'piastras']],
'HKD' => [['dólar de Hong Kong', 'dólares de Hong Kong'], ['centavo', 'centavos']],
'HRK' => [['kuna croata', 'kunas croatas'], ['lipa', 'lipas']],
'HUF' => [['florim húngaro', 'florins húngaros'], ['fillér', 'fillérs']],
'IDR' => [['rupia indonésia', 'rupias indonésias'], ['sen', 'sens']],
'ILS' => [['shekel israelense', 'shekels israelenses'], ['agora', 'agoras']],
'ISK' => [['coroa islandesa', 'coroas islandesas'], ['eyrir', 'eyrir']],
'LTL' => [['litas lituano', 'litas lituanos'], ['centas', 'centai']],
'LVL' => [['lats letão', 'lats letões'], ['santim', 'santims']],
'LYD' => [['dinar líbio', 'dinares líbios'], ['dirham', 'dirhams']],
'MAD' => [['dirham marroquino', 'dirhams marroquinos'], ['santim', 'santims']],
'MKD' => [['denar macedônio', 'denares macedônios'], ['deni', 'denis']],
'MRO' => [['uguia mauritana', 'uguias mauritanas'], ['khoums', 'khoums']],
'MTL' => [['lira maltesa', 'liras maltesas'], ['centavo', 'centavos']],
'MYR' => [['ringgit malaio', 'ringgits malaios'], ['sen', 'sens']],
'NGN' => [['naira nigeriana', 'nairas nigerianas'], ['kobo', 'kobos']],
'NOK' => [['coroa norueguesa', 'coroas norueguesas'], ['øre', 'øre']],
'PHP' => [['peso filipino', 'pesos filipinos'], ['sentavo', 'sentavos']],
'PLN' => [['zloty polonês', 'zlotys poloneses'], ['grosz', 'groszs']],
'ROL' => [['leu romeno', 'lei romenos'], ['ban', 'bans']],
'RUB' => [['rublo russo', 'rublos russos'], ['kopek', 'kopeks']],
'SAR' => [['riyal saudita', 'riyals sauditas'], ['halala', 'halalas']],
'SEK' => [['coroa sueca', 'coroas suecas'], ['öre', 'öre']],
'SIT' => [['tolar esloveno', 'tolars eslovenos'], ['stotin', 'stotins']],
'SKK' => [['coroa eslovaca', 'coroas eslovacas'], ['haler', 'halers']],
'TMT' => [['manat turcomeno', 'manats turcomenos'], ['tenge', 'tenges']],
'TND' => [['dinar tunisino', 'dinares tunisinos'], ['millim', 'millims']],
'TRL' => [['lira turca', 'liras turcas'], ['kuruş', 'kuruş']],
'TRY' => [['lira turca', 'liras turcas'], ['kuruş', 'kuruş']],
'UAH' => [['hryvnia ucraniana', 'hryvnias ucranianas'], ['kopek', 'kopeks']],
'UZS' => [['sum uzbeque', 'sums uzbeques'], ['tiyin', 'tiyins']],
'XAF' => [['franco CFA', 'francos CFA'], ['santim', 'santims']],
'XOF' => [['franco CFA', 'francos CFA'], ['santim', 'santims']],
'XPF' => [['franco CFP', 'francos CFP'], ['santim', 'santims']],
'YUM' => [['dinar iugoslavo', 'dinares iugoslavos'], ['para', 'paras']],
'ZAR' => [['rand sul-africano', 'rands sul-africanos'], ['centavo', 'centavos']],
```

- [ ] **Step 2: Add test cases**

Open `tests/CurrencyTransformer/PortugueseBrazilianCurrencyTransformerTest.php`. Append to the return array:

```php
[500, 'GBP', 'cinco libras esterlinas'],
[100, 'JPY', 'um iene'],
[300, 'RUB', 'três rublos russos'],
[200, 'SAR', 'dois riyals sauditas'],
[100, 'ZAR', 'um rand sul-africano'],
```

- [ ] **Step 3: Run tests**

```bash
vendor/bin/phpunit --filter PortugueseBrazilianCurrencyTransformerTest
```

Expected: all pass.

---

## Task 7 — Romanian (`src/Language/Romanian/Dictionary.php`)

**Files:**
- Modify: `src/Language/Romanian/Dictionary.php`
- Modify: `tests/CurrencyTransformer/RomanianCurrencyTransformerTest.php`

- [ ] **Step 1: Check Gender enum import**

Open `src/Language/Romanian/Dictionary.php` and verify the `Gender` class import and the format of existing entries (they use `Gender::GENDER_MASCULINE`, `Gender::GENDER_FEMININE`, or `Gender::GENDER_ABSTRACT`).

- [ ] **Step 2: Add missing currencies**

Append to `$currencyNames`. Use `Gender::GENDER_MASCULINE` for masculine nouns (dolar, dinar, franc, forint, leu, real, peso, rublu, rand), `Gender::GENDER_FEMININE` for feminine nouns (coroană, liră, rupie, kuna, krone):

```php
'ALL' => [['lek albanez', 'leki albanezi', Gender::GENDER_MASCULINE], ['qindarka', 'qindarki', Gender::GENDER_FEMININE]],
'AED' => [['dirham emiratez', 'dirhami emiratezi', Gender::GENDER_MASCULINE], ['fils', 'fils', Gender::GENDER_MASCULINE]],
'BAM' => [['marcă convertibilă', 'mărci convertibile', Gender::GENDER_FEMININE], ['fenig', 'fenigi', Gender::GENDER_MASCULINE]],
'BGN' => [['lev bulgăresc', 'leva bulgărești', Gender::GENDER_MASCULINE], ['stotinka', 'stotinki', Gender::GENDER_FEMININE]],
'BRL' => [['real brazilian', 'reali brazilieni', Gender::GENDER_MASCULINE], ['centavo', 'centavos', Gender::GENDER_MASCULINE]],
'BYR' => [['rublă belarusă', 'ruble belaruse', Gender::GENDER_FEMININE], ['copeică', 'copeici', Gender::GENDER_FEMININE]],
'CNY' => [['yuan chinezesc', 'yuani chinezești', Gender::GENDER_MASCULINE], ['fen', 'feni', Gender::GENDER_MASCULINE]],
'CYP' => [['liră cipriotă', 'lire cipriote', Gender::GENDER_FEMININE], ['cent', 'cenți', Gender::GENDER_MASCULINE]],
'DKK' => [['coroană daneză', 'coroane daneze', Gender::GENDER_FEMININE], ['øre', 'øre', Gender::GENDER_MASCULINE]],
'DZD' => [['dinar algerian', 'dinari algerieni', Gender::GENDER_MASCULINE], ['santim', 'santimi', Gender::GENDER_MASCULINE]],
'EEK' => [['coroană estoniană', 'coroane estoniene', Gender::GENDER_FEMININE], ['sent', 'senți', Gender::GENDER_MASCULINE]],
'EGP' => [['liră egipteană', 'lire egiptene', Gender::GENDER_FEMININE], ['piastru', 'piaștri', Gender::GENDER_MASCULINE]],
'HKD' => [['dolar Hong Kong', 'dolari Hong Kong', Gender::GENDER_MASCULINE], ['cent', 'cenți', Gender::GENDER_MASCULINE]],
'HRK' => [['kuna croată', 'kune croate', Gender::GENDER_FEMININE], ['lipa', 'lipe', Gender::GENDER_FEMININE]],
'IDR' => [['rupie indoneziană', 'rupii indoneziene', Gender::GENDER_FEMININE], ['sen', 'seni', Gender::GENDER_MASCULINE]],
'ILS' => [['șekel israelian', 'șekeli israelieni', Gender::GENDER_MASCULINE], ['agorot', 'agorot', Gender::GENDER_MASCULINE]],
'ISK' => [['coroană islandeză', 'coroane islandeze', Gender::GENDER_FEMININE], ['eyrir', 'eyrir', Gender::GENDER_MASCULINE]],
'LTL' => [['litas lituanian', 'litași lituanieni', Gender::GENDER_MASCULINE], ['cent', 'cenți', Gender::GENDER_MASCULINE]],
'LVL' => [['lats leton', 'lați letoni', Gender::GENDER_MASCULINE], ['santim', 'santimi', Gender::GENDER_MASCULINE]],
'LYD' => [['dinar libian', 'dinari libieni', Gender::GENDER_MASCULINE], ['dirham', 'dirhami', Gender::GENDER_MASCULINE]],
'MAD' => [['dirham marocan', 'dirhami marocani', Gender::GENDER_MASCULINE], ['santim', 'santimi', Gender::GENDER_MASCULINE]],
'MKD' => [['denar macedonean', 'denari macedoneni', Gender::GENDER_MASCULINE], ['deni', 'deni', Gender::GENDER_MASCULINE]],
'MRO' => [['ouguiya mauritaniană', 'ouguiya mauritaniene', Gender::GENDER_FEMININE], ['khoums', 'khoums', Gender::GENDER_MASCULINE]],
'MTL' => [['liră malteză', 'lire malteze', Gender::GENDER_FEMININE], ['cent', 'cenți', Gender::GENDER_MASCULINE]],
'MYR' => [['ringgit malaiez', 'ringgit malaiezieni', Gender::GENDER_MASCULINE], ['sen', 'seni', Gender::GENDER_MASCULINE]],
'NGN' => [['naira nigeriană', 'naire nigeriene', Gender::GENDER_FEMININE], ['kobo', 'kobo', Gender::GENDER_MASCULINE]],
'NOK' => [['coroană norvegiană', 'coroane norvegiene', Gender::GENDER_FEMININE], ['øre', 'øre', Gender::GENDER_MASCULINE]],
'PHP' => [['peso filipinez', 'peso filipinezi', Gender::GENDER_MASCULINE], ['sentavo', 'sentavos', Gender::GENDER_MASCULINE]],
'SAR' => [['rial saudit', 'riali saudiți', Gender::GENDER_MASCULINE], ['halala', 'halala', Gender::GENDER_MASCULINE]],
'SEK' => [['coroană suedeză', 'coroane suedeze', Gender::GENDER_FEMININE], ['öre', 'öre', Gender::GENDER_MASCULINE]],
'SIT' => [['tolar sloven', 'tolari sloveni', Gender::GENDER_MASCULINE], ['stotin', 'stotini', Gender::GENDER_MASCULINE]],
'TMT' => [['manat turkmen', 'manați turkmeni', Gender::GENDER_MASCULINE], ['tenge', 'tenge', Gender::GENDER_MASCULINE]],
'TND' => [['dinar tunisian', 'dinari tunisieni', Gender::GENDER_MASCULINE], ['millim', 'millimi', Gender::GENDER_MASCULINE]],
'UAH' => [['hryvnă ucraineană', 'hryvne ucrainene', Gender::GENDER_FEMININE], ['copeică', 'copeici', Gender::GENDER_FEMININE]],
'UZS' => [['som uzbec', 'somi uzbeci', Gender::GENDER_MASCULINE], ['tiyin', 'tiyini', Gender::GENDER_MASCULINE]],
'XAF' => [['franc CFA', 'franci CFA', Gender::GENDER_MASCULINE], ['santim', 'santimi', Gender::GENDER_MASCULINE]],
'XOF' => [['franc CFA', 'franci CFA', Gender::GENDER_MASCULINE], ['santim', 'santimi', Gender::GENDER_MASCULINE]],
'XPF' => [['franc CFP', 'franci CFP', Gender::GENDER_MASCULINE], ['santim', 'santimi', Gender::GENDER_MASCULINE]],
'YUM' => [['dinar iugoslav', 'dinari iugoslavi', Gender::GENDER_MASCULINE], ['para', 'paras', Gender::GENDER_MASCULINE]],
'ZAR' => [['rand sud-african', 'ranzi sud-africani', Gender::GENDER_MASCULINE], ['cent', 'cenți', Gender::GENDER_MASCULINE]],
```

- [ ] **Step 3: Add test cases**

Open `tests/CurrencyTransformer/RomanianCurrencyTransformerTest.php`. Append to the return array:

```php
[500, 'GBP', 'cinci lire sterline'],
[100, 'JPY', 'un yen japonez'],
[300, 'NOK', 'trei coroane norvegiene'],
[200, 'SAR', 'doi riali saudiți'],
[100, 'ZAR', 'un rand sud-african'],
```

- [ ] **Step 4: Run tests**

```bash
vendor/bin/phpunit --filter RomanianCurrencyTransformerTest
```

Expected: all pass.

---

## Task 8 — German (`GermanDictionary.php`)

**Files:**
- Modify: `src/Language/German/GermanDictionary.php`
- Modify: `tests/CurrencyTransformer/GermanCurrencyTransformerTest.php`

- [ ] **Step 1: Add missing currencies**

Open `src/Language/German/GermanDictionary.php`. Append to `$currencyNames`:

```php
'AED' => [['Dirham der Emirate'], ['Fils']],
'CNY' => [['Chinesischer Yuan'], ['Fen']],
'CYP' => [['Zypriotisches Pfund'], ['Cent']],
'DZD' => [['Algerischer Dinar'], ['Santim']],
'EEK' => [['Estnische Krone', 'Estnische Kronen'], ['Sent']],
'EGP' => [['Ägyptisches Pfund'], ['Piaster']],
'IDR' => [['Indonesische Rupiah'], ['Sen']],
'LTL' => [['Litauischer Litas'], ['Cent']],
'LVL' => [['Lettischer Lats'], ['Santim']],
'LYD' => [['Libyscher Dinar'], ['Dirham']],
'MAD' => [['Marokkanischer Dirham'], ['Santim']],
'MRO' => [['Mauretanischer Ouguiya'], ['Khoums']],
'MTL' => [['Maltesische Lira'], ['Cent']],
'MYR' => [['Malaysischer Ringgit'], ['Sen']],
'NGN' => [['Nigerianische Naira'], ['Kobo']],
'PHP' => [['Philippinischer Peso'], ['Sentavo']],
'ROL' => [['Rumänischer Leu'], ['Ban']],
'SAR' => [['Saudi-Arabischer Riyal'], ['Halala']],
'SIT' => [['Slowenischer Tolar'], ['Stotin']],
'SKK' => [['Slowakische Krone', 'Slowakische Kronen'], ['Haler']],
'TND' => [['Tunesischer Dinar'], ['Millim']],
'XAF' => [['CFA-Franc'], ['Santim']],
'XOF' => [['CFA-Franc'], ['Santim']],
'XPF' => [['CFP-Franc'], ['Santim']],
'YUM' => [['Jugoslawischer Dinar'], ['Para']],
```

- [ ] **Step 2: Add test cases**

Open `tests/CurrencyTransformer/GermanCurrencyTransformerTest.php`. Append to the return array:

```php
[300, 'SAR', 'drei Saudi-Arabischer Riyal'],
[100, 'CNY', 'ein Chinesischer Yuan'],
[500, 'NGN', 'fünf Nigerianische Naira'],
```

- [ ] **Step 3: Run tests**

```bash
vendor/bin/phpunit --filter GermanCurrencyTransformerTest
```

Expected: all pass.

---

## Task 9 — Slovak (`SlovakDictionary.php`)

**Files:**
- Modify: `src/Language/Slovak/SlovakDictionary.php`
- Modify: `tests/CurrencyTransformer/SlovakCurrencyTransformerTest.php`

- [ ] **Step 1: Add missing currencies**

Open `src/Language/Slovak/SlovakDictionary.php`. Append to `$currencyNames` (format: `[['sg','pl-2-4','gen-pl'],['cent-sg','cent-2-4','cent-gen-pl']]`):

```php
'AED' => [['dirham SAE', 'dirhamy SAE', 'dirhamov SAE'], ['fils', 'filsy', 'filsov']],
'CNY' => [['čínsky jüan', 'čínske jüany', 'čínskych jüanov'], ['fen', 'feny', 'fenov']],
'DZD' => [['alžírsky dinár', 'alžírske dináre', 'alžírskych dinárov'], ['santím', 'santímy', 'santímov']],
'EGP' => [['egyptská libra', 'egyptské libry', 'egyptských libier'], ['piaster', 'piastre', 'piastrov']],
'IDR' => [['indonézska rupia', 'indonézske rupie', 'indonézskych rupií'], ['sen', 'seny', 'senov']],
'LYD' => [['líbyjský dinár', 'líbyjské dináre', 'líbyjských dinárov'], ['dirham', 'dirhamy', 'dirhamov']],
'MAD' => [['marocký dirham', 'marocké dirhamy', 'marockých dirhamov'], ['santím', 'santímy', 'santímov']],
'MRO' => [['mauritánska ugija', 'mauritánske ugije', 'mauritánskych ugijí'], ['chums', 'chumsy', 'chumsov']],
'MYR' => [['malajzijský ringgit', 'malajzijské ringgity', 'malajzijských ringgitov'], ['sen', 'seny', 'senov']],
'NGN' => [['nigérijská naira', 'nigérijské nairy', 'nigérijských nair'], ['kobo', 'koby', 'kobov']],
'PHP' => [['filipínske peso', 'filipínske pesá', 'filipínskych pies'], ['sentavo', 'sentava', 'sentavov']],
'SAR' => [['saudskoarabský rijál', 'saudskoarabské rijály', 'saudskoarabských rijálov'], ['halala', 'halaly', 'halalí']],
'TMT' => [['turkménsky manat', 'turkménske manaty', 'turkmánských manatov'], ['tenga', 'tengy', 'tengov']],
'TND' => [['tuniský dinár', 'tuniské dináre', 'tuniských dinárov'], ['millím', 'millímy', 'millímov']],
'XAF' => [['frank CFA', 'franky CFA', 'frankov CFA'], ['santím', 'santímy', 'santímov']],
'XOF' => [['frank CFA', 'franky CFA', 'frankov CFA'], ['santím', 'santímy', 'santímov']],
'XPF' => [['frank CFP', 'franky CFP', 'frankov CFP'], ['santím', 'santímy', 'santímov']],
'YUM' => [['juhoslovanský dinár', 'juhoslovanské dináre', 'juhoslovanských dinárov'], ['para', 'pary', 'parov']],
```

- [ ] **Step 2: Add test cases**

Open `tests/CurrencyTransformer/SlovakCurrencyTransformerTest.php`. Append to the return array:

```php
[300, 'SAR', 'tri saudskoarabské rijály'],
[100, 'CNY', 'jeden čínsky jüan'],
[500, 'NGN', 'päť nigérijských nair'],
```

- [ ] **Step 3: Run tests**

```bash
vendor/bin/phpunit --filter SlovakCurrencyTransformerTest
```

Expected: all pass.

---

## Task 10 — Polish (`PolishDictionary.php`)

**Files:**
- Modify: `src/Language/Polish/PolishDictionary.php`
- Modify: `tests/CurrencyTransformer/PolishCurrencyTransformerTest.php`

- [ ] **Step 1: Add missing currencies**

Open `src/Language/Polish/PolishDictionary.php`. Append to `$currencyNames` (format: `[['sg','pl-2-4','gen-pl'],['cent-sg','cent-2-4','cent-gen-pl']]`):

```php
'AED' => [['dirham ZEA', 'dirhamy ZEA', 'dirhamów ZEA'], ['fils', 'filsy', 'filsów']],
'CNY' => [['juan chiński', 'juany chińskie', 'juanów chińskich'], ['fen', 'feny', 'fenów']],
'DZD' => [['dinar algierski', 'dinary algierskie', 'dinarów algierskich'], ['santym', 'santymy', 'santymów']],
'EGP' => [['funt egipski', 'funty egipskie', 'funtów egipskich'], ['piaster', 'piastry', 'piastrów']],
'IDR' => [['rupia indonezyjska', 'rupie indonezyjskie', 'rupii indonezyjskich'], ['sen', 'seny', 'senów']],
'LYD' => [['dinar libijski', 'dinary libijskie', 'dinarów libijskich'], ['dirham', 'dirhamy', 'dirhamów']],
'MAD' => [['dirham marokański', 'dirhamy marokańskie', 'dirhamów marokańskich'], ['santym', 'santymy', 'santymów']],
'MRO' => [['ugija mauretańska', 'ugije mauretańskie', 'ugij mauretańskich'], ['chum', 'chumy', 'chumów']],
'MYR' => [['ringgit malezyjski', 'ringgity malezyjskie', 'ringgitów malezyjskich'], ['sen', 'seny', 'senów']],
'NGN' => [['naira nigeryjska', 'nairy nigeryjskie', 'nair nigeryjskich'], ['kobo', 'kobo', 'kobo']],
'PHP' => [['peso filipińskie', 'peso filipińskie', 'peso filipińskich'], ['sentavo', 'sentavo', 'sentavo']],
'SAR' => [['rial saudyjski', 'riale saudyjskie', 'riali saudyjskich'], ['halala', 'halala', 'halala']],
'TMT' => [['manat turkmeński', 'manaty turkmeńskie', 'manatów turkmeńskich'], ['tenga', 'tengi', 'tengów']],
'TND' => [['dinar tunezyjski', 'dinary tunezyjskie', 'dinarów tunezyjskich'], ['millim', 'millimy', 'millimów']],
'XAF' => [['frank CFA', 'franki CFA', 'franków CFA'], ['santym', 'santymy', 'santymów']],
'XOF' => [['frank CFA', 'franki CFA', 'franków CFA'], ['santym', 'santymy', 'santymów']],
'XPF' => [['frank CFP', 'franki CFP', 'franków CFP'], ['santym', 'santymy', 'santymów']],
'YUM' => [['dinar jugosłowiański', 'dinary jugosłowiańskie', 'dinarów jugosłowiańskich'], ['para', 'pary', 'parów']],
```

- [ ] **Step 2: Add test cases**

Open `tests/CurrencyTransformer/PolishCurrencyTransformerTest.php`. Append to the return array:

```php
[300, 'SAR', 'trzy riale saudyjskie'],
[100, 'CNY', 'jeden juan chiński'],
[500, 'NGN', 'pięć nair nigeryjskich'],
```

- [ ] **Step 3: Run tests**

```bash
vendor/bin/phpunit --filter PolishCurrencyTransformerTest
```

Expected: all pass.

---

## Task 11 — Hungarian (`Hu.php`)

**Files:**
- Modify: `src/Legacy/Numbers/Words/Locale/Hu.php`
- Modify: `tests/CurrencyTransformer/HungarianCurrencyTransformerTest.php`

- [ ] **Step 1: Check format and add missing currencies**

Open `src/Legacy/Numbers/Words/Locale/Hu.php`. Verify the existing `$currencyNames` format (simple `[['singular'], ['subunit']]`), then append:

```php
'AED' => [['emírségi dirham'], ['fils']],
'CNY' => [['kínai jüan'], ['fen']],
'DZD' => [['algériai dínár'], ['szantim']],
'EGP' => [['egyiptomi font'], ['piaszter']],
'IDR' => [['indonéz rúpia'], ['szén']],
'LYD' => [['líbiai dínár'], ['dirham']],
'MAD' => [['marokkói dirham'], ['szantim']],
'MRO' => [['mauritániai ugija'], ['kum']],
'MYR' => [['malajziai ringgit'], ['szén']],
'NGN' => [['nigériai naira'], ['kobo']],
'PHP' => [['fülöp-szigeteki peso'], ['szentavo']],
'ROL' => [['román lej'], ['ban']],
'SAR' => [['szaúd-arábiai rijál'], ['halala']],
'SKK' => [['szlovák korona'], ['halér']],
'TMT' => [['türkmén manat'], ['tenge']],
'TND' => [['tunéziai dínár'], ['millim']],
'XAF' => [['CFA frank'], ['szantim']],
'XOF' => [['CFA frank'], ['szantim']],
'XPF' => [['CFP frank'], ['szantim']],
'YUM' => [['jugoszláv dínár'], ['para']],
'UZS' => [['üzbég szom'], ['tijn']],
```

- [ ] **Step 2: Add test cases**

Open `tests/CurrencyTransformer/HungarianCurrencyTransformerTest.php`. Append to the return array:

```php
[300, 'SAR', 'három szaúd-arábiai rijál'],
[100, 'CNY', 'egy kínai jüan'],
[500, 'NGN', 'öt nigériai naira'],
```

- [ ] **Step 3: Run tests**

```bash
vendor/bin/phpunit --filter HungarianCurrencyTransformerTest
```

Expected: all pass.

---

## Task 12 — Turkish (`Tr.php`)

**Files:**
- Modify: `src/Legacy/Numbers/Words/Locale/Tr.php`
- Modify: `tests/CurrencyTransformer/TurkishCurrencyTransformerTest.php`

- [ ] **Step 1: Add missing currencies**

Open `src/Legacy/Numbers/Words/Locale/Tr.php`. Verify existing format, then append:

```php
'AED' => [['Birleşik Arap Emirlikleri dirhemi'], ['fils']],
'DZD' => [['Cezayir dinarı'], ['santim']],
'EGP' => [['Mısır poundu'], ['kuruş']],
'IDR' => [['Endonezya rupisi'], ['sen']],
'LYD' => [['Libya dinarı'], ['dirhem']],
'MAD' => [['Fas dirhemi'], ['santim']],
'MRO' => [['Moritanya ugiyası'], ['kum']],
'MYR' => [['Malezya ringgiti'], ['sen']],
'NGN' => [['Nijerya nairası'], ['kobo']],
'PHP' => [['Filipin pezosu'], ['sentavo']],
'SAR' => [['Suudi Arabistan riyali'], ['halala']],
'TMT' => [['Türkmen manatı'], ['teňňe']],
'TND' => [['Tunus dinarı'], ['milim']],
'UZS' => [['Özbek somu'], ['tiyin']],
'XAF' => [['CFA frangı'], ['santim']],
'XOF' => [['CFA frangı'], ['santim']],
'XPF' => [['CFP frangı'], ['santim']],
```

- [ ] **Step 2: Add test cases**

Open `tests/CurrencyTransformer/TurkishCurrencyTransformerTest.php`. Append to the return array:

```php
[300, 'SAR', 'üç Suudi Arabistan riyali'],
[100, 'CNY', 'bir Çin yuanı'],
[500, 'NGN', 'beş Nijerya nairası'],
```

- [ ] **Step 3: Run tests**

```bash
vendor/bin/phpunit --filter TurkishCurrencyTransformerTest
```

Expected: all pass.

---

## Task 13 — Russian (`Ru.php`)

**Files:**
- Modify: `src/Legacy/Numbers/Words/Locale/Ru.php`
- Modify: `tests/CurrencyTransformer/RussianCurrencyTransformerTest.php`

- [ ] **Step 1: Check Russian format**

Open `src/Legacy/Numbers/Words/Locale/Ru.php`. The Russian format is complex — it uses gender and three grammatical forms. Look at an existing entry like `'USD'` to understand the exact array structure, then replicate it for the entries below.

- [ ] **Step 2: Add missing currencies**

Following the exact format of existing entries in `Ru.php`, add:

```
AED: дирхам ОАЭ (m) / дирхамы / дирхамов | филс / филсы / филсов
BAM: конвертируемая марка (f) / марки / марок | фениг / фениги / фенигов
DZD: алжирский динар (m) / динары / динаров | сантим / сантимы / сантимов
EGP: египетский фунт (m) / фунты / фунтов | пиастр / пиастры / пиастров
ILS: израильский шекель (m) / шекели / шекелей | агора / агоры / агор
IDR: индонезийская рупия (f) / рупии / рупий | сен / сены / сенов
LYD: ливийский динар (m) / динары / динаров | дирхам / дирхамы / дирхамов
MAD: марокканский дирхам (m) / дирхамы / дирхамов | сантим / сантимы / сантимов
MRO: мавританская угия (f) / угии / угий | хум / хумы / хумов
MYR: малайзийский ринггит (m) / ринггиты / ринггитов | сен / сены / сенов
NGN: нигерийская найра (f) / найры / найр | кобо / кобо / кобо
PHP: филиппинское песо (n) / песо / песо | сентаво / сентаво / сентаво
SAR: саудовский риял (m) / рияли / риялов | халала / халала / халала
TND: тунисский динар (m) / динары / динаров | миллим / миллимы / миллимов
XAF: франк КФА (m) / франки / франков | сантим / сантимы / сантимов
XOF: франк КФА (m) / франки / франков | сантим / сантимы / сантимов
XPF: франк КФП (m) / франки / франков | сантим / сантимы / сантимов
CZK: чешская крона (f) / кроны / крон | геллер / геллеры / геллеров
```

**Important:** Read existing Russian entries carefully to match the exact array structure (it may use a special class or array with gender markers).

- [ ] **Step 3: Add test cases**

Open `tests/CurrencyTransformer/RussianCurrencyTransformerTest.php`. Append to the return array:

```php
[300, 'SAR', 'три саудовских рияла'],
[100, 'AED', 'один дирхам ОАЭ'],
[500, 'NGN', 'пять нигерийских найр'],
```

- [ ] **Step 4: Run tests**

```bash
vendor/bin/phpunit --filter RussianCurrencyTransformerTest
```

Expected: all pass.

---

## Task 14 — Ukrainian (`Ua.php`)

**Files:**
- Modify: `src/Legacy/Numbers/Words/Locale/Ua.php`
- Modify: `tests/CurrencyTransformer/UkrainianCurrencyTransformerTest.php`

- [ ] **Step 1: Check Ukrainian format**

Open `src/Legacy/Numbers/Words/Locale/Ua.php`. It likely extends the Russian locale with Ukrainian-specific currency names. Check the exact format by looking at existing entries.

- [ ] **Step 2: Add missing currencies**

Following the exact format of existing entries in `Ua.php`, add:

```
AED: дирхам ОАЕ (m) / дирхами / дирхамів | філс / філси / філсів
BAM: конвертована марка (f) / марки / марок | фенінг / фенінги / фенінгів
CNY: китайський юань (m) / юані / юанів | фень / фені / фенів
DZD: алжирський динар (m) / динари / динарів | сантим / сантими / сантимів
EGP: єгипетський фунт (m) / фунти / фунтів | піастр / піастри / піастрів
ILS: ізраїльський шекель (m) / шекелі / шекелів | агора / агори / агор
IDR: індонезійська рупія (f) / рупії / рупій | сен / сени / сенів
LYD: лівійський динар (m) / динари / динарів | дирхам / дирхами / дирхамів
MAD: марокканський дирхам (m) / дирхами / дирхамів | сантим / сантими / сантимів
MRO: мавританська угія (f) / угії / угій | хум / хуми / хумів
MYR: малайзійський рингіт (m) / рингіти / рингітів | сен / сени / сенів
NGN: нігерійська найра (f) / найри / найр | кобо / кобо / кобо
PHP: філіппінське песо (n) / песо / песо | сентаво / сентаво / сентаво
SAR: саудівський ріял (m) / ріяли / ріялів | хлала / хлала / хлала
TMT: туркменський манат (m) / манати / манатів | тенге / тенге / тенге
TND: туніський динар (m) / динари / динарів | міллім / мілліми / міллімів
UZS: узбецький сум (m) / суми / сумів | тийін / тийіни / тийінів
XAF: франк КФА (m) / франки / франків | сантим / сантими / сантимів
XOF: франк КФА (m) / франки / франків | сантим / сантими / сантимів
XPF: франк КФП (m) / франки / франків | сантим / сантими / сантимів
```

- [ ] **Step 3: Add test cases**

Open `tests/CurrencyTransformer/UkrainianCurrencyTransformerTest.php`. Append to the return array:

```php
[300, 'SAR', 'три саудівських ріяли'],
[100, 'AED', 'один дирхам ОАЕ'],
[500, 'NGN', 'п\'ять нігерійських найр'],
```

- [ ] **Step 4: Run tests**

```bash
vendor/bin/phpunit --filter UkrainianCurrencyTransformerTest
```

Expected: all pass.

---

## Task 15 — Georgian (`Ka.php`)

**Files:**
- Modify: `src/Legacy/Numbers/Words/Locale/Ka.php`
- Modify: `tests/CurrencyTransformer/GeorgianCurrencyTransformerTest.php`

- [ ] **Step 1: Add missing currencies**

Open `src/Legacy/Numbers/Words/Locale/Ka.php`. Verify the format (simple `[['singular','plural'],['subunit']]`), then append the currencies that are missing from the base list. Before adding, verify which ones are truly missing by checking the existing `$currencyNames` keys (the agent listed ~54 existing currencies, so the gap may be smaller than expected).

Add any from the base list that are absent:

```php
'CYP' => [['კვიპროსის გირვანქა', 'კვიპროსის გირვანქები'], ['ცენტი']],
'EEK' => [['ესტონური კრონი', 'ესტონური კრონები'], ['სენტი']],
'EGP' => [['ეგვიპტური გირვანქა', 'ეგვიპტური გირვანქები'], ['პიასტრი']],
'HRK' => [['ხორვატული კუნა', 'ხორვატული კუნები'], ['ლიპა']],
'IDR' => [['ინდონეზიური რუფია', 'ინდონეზიური რუფიები'], ['სენი']],
'LVL' => [['ლატვიური ლატი', 'ლატვიური ლატები'], ['სანტიმი']],
'MRO' => [['მავრიტანული უგია', 'მავრიტანული უგიები'], ['ხუმი']],
'MTL' => [['მალტური ლირა', 'მალტური ლირები'], ['ცენტი']],
'MYR' => [['მალაიზიური რინგიტი', 'მალაიზიური რინგიტები'], ['სენი']],
'NGN' => [['ნიგერიული ნაირა', 'ნიგერიული ნაირები'], ['კობო']],
'PHP' => [['ფილიპინური პესო', 'ფილიპინური პესოები'], ['სენტავო']],
'ROL' => [['რუმინული ლეი', 'რუმინული ლეიები'], ['ბანი']],
'SAR' => [['საუდის არაბეთის რიალი', 'საუდის არაბეთის რიალები'], ['ჰალალა']],
'SIT' => [['სლოვენური ტოლარი', 'სლოვენური ტოლარები'], ['სტოტინი']],
'SKK' => [['სლოვაკური კრონი', 'სლოვაკური კრონები'], ['ჰელერი']],
'XAF' => [['CFA ფრანკი', 'CFA ფრანკები'], ['სანტიმი']],
'YUM' => [['იუგოსლავიური დინარი', 'იუგოსლავიური დინარები'], ['პარა']],
```

- [ ] **Step 2: Add test cases**

Open `tests/CurrencyTransformer/GeorgianCurrencyTransformerTest.php`. Append to the return array:

```php
[300, 'SAR', 'სამი საუდის არაბეთის რიალი'],
[100, 'NGN', 'ერთი ნიგერიული ნაირა'],
[500, 'MYR', 'ხუთი მალაიზიური რინგიტი'],
```

- [ ] **Step 3: Run tests**

```bash
vendor/bin/phpunit --filter GeorgianCurrencyTransformerTest
```

Expected: all pass.

---

## Task 16 — Swahili (`Sw.php`)

**Files:**
- Modify: `src/Legacy/Numbers/Words/Locale/Sw.php`
- Modify: `tests/CurrencyTransformer/SwahiliCurrencyTransformerTest.php`

- [ ] **Step 1: Add missing currencies**

Open `src/Legacy/Numbers/Words/Locale/Sw.php`. Verify the format, then append:

```php
'ALL' => [['lek ya Albania', 'lek za Albania'], ['qindarka', 'qindarka']],
'BAM' => [['alama ya Bosnia', 'alama za Bosnia'], ['fening', 'fening']],
'BGN' => [['lev ya Bulgaria', 'lev za Bulgaria'], ['stotinka', 'stotinka']],
'BYR' => [['ruble ya Belarusi', 'ruble za Belarusi'], ['kopek', 'kopek']],
'CYP' => [['pauni ya Kipro', 'pauni za Kipro'], ['senti', 'senti']],
'CZK' => [['korona ya Cheki', 'korona za Cheki'], ['haler', 'haler']],
'DKK' => [['korona ya Denmark', 'korona za Denmark'], ['øre', 'øre']],
'DZD' => [['dinari ya Aljeria', 'dinari za Aljeria'], ['santim', 'santim']],
'EEK' => [['korona ya Estonia', 'korona za Estonia'], ['senti', 'senti']],
'HKD' => [['dola ya Hong Kong', 'dola za Hong Kong'], ['senti', 'senti']],
'HRK' => [['kuna ya Kroatia', 'kuna za Kroatia'], ['lipa', 'lipa']],
'HUF' => [['forinti ya Hungaria', 'forinti za Hungaria'], ['filler', 'filler']],
'IDR' => [['rupia ya Indonesia', 'rupia za Indonesia'], ['sen', 'sen']],
'ILS' => [['shekeli ya Israeli', 'shekeli za Israeli'], ['agora', 'agora']],
'ISK' => [['korona ya Aisilandi', 'korona za Aisilandi'], ['eyrir', 'eyrir']],
'LTL' => [['litas ya Lithwania', 'litas za Lithwania'], ['senti', 'senti']],
'LVL' => [['lats ya Latvia', 'lats za Latvia'], ['santim', 'santim']],
'LYD' => [['dinari ya Libya', 'dinari za Libya'], ['dirham', 'dirham']],
'MAD' => [['dirham ya Moroko', 'dirham za Moroko'], ['santim', 'santim']],
'MKD' => [['denar ya Masedonia', 'denar za Masedonia'], ['deni', 'deni']],
'MRO' => [['ouguiya ya Mauritania', 'ouguiya za Mauritania'], ['khoums', 'khoums']],
'MTL' => [['lira ya Malta', 'lira za Malta'], ['senti', 'senti']],
'MYR' => [['ringgit ya Malaysia', 'ringgit za Malaysia'], ['sen', 'sen']],
'NOK' => [['korona ya Norwe', 'korona za Norwe'], ['øre', 'øre']],
'PHP' => [['peso ya Ufilipino', 'peso za Ufilipino'], ['sentavo', 'sentavo']],
'PLN' => [['zloty ya Poland', 'zloty za Poland'], ['grosz', 'grosz']],
'ROL' => [['leu ya Romania', 'leu za Romania'], ['ban', 'ban']],
'RUB' => [['ruble ya Urusi', 'ruble za Urusi'], ['kopek', 'kopek']],
'SEK' => [['korona ya Uswidi', 'korona za Uswidi'], ['öre', 'öre']],
'SIT' => [['tolar ya Slovenia', 'tolar za Slovenia'], ['stotin', 'stotin']],
'SKK' => [['korona ya Slovakia', 'korona za Slovakia'], ['haler', 'haler']],
'TMT' => [['manat ya Turkmenistan', 'manat za Turkmenistan'], ['tenge', 'tenge']],
'TND' => [['dinari ya Tunisia', 'dinari za Tunisia'], ['millim', 'millim']],
'TRL' => [['lira ya Uturuki', 'lira za Uturuki'], ['kuruş', 'kuruş']],
'TRY' => [['lira ya Uturuki', 'lira za Uturuki'], ['kuruş', 'kuruş']],
'UAH' => [['hryvnia ya Ukraine', 'hryvnia za Ukraine'], ['kopek', 'kopek']],
'UZS' => [['som ya Uzbekistani', 'som za Uzbekistani'], ['tiyin', 'tiyin']],
'XAF' => [['faranga CFA', 'faranga CFA'], ['santim', 'santim']],
'XOF' => [['faranga CFA', 'faranga CFA'], ['santim', 'santim']],
'XPF' => [['faranga CFP', 'faranga CFP'], ['santim', 'santim']],
'YUM' => [['dinari ya Yugoslavia', 'dinari za Yugoslavia'], ['para', 'para']],
```

- [ ] **Step 2: Add test cases**

Open `tests/CurrencyTransformer/SwahiliCurrencyTransformerTest.php`. Append to the return array:

```php
[300, 'RUB', 'tatu ruble za Urusi'],
[100, 'PLN', 'moja zloty ya Poland'],
[500, 'MYR', 'tano ringgit za Malaysia'],
```

- [ ] **Step 3: Run tests**

```bash
vendor/bin/phpunit --filter SwahiliCurrencyTransformerTest
```

Expected: all pass.

---

## Task 17 — Indonesian (`Id.php`)

**Files:**
- Modify: `src/Legacy/Numbers/Words/Locale/Id.php`
- Modify: `tests/CurrencyTransformer/IndonesianCurrencyTransformerTest.php`

- [ ] **Step 1: Add missing currencies**

Open `src/Legacy/Numbers/Words/Locale/Id.php`. Verify format (simple `[['name'],['subunit']]`), then append:

```php
'AED' => [['dirham Uni Emirat Arab'], ['fils']],
'CNY' => [['yuan Tiongkok'], ['fen']],
'EGP' => [['pound Mesir'], ['piastre']],
'MYR' => [['ringgit Malaysia'], ['sen']],
'SAR' => [['riyal Arab Saudi'], ['halala']],
'UZS' => [['sum Uzbekistan'], ['tiyin']],
```

- [ ] **Step 2: Add test cases**

Open `tests/CurrencyTransformer/IndonesianCurrencyTransformerTest.php`. Append to the return array:

```php
[300, 'SAR', 'tiga riyal Arab Saudi'],
[100, 'CNY', 'satu yuan Tiongkok'],
[500, 'MYR', 'lima ringgit Malaysia'],
```

- [ ] **Step 3: Run tests**

```bash
vendor/bin/phpunit --filter IndonesianCurrencyTransformerTest
```

Expected: all pass.

---

## Task 18 — Malay (`Ms.php`)

**Files:**
- Modify: `src/Legacy/Numbers/Words/Locale/Ms.php`
- Modify: `tests/CurrencyTransformer/MalayCurrencyTransformerTest.php`

- [ ] **Step 1: Add missing currencies**

Open `src/Legacy/Numbers/Words/Locale/Ms.php`. Verify format, then append:

```php
'AED' => [['dirham UAE'], ['fils']],
'CNY' => [['yuan China'], ['fen']],
'EGP' => [['paun Mesir'], ['piastre']],
'SAR' => [['riyal Arab Saudi'], ['halala']],
'UZS' => [['sum Uzbekistan'], ['tiyin']],
```

- [ ] **Step 2: Add test cases**

Open `tests/CurrencyTransformer/MalayCurrencyTransformerTest.php`. Append to the return array:

```php
[300, 'SAR', 'tiga riyal Arab Saudi'],
[100, 'CNY', 'satu yuan China'],
[500, 'AED', 'lima dirham UAE'],
```

- [ ] **Step 3: Run tests**

```bash
vendor/bin/phpunit --filter MalayCurrencyTransformerTest
```

Expected: all pass.

---

## Task 19 — Full test suite

- [ ] **Run all tests**

```bash
vendor/bin/phpunit
```

Expected: all tests pass, 0 failures.
