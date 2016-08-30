<?php

namespace NumberToWords\NumberTransformer;

class PortugueseBrazilianNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($number)
    {
        $converter = new \Numbers_Words();

        return $converter->toWords($number, 'pt_BR');
    }
}
