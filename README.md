# ISO standard utilities
This component provides features for supporting search iso standards raw data by attributes.

## Terms and designations
- alpha2 - two-letter codes (recommended as the general-purpose code);
- alpha3 - three-letter codes;
- numericCodes - numeric codes;
- name - string name.

## Component parts description
AttributeCode - class, containing iso attributes constants.
Details:
- AttributeCodes::ATTRIBUTE_ALPHA2 - represents two-letter code attribute;
- AttributeCodes::ATTRIBUTE_ALPHA3 - represents three-letter code attribute;
- AttributeCodes::ATTRIBUTE_NAME - represents string name format attribute;
- AttributeCodes::ATTRIBUTE_NUMERIC_CODE - represents three-digit numeric code (which can be useful if you need to avoid using Latin script).

StandardSearchUtility - class provides set of function for working with raw data standards.
```php
public static function getByAlpha2(
    array $standardsData,
    string $alpha2
): ?array;
```
Input:
- $standardsData - array standards raw dataset;
- $alpha2 - two-letter code value;

Return: found standard raw array data, suitable to input two-letter code value (or null if not found).
```php
public static function getByAlpha3(
    array $standardsData,
    string $alpha3
): ?array;
```
Input:
- $standardsData - array standards raw dataset;
- $alpha3 - three-letter code value;

Return: found standard raw array data, suitable to input three-letter code value (or null if not found).
```php
public static function getByNumericCode(
    array $standardsData,
    string $numericCode
): ?array;
```
Input:
- $standardsData - array standards raw dataset;
- $numericCode - numeric code value;

Return: found standard raw array data, suitable to input numeric code value (or null if not found).
```php
public static function getStandardsDataByAttributeCode(
    array $standardsData,
    string $attributeCode,
    string $value
): ?array;
```
Input:
- $standardsData - array standards raw dataset;
- $attributeCode - code attribute name;
- $value - code value

Return: found standard raw array data, suitable to input code attribute name and code value (or null if not found).
```php
public static function existByAlpha2(
    array $standardsData,
    string $alpha2
): bool;
```
Input:
- $standardsData - array standards raw dataset;
- $alpha2 - two-letter code value;

Return: true if standard raw data exist by two-letter code, false if not exist.
```php
public static function existByAlpha3(
    array $standardsData,
    string $alpha3
): bool;
```
Input:
- $standardsData - array standards raw dataset;
- $alpha3 - three-letter code value;

Return: true if standard raw data exist by three-letter code, false if not exist.
```php
public static function existByNumericCode(
    array $standardsData,
    string $numericCode
): bool;
```
Input:
- $standardsData - array standards raw dataset;
- $numericCode - numeric code value;

Return: true if standard raw data exist by numeric code, false if not exist.
```php
public static function existByAttributeCode(
    array $standardsData,
    string $attributeCode,
    string $value
): bool;
```
Input:
- $standardsData - array standards raw dataset;
- $attributeCode - code attribute name;
- $value - code value

Return: true if found standard raw array data exist, false if not exist.

## Code coverage information
Summary:                 
- Classes: 100.00% (1/1)  
- Methods: 100.00% (8/8)  
- Lines:   100.00% (14/14)

Classes:
- StandardSearchUtility
   - Methods: 100.00% ( 8/ 8)   Lines: 100.00% ( 14/ 14)