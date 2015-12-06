PHP Number to words converter (WIP)
=========================

[![Travis](https://travis-ci.org/kwn/number-to-words.svg?branch=master)](https://travis-ci.org/kwn/number-to-words)
[![Code Climate](https://codeclimate.com/github/kwn/number-to-words/badges/gpa.svg)](https://codeclimate.com/github/kwn/number-to-words)
[![Test Coverage](https://codeclimate.com/github/kwn/number-to-words/badges/coverage.svg)](https://codeclimate.com/github/kwn/number-to-words/coverage)

This library allows you to convert a number to words.

Installation
------------

Add package to your composer.json

```json
{
    "require": {
        "kwn/number-to-words": "dev-master"
    }
}
```

And update your vendors

```
$ php composer.phar update kwn/number-to-words
```

Drivers
-------

Language | Number | Currency | Angle | Author
---------|--------|----------|-------|-------
English  | +      | +        | -     | **janhartigan**
German   | -      | -        | -     | -
Polish   | +      | +        | -     | **kwn** (ported from dowgird/pyliczba)
