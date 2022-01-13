<?php

namespace NumberToWords\Language\Persian;

class PersianDictionary
{
    protected string $zero = 'صفر';

    protected string $negative = 'منفی';

    /** Token to separate words in triplets and chunks in final string */
    protected string $separator = " و ";

    protected array $units = [
        1 => 'یک',
        2 => 'دو',
        3 => 'سه',
        4 => 'چهار',
        5 => 'پنج',
        6 => 'شش',
        7 => 'هفت',
        8 => 'هشت',
        9 => 'نه',
        10 => 'ده',
        11 => 'یازده',
        12 => 'دوازده',
        13 => 'سیزده',
        14 => 'چهارده',
        15 => 'پانزده',
        16 => 'شانزده',
        17 => 'هفده',
        18 => 'هجده',
        19 => 'نوزده',
        20 => 'بیست',
        30 => 'سی',
        40 => 'چهل',
        50 => 'پنجاه',
        60 => 'شصت',
        70 => 'هفتاد',
        80 => 'هشتاد',
        90 => 'نود',
        100 => 'صد',
        200 => 'دویست',
        300 => 'سیصد',
        400 => 'چهارصد',
        500 => 'پانصد',
        600 => 'ششصد',
        700 => 'هفتصد',
        800 => 'هشتصد',
        900 => 'نهصد'
    ];

    protected array $suffixes = [
        3 => 'هزار',
        6 => 'میلیون',
        9 => 'بیلیون',
        12 => 'تریلیون',
        15 => 'کوآدریلیون',
        18 => 'کوینتیلیون',
        21 => 'سکستیلیون',
        24 => 'سپتیلیون',
        27 => 'اوکتیلیون',
        30 => 'نانیلیون',
        33 => 'دسیلیون',
        36 => 'آندسیلیون',
        39 => 'دیودسیلیون',
        42 => 'تریدسیلیون',
        45 => 'کواتیوردسیلیون',
        48 => 'کویندسیلیون',
        51 => 'سکسدسیلیون',
        54 => 'سپتدسیلیون',
        57 => 'اُکتودسیلیون',
        60 => 'نومدسیلیون',
        63 => 'ویجینتیلیون',
    ];

    public function setZero(string $zero): Dictionary
    {
        $this->zero = $zero;
        return $this;
    }

    public function setNegative(string $negative): Dictionary
    {
        $this->negative = $negative;
        return $this;
    }

    public function setSeparator(string $separator): Dictionary
    {
        $this->separator = $separator;
        return $this;
    }

    public function setUnits(array $units): Dictionary
    {
        $this->units = $units;
        return $this;
    }

    public function setSuffixes($suffixes): Dictionary
    {
        $this->suffixes = $suffixes;
        return $this;
    }

    public function zero(): string
    {
        return $this->zero;
    }

    public function addNegative(string $arg)
    {
        return $this->negative . ' ' . $arg;
    }

    public function separate(string ...$args)
    {
        $filteredArgs = array_filter($args, fn($input) => $input !== '');
        return implode($this->separator, $filteredArgs);
    }

    public function unit(int $unit)
    {
        return $this->units[$unit];
    }

    public function addSuffix(string $string, int $level)
    {
        return $string . ' ' . $this->suffixes[$level];
    }
}
