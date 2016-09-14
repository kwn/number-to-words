<?php

namespace NumberToWords\NumberTransformer;

class DutchNumberTransformerTest extends NumberTransformerTest
{
    public function setUp()
    {
        $this->numberTransformer = new DutchNumberTransformer();
    }

    public function providerItConvertsNumbersToWords()
    {
        return [
            [0, 'nul'],
            //[1, 'één'],
            //[9, 'negen'],
            //[10, 'tien'],
            //[11, 'elf'],
            //[19, 'negentien'],
            //[20, 'twintig'],
            //[21, 'éénentwintig'],
            //[80, 'tachtig'],
            //[90, 'negentig'],
            //[99, 'negenennegentig'],
            //[100, 'honderd'],
            //[101, 'honderdéén'],
            //[111, 'honderdelf'],
            //[120, 'honderdtwintig'],
            //[121, 'honderdéénentwintig'],
            //[900, 'negenhonderd'],
            //[909, 'negenhonderdnegen'],
            //[919, 'negenhonderdnegentien'],
            //[990, 'negenhonderdnegentig'],
            //[999, 'negenhonderdnegenennegentig'],
            //[1000, 'éénduizend'],
            //[2000, 'tweeduizend'],
            //[4000, 'vierduizend'],
            //[5000, 'vijfduizend'],
            //[11000, 'elfduizend'],
            //[21000, 'éénentwintigduizend'],
            //[999000, 'negenhonderdnegenennegentigduizend'],
            //[999999, 'negenhonderdnegenennegentigduizend negenhonderdnegenennegentig'],
            //[1000000, 'één miljoen'],
            //[2000000, 'twee miljoen'],
            //[4000000, 'vier miljoen'],
            //[5000000, 'vijf miljoen'],
            //[999000000, 'negenhonderdnegenennegentig miljoen'],
            //[999000999, 'negenhonderdnegenennegentig miljoen negenhonderdnegenennegentig'],
            //[999999000, 'negenhonderdnegenennegentig miljoen negenhonderdnegenennegentigduizend'],
            //[999999999, 'negenhonderdnegenennegentig miljoen negenhonderdnegenennegentigduizend negenhonderdnegenennegentig'],
            //[1174315110, 'één miljard honderdvierenzeventig miljoen driehonderdvijftienduizend honderdtien'],
            //[1174315119, 'één miljard honderdvierenzeventig miljoen driehonderdvijftienduizend honderdnegentien'],
            //[15174315119, 'vijftien miljard honderdvierenzeventig miljoen driehonderdvijftienduizend honderdnegentien'],
            //[35174315119, 'vijfendertig miljard honderdvierenzeventig miljoen driehonderdvijftienduizend honderdnegentien'],
            //[935174315119, 'negenhonderdvijfendertig miljard honderdvierenzeventig miljoen driehonderdvijftienduizend honderdnegentien'],
            //[2935174315119, 'twee biljoen negenhonderdvijfendertig miljard honderdvierenzeventig miljoen driehonderdvijftienduizend honderdnegentien'],
        ];
    }
}
