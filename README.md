# PHP Number to words converter

[![CircleCI](https://dl.circleci.com/status-badge/img/gh/kwn/number-to-words/tree/master.svg?style=shield)](https://dl.circleci.com/status-badge/redirect/gh/kwn/number-to-words/tree/master)
[![Code Climate](https://codeclimate.com/github/kwn/number-to-words/badges/gpa.svg)](https://codeclimate.com/github/kwn/number-to-words)
[![Test Coverage](https://codeclimate.com/github/kwn/number-to-words/badges/coverage.svg)](https://codeclimate.com/github/kwn/number-to-words/coverage)
[![Latest Stable Version](https://poser.pugx.org/kwn/number-to-words/v/stable)](https://packagist.org/packages/kwn/number-to-words)

Welcome to `number-to-words`, a PHP utility that seamlessly transforms numeric values into their corresponding words. Effortlessly convert numbers, such as 123, into expressive and readable formats like "one hundred and twenty-three" with just a few lines of code.

## Installation

Add package to your composer.json by running:

```
$ composer require kwn/number-to-words
```

## Usage

There are two types of number-to-words transformation: number and currency. In order to use a relevant transformer for specific language create an instance of `NumberToWords` class and call a method that creates a new instance of the desired transformer;

### Number Transformer

Create a transformer for specific language using the `getNumberTransformer('lang')` method:

```php
use NumberToWords\NumberToWords;

// create the number to words "manager" class
$numberToWords = new NumberToWords();

// build a new number transformer using the RFC 3066 language identifier
$numberTransformer = $numberToWords->getNumberTransformer('en');
```

Transformer can be used by passing in numeric values to the `toWords()` method:

```php
$numberTransformer->toWords(5120); // outputs "five thousand one hundred twenty"
```

It can be also used with a static method:

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

It can be also used with a static method:

```php
NumberToWords::transformCurrency('en', 5099, 'USD'); // outputs "fifty dollars ninety nine cents"
```

Note: The Currency Transformer within this library processes integers; ensure your input amounts are in whole numbers by multiplying any float values by 100 before transformation. For instance, transform 45.67 by using 4567 as the input for accurate currency conversion.

## Available locale

| Language             | Identifier | Number | Currency | Alias |
|----------------------|------------| ------ | -------- |-------|
| Albanian             | al         | +      | +        |       |
| Arabic               | ar         | +      | +        |       |
| Azerbaijani          | az         | +      | +        |       |
| Belgian French       | fr_BE      | +      | -        |       |
| Brazilian Portuguese | pt_BR      | +      | +        |       |
| Bulgarian            | bg         | +      | +        |       |
| Czech                | cs         | +      | -        |       |
| Danish               | dk         | +      | +        |       |
| Dutch                | nl         | +      | -        |       |
| English              | en         | +      | +        |       |
| Estonian             | et         | +      | -        |       |
| Georgian             | ka         | +      | +        |       |
| German               | de         | +      | +        |       |
| French               | fr         | +      | +        | fr_FR |
| Hungarian            | hu         | +      | +        |       |
| Indonesian           | id         | +      | +        |       |
| Italian              | it         | +      | -        |       |
| Kurdish              | ku         | +      | -        |       |
| Lithuanian           | lt         | +      | +        |       |
| Latvian              | lv         | +      | +        |       |
| Macedonian           | mk         | +      | -        |       |
| Malay                | ms         | +      | +        |       |
| Persian              | fa         | +      | -        |       |
| Polish               | pl         | +      | +        |       |
| Romanian             | ro         | +      | +        |       |
| Serbian              | sr         | +      | +        |       |
| Slovak               | sk         | +      | +        |       |
| Spanish              | es         | +      | +        |       |
| Russian              | ru         | +      | +        |       |
| Swahili              | sw         | +      | +        |       |
| Swedish              | sv         | +      | -        |       |
| Turkish              | tr         | +      | +        |       |
| Turkmen              | tk         | +      | +        |       |
| Ukrainian            | ua         | +      | +        |       |
| Uzbek                | uz         | +      | +        |       |
| Yoruba               | yo         | +      | +        |       |

## Contributors

Some transformers were ported from the `pear/Numbers_Words` library. Others were created by [contributors](https://github.com/kwn/number-to-words/graphs/contributors). Thank you!

## Version 2.x - BC and major changes

- Dropped support for PHP <7.4.
- Added typehints for `NumberTransformer` and `CurrencyTransformer` interfaces. Now both accept integer numbers only (Albanian language might be affected).
- Added support for PSR12.

## Questions and answers

**Q: What should I do if I encounter a bug while using the library?**

A: If you come across a bug, please open an issue on our GitHub repository. As I may not be proficient in all languages, we encourage users to submit fixes and collaborate to enhance the library's functionality.

**Q: My language is missing. Could it be added?**

A: There's a high chance I don't know your language. Feel free to implement the missing language and open a pull request. You can use the existing languages as a reference.
