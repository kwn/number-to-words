# PHP Number to words converter

[![Travis](https://travis-ci.org/kwn/number-to-words.svg?branch=master)](https://travis-ci.org/kwn/number-to-words)
[![Code Climate](https://codeclimate.com/github/kwn/number-to-words/badges/gpa.svg)](https://codeclimate.com/github/kwn/number-to-words)
[![Test Coverage](https://codeclimate.com/github/kwn/number-to-words/badges/coverage.svg)](https://codeclimate.com/github/kwn/number-to-words/coverage)
[![Latest Stable Version](https://poser.pugx.org/kwn/number-to-words/v/stable)](https://packagist.org/packages/kwn/number-to-words)

This library allows you to convert a number to words.

## Installation

Add package to your composer.json by running:

```
$ composer require kwn/number-to-words
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

Bare in mind, the currency transformer accepts integers as the amount to transform. It means that if you store amounts as floats (e.g. 4.99) you need to multiply them by 100 and pass the integer (499) as an argument.

## Available locale

Language             | Identifier | Number | Currency |
---------------------|------------|--------|----------|
Albanian             | al         | +      | -        |
Belgian French       | fr_BE      | +      | -        |
Brazilian Portuguese | pt_BR      | +      | +        |
Bulgarian            | bg         | +      | -        |
Czech                | cs         | +      | -        |
Danish               | dk         | +      | +        |
Dutch                | nl         | +      | -        |
English              | en         | +      | +        |
Estonian             | et         | +      | -        |
Georgian             | ka         | +      | +        |
German               | de         | +      | +        |
French               | fr         | +      | +        |
Hungarian            | hu         | +      | +        |
Indonesian           | id         | +      | -        |
Italian              | it         | +      | -        |
Lithuanian           | lt         | +      | +        |
Latvian              | lv         | +      | +        |
Malay                | ms         | +      | -        |
Persian              | fa         | +      | -        |
Polish               | pl         | +      | +        |
Romanian             | ro         | +      | +        |
Slovak               | sk         | +      | -        |
Spanish              | es         | +      | +        |
Russian              | ru         | +      | +        |
Swedish              | sv         | +      | -        |
Turkish              | tr         | +      | +        |
Turkmen              | tk         | +      | +        |
Ukrainian            | ua         | +      | +        |
Yoruba               | yo         | +      | +        |

## Contributors

Most of the transformers were ported from `pear/Numbers_Words` library. Some of them were slightly refactored. Some of them were created by other [contributors](https://github.com/kwn/number-to-words/graphs/contributors) who were helping me with the initial version of that library.

This library is still under a heavy refactoring so the legacy code should ultimately disappear.

## Questions and answers

**Q: Why the code looks like a crap? Why it gets so low rank on code climate?**

A: Most of the code was just migrated from `pear/Numbers_Words`. That library still remembers the ages of PHP4. I constantly refactor it, so it's getting better. I'm also porting some mechanisms from other languages so sooner or later it will look quite good.

**Q: There's an error!**

A: Please report an issue, or even better - create a pull request. I don't speak most of those languages so your help is much appreciated. Thanks!

**Q: Why there are some transformers which cannot be used (they live under `UntestedLocale` namespace)?**

A: Simply, because there are no test cases for them. You're more than welcome to create some test cases for them, so we'll be able to include them in a list of available languages.
