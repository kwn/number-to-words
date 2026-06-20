# Base Currency List — Design Spec

**Date:** 2026-06-20

## Problem

Currency transformers in this project have wildly inconsistent currency coverage:
- Latvian, Lithuanian, Turkmen: 2 currencies each
- Danish, French, Romanian, PortugueseBrazilian: 12–14 currencies
- Albanian, Arabic, English, Serbian: ~45–50 currencies (de facto standard)

Users calling `getCurrencyTransformer('lv')->toWords(100, 'GBP')` get a `NumberToWordsException` even though GBP is a major world currency.

## Goal

Every currency transformer supports a canonical base list of 51 currencies. Currency names are written in the native language of the transformer (same policy as number translations).

## Base Currency List (51)

```
ALL  AED  AUD  BAM  BGN  BRL  BYR  CAD  CHF  CNY
CYP  CZK  DKK  DZD  EEK  EGP  EUR  GBP  HKD  HRK
HUF  IDR  ILS  ISK  JPY  LTL  LVL  LYD  MAD  MKD
MRO  MTL  MYR  NGN  NOK  PHP  PLN  ROL  RUB  SAR
SEK  SIT  SKK  TMT  TND  TRL  TRY  UAH  USD  UZS
XAF  XOF  XPF  YUM  ZAR
```

Rationale for list: union of Albanian + Arabic + English + Serbian transformers, extended with IDR (Indonesian Rupiah) and MYR (Malaysian Ringgit) which are natively supported by Indonesian/Malay transformers.

## Transformers to Update

| Transformer | Current | Missing |
|---|---|---|
| Latvian | 2 | 49 |
| Lithuanian | 2 | 49 (+ bug: 'LT' → 'LTL') |
| Turkmen | 2 | 49 |
| PortugueseBrazilian | 12 | 39 |
| Danish | 13 | 38 |
| French | 14 | 37 |
| Romanian | 14 | 37 |
| Swahili | 15 | 36 |
| Georgian | ~35 | ~16 |
| Turkish | ~33 | ~18 |
| Hungarian | ~33 | ~18 |
| German | ~32 | ~19 |
| Slovak | ~34 | ~17 |
| Polish | ~34 | ~17 |
| Ukrainian | ~35 | ~16 |
| Russian | ~37 | ~14 |
| Indonesian | ~35 | ~16 |
| Malay | ~35 | ~16 |

Transformers already complete (or near-complete): Albanian, Arabic, Azerbaijani, Bulgarian, English, Serbian, Spanish, Uzbek, Yoruba.

## Currency Name Format

Each transformer type has its own format:

**Modern (Language/*/Dictionary.php):**
```php
'USD' => [['singular', 'plural-2-4', 'genitive-plural'], ['cent-sing', 'cent-pl-2-4', 'cent-gen-pl']],
```
Used by: Latvian, Lithuanian, Romanian, German, Slovak, Polish, Albanian, Azerbaijani, etc.

**Legacy (Legacy/Numbers/Words/Locale/*.php):**
```php
'USD' => [['singular', 'plural'], ['cent']],
// or with single form:
'USD' => [['dollar'], ['cent']],
```
Used by: Danish, French, Turkmen, Hungarian, Turkish, Russian, Ukrainian, Indonesian, Malay, Georgian, Swahili, PortugueseBrazilian.

## Currency Names

All new entries are written in the native language of each transformer. Where grammatical forms are required (Slavic languages: singular/plural 2–4/genitive plural), all three forms are provided. Where the transformer uses a simpler format (single or singular+plural), that format is matched.

If a currency does not have a widely established native-language name, the internationally recognised English name is used (e.g. "yen", "franc").

## Testing

For each updated transformer, add 3–5 new test cases covering:
- A newly added major currency with no subunits (e.g. JPY)
- A newly added currency with subunits (e.g. GBP with pence)
- At least one non-European currency (e.g. SAR, CNY, or NGN)

## Implementation Approach

All transformers updated in parallel via subagents grouped by type:
- Group 1: Modern Dictionary.php transformers (Latvian, Lithuanian)
- Group 2: Legacy simple-format transformers (Danish, Turkmen, PortugueseBrazilian, French)
- Group 3: Legacy Slavic-adjacent transformers (Russian, Ukrainian, Hungarian, Turkish)
- Group 4: Remaining legacy (Georgian, Swahili, Indonesian, Malay)
- Group 5: Modern Dictionary.php transformers with smaller gaps (German, Romanian, Slovak, Polish)

Each group's work is independent. Tests run after all groups complete.
