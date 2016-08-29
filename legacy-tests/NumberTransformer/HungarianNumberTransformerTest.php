<?php

namespace NumberToWords\NumberTransformer;

class HungarianNumberTransformerTest extends NumberTransformerTest
{
    public function setUp()
    {
        $this->numberTransformer = new HungarianNumberTransformer();
    }

    public function providerItConvertsNumbersToWords()
    {
        return [
            [0, 'nulla']
        ];

        return [
            [0, 'nulla'],
            [1, 'egy'],
            [2, 'kettõ'],
            [3, 'három'],
            [4, 'négy'],
            [5, 'öt'],
            [6, 'hat'],
            [7, 'hét'],
            [8, 'nyolc'],
            [9, 'kilenc'],
            [11, 'tizenegy'],
            [12, 'tizenkettõ'],
            [16, 'tizenhat'],
            [19, 'tizenkilenc'],
            [20, 'húsz'],
            [21, 'huszonegy'],
            [26, 'huszonhat'],
            [30, 'harminc'],
            [31, 'harmincegy'],
            [40, 'negyven'],
            [43, 'negyvenhárom'],
            [50, 'ötven'],
            [55, 'ötvenöt'],
            [60, 'hatvan'],
            [67, 'hatvanhét'],
            [70, 'hetven'],
            [79, 'hetvenkilenc'],
            [100, 'egyszáz'],
            [101, 'egyszázegy'],
            [199, 'egyszázkilencvenkilenc'],
            [203, 'kettõszázhárom'],
            [287, 'kettõszáznyolcvanhét'],
            [300, 'háromszáz'],
            [356, 'háromszázötvenhat'],
            [410, 'négyszáztíz'],
            [434, 'négyszázharmincnégy'],
            [578, 'ötszázhetvennyolc'],
            [689, 'hatszáznyolcvankilenc'],
            [729, 'hétszázhuszonkilenc'],
            [894, 'nyolcszázkilencvennégy'],
            [999, 'kilencszázkilencvenkilenc'],
            [1000, 'egyezer'],
            [1001, 'egyezeregy'],
            [1097, 'egyezerkilencvenhét'],
            [1104, 'egyezeregyszáznégy'],
            [1243, 'egyezerkettõszáznegyvenhárom'],
            [2385, 'kettõezer-háromszáznyolcvanöt'],
            [3766, 'háromezer-hétszázhatvanhat'],
            [4196, 'négyezer-egyszázkilencvenhat'],
            [5846, 'ötezer-nyolcszáznegyvenhat'],
            [6459, 'hatezer-négyszázötvenkilenc'],
            [7232, 'hétezer-kettõszázharminckettõ'],
            [8569, 'nyolcezer-ötszázhatvankilenc'],
            [9539, 'kilencezer-ötszázharminckilenc'],
            [1000000, 'egymillió'],
            [1001500, 'egymillió-egyezer-ötszáz'],
            [2000001, 'kettõmillió-egy'],
            [8002001, 'nyolcmillió-kettõezer-egy'],
            [2000000000, 'kettõmilliárd']
        ];
    }
}
