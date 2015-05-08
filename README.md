PHP Number to words converter
=========================

![Travis](https://travis-ci.org/kwn/number-to-words.svg?branch=master)

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
English  | -      | -        | -     | -
German   | -      | -        | -     | -
Polish   | +      | +        | -     | **kwn** (ported from dowgird/pyliczba)
