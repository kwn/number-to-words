<?php

namespace NumberToWords\NumberTransformer;

class DutchNumberTransformerTest extends NumberTransformerTest
{
    protected function setUp(): void
    {
        $this->numberTransformer = new DutchNumberTransformer();
    }

    public function providerItConvertsNumbersToWords(): array
    {
        return [
            [0, 'nul'],
            [1, 'één'],
            [9, 'negen'],
            [10, 'tien'],
            [11, 'elf'],
            [19, 'negentien'],
            [20, 'twintig'],
            [21, 'éénentwintig'],
            [30, 'dertig'],
            [40, 'veertig'],
            [50, 'vijftig'],
            [60, 'zestig'],
            [62, 'tweeenzestig'],
            [70, 'zeventig'],
            [80, 'tachtig'],
            [90, 'negentig'],
            [99, 'negenennegentig'],
            [100, 'honderd'],
            [101, 'honderd en één'],
            [111, 'honderd en elf'],
            [112, 'honderd en twaalf'],
            [113, 'honderddertien'],
            [114, 'honderdveertien'],
            [120, 'honderdtwintig'],
            [121, 'honderdéénentwintig'],
            [800, 'achthonderd'],
            [900, 'negenhonderd'],
            [909, 'negenhonderd en negen'],
            [919, 'negenhonderdnegentien'],
            [990, 'negenhonderdnegentig'],
            [999, 'negenhonderdnegenennegentig'],
            [1000, 'duizend'],
            [1001, 'duizend en één'],
            [1014, 'duizend veertien'],
            [2000, 'tweeduizend'],
            [4000, 'vierduizend'],
            [5000, 'vijfduizend'],
            [11000, 'elfduizend'],
            [11001, 'elfduizend en één'],
            [11701, 'elfduizend zevenhonderd en één'],
            [21000, 'éénentwintigduizend'],
            [999000, 'negenhonderdnegenennegentigduizend'],
            [999999, 'negenhonderdnegenennegentigduizend negenhonderdnegenennegentig'],
            [1000000, 'één miljoen'],
            [2000000, 'twee miljoen'],
            [4000000, 'vier miljoen'],
            [5000000, 'vijf miljoen'],
            [999000000, 'negenhonderdnegenennegentig miljoen'],
            [999000999, 'negenhonderdnegenennegentig miljoen negenhonderdnegenennegentig'],
            [999999000, 'negenhonderdnegenennegentig miljoen negenhonderdnegenennegentigduizend'],
            [999999999, 'negenhonderdnegenennegentig miljoen negenhonderdnegenennegentigduizend negenhonderdnegenennegentig'],
            [1174315110, 'één miljard honderdvierenzeventig miljoen driehonderdvijftienduizend honderdtien'],
            [1174315119, 'één miljard honderdvierenzeventig miljoen driehonderdvijftienduizend honderdnegentien'],
            [15174315119, 'vijftien miljard honderdvierenzeventig miljoen driehonderdvijftienduizend honderdnegentien'],
            [35174315119, 'vijfendertig miljard honderdvierenzeventig miljoen driehonderdvijftienduizend honderdnegentien'],
            [935174315119, 'negenhonderdvijfendertig miljard honderdvierenzeventig miljoen driehonderdvijftienduizend honderdnegentien'],
            [2935174315119, 'twee biljoen negenhonderdvijfendertig miljard honderdvierenzeventig miljoen driehonderdvijftienduizend honderdnegentien'],
        ];
    }
}
