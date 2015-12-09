# PHP Number to words converter (WIP)

[![Travis](https://travis-ci.org/kwn/number-to-words.svg?branch=master)](https://travis-ci.org/kwn/number-to-words)
[![Code Climate](https://codeclimate.com/github/kwn/number-to-words/badges/gpa.svg)](https://codeclimate.com/github/kwn/number-to-words)
[![Test Coverage](https://codeclimate.com/github/kwn/number-to-words/badges/coverage.svg)](https://codeclimate.com/github/kwn/number-to-words/coverage)

This library allows you to convert a number to words.

## Installation

Add package to your composer.json

```json
{
    "require": {
        "kwn/number-to-words": "0.0.1"
    }
}
```

And update your vendors

```
$ php composer.phar update kwn/number-to-words
```


## Usage

This library currently has two types of number-to-words transformations: number and currency. Each transformer type requires a language driver to be specified. In addition to this, the currency transformer requires a currency code and information about whether to convert the decimal portion of a number into words or to represent it as a fraction (e.g. 20 cents *or* 20/100).

### Number Transformer

Before using a transformer, it must be created:

```php
// build the registry of transformer factories we want to work with
$registry = new TransformerFactoriesRegistry([
    new EnglishTransformerFactory
]);

// create the number to words "manager" class
$numberToWords = new NumberToWords($registry);

// build a new number transformer using the RFC 3066 language identifier
$numberTransformer = $numberToWords->getNumberTransformer('en');
```

Then it can be used passing in numeric values to the `toWords()` method:

```php
$numberTransformer->toWords(5120); // outputs "five thousand one hundred twenty"
```

### Currency Transformer

Creating a currency transformer works just like a number transformer, but you have to provide a currency code and a subunit format (words or numbers).

```php
// build the registry of transformer factories we want to work with
$registry = new TransformerFactoriesRegistry([
    new EnglishTransformerFactory
]);

// create the number to words "manager" class
$numberToWords = new NumberToWords($registry);

// build a new currency transformer using the RFC 3066 language identifier and ISO 4217 currency identifier
$currencyTransformer = $numberToWords->getCurrencyTransformer('en', 'USD', Kwn\NumberToWords\Model\SubunitFormat::WORDS);
```

Then it can be used passing in numeric values to the `toWords()` method:

```php
$currencyTransformer->toWords(50.99); // outputs "fifty dollars ninety nine cents"
```


##Drivers

Language | Number | Currency | Angle | Temperature | Author
---------|--------|----------|-------|-------------|-------
English  | +      | +        | -     | -           | ![janhartigan](https://github.com/janhartigan)
German   | -      | -        | -     | -           | -
French   | -      | -        | -     | -           | -
Spanish  | -      | -        | -     | -           | -
Polish   | +      | +        | -     | -           | ![kwn](https://github.com/kwn) (ported from dowgird/pyliczba)
Romanian | +      | +        | -     | -           | ![kwn](https://github.com/kwn) (ported from pear/Numbers_Words)
