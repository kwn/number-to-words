<?php

namespace NumberToWords\CurrencyTransformer;

class YorubaCurrencyTransformerTest extends CurrencyTransformerTest
{
    protected function setUp(): void
    {
        $this->currencyTransformer = new YorubaCurrencyTransformer();
    }

    public function providerItConvertsMoneyAmountToWords(): array
    {
        return [
            [51722624, 'NGN',  'ẹgbẹrun ẹdẹgbẹta ati mẹtala, igba ati ogun ati mẹfa Naira pẹlu kobo ogun ati mẹrin'],
            [40462253, 'NGN',  'ẹgbẹrun irinwó ati mẹrin, ẹgbẹta ati ogun ati meji Naira pẹlu kobo aadọta ati mẹta'],
            [8109642, 'NGN',  'ẹgbẹrun ọgọrin ati ọkan, aadọrun ati mẹfa Naira pẹlu kobo ogoji ati meji'],
            [53649209, 'NGN',  'ẹgbẹrun ẹdẹgbẹta ati ọgbọn ati mẹfa, irinwó ati aadọrun ati meji Naira pẹlu kobo mẹsan'],
            [60006379, 'NGN',  'ẹgbẹrun ẹgbẹta, Ogota ati mẹta Naira pẹlu kobo aadọrin ati mẹsan'],
            [83142482, 'NGN',  'ẹgbẹrun ẹgbẹ̀rin ati ọgbọn ati ọkan, irinwó ati ogun ati mẹrin Naira pẹlu kobo ọgọrin ati meji'],
            [80477233, 'NGN',  'ẹgbẹrun ẹgbẹ̀rin ati mẹrin, ẹẹdẹgbẹrin ati aadọrin ati meji Naira pẹlu kobo ọgbọn ati mẹta'],
            [38329596, 'NGN',  'ẹgbẹrun ọ̀ọ́dúrún ati ọgọrin ati mẹta, igba ati aadọrun ati marun Naira pẹlu kobo aadọrun ati mẹfa'],
            [78342258, 'NGN',  'ẹgbẹrun ẹẹdẹgbẹrin ati ọgọrin ati mẹta, irinwó ati ogun ati meji Naira pẹlu kobo aadọta ati mẹjọ'],
            [25488994, 'NGN',  'ẹgbẹrun igba ati aadọta ati mẹrin, ẹgbẹ̀rin ati ọgọrin ati mẹsan Naira pẹlu kobo aadọrun ati mẹrin'],
            [88170626, 'NGN',  'ẹgbẹrun ẹgbẹ̀rin ati ọgọrin ati ọkan, ẹẹdẹgbẹrin ati mẹfa Naira pẹlu kobo ogun ati mẹfa'],
            [98042326, 'NGN',  'ẹgbẹrun ẹ̀ẹ́dẹ́gbẹ̀rún ati ọgọrin, irinwó ati ogun ati mẹta Naira pẹlu kobo ogun ati mẹfa'],
            [63707580, 'NGN',  'ẹgbẹrun ẹgbẹta ati ọgbọn ati meje, aadọrin ati marun Naira pẹlu kobo ọgọrin'],
            [48259505, 'NGN',  'ẹgbẹrun irinwó ati ọgọrin ati meji, ẹdẹgbẹta ati aadọrun ati marun Naira pẹlu kobo marun'],
            [63159623, 'NGN',  'ẹgbẹrun ẹgbẹta ati ọgbọn ati ọkan, ẹdẹgbẹta ati aadọrun ati mẹfa Naira pẹlu kobo ogun ati mẹta'],
        ];
    }
}
