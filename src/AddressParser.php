<?php

namespace Rb\AddressParser;

require_once __DIR__ . '/../vendor/autoload.php';

class AddressParser
{
    private const HOUSE_NUMBER_PATTERN = '/\s([0-9]+[A-Za-z\-\/]*[\dA-Za-z]*\.?)([\s\S]*)/';

    /**
     * Extracts the house number from an address string.
     *
     * @param string $address The address string.
     * @return string The house number if found, otherwise an empty string.
     */
    public static function extractHouseNumber(string $address): string
    {
        return self::extractUsingPattern(self::HOUSE_NUMBER_PATTERN, $address);
    }

    /**
     * Extracts the street name from an address string.
     *
     * @param string $address The address string.
     * @return string The street name if found, otherwise an empty string.
     */
    public static function extractStreetName(string $address): string
    {
        $houseNumber = self::extractHouseNumber($address);
        if ($houseNumber) {
            $streetName = substr($address, 0, strpos($address, $houseNumber));
            return trim($streetName);
        }
        return "";
    }

    /**
     * Extracts the relevant part of the address based on the provided regular expression pattern.
     *
     * @param string $pattern The regular expression pattern to match.
     * @param string $address The address string.
     * @return string The first match or an empty string if no match is found.
     */
    private static function extractUsingPattern(string $pattern, string $address): string
    {
        if (preg_match($pattern, $address, $matches)) {
            return trim($matches[1] ?? "");
        }
        return "";
    }
}
