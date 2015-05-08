<?php

namespace Kwn\NumberToWords\Model;

class LanguageTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateNewObject()
    {
        $language = new Language('pl');

        $this->assertInstanceOf('Kwn\NumberToWords\Model\Language', $language);
        $this->assertSame('pl', $language->getIdentifier());
    }
}
