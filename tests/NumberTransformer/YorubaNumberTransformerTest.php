<?php

namespace NumberToWords\NumberTransformer;

class YorubaNumberTransformerTest extends NumberTransformerTest
{
    protected function setUp(): void
    {
        $this->numberTransformer = new YorubaNumberTransformer();
    }

    public function providerItConvertsNumbersToWords(): array
    {
        return [
            [1, 'ọkan'],
            [14, 'mẹrinla'],
            [20, 'ogun'],
            [22, 'ogun ati meji'],
            [33, 'ọgbọn ati mẹta'],
            [85, 'ọgọrin ati marun'],
            [681, 'ẹgbẹta ati ọgọrin ati ọkan'],
            [781, 'ẹẹdẹgbẹrin ati ọgọrin ati ọkan'],
            [990, 'ẹ̀ẹ́dẹ́gbẹ̀rún ati aadọrun'],
            [138475, 'ẹgbẹrun ọgọrun ati ọgbọn ati mẹjọ, irinwó ati aadọrin ati marun'],
            [592418, 'ẹgbẹrun ẹdẹgbẹta ati aadọrun ati meji, irinwó ati mejidilogun'],
            [959684, 'ẹgbẹrun ẹ̀ẹ́dẹ́gbẹ̀rún ati aadọta ati mẹsan, ẹgbẹta ati ọgọrin ati mẹrin'],
            [2965138, 'miliọnu meji, ẹgbẹrun ẹ̀ẹ́dẹ́gbẹ̀rún ati Ogota ati marun, ọgọrun ati ọgbọn ati mẹjọ'],
            [7038811, 'miliọnu meje, ẹgbẹrun ọgbọn ati mẹjọ, ẹgbẹ̀rin ati mọkanla'],
            [19992231, 'miliọnu mọkandinlogun, ẹgbẹrun ẹ̀ẹ́dẹ́gbẹ̀rún ati aadọrun ati meji, igba ati ọgbọn ati ọkan'],
            [38108743, 'miliọnu ọgbọn ati mẹjọ, ẹgbẹrun ọgọrun ati mẹjọ, ẹẹdẹgbẹrin ati ogoji ati mẹta'],
            [43846949, 'miliọnu ogoji ati mẹta, ẹgbẹrun ẹgbẹ̀rin ati ogoji ati mẹfa, ẹ̀ẹ́dẹ́gbẹ̀rún ati ogoji ati mẹsan'],
            [43906698, 'miliọnu ogoji ati mẹta, ẹgbẹrun ẹ̀ẹ́dẹ́gbẹ̀rún ati mẹfa, ẹgbẹta ati aadọrun ati mẹjọ'],
            [51295844, 'miliọnu aadọta ati ọkan, ẹgbẹrun igba ati aadọrun ati marun, ẹgbẹ̀rin ati ogoji ati mẹrin'],
            [60467936, 'miliọnu Ogota, ẹgbẹrun irinwó ati Ogota ati meje, ẹ̀ẹ́dẹ́gbẹ̀rún ati ọgbọn ati mẹfa'],
            [84040098, 'miliọnu ọgọrin ati mẹrin, ẹgbẹrun ogoji, aadọrun ati mẹjọ'],
            [95349193, 'miliọnu aadọrun ati marun, ẹgbẹrun ọ̀ọ́dúrún ati ogoji ati mẹsan, ọgọrun ati aadọrun ati mẹta'],
        ];
    }
}
