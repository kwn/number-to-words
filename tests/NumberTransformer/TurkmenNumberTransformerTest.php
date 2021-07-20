<?php

namespace NumberToWords\NumberTransformer;

class TurkmenNumberTransformerTest extends NumberTransformerTest
{
    protected function setUp(): void
    {
        $this->numberTransformer = new TurkmenNumberTransformer();
    }

    public function providerItConvertsNumbersToWords(): array
    {
        return [
            [-1174315110, 'minus bir milliard bir ýüz ýetmiş dört million üç ýüz on bäş müň bir ýüz on'],
            [-21, 'minus ýigrimi bir'],
            [0, 'nol'],
            [1, 'bir'],
            [3, 'üç'],
            [8, 'sekiz'],
            [9, 'dokuz'],
            [10, 'on'],
            [11, 'on bir'],
            [12, 'on iki'],
            [19, 'on dokuz'],
            [20, 'ýigrimi'],
            [20, 'ýigrimi'],
            [21, 'ýigrimi bir'],
            [25, 'ýigrimi bäş'],
            [50, 'elli'],
            [58, 'elli sekiz'],
            [90, 'togsan'],
            [99, 'togsan dokuz'],
            [100, 'bir ýüz'],
            [101, 'bir ýüz bir'],
            [102, 'bir ýüz iki'],
            [111, 'bir ýüz on bir'],
            [113, 'bir ýüz on üç'],
            [120, 'bir ýüz ýigrimi'],
            [121, 'bir ýüz ýigrimi bir'],
            [229, 'iki ýüz ýigrimi dokuz'],
            [500, 'bäş ýüz'],
            [660, 'alty ýüz altmyş'],
            [666, 'alty ýüz altmyş alty'],
            [900, 'dokuz ýüz'],
            [909, 'dokuz ýüz dokuz'],
            [919, 'dokuz ýüz on dokuz'],
            [990, 'dokuz ýüz togsan'],
            [999, 'dokuz ýüz togsan dokuz'],
            [1000, 'bir müň'],
            [1001, 'bir müň bir'],
            [1010, 'bir müň on'],
            [1015, 'bir müň on bäş'],
            [1100, 'bir müň bir ýüz'],
            [1111, 'bir müň bir ýüz on bir'],
            [2000, 'iki müň'],
            [4000, 'dört müň'],
            [4538, 'dört müň bäş ýüz otuz sekiz'],
            [5000, 'bäş müň'],
            [5020, 'bäş müň ýigrimi'],
            [11000, 'on bir müň'],
            [11001, 'on bir müň bir'],
            [21000, 'ýigrimi bir müň'],
            [21512, 'ýigrimi bir müň bäş ýüz on iki'],
            [90000, 'togsan müň'],
            [92100, 'togsan iki müň bir ýüz'],
            [212112, 'iki ýüz on iki müň bir ýüz on iki'],
            [720018, 'ýedi ýüz ýigrimi müň on sekiz'],
            [999000, 'dokuz ýüz togsan dokuz müň'],
            [999999, 'dokuz ýüz togsan dokuz müň dokuz ýüz togsan dokuz'],
            [1000000, 'bir million'],
            [1001001, 'bir million bir müň bir'],
            [2000000, 'iki million'],
            [3248518, 'üç million iki ýüz kyrk sekiz müň bäş ýüz on sekiz'],
            [4000000, 'dört million'],
            [5000000, 'bäş million'],
            [999000000, 'dokuz ýüz togsan dokuz million'],
            [999000999, 'dokuz ýüz togsan dokuz million dokuz ýüz togsan dokuz'],
            [999999000, 'dokuz ýüz togsan dokuz million dokuz ýüz togsan dokuz müň'],
            [999999999, 'dokuz ýüz togsan dokuz million dokuz ýüz togsan dokuz müň dokuz ýüz togsan dokuz'],
        ];
    }
}
