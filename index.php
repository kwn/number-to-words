<?php

require 'vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use NumberToWords\NumberToWords;

$numberToWords = new NumberToWords();

$numberTransformer = $numberToWords->getNumberTransformer('tk');

echo $numberTransformer->toWords(3003000006);