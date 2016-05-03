<?php
namespace Kwn\NumberToWords\Grammar\Slavonic\Transformer;

use Kwn\NumberToWords\Model\Number;
use Kwn\NumberToWords\Grammar\Slavonic\Dictionary\Number as NumberDictionary;
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

    public function getNumberDictionary()
    {
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
        $numberDictionary = $this->getNumberDictionary();

        $number = new Number($number);
        $value = $number->getValue();

        $ten = $numberDictionary->getTen();
        $teens = $numberDictionary->getTeens();
        $tens = $numberDictionary->getTens();
        $hundred = $numberDictionary->getHundred();
        $mega = $numberDictionary->getMega();

        $megaSize = sizeof($mega);

        $signs = $megaSize * 3;
        // $signs equal quantity of zeros of the biggest number in NumberDictionary::$mega
        // + 3 additional sign (point and two zero)
        list ($unit, $subunit) = explode('.', sprintf("%{$signs}.2f", floatval($value)));

        $out = [];
        if ($value > 0) {
            // by 3 symbols
            foreach (str_split($unit, 3) as $mk => $v) {
                if (!intval($v)) {
                    continue;
                }

                $mk = $megaSize - $mk - 1; // mega key
                $gender = $mega[$mk][3];
                list ($i1, $i2, $i3) = array_map('intval', str_split($v, 1));

                // mega-logic
                $out[] = $hundred[$i1]; # 1xx-9xx

                if ($i2 > 1) { # 20-99
                    $out[] = $tens[$i2] . ' ' . $ten[$gender][$i3];
                } else { # 10-19 | 1-9
                    $out[] = ($i2 > 0) ? $teens[$i3] : $ten[$gender][$i3];
                }

                if ($mk > 1) {
                    $out[] = $this->morph($v, $mega[$mk][0], $mega[$mk][1], $mega[$mk][2]);
                }
            }
        } else {
            $out[] = $numberDictionary->getZero();
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