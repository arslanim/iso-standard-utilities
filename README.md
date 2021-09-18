# ISO standard utilities
This component provides features for supporting search iso standards raw data by attributes.

## Terms and designations
- alpha2 - two-letter codes (recommended as the general-purpose code);
- alpha3 - three-letter codes;
- numericCodes - numeric codes;
- name - string name.

## Component parts description
AttributeCode - class, containing iso attributes constants.
- AttributeCodes::ATTRIBUTE_ALPHA2 - represents two-letter code attribute;
- AttributeCodes::ATTRIBUTE_ALPHA3 - represents three-letter code attribute;
- AttributeCodes::ATTRIBUTE_NAME - represents string name format attribute;
- AttributeCodes::ATTRIBUTE_NUMERIC_CODE - represents three-digit numeric code (which can be useful if you need to avoid using Latin script).

## Code coverage information
Summary:                 
- Classes: 100.00% (1/1)  
- Methods: 100.00% (8/8)  
- Lines:   100.00% (14/14)

Classes:
- StandardSearchUtility
   - Methods: 100.00% ( 8/ 8)   Lines: 100.00% ( 14/ 14)
