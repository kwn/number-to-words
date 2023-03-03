# PHP Number to words converter

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.2-8892BF.svg?style=flat-square)](https://php.net/)
[![GitHub release](https://img.shields.io/github/v/release/ppalashturov/number-to-words)](https://github.com/ppalashturov/number-to-words)

This library allows you to convert a number to words.

## Installation

Add package to your composer.json by running:

```
$ composer require ppalashturov/number-to-words
```

## Usage

This library currently has two types of number-to-words transformations: number and currency. In order to use a specific transformer for certain language you need to create an instance of `NumberToWords` class and then call a method which creates a new instance of a transformer;

### Number Transformer

Before using a transformer, it must be created:

```php
use NumberToWords\NumberToWords;

// create the number to words "manager" class
$numberToWords = new NumberToWords();

// build a new number transformer using the RFC 3066 language identifier
$numberTransformer = $numberToWords->getNumberTransformer('en');
```

Then it can be used passing in numeric values to the `toWords()` method:

```php
$numberTransformer->toWords(5120); // outputs "five thousand one hundred twenty"
```

You can also use a static method:

```php
NumberToWords::transformNumber('en', 5120); // outputs "five thousand one hundred twenty"
```

### Currency Transformer

Creating a currency transformer works just like a number transformer.

```php
use NumberToWords\NumberToWords;

// create the number to words "manager" class
$numberToWords = new NumberToWords();

// build a new currency transformer using the RFC 3066 language identifier
$currencyTransformer = $numberToWords->getCurrencyTransformer('en');
```

Then it can be used passing in numeric values for amount and ISO 4217 currency identifier to the `toWords()` method:

```php
$currencyTransformer->toWords(5099, 'USD'); // outputs "fifty dollars ninety nine cents"
```

You can also use a static method:

```php
NumberToWords::transformCurrency('en', 5099, 'USD'); // outputs "fifty dollars ninety nine cents"
```

Please bear in mind, the currency transformer accepts integers as the amount to transform. It means that if you store amounts as floats (e.g. 4.99) you need to multiply them by 100 and pass the integer (499) as an argument.

## Available locale

| Language             | Identifier | Number | Currency |
| -------------------- | ---------- | ------ | -------- |
| Albanian             | al         | +      | +        |
| Arabic               | ar         | +      | +        |
| Azerbaijani          | az         | +      | +        |
| Belgian French       | fr_BE      | +      | -        |
| Brazilian Portuguese | pt_BR      | +      | +        |
| Bulgarian            | bg         | +      | +        |
| Czech                | cs         | +      | -        |
| Danish               | dk         | +      | +        |
| Dutch                | nl         | +      | -        |
| English              | en         | +      | +        |
| Estonian             | et         | +      | -        |
| Georgian             | ka         | +      | +        |
| German               | de         | +      | +        |
| French               | fr         | +      | +        |
| Hungarian            | hu         | +      | +        |
| Indonesian           | id         | +      | +        |
| Italian              | it         | +      | -        |
| Kurdish              | ku         | +      | -        |
| Lithuanian           | lt         | +      | +        |
| Latvian              | lv         | +      | +        |
| Macedonian           | mk         | +      | -        |
| Malay                | ms         | +      | +        |
| Persian              | fa         | +      | -        |
| Polish               | pl         | +      | +        |
| Romanian             | ro         | +      | +        |
| Slovak               | sk         | +      | +        |
| Spanish              | es         | +      | +        |
| Russian              | ru         | +      | +        |
| Swedish              | sv         | +      | -        |
| Turkish              | tr         | +      | +        |
| Turkmen              | tk         | +      | +        |
| Ukrainian            | ua         | +      | +        |
| Yoruba               | yo         | +      | +        |

## Contributors

Many transformers were ported from the `pear/Numbers_Words` library. Some of them were created from scratch by [contributors](https://github.com/ppalashturov/number-to-words/graphs/contributors). Thank you!

## Version 2.x - BC and major changes

- Dropped support for PHP <7.4.
- Added typehints for `NumberTransformer` and `CurrencyTransformer` interfaces. Now both accept integer numbers only (Albanian language might be affected).
- Added support for PSR12.

## Questions and answers

**Q: I found a bug. What should I do?**

A: Please report an issue on GitHub. Also feel free to fix it and open a pull request. I don't know most of those languages that the library supports, so your help and contribution would be much appreciated. Thanks!

**Q: My language is missing. Could you add it, please?**

A: Unfortunately, there's a high chance I don't know your language. Feel free to implement the missing transformer and open a pull request. You can take a look at the existing transformers, and follow the same pattern as other languages do.
