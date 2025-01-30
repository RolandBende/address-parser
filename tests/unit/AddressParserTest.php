<?php

use PHPUnit\Framework\TestCase;
use Rb\AddressParser\AddressParser;

class AddressParserTest extends TestCase
{
    public function testExtractHouseNumber() {
        $this->assertEquals("12", AddressParser::extractHouseNumber("Fő utca 12"));
        $this->assertEquals("5A", AddressParser::extractHouseNumber("Petőfi Sándor tér 5A"));
        $this->assertEquals("10/B", AddressParser::extractHouseNumber("Kossuth Lajos utca 10/B"));
        $this->assertEquals("15.", AddressParser::extractHouseNumber("Füredi utca 15. fsz. 1."));
        $this->assertEquals("39.", AddressParser::extractHouseNumber("48-as ifjúsági út 39."));
    }

    public function testExtractStreetName() {
        $this->assertEquals("Fő utca", AddressParser::extractStreetName("Fő utca 12"));
        $this->assertEquals("Petőfi Sándor tér", AddressParser::extractStreetName("Petőfi Sándor tér 5A"));
        $this->assertEquals("Kossuth Lajos utca", AddressParser::extractStreetName("Kossuth Lajos utca 10/B"));
        $this->assertEquals("Füredi utca", AddressParser::extractStreetName("Füredi utca 15. fsz. 1."));
        $this->assertEquals("48-as ifjúsági út", AddressParser::extractStreetName("48-as ifjúsági út 39."));
    }
}
