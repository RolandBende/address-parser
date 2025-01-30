# address-parser

A simple PHP package for extracting location-related data (street name and house number) from Hungarian addresses.

## Usage examples

### Extract house number

```php
    $address = "Kossuth Lajos utca 10/B";
    $houseNumber = AddressParser::extractHouseNumber($address);
    echo $houseNumber; // 10/B
```