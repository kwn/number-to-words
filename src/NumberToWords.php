<?php

namespace NumberToWords;

use NumberToWords\Concerns\ManagesCurrencyTransformers;
use NumberToWords\Concerns\ManagesNumberTransformers;

class NumberToWords
{
    use ManagesCurrencyTransformers;
    use ManagesNumberTransformers;
}
