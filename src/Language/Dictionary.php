<?php

namespace NumberToWords\Language;

interface Dictionary
{
    public function getZero(): string;
    public function getMinus(): string;
    public function getCorrespondingUnit(int $unit): string;
    public function getCorrespondingTen(int $ten): string;
    public function getCorrespondingTeen(int $teen): string;
    public function getCorrespondingHundred(int $hundred): string;
}
