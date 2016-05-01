<?php

namespace Kwn\NumberToWords\Language\Ukrainian\Transformer;

use Kwn\NumberToWords\Model\Number;
use Kwn\NumberToWords\Language\Ukrainian\Dictionary\Number as NumberDictionary;
use Kwn\NumberToWords\Transformer\NumberTransformer as NumberTransformerInterface;

class NumberTransformer implements NumberTransformerInterface
{
    /**
     * @var NumberDictionary
     */
    protected $numberDictionary;

    /**
     * @param NumberDictionary $numberDictionary
     */
    public function __construct(NumberDictionary $numberDictionary)
    {
        $this->numberDictionary = $numberDictionary;
    }

    public function getNumberDictionary() {
        return $this->numberDictionary;
    }

    /**
     * Convert number to words
     *
     * @param mixed $number
     *
     * @return string
     */
    public function toWords($number)
    {
        $number = new Number($number);
        $value = $number->getValue();

        $megaSize = sizeof(NumberDictionary::$mega);

        $signs = $megaSize * 3;
        // 24 equal quantity of zeros of the biggest number in NumberDictionary::$unit + 3 additional sign (point and two zero)
        list ($unit, $subunit) = explode('.', sprintf("%{$signs}.2f", floatval($value)));

        $out = [];
        if ($value > 0) {
            // by 3 symbols
            foreach (str_split($unit, 3) as $mk => $v) {
                if (!intval($v)) {
                    continue;
                }

                $mk = $megaSize - $mk - 1; // mega key
                $gender = NumberDictionary::$mega[$mk][3];
                list ($i1, $i2, $i3) = array_map('intval', str_split($v, 1));

                // mega-logic
                $out[] = NumberDictionary::$hundred[$i1]; # 1xx-9xx

                if ($i2 > 1) { # 20-99
                    $out[] = NumberDictionary::$tens[$i2] . ' ' . NumberDictionary::$ten[$gender][$i3];
                } else { # 10-19 | 1-9
                    $out[] = ($i2 > 0) ? NumberDictionary::$teens[$i3] : NumberDictionary::$ten[$gender][$i3];
                }

                if ($mk > 1) {
                    $one = NumberDictionary::$mega[$mk][0];
                    $two = NumberDictionary::$mega[$mk][1];
                    $other = NumberDictionary::$mega[$mk][2];
                    $out[] = $this->morph($v, $one, $two, $other);
                }
            }
        } else {
            $out[] = NumberDictionary::$zero;
        }

        return trim(preg_replace('/ {2,}/', ' ', implode(' ', $out)));
    }

    /**
     * Apply morphology rule to the number
     *
     * @param int $n
     * @param string $f1
     * @param string $f2
     * @param string $f5
     * @return string
     */
    public function morph($n, $f1, $f2, $f5)
    {
        $n = abs(intval($n)) % 100;
        if ($n > 10 && $n < 20) {
            return $f5;
        }

        $n = $n % 10;
        if ($n > 1 && $n < 5) {
            return $f2;
        }

        if ($n == 1) {
            return $f1;
        }

        return $f5;
    }

}
