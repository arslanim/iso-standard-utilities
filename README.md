# ISO standard utilities

![Code Coverage Badge](./badge.svg) 

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

StandardSearchUtilityService - service class wrapper over StandardSearchUtility.

### getByAlpha2
```php
public static function getByAlpha2(
    array $standardsData,
    string $alpha2
): ?array;
```
```php
public function getByAlpha2(
    array $standardsData,
    string $alpha2
): ?array;
```
Input:
- $standardsData - array standards raw dataset;
- $alpha2 - two-letter code value;

Return: found standard raw array data, suitable to input two-letter code value (or null if not found).

#### Examples
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

$result = StandardSearchUtility::getByAlpha2($rawStandardsData, 'AU');
var_dump($result);

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

$result = StandardSearchUtility::getByAlpha2($rawStandardsData, 'RU');
var_dump($result);

NULL

$service = new StandardSearchUtilityService();

$result = $service->getByAlpha2($rawStandardsData, 'AU');
var_dump($result);

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

$result = $service->getByAlpha2($rawStandardsData, 'RU');
var_dump($result);

NULL
```

### getByAlpha3
```php
public static function getByAlpha3(
    array $standardsData,
    string $alpha3
): ?array;
```
```php
public function getByAlpha3(
    array $standardsData,
    string $alpha3
): ?array;
```
Input:
- $standardsData - array standards raw dataset;
- $alpha3 - three-letter code value;

Return: found standard raw array data, suitable to input three-letter code value (or null if not found).

#### Examples
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

$result = StandardSearchUtility::getByAlpha3($rawStandardsData, 'ARM');
var_dump($result);

array(4) {
  ["name"]=>
  string(7) "Armenia"
  ["alpha2"]=>
  string(2) "AM"
  ["alpha3"]=>
  string(3) "ARM"
  ["numericCode"]=>
  string(3) "051"
}

$result = StandardSearchUtility::getByAlpha3($rawStandardsData, 'FOO');
var_dump($result);

NULL

$service = new StandardSearchUtilityService();

$result = $service->getByAlpha3($rawStandardsData, 'ARM');
var_dump($result);

array(4) {
  ["name"]=>
  string(7) "Armenia"
  ["alpha2"]=>
  string(2) "AM"
  ["alpha3"]=>
  string(3) "ARM"
  ["numericCode"]=>
  string(3) "051"
}

$result = $service->getByAlpha3($rawStandardsData, 'RUS');
var_dump($result);

NULL
```

### getByNumericCode
```php
public static function getByNumericCode(
    array $standardsData,
    string $numericCode
): ?array;
```
```php
public function getByNumericCode(
    array $standardsData,
    string $numericCode
): ?array;
```
Input:
- $standardsData - array standards raw dataset;
- $numericCode - numeric code value;

Return: found standard raw array data, suitable to input numeric code value (or null if not found).

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

$result = StandardSearchUtility::getByNumericCode($rawStandardsData, '051');
var_dump($result);

array(4) {
  ["name"]=>
  string(7) "Armenia"
  ["alpha2"]=>
  string(2) "AM"
  ["alpha3"]=>
  string(3) "ARM"
  ["numericCode"]=>
  string(3) "051"
}

$result = StandardSearchUtility::getByNumericCode($rawStandardsData, '000');
var_dump($result);

NULL

$service = new StandardSearchUtilityService();

$result = $service->getByNumericCode($rawStandardsData, '051');
var_dump($result);

array(4) {
  ["name"]=>
  string(7) "Armenia"
  ["alpha2"]=>
  string(2) "AM"
  ["alpha3"]=>
  string(3) "ARM"
  ["numericCode"]=>
  string(3) "051"
}

$result = $service->getByNumericCode($rawStandardsData, '000');
var_dump($result);

