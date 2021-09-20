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

### getByAlpha2
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

### getByAlpha3
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

### getByNumericCode
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

### getStandardsDataByAttributeCode
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

### existByAlpha2
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

### existByAlpha3
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

### existByNumericCode
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

### existByAttributeCode
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

### getAllNames
```php
public static function getAllNames(array $standardsData): array;
```
Input:
- $standardsData - array standards raw dataset;

Return: standards names string[].

### getAllNumericCodes
```php
public static function getAllNumericCodes(array $standardsData): array;
```
Input:
- $standardsData - array standards raw dataset;

Return: standards numeric codes string[].

### getAllAlpha3
```php
public static function getAllAlpha3(array $standardsData): array;
```
Input:
- $standardsData - array standards raw dataset;

Return: standards Alpha3 codes string[].

### getAllAlpha2
```php
public static function getAllAlpha2(array $standardsData): array
```
Input:
- $standardsData - array standards raw dataset;

Return: standards Alpha2 codes string[].

### getAllAttributesByCode
```php
public static function getAllAttributesByCode(array $standardsData, string $attributeCode): array;
```
Input:
- $standardsData - array standards raw dataset;
- $attributeCode - code attribute name;

Return: standards attribute code value searched by attribute code name.

## Usage examples
```php
$rawStandardsData = [
    [
        AttributeCodes::ATTRIBUTE_NAME => "Armenia",
        AttributeCodes::ATTRIBUTE_ALPHA2 => "AM",
        AttributeCodes::ATTRIBUTE_ALPHA3 => "ARM",
        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => "051",
    ],
    [
        AttributeCodes::ATTRIBUTE_NAME => "Aruba",
        AttributeCodes::ATTRIBUTE_ALPHA2 => "AW",
        AttributeCodes::ATTRIBUTE_ALPHA3 => "ABW",
        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => "533",
    ],
    [
        AttributeCodes::ATTRIBUTE_NAME => "Australia",
        AttributeCodes::ATTRIBUTE_ALPHA2 => "AU",
        AttributeCodes::ATTRIBUTE_ALPHA3 => "AUS",
        AttributeCodes::ATTRIBUTE_NUMERIC_CODE => "036",
    ],
];

$rawDataByAlpha2 = StandardSearchUtility::getByAlpha2($rawStandardsData, 'AU');
$emptyRawDataByAlpha2 = StandardSearchUtility::getByAlpha2($rawStandardsData, 'foo');

$rawDataByAlpha3 = StandardSearchUtility::getByAlpha3($rawStandardsData, 'AUS');
$emptyRawDataByAlpha3 = StandardSearchUtility::getByAlpha3($rawStandardsData, 'foo');

$rawDataByNumericCode = StandardSearchUtility::getByNumericCode($rawStandardsData, '036');
$emptyDataByNumericCode = StandardSearchUtility::getByAlpha3($rawStandardsData, '111');

$rawDataByAttributeCode = StandardSearchUtility::getStandardsDataByAttributeCode($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA2, 'AU');
$emptyRawDataByAttributeCode = StandardSearchUtility::getStandardsDataByAttributeCode($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA3, 'AU');

$existRawDataByAlpha2 = StandardSearchUtility::existByAlpha2($rawStandardsData, 'AU');
$notExistRawDataByAlpha2 = StandardSearchUtility::existByAlpha2($rawStandardsData, 'AUS');

$existRawDataByAlpha3 = StandardSearchUtility::existByAlpha3($rawStandardsData, 'AUS');
$notExistRawDataByAlpha3 = StandardSearchUtility::existByAlpha3($rawStandardsData, 'AU');

$existRawDataByNumericCode = StandardSearchUtility::existByNumericCode($rawStandardsData, '036');
$notExistRawDataByNumericCode = StandardSearchUtility::existByNumericCode($rawStandardsData, '000');

$existRawDataByNumericCode = StandardSearchUtility::existByAttributeCode($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA2, 'AU');
$notExistRawDataByNumericCode = StandardSearchUtility::existByAttributeCode($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA3, 'AU');
```
Result
```php
array(4) {
    ["name"]=>
  string(9) "Australia"
    ["alpha2"]=>
  string(2) "AU"
    ["alpha3"]=>
  string(3) "AUS"
    ["numericCode"]=>
  string(3) "036"
}
NULL

array(4) {
    ["name"]=>
  string(9) "Australia"
    ["alpha2"]=>
  string(2) "AU"
    ["alpha3"]=>
  string(3) "AUS"
    ["numericCode"]=>
  string(3) "036"
}
NULL

array(4) {
    ["name"]=>
  string(9) "Australia"
    ["alpha2"]=>
  string(2) "AU"
    ["alpha3"]=>
  string(3) "AUS"
    ["numericCode"]=>
  string(3) "036"
}
NULL

array(4) {
    ["name"]=>
  string(9) "Australia"
    ["alpha2"]=>
  string(2) "AU"
    ["alpha3"]=>
  string(3) "AUS"
    ["numericCode"]=>
  string(3) "036"
}
NULL

bool(true)
bool(false)
    
bool(true)
bool(false)
    
bool(true)
bool(false)
    
bool(true)
bool(false)
```

## Contributing
Welcome to pull requests. If there is a major changes, first please open an issue for discussion.

Please make sure to update tests as appropriate.

## Code coverage information
Summary:                 
- Classes: 100.00% (1/1)  
- Methods: 100.00% (8/8)  
- Lines:   100.00% (14/14)

Classes:
- StandardSearchUtility
   - Methods: 100.00% ( 8/ 8)   Lines: 100.00% ( 14/ 14)