NULL
```

### getStandardsDataByAttributeCode
```php
public static function getStandardsDataByAttributeCode(
    array $standardsData,
    string $attributeCode,
    string $value
): ?array;
```
```php
public function getStandardsDataByAttributeCode(
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

$result = StandardSearchUtility::getStandardsDataByAttributeCode($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA2, 'AU');
var_dump($result);

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

$result = StandardSearchUtility::getStandardsDataByAttributeCode($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA2, 'AUS');
var_dump($result);

NULL

$service = new StandardSearchUtilityService();

$result = $service->getStandardsDataByAttributeCode($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA2, 'AU');
var_dump($result);

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

$result = $service->getStandardsDataByAttributeCode($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA2, 'AUS');
var_dump($result);

NULL
```

### existByAlpha2
```php
public static function existByAlpha2(
    array $standardsData,
    string $alpha2
): bool;
```
```php
public function existByAlpha2(
    array $standardsData,
    string $alpha2
): bool;
```
Input:
- $standardsData - array standards raw dataset;
- $alpha2 - two-letter code value;

Return: true if standard raw data exist by two-letter code, false if not exist.

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

$result = StandardSearchUtility::existByAlpha2($rawStandardsData, 'AU');
var_dump($result);

bool(true)

$result = StandardSearchUtility::existByAlpha2($rawStandardsData, 'AUS');
var_dump($result);

bool(false)

$service = new StandardSearchUtilityService();

$result = $service->existByAlpha2($rawStandardsData, 'AU');
var_dump($result);

bool(true)

$result = $service->existByAlpha2($rawStandardsData, 'AUS');
var_dump($result);

bool(false)
```

### existByAlpha3
```php
public static function existByAlpha3(
    array $standardsData,
    string $alpha3
): bool;
```
```php
public function existByAlpha3(
    array $standardsData,
    string $alpha3
): bool;
```
Input:
- $standardsData - array standards raw dataset;
- $alpha3 - three-letter code value;

Return: true if standard raw data exist by three-letter code, false if not exist.

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

$result = StandardSearchUtility::existByAlpha3($rawStandardsData, 'AUS');
var_dump($result);

bool(true)

$result = StandardSearchUtility::existByAlpha3($rawStandardsData, 'AU');
var_dump($result);

bool(false)

$service = new StandardSearchUtilityService();

$result = $service->existByAlpha3($rawStandardsData, 'AUS');
var_dump($result);

bool(true)

$result = $service->existByAlpha3($rawStandardsData, 'AU');
var_dump($result);

bool(false)
```

### existByNumericCode
```php
public static function existByNumericCode(
    array $standardsData,
    string $numericCode
): bool;
```
```php
public function existByNumericCode(
    array $standardsData,
    string $numericCode
): bool;
```
Input:
- $standardsData - array standards raw dataset;
- $numericCode - numeric code value;

Return: true if standard raw data exist by numeric code, false if not exist.

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

$result = StandardSearchUtility::existByNumericCode($rawStandardsData, '036');
var_dump($result);

bool(true)

$result = StandardSearchUtility::existByNumericCode($rawStandardsData, '000');
var_dump($result);

bool(false)

$service = new StandardSearchUtilityService();

$result = $service->existByNumericCode($rawStandardsData, '036');
var_dump($result);

bool(true)

$result = $service->existByNumericCode($rawStandardsData, '000');
var_dump($result);

bool(false)
```

### existByAttributeCode
```php
public static function existByAttributeCode(
    array $standardsData,
    string $attributeCode,
    string $value
): bool;
```
```php
public function existByAttributeCode(
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

$result = StandardSearchUtility::existByAttributeCode($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA2, 'AU');
var_dump($result);

bool(true)

$result = StandardSearchUtility::existByAttributeCode($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA2, 'foo');
var_dump($result);

bool(false)

$service = new StandardSearchUtilityService();

$result = $service->existByAttributeCode($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA2, 'AU');
var_dump($result);

bool(true)

$result = $service->existByAttributeCode($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA2, 'foo');
var_dump($result);

bool(false)
```

### getAllNames
```php
public static function getAllNames(
    array $standardsData
): array;
```
```php
public function getAllNames(
    array $standardsData
): array;
```
Input:
- $standardsData - array standards raw dataset;

Return: standards names string[].

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

$result = StandardSearchUtility::getAllNames($rawStandardsData);
var_dump($result);

array(3) {
  [0]=>
  string(7) "Armenia"
  [1]=>
  string(5) "Aruba"
  [2]=>
  string(9) "Australia"
}

$service = new StandardSearchUtilityService();

$result = $service->getAllNames($rawStandardsData);
var_dump($result);

array(3) {
  [0]=>
  string(7) "Armenia"
  [1]=>
  string(5) "Aruba"
  [2]=>
  string(9) "Australia"
}
```

### getAllNumericCodes
```php
public static function getAllNumericCodes(
    array $standardsData
): array;
```
```php
public function getAllNumericCodes(
    array $standardsData
): array;
```
Input:
- $standardsData - array standards raw dataset;

Return: standards numeric codes string[].

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

$result = StandardSearchUtility::getAllNumericCodes($rawStandardsData);
var_dump($result);

array(3) {
  [0]=>
  string(3) "051"
  [1]=>
  string(3) "533"
  [2]=>
  string(3) "036"
}

$service = new StandardSearchUtilityService();

$result = $service->getAllNumericCodes($rawStandardsData);
var_dump($result);

array(3) {
  [0]=>
  string(3) "051"
  [1]=>
  string(3) "533"
  [2]=>
  string(3) "036"
}
```

### getAllAlpha3
```php
public static function getAllAlpha3(
    array $standardsData
): array;
```
```php
public function getAllAlpha3(
    array $standardsData
): array;
```
Input:
- $standardsData - array standards raw dataset;

Return: standards Alpha3 codes string[].

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

$result = StandardSearchUtility::getAllAlpha3($rawStandardsData);
var_dump($result);

array(3) {
  [0]=>
  string(3) "ARM"
  [1]=>
  string(3) "ABW"
  [2]=>
  string(3) "AUS"
}

$service = new StandardSearchUtilityService();

$result = $service->getAllAlpha3($rawStandardsData);
var_dump($result);

array(3) {
  [0]=>
  string(3) "ARM"
  [1]=>
  string(3) "ABW"
  [2]=>
  string(3) "AUS"
}
```

### getAllAlpha2
```php
public static function getAllAlpha2(
    array $standardsData
): array;
```
```php
public function getAllAlpha2(
    array $standardsData
): array;
```
Input:
- $standardsData - array standards raw dataset;

Return: standards Alpha2 codes string[].

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

$result = StandardSearchUtility::getAllAlpha2($rawStandardsData);
var_dump($result);

array(3) {
  [0]=>
  string(2) "AM"
  [1]=>
  string(2) "AW"
  [2]=>
  string(2) "AU"
}

$service = new StandardSearchUtilityService();

$result = $service->getAllAlpha2($rawStandardsData);
var_dump($result);

array(3) {
  [0]=>
  string(2) "AM"
  [1]=>
  string(2) "AW"
  [2]=>
  string(2) "AU"
}
```

### getAllAttributesByCode
```php
public static function getAllAttributesByCode(
    array $standardsData,
    string $attributeCode
): array;
```
```php
public function getAllAttributesByCode(
    array $standardsData,
    string $attributeCode
): array
```
Input:
- $standardsData - array standards raw dataset;
- $attributeCode - code attribute name;

Return: standards attribute code value searched by attribute code name.

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

$result = StandardSearchUtility::getAllAttributesByCode($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA2);
var_dump($result);

array(3) {
  [0]=>
  string(2) "AM"
  [1]=>
  string(2) "AW"
  [2]=>
  string(2) "AU"
}

$service = new StandardSearchUtilityService();

$result = $service->getAllAttributesByCode($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA2);
var_dump($result);

array(3) {
  [0]=>
  string(2) "AM"
  [1]=>
  string(2) "AW"
  [2]=>
  string(2) "AU"
}
```

### getAllByAttributeCodeValues
```php
public static function getAllByAttributeCodeValues(
    array $standardsData,
    string $attributeCode,
    array $values
): array;
```
```php
public function getAllByAttributeCodeValues(
    array $standardsData,
    string $attributeCode,
    array $values
): array;
```
Input:
- $standardsData - array standards raw dataset;
- $attributeCode - code attribute name;
- $values - code values string array;

Return: array of standards, filtered by given code attribute name and code values string array.

#### Examples
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

$result = StandardSearchUtility::getAllByAttributeCodeValues($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA2, ['AU', 'AM']);
var_dump($result);

array(2) {
  [0]=>
  array(4) {
    ["name"]=>
    string(7) "Armenia"
    ["alpha2"]=>
    string(2) "AM"
    ["alpha3"]=>
    string(3) "ARM"
    ["numericCode"]=>
    string(3) "051"
  }
  [1]=>
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
}

$result = StandardSearchUtility::getAllByAttributeCodeValues($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA2, ['AUS', 'ARM']);
var_dump($result);

array(0) {
}

$service = new StandardSearchUtilityService();

$result = $service->getAllByAttributeCodeValues($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA2, ['AU', 'AM']);
var_dump($result);

array(2) {
  [0]=>
  array(4) {
    ["name"]=>
    string(7) "Armenia"
    ["alpha2"]=>
    string(2) "AM"
    ["alpha3"]=>
    string(3) "ARM"
    ["numericCode"]=>
    string(3) "051"
  }
  [1]=>
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
}

$result = $service->getAllByAttributeCodeValues($rawStandardsData, AttributeCodes::ATTRIBUTE_ALPHA2, ['AUS', 'ARM']);
var_dump($result);

array(0) {
}
```

### getAllByAlpha2Values
```php
public static function getAllByAlpha2Values(
    array $standardsData,
    array $values
): array;
```
```php
public function getAllByAlpha2Values(
    array $standardsData,
    array $values
): array;
```
Input:
- $standardsData - array standards raw dataset;
- $values - alpha2 code values string array;

Return: array of standards, filtered by given alpha2 code values string array.

#### Examples
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

$result = StandardSearchUtility::getAllByAlpha2Values($rawStandardsData, ['AU', 'AM']);
var_dump($result);

array(2) {
  [0]=>
  array(4) {
    ["name"]=>
    string(7) "Armenia"
    ["alpha2"]=>
    string(2) "AM"
    ["alpha3"]=>
    string(3) "ARM"
    ["numericCode"]=>
    string(3) "051"
  }
  [1]=>
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
}

$result = StandardSearchUtility::getAllByAlpha2Values($rawStandardsData, ['AUS', 'ARM']);
var_dump($result);

array(0) {
}

$service = new StandardSearchUtilityService();

$result = $service->getAllByAlpha2Values($rawStandardsData, ['AU', 'AM']);
var_dump($result);

array(2) {
  [0]=>
  array(4) {
    ["name"]=>
    string(7) "Armenia"
    ["alpha2"]=>
    string(2) "AM"
    ["alpha3"]=>
    string(3) "ARM"
    ["numericCode"]=>
    string(3) "051"
  }
  [1]=>
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
}

$result = $service->getAllByAlpha2Values($rawStandardsData, ['AUS', 'ARM']);
var_dump($result);

array(0) {
}
```

### getAllByAlpha3Values
```php
public static function getAllByAlpha3Values(
    array $standardsData,
    array $values
): array;
```
```php
public function getAllByAlpha3Values(
    array $standardsData,
    array $values
): array;
```
Input:
- $standardsData - array standards raw dataset;
- $values - alpha3 code values string array;

Return: array of standards, filtered by given alpha3 code values string array.

#### Examples
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

$result = StandardSearchUtility::getAllByAlpha3Values($rawStandardsData, ['AUS', 'ARM']);
var_dump($result);

array(2) {
  [0]=>
  array(4) {
    ["name"]=>
    string(7) "Armenia"
    ["alpha2"]=>
    string(2) "AM"
    ["alpha3"]=>
    string(3) "ARM"
    ["numericCode"]=>
    string(3) "051"
  }
  [1]=>
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
}

$result = StandardSearchUtility::getAllByAlpha3Values($rawStandardsData, ['AU', 'AM']);
var_dump($result);

array(0) {
}

$service = new StandardSearchUtilityService();

$result = $service->getAllByAlpha3Values($rawStandardsData, ['AUS', 'ARM']);
var_dump($result);

array(2) {
  [0]=>
  array(4) {
    ["name"]=>
    string(7) "Armenia"
    ["alpha2"]=>
    string(2) "AM"
    ["alpha3"]=>
    string(3) "ARM"
    ["numericCode"]=>
    string(3) "051"
  }
  [1]=>
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
}

$result = $service->getAllByAlpha3Values($rawStandardsData, ['AU', 'AM']);
var_dump($result);

array(0) {
}
```

### getAllByNumericCodeValues
```php
public static function getAllByNumericCodeValues(
    array $standardsData,
    array $values
): array;
```
```php
public function getAllByNumericCodeValues(
    array $standardsData,
    array $values
): array;
```
Input:
- $standardsData - array standards raw dataset;
- $values - numeric code values string array;

Return: array of standards, filtered by given numeric code values string array.

#### Examples
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

$result = StandardSearchUtility::getAllByNumericCodeValues($rawStandardsData, ['051', '036']);
var_dump($result);

array(2) {
  [0]=>
  array(4) {
    ["name"]=>
    string(7) "Armenia"
    ["alpha2"]=>
    string(2) "AM"
    ["alpha3"]=>
    string(3) "ARM"
    ["numericCode"]=>
    string(3) "051"
  }
  [1]=>
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
}

$result = StandardSearchUtility::getAllByNumericCodeValues($rawStandardsData, ['000', '111']);
var_dump($result);

array(0) {
}

$service = new StandardSearchUtilityService();

$result = $service->getAllByNumericCodeValues($rawStandardsData, ['051', '036']);
var_dump($result);

array(2) {
  [0]=>
  array(4) {
    ["name"]=>
    string(7) "Armenia"
    ["alpha2"]=>
    string(2) "AM"
    ["alpha3"]=>
    string(3) "ARM"
    ["numericCode"]=>
    string(3) "051"
  }
  [1]=>
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
}

$result = $service->getAllByNumericCodeValues($rawStandardsData, ['000', '111']);
var_dump($result);

array(0) {
}
```

### getAllByNameValues
```php
public static function getAllByNameValues(
    array $standardsData,
    array $values
): array;
```
```php
public function getAllByNameValues(
    array $standardsData,
    array $values
): array;
```
Input:
- $standardsData - array standards raw dataset;
- $values - name values string array;

Return: array of standards, filtered by given name values string array.

#### Examples
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

$result = StandardSearchUtility::getAllByNameValues($rawStandardsData, ['Armenia', 'Australia']);
var_dump($result);

array(2) {
  [0]=>
  array(4) {
    ["name"]=>
    string(7) "Armenia"
    ["alpha2"]=>
    string(2) "AM"
    ["alpha3"]=>
    string(3) "ARM"
    ["numericCode"]=>
    string(3) "051"
  }
  [1]=>
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
}

$result = StandardSearchUtility::getAllByNameValues($rawStandardsData, ['foo', 'bar']);
var_dump($result);

array(0) {
}

$service = new StandardSearchUtilityService();

$result = $service->getAllByNameValues($rawStandardsData, ['Armenia', 'Australia']);
var_dump($result);

array(2) {
  [0]=>
  array(4) {
    ["name"]=>
    string(7) "Armenia"
    ["alpha2"]=>
    string(2) "AM"
    ["alpha3"]=>
    string(3) "ARM"
    ["numericCode"]=>
    string(3) "051"
  }
  [1]=>
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
}

$result = $service->getAllByNameValues($rawStandardsData, ['foo', 'bar']);
var_dump($result);

array(0) {
}
```

## Contributing
Welcome to pull requests. If there is a major changes, first please open an issue for discussion.

Please make sure to update tests as appropriate.

## Code coverage information
Summary:                 
- Classes: 100.00% (2/2)  
- Methods: 100.00% (26/26)
- Lines:   100.00% (48/48)

Classes:
- StandardSearchUtility
   - Methods: 100.00% (13/13)   Lines: 100.00% ( 23/ 23)
- StandardSearchUtilityService
   - Methods: 100.00% (13/13)   Lines: 100.00% ( 25/ 25